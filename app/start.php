<?php
 //config

 use MongoDB\BSON\ObjectID;


 require "../vendor/autoload.php" ; 

  require_once "helpers/helper.php" ; 
  require_once "helpers/photo.php" ; 

 require_once "config/config.php" ; 

 require_once 'libraries/Database.php';

 $mongo = new Database() ;
  require_once 'libraries/Core.php';
  require_once 'libraries/Controller.php';




// $mongo = new Database() ;
$db = $mongo->get_db() ; 


// $deleteResult = $db->images->deleteMany([]);

// printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());



// $query = ['login' => "awglssss",'email' => "marmolada@o2.pl",];



 



// $result = $db->users->find() ; 

// var_dump($result->count()) ; 






