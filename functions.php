<?php 
if(!function_exists('dd')){
    function dd(...$args){
        echo "<pre>";
        print_r($args);
        echo "</pre>";
        die;
    }
}
if(!function_exists('ddj')){
    function ddj($args){
        echo json_encode($args,JSON_PRETTY_PRINT);
        die;
    }
}