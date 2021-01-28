<?php
class SuggestionsAchats{
    private $suggestionsAchats = array();
    
    public function __construct($array){
        if (is_array($array)) {
            $this->suggestionsAchats = $array;
        }
    }
    
    public function getSuggestions(){
        return $this->suggestionsAchats;
    }
}