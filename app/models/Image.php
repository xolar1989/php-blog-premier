<?php

class Image {
    private $db ; 

    public function __construct(){
        global $mongo ; 
        $this->db = $mongo->get_db() ; 
        
    }


    public function searchPhotos($title){
        $query = ['$or'=> [['type' => "public" , "title" => ['$regex' => $title, '$options' => 'i']],["type" => "private" , "author" => $_SESSION["user_email"] , "title" => ['$regex' => $title, '$options' => 'i'] ] ] ] ; 
        $result = $this->db->images->find($query)->toArray();
     

        return $result;  
    }


    public function upload($data){
       

        $result =  $this->db->images->insertOne(['author' => $data["author"],'title' => $data["title"] ,'type' => $data["type"] , 'watermark' => $data["watermark"] , "image" => $data["image"]]);

        
         
        
        if(isset($result)){
            return true ; 
        } 
        else{
            false ; 
        }

    }

    public function deletePhotos($data){
        $target_normal = GLOBALURL."/public/imagesServer/normal/"; 
        $target_mini = GLOBALURL."/public/imagesServer/mini/"; 
        $target_watermark = GLOBALURL."/public/imagesServer/watermark/"; 
        foreach($data as $item){
            $deleteResult = $this->db->images->deleteOne(["image" => $item]) ;  unlink($target_normal.$item) or die("Couldn't delete file");
            unlink($target_mini.$item) or die("Couldn't delete file");
            unlink($target_watermark.$item) or die("Couldn't delete file");
        }
      
      
    }


    public function miniGallery(){
        $url = getUrl() ; 
        $items  = 0 ; 
        $query = ['$or'=> [['type' => "public"],["type" => "private" , "author" => $_SESSION["user_email"] ] ] ] ; 
        $amount_pages = 0  ; 
        $all_elements = $this->db->images->find($query)->toArray();

        foreach ($all_elements as $document) {
            if($items%3 == 0 ){
                $amount_pages++ ; 
            }
           $items++ ; 
           

        }


        
         



        
        


        if(isset($url[2]) && is_numeric($url[2][0]) ){

            $page = $url[2][0];
        }
        else
        {
            $page = 1 ; 
        }

       
        $pageSize= 3;
        $opts = ['skip' => ($page -1) * $pageSize,
        'limit' => $pageSize];
        $result = $this->db->images->find($query, $opts)->toArray();
         
        

        $photos = []; 

       
        foreach ($result as $document) {
            
            $photo = new Photo(strval($document['_id']) , $document['author'] ,$document['title'] ,$document['type'] , $document['watermark'] , $document['image'] ) ; 

            array_push($photos , $photo) ; 

        }



        return ["photos" => $photos , "page" => $page  , "amount_pages" => $amount_pages  , "user_email" => $_SESSION["user_email"]  ,"user_name" =>     $_SESSION["user_name"] ] ;  


    }




}