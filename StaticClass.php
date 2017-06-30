<?php

class estatica {

    private static $instance;

    function __construct(){
        echo 'Construct';
    }

    public static function do(){
        echo 'Eu!';die();
        if(is_null(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;

    }

    public function something(){
        echo 'play';
    }
    
}

estatica::do();