<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Faction 
{    
    use MiscMaths;
    
    public String $name;
    public String $shortName;
    
    private array $games;
    private array $positions = array();
    private ?array $deviation = null;
    
    public readonly int $id;
    
    public function __construct(Object $record, bool $withStats = false) 
    {
        
        $this->name = $record->name;
        $this->id = $record->id;
        $this->shortName = $record->shortName;
        
        if($withStats) {
            //TODO can this be better?
            $records = DB::select('select game_xref.*, player.name as player, game.pok, game.players, date_format(game.date, "%d/%m/%Y") as date from game_xref '.
                ' inner join game on fk_game_id = game.id'.
                ' inner join player on fk_player_id = player.id'.
                ' where fk_faction_id = ?', array($this->id));
            $this->games = $records;
            
            foreach ($this->games as $game) {
                if(!isset($this->positions[$game->position])) $this->positions[$game->position] = 0;
                $this->positions[$game->position]++;
            }
        }
    }    
    
    public function getDeviation() : int 
    {
        $deviation = 0;
        if(!$this->deviation) $this->figureDeviation("player");
        
        foreach ($this->deviation as $key=>$value) {
            $deviation += $value;
        }
        
        return $deviation;
    }
    
    public function getName() : String 
    {
        return $this->name;
    }
    
    public function getURLName() : String 
    {
        return urlencode(strtolower($this->shortName));
    }
    
    public function getGames() : array {
        return $this->games;
    }
    
    public function getWins() : ?int 
    {
        
        return $this->getPosition(1);
    }
    
    public function getPosition(int $position) 
    {
        
        return isset($this->positions[$position]) ? $this->positions[$position] : 0;
    }
    
    public function getMostPlayed() : bool|String 
    {
        
        $data = array();
        
        array_walk($this->games, function($val) use(&$data) {
            if(!isset($data[$val->player])) {
                $data[$val->player] = 0;
            }
            $data[$val->player]++;
        });
            
        if(!count($data)) return false;
        arsort($data);
        $max = reset($data);
        $str = "";
        foreach ($data as $key => $value) {
            if($value < $max) break;
            else $str .= ($key . " ($value) "."<br/>");
        }
        
        return $str;
    }
    
    public function getBestAs() : bool|String 
    {
        
        if(!$this->deviation) $this->figureDeviation("player");
        
        $data = $this->deviation;
        if(!count($data)) return false;
        arsort($data);                
        
        $max = reset($data);
        $str = "";
        foreach ($data as $key => $value) {
            if($value != $max) break;
            else $str .= ($key . " (-/+ $value) "."<br/>");
        }
        
        return $str;
    }
    
    public function getWorstAs() : bool|String 
    {
        
        if(!$this->deviation) $this->figureDeviation("player");
        
        $data = $this->deviation;
        if(!count($data)) return false;
        asort($data);
        $max = reset($data);
        $str = "";
        foreach ($data as $key => $value) {
            if($value != $max) break;
            else $str .= ($key . " (-/+ $value) "."<br/>");
        }
        
        return $str;
    }
    
    public function getGuides() : array 
    {

        $records = DB::select('select * from guide '.
            ' where fk_faction_id = ?', array($this->id));
        
        return $records;
    }
}
