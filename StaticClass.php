<?php

class estatica {

    private static $instance;

    function __construct(){
        echo 'Construct';
    }

    public function do(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        
        return self::$instance;

    }

    public function something(){
        var_dump($this);
    }
    
}

estatica::do()->something();