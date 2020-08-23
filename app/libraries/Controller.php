<?php

class Controller {
    public $imageModel ; 
    public $userModel ; 
    
    public function model($model){
        //wymagam model
        
        


        require_once APP."/models/".$model.".php" ;
        
       

        return new $model() ; 
        

    }

    public function view($view , $data = []){
        if(file_exists(APP."/views/".$view.".php")){
            require_once "../app/views/".$view.".php" ; 
        }
        else{
            die("non") ; 
        }
    }
}