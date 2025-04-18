<?php 
namespace App\Controllers;

use App\Helpers\Response;
use App\Models\Usuario;

class UsuarioController {

    private $usuario_model;
    public function __construct()
    {
        $this->usuario_model = new Usuario;
    }

    public function listar():Response
    {
        
        $data = $this->usuario_model->obterUsuarios();
        
        return new Response(
            404,
            $data,
            []
        );
    }

    public function  salvar($dados){
        $data = $this->usuario_model->salvar(...$dados);

        return new Response(
            201,
            $dados
        );
    }
}