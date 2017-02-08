<?php 

class Response{
    static function handle(array $data){
        echo json_encode($data);
    }
}