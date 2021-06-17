<?php

    namespace App\Models;

use Exception;
use MF\Model\Model;
use MF\Model\Container;
use App\Exceptions\BlocoNaoExiste;

  class Receita extends Model{

    private $id;
    private $id_usuario;  // fk para id do usuário
    private $item_1;  
    private $item_2;  
    private $item_3;  
    private $resultado;  
    private $ordem;  
    /*
        $ordem é uma string com a ordem dos itens na criação. 
        Cada número corresponde ao número do item e não ao id do bloco. 
        ex: item_1
    */

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }

    public function __isset($atributo) {
        return isset($this->$atributo);
    }

    public function salvar() {
        $query = "insert into receitas";
        $query .= "(item_1, item_2, item_3, resultado, id_usuario, ordem)";
        $query .= "values(:item_1, :item_2, :item_3, :resultado, :id_usuario, :ordem)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':item_1', $this->__get('item_1'));
        $stmt->bindValue(':item_2', $this->__get('item_2'));
        $stmt->bindValue(':item_3', $this->__get('item_3'));
        $stmt->bindValue(':resultado', $this->__get('resultado'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
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

        $query = "
            select resultado, item_1, item_2, item_3 
            from receitas where item_1 like @componente 
            or item_2 like @componente
            or item_3 like @componente 
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
  
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     *  Checa pelo nome ($valor) se o bloco está cadastrado no banco de dados
     *  Caso positivo, atribui ao $atributo correspondente
     */
    public function setFK ($atributo, $valor, $user_id) {
        $bloco = Container::getModel('Bloco');
        $bloco->__set('id_usuario', $user_id); 
        $bloco->__set('nome_bloco', $valor); 
        $bloco->getIdByName();

        if($bloco->__isset('id')) {
            $this->__set($atributo, $valor);
            return $bloco->__get('id');
        } 

        throw new BlocoNaoExiste();
    }

  }
?>
