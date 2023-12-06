<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Player 
{    
    public String $name;
    private array $games; 
    private array $positions = array();
    private ?array $deviation = null;
    
    public readonly int $id;
    
    public function __construct(Object $record, bool $withStats = false) {
        
        $this->name = $record->name;
        $this->id = $record->id;
        
        if($withStats) {
            //TODO can this be better?
            $records = DB::select('select game_xref.*, faction.name as faction, game.pok, game.players, date_format(game.date, "%d/%m/%Y") as date from game_xref '.
                ' inner join game on fk_game_id = game.id'.
                ' inner join faction on fk_faction_id = faction.id'.
                ' where fk_player_id = ?', array($this->id));                            
            $this->games = $records;
            
            foreach ($this->games as $game) {
                if(!isset($this->positions[$game->position])) $this->positions[$game->position] = 0;
                $this->positions[$game->position]++;
            }            
        }
    }
    
    private function figureDeviation() {
        
        $data = array();
        
        array_walk($this->games, function($val) use(&$data) {
            if(!isset($data[$val->faction])) {
                $data[$val->faction] = 0;
            }
            $av = ($val->players+1) / 2;
            $deviation = 0;
            //no I dont know how to do standard deviation
            if($val->position != $av) $deviation = $av - $val->position;
            else $deviation = 0;
            
            $data[$val->faction] += $deviation;
        });
        
        $this->deviation = $data;
    }
    
    public function getName() : String {
        return $this->name;
    }
    
    public function getURLName() : String {
        return urlencode(strtolower($this->name));
    }
    
    public function getGames() : array {
        return $this->games;
    }
    
    public function getWins() : ?int {
                
        return $this->getPosition(1);
    }
    
    public function getPosition(int $position) {
        
        return isset($this->positions[$position]) ? $this->positions[$position] : 0;        
    }
    
    public function getMostPlayed() : bool|String {
        
        $data = array();
        
        array_walk($this->games, function($val) use(&$data) {
            if(!isset($data[$val->faction])) {
                $data[$val->faction] = 0;
            }
            $data[$val->faction]++;
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
    
    public function getBestAs() : bool|String {
        
        if(!$this->deviation) $this->figureDeviation();
            
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
    
    public function getWorstAs() : bool|String {
        
        if(!$this->deviation) $this->figureDeviation();
        
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
}
