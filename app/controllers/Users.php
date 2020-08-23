<?php



    class Users extends Controller {
        public function __construct(){
            $this->userModel = $this->model("User") ; 
            $this->imageModel = $this->model("Image") ; 
        }


        public function index(){
            $this->view("users/profile" , []) ;
        }


        public function search(){
           
            $this->view("users/search" , []) ;
        }

        public function searchImages(){
           

            if(isset($_POST["searchValue"]) && !empty($_POST["searchValue"])){
            $data = $this->imageModel->searchPhotos( $_POST["searchValue"]) ;
            $count = count($data) ;
            if($count > 0 ){
             foreach($data as $item){
                
                $url = MAINURL ; 

             echo  " <div class='super-card' style='margin:20px 0 ; background-image: linear-gradient(-135deg, rgba(91%, 0%, 32%, 0.8), rgba(55, 0, 60, 0.7))'>
                <div class='card'>
                <a href='{$url}/pages/image/{$item['image']}'>
                <img src='/imagesServer/mini/{$item['image']}'> </a>
                    <div class='card-container'>
                        <h2 class='title-card'>{$item['title']}</h2>
                        
                    </div>
                </div> 
            </div>" ;
                 
                
                } 
            }
            else{

            }
            
            }
            else {
               echo "nothing " ;
            }
               

        }



        public function photos(){
            if($_SERVER["REQUEST_METHOD"] =="POST"){

               



                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ; 

                 


                if(isset($_POST)){
                    $query = array_values($_POST) ; 
                    $elements = array_keys($query) ; 

                    $data = $this->imageModel->deletePhotos($query) ;
                    foreach($query as $item){

                        if(in_array($item ,$_SESSION["remember_images"] ) )
                        {
                        unset($_SESSION["remember_images"][array_search($item,$_SESSION["remember_images"])]) ; 
                        }
                    }
               
                }
                $this->view("users/photos" , []) ;

                

              


               

               


            }
            else{

            $this->view("users/photos" , []) ;
            }
            
        }





        public function remember(){
            if($_SERVER["REQUEST_METHOD"] =="POST"){

                if(isset($_SESSION["remember_images"])){
                    unset($_SESSION["remember_images"]) ; 
                }



                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ; 


                if(isset($_POST)){
                $_SESSION["remember_images"] = array_values($_POST) ; 
                }


               

               


            }

            redirect("users/profile/1") ; 



        }




        public function profile(){

            if(isset( $_SESSION["user_id"])){
                $data = $this->imageModel->miniGallery() ;
        
                $this->view("users/profile" , $data) ;
            }
            else
            {
                $this->view("users/login" , []) ; 
            }
        }

        public function register(){
            
            //sprawdza czy sa posty
            if($_SERVER["REQUEST_METHOD"] =="POST"){
                //form register
                // SPrawdza czy w inputach sa stringi
                $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING) ; 

                
               

               

                $data = [
                    'login' => trim($_POST["login"]), 
                    "email" => trim($_POST["email"]) , 
                    "password" => trim($_POST["password"])  , 
                    "confirmed_password" => trim($_POST["confirmed_password"])  , 
                    "login_err" => "" , 
                    "email_err" => "" , 
                    "password_err" => "" , 
                    "confirmed_password_err" => "" 

                ] ; 

                if(empty($data["email"]) || !strpos($data["email"] ,"@" ) || (!strpos($data["email"] ,".pl" ) && !strpos($data["email"] ,".com" )  ) ){
                    $data["email_err"] = "Incorrect email" ; 
                }
                else{
                    if($this->userModel->findUser($data["email"])){
                        $data["email_err"] = "Email is already taken" ; 
                    }
                }

                if(strlen($data["login"]) < 5 ){
                    $data["login_err"] = "Login should has 5 or more characters" ; 
                }
                if(strlen($data["password"]) < 8 ){
                    $data["password_err"] = "Password should has 8 or more characters" ; 
                }
                if($data["password"] !== $data["confirmed_password"] ){
                    $data["confirmed_password_err"] = "Password does not match" ; 
                }

                if(empty($data["email_err"]) &&  empty($data["login_err"]) && empty($data["password_err"] ) && empty($data["confirmed_password_err"])  ){
                    //Sprawdzone 

                    //hash password 
                    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
                    

                    // register user 
                   
                    if($this->userModel->register($data)){
                        redirect("users/login") ; 
                    }
                    else{
                        die("jest chuj") ; 
                    }
                }

                else{
                     // view z errorami

                     $this->view("users/register" , $data) ;
                }


                


            }
            else{
                //form bd
                $data = [
                    'login' => "" , 
                    "email" => "" , 
                    "password" => "" , 
                    "confirmed_password" => "" , 
                    "login_err" => "" , 
                    "email_err" => "" , 
                    "password_err" => "" , 
                    "confirmed_password_err" => "" 

                ] ; 


                $this->view("users/register" , $data) ;
            }
        }


        public function login(){



              //sprawdza czy sa posty
              if($_SERVER["REQUEST_METHOD"] =="POST"){
                //form register
                $data = [
                    'email' => trim($_POST["email"]),          
                    "password" => trim($_POST["password"])  ,
                    "email_err" => "" ,                     
                    "password_err" => "" 
                ] ; 

                if( empty($data["email"])) {
                    $data["email_err"] = "Please enter email" ; 
                } 
                else{
                    if($this->userModel->findUser($data["email"] )){
                    // user found 


                    }
                    else {
                        $data["email_err"] = "No user found" ;
                    }

                }



                if(empty($data["password"])) {
                    $data["password_err"] = "Please enter password" ; 
                }
                
                
                if(  empty($data["email_err"]) && empty($data["password_err"] ) ){


                   $user = $this->userModel->login($data["email"] , $data["password"]) ; 
                    if($user){
                        // session user ; 
                      
                        
                        $this->createSession($user) ; 
                         

                    }
                    else {
                        $data["password_err"] = "Password incorrect"  ; 

                        $this->view("users/login" , $data) ; 
                    }



                }
                else{
                    $this->view("users/login" ,$data) ;
                }





            }
            else{
                //form bd
                $data = [
                    'email' => "" , 
                    "password" => "" , 
                    "email_err" => "" , 
                    "password_err" => "" , 
                 

                ] ; 
            $this->view("users/login" ,$data) ;

                }
        }


        private function createSession($user){
            $_SESSION["user_id"] = $user["_id"] ; 
            $_SESSION["user_email"] = $user["email"] ; 
            $_SESSION["user_name"] = $user["login"] ; 
             redirect("users/profile") ; 

            } 


            public function logout(){

                unset($_SESSION["user_id"]) ; 
                unset($_SESSION["user_email"]) ; 
                unset($_SESSION["user_name"]) ; 
                session_destroy() ; 

                redirect("users/login") ; 
            }

            public function isLogged(){
                if(isset($_SESSION["user_id"]) ){
                    return true ; 
                }
                else {
                    return false ; 
                }
            }


    }
