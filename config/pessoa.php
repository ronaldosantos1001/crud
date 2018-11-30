<?php

require_once 'conexao.php';



class Pessoa
{

  private $table = "pessoa";
  private $con;

  public function __construct()
  {
    $con = new conexao();
    $con->connect();
    $this->con = $con;
  }


  public function inserir($valores)
  {
    try
    {
      $this->con->connect()->exec("INSERT INTO pessoa (nome,sobrenome) VALUES ($valores)");
    }
    catch (PDOExcepetion $e)
    {
      echo "Erro!: ".$e->getMessage()." \n";
    }
  }

  public function atualizar($camposvalores, $where = NULL)
  {
    try
    {
      $this->con->connect()->exec("UPDATE pessoa SET $camposvalores WHERE $where");
    }
    catch (PDOExcepetion $e)
    {
      echo "Erro!: ".$e->getMessage()." \n";
    }
  }


  public function excluir($id)
  {
    try
    {
      $this->con->connect()->exec("DELETE FROM pessoa WHERE id = $id");
    }
    catch (PDOExcepetion $e)
    {
      echo "Erro!: ".$e->getMessage()." \n";
    }
  }

}

?>
