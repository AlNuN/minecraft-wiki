<?php

  namespace App\Models;
  use MF\Model\Model;

  class Receita extends Model{

    private $id;
    private $item_1;
    private $item_2;
    private $item_3;
    private $nome_item;
    private $ordem;

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }

    public function __isset($atributo) {
        return isset($this->$atributo);
    }

    public function salvar(){
        $query = "insert into receitas";
        $query .= "(item_1, item_2, item_3, nome_item, ordem)";
        $query .= "values(:item_1, :item_2, :item_3, :nome_item, :ordem)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':item_1', $this->__get('item_1'));
        $stmt->bindValue(':item_2', $this->__get('item_2'));
        $stmt->bindValue(':item_3', $this->__get('item_3'));
        $stmt->bindValue(':nome_item', $this->__get('nome_item'));
        $stmt->bindValue(':ordem', $this->__get('ordem'));
        $stmt->execute();
  
        return $this;
    }

    public function buscaPorComponente ($componente) {
        // Set a Mysql user-defined variable
        $sql = "SET @componente = :componente COLLATE utf8_unicode_ci";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':componente', "%$componente%", \PDO::PARAM_STR);
        $stmt->execute();

        $query = "select nome_item, item_1, item_2, item_3 ";
        $query .= "from receitas where item_1 like @componente ";
        $query .= "or item_2 like @componente ";
        $query .= "or item_3 like @componente ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
  
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

  }
?>