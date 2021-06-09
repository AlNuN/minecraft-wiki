<?php

  namespace App\Models;
  use MF\Model\Model;

  class Usuario extends Model{

    private $id;
    private $email;
    private $senha;

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }

    public function salvar(){
        $query = "insert into usuarios(email, senha)values(:email, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha')); //md5() -> hash de 32 caracteres
        $stmt->execute();
  
        return $this;
    }

    public function autenticar(){

        $query = "select id, email from usuarios where email = :email and senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();
  
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
  
        if($usuario['id'] != ''){
          $this->__set('id', $usuario['id']);
        }
  
        return $this;
      }
  }
?>