<?php 
namespace App\Models;
class Usuario extends Model{

    public function __construct()
    {
        parent::__construct();
       
    }

    public function obterUsuarios(string|null $nome = null):array
    {
        $query = "select id, nome, data_nascimento from usuario where 1=1 ";
        
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public function obterPorId(int $id){
        $query = "select id, nome, data_nascimento from usuario where id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return  $stmt->fetchAll();
    }
 
    public function salvar(
        string $nome,
        string $data_nascimento
    ){
        $query = "insert into usuario (nome,data_nascimento) values (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome, $data_nascimento]);
        $id = $this->conn->lastInsertId();
        return $this->obterPorId($id);
    }
}