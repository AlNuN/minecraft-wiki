<?php

  namespace App\Models;
  use MF\Model\Model;

  class Bloco extends Model{

    private $id;
    private $id_usuario;
    private $nome_bloco;
    private $transparencia;
    private $ferramenta;
    private $empilhavel;
    private $experiencia;
    private $explosao;

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }

    public function salvar(){
        $query = "insert into blocos";
        $query .= "(id_usuario, nome_bloco, transparencia, ferramenta, empilhavel, experiencia, explosao)";
        $query .= "values(:id_usuario, :nome_bloco, :transparencia, :ferramenta, :empilhavel, :experiencia, :explosao)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':nome_bloco', $this->__get('nome_bloco'));
        $stmt->bindValue(':transparencia', $this->__get('transparencia'));
        $stmt->bindValue(':ferramenta', $this->__get('ferramenta'));
        $stmt->bindValue(':empilhavel', $this->__get('empilhavel'));
        $stmt->bindValue(':experiencia', $this->__get('experiencia'));
        $stmt->bindValue(':explosao', $this->__get('explosao'));
        $stmt->execute();
  
        return $this;
    }

    public function getAll(){
        $query = "select nome_bloco, ferramenta, transparencia from blocos where id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->execute();
  
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
  }
?>