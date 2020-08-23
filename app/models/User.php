<?php 
    class User{
        private $db ; 

    public function __construct(){
        global $mongo ; 
        $this->db = $mongo->get_db() ; 
        
    }


    // find user by login 
    public function findUser($item ) {
        
      
        $query = ['email' => $item];
        
        
          
        


       

            if($this->db->users->count($query) > 0 ){
                return true  ; 
            }  
            else{
                return false ; 
            }

        
    }

    public function register($data) {

        $result =  $this->db->users->insertOne(['login' => $data["login"],'email' => $data["email"] , 'password' => $data["password"]]);


         
        
       if(isset($result)){
           return true ; 
       } 
       else{
           false ; 
       }


    }

    public function login($email , $password){
        // password is unhash ;
        $query = ['email' => $email ];

        $result = $this->db->users->find($query)->toArray() ;
        $user = [
            "_id" => "" , 
            "login" => "" , 
            "password" => "" , 
            "email" => "" , 
          
        ] ;

         
        
        foreach ($result as $document) {
            
            $user["_id"] =  $document['_id'] ; 
            $user["login"] = $document['login'];
            $user["password"] =  $document['password'];
            $user["email"] =  $document['email'];
        }

       $hash_password = $user["password"]; 

       if(password_verify($password , $hash_password)){
           return $user ; 
       }
       else {
           return false ; 
       }



    }




    }