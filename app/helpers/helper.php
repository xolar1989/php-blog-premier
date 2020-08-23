<?php

session_start() ; 

function redirect($path){
    header("location: ".MAINURL."/".$path) ; 
}



function getUrl(){
    $url = strval( trim($_GET['url']));
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);


    return $url ; 
} 