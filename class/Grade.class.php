<?php
class Grade{
    static function get(&$societe){
        $dpt = substr($societe->zip,0,2);
        $point = 0;
        if ($dpt == '26' || $dpt == '07'){
        
            $point++;
        
        
        }
        if($societe->capital>5000) $point++;
        if($societe->capital>50000) $point++;
        if($societe->capital>500000) $point++;
        $grades = array("F", "E", "D", "C","B","A");
        return $grade[$point];
    
    }
}

?>