<?php 
namespace App\Helpers;

class Response {

    public function __construct(
        private int $status_code,
        private array $data = [],
        private array $msg_error = []
    )
    {
        
    }

    public function getResponse(){
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($this->status_code);
        $response = $this->msg_error;
        if(!empty($this->data)){
            $response = $this->data;
        }
        echo json_encode($response);
        die;
    }
}