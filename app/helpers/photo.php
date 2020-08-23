<?php


class Photo {
    public $_id ; 
    public $author ; 
    public $title  ; 
    public $type  ; 
    public $watermark  ; 
    public $image  ; 

    public function __construct($_id ,$author,$title ,$type , $watermark , $image){
        $this->_id = $_id ; 
        $this->author = $author ; 
        $this->title = $title ; 
        $this->type = $type ; 
        $this->watermark = $watermark ; 
        $this->image = $image ; 

    }





}