<?php

class conexao
{



  private $host = 'localhost'; 
  private $database = 'crud'; 
  private $user = 'root';
  private $pass = ''; 

  private $con = false;


  public function connect() 
  {
    try {
      $con = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
      $this->con = true;
      return $con;
    }
    catch (PDOException $e)
    {
      echo "Erro!: ".$e->getMessage(). "\n";
      die();
      return false;
    }
  }


  public function disconnect() 
  {
    if($this->con)
    {
      if(mysql_close())
      {
        $this->con = false;
        return true;
      }
      else
      {
        return false;
      }
    }
  }

}

?>
