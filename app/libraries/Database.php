<?php

//connect db

class Database {
    private $link = "mongodb://localhost:27017/wai" ; 
    private $username = 'wai_web' ; 
    private $password = 'w@i_w3b' ; 
    private $db  ; 

    private $error ; 

    public function __construct(){
        $mongo = new MongoDB\Client(
            "mongodb://localhost:27017/wai",
            [
                'username' => 'wai_web',
                'password' => 'w@i_w3b',
            ]);


          
        
        $this->db = $mongo->wai;
    }

    public function sayhello(){
        print_r($this->db) ; 
    }

    public function get_db(){
        return $this->db ; 
    }




}

