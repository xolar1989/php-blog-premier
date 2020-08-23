<?php
  class Pages extends Controller{
     
   


    public function __construct(){

      
    $this->imageModel = $this->model("Image") ; 

    }

    public function image(){
        $url = getUrl() ;
        $data =  [];  
        
       

        if(isset($url[2]) ){

          $data = ["image" => $url[2]] ; 
        }
        else {
          $this->view("pages/index" , $data) ; 
        }

        $this->view("pages/image" , $data) ;  

    }
    


    public function index(){
      $data =  [];  


      $this->view("pages/index" , $data) ; 
    }


    public function about(){
 //sprawdza czy sa posty
 if($_SERVER["REQUEST_METHOD"] =="POST"){
  //form register
  // SPrawdza czy w inputach sa stringi
  $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ; 

 

  $data = [
      'author' =>  isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : trim($_POST["author"]), 
      "title" => trim($_POST["title"])  , 
      "watermark" => trim($_POST["watermark"])  , 
      "type" => isset($_POST["type"]) ? trim($_POST["type"]) : "public"  , 
      "image" => "",  
      "image_err" => "",  
      "title_err" => "" , 
      "watermark_err" => ""  , 
     


  ] ; 


  $canBeUpload = true ; 




 


 

  if(empty($data["watermark"]) ){
      $data["watermark_err"] = "watermark is required" ;
      $canBeUpload = false ;  
  }

  if(strlen($data["title"]) < 5 ){
      $data["title_err"] = "Title has to 5 or more signs" ; 
      $canBeUpload = false ;  
  }

  $target_dir = GLOBALURL."/public/imagesServer/normal/";
  if(isset($_FILES["file"]["name"]) && $canBeUpload){
    $target_file = $target_dir.basename($_FILES["file"]["name"]);
  $target_upload = $target_dir.basename($_FILES["file"]["tmp_name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   

  // Check file size
  if ($_FILES["file"]["size"] > 1000000) {
    $data["image_err"] =  "The file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   ) {
    $data["image_err"] =  "Only JPG, JPEG files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 1) {
  // if everything is ok, try to upload file
       
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_upload.".".$imageFileType)) {
        $data["image"] = basename( $_FILES["file"]["tmp_name"]).".".$imageFileType;
        $this->insert_watermark($target_dir.$data["image"] , $data["image"] , $data["watermark"]) ; 
        $this->create_mini($target_dir.$data["image"] , $data["image"] ) ; 


        // info after upload image
        $_SESSION["image_info"] =  "File has just been uploaded" ;

      } else {
        $data["image_err"] =  "Unexpected Error";
      }
  }

  }
  else if($canBeUpload){
    $data["image_err"] = "No file" ; 
  }
  


  if(empty($data["watermark_err"])  && empty($data["title_err"])  && empty($data["image_err"]) ){
      //Sprawdzone 
     
      if($this->imageModel->upload($data)){
          redirect("pages/about") ; 
      }
      else{
          die("jest chuj") ; 
      }
  }

  else{
       // view z errorami

       $this->view("pages/about" , $data) ;
  }


  


}
else{
  //form bd
  $data = [
    'author' => "", 
    "title" => "" , 
    "watermark" => ""  , 
    "private" => "" , 
    "title_err" => "" , 
    "watermark_err" => ""  , 


] ; 



  $this->view("pages/about",$data) ; 
}





    
    
    }

    private function insert_watermark($img_path , $image_name , $watermark)  
 {  
        // Load the stamp and the photo to apply the watermark to
    $img = imagecreatefromjpeg("$img_path");
   
    $stamp = imagecreatetruecolor(strlen($watermark)*10, 60);
    $bg_color = imagecolorallocatealpha($stamp , 0 , 0 , 0 ,0) ; 
    $font_color = imagecolorallocate($stamp, 255, 255, 255);
    imagefilledrectangle($stamp, 9, 9, 90, 60, $bg_color);
    imagestring($stamp, 5, 20, 20, $watermark,$font_color);
 

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Merge the stamp onto our photo with an opacity of 50%
imagecopymerge($img, $stamp, (imagesx($img)/2) - ($sx/2), (imagesy($img)/2) - $sy/2, 0, 0, imagesx($stamp), imagesy($stamp), 50);
   
    // Save the image to file and free memory
    imagejpeg($img, GLOBALURL."/public/imagesServer/watermark/".$image_name);
    imagedestroy($img);     
    imagedestroy($stamp);     
 }  

 private function create_mini($img_path , $image_name ){
  $img = imagecreatefromjpeg("$img_path");
  $stamp = imagecreatetruecolor(200,125);


  imagecopyresized($stamp, $img, 0, 0, 0, 0, 200, 125,imagesx($img),imagesy($img));
 

 imagejpeg($stamp, GLOBALURL."/public/imagesServer/mini/".$image_name);
    imagedestroy($img);     
    imagedestroy($stamp);
 }

  }