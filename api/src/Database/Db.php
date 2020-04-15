<?php declare(strict_types=1);

namespace App\Database;


class Db extends \PDO
{


  public function __construct($config){

    //$dsn = sprintf('mysql:host=%s;dbname=%s',$config['host'],$config['dbname']);

    try{
       parent::__construct($config["dsn"],$config['username'],$config['password']);
       $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       return $this;
    }catch(\PDOException $e){
      die('ERROR: '. $e->getMessage());
    }

  }

  public function Insert($sql)
  {
    return $this->exec($sql);
  }

  public function Execute($sql,array $params = [])
  {
    $stmt =  $this->prepare($sql);
     $stmt->execute($params);
     return $stmt;
  }


  public function FetchClass($statement,$class)
  {

      $statement->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, $class);
      return $statement->fetch();

  }
  public function FetchObject($statement)
  {
      //$statement = $this->Execute($sql);
      return $statement->fetch(\PDO::FETCH_OBJ);
  }
  public function FetchAllObject($statement)
  {

      return $statement->fetchAll(\PDO::FETCH_OBJ);
  }

  public function FetchAllClass($statement,$class)
  {

      return $statement->fetchAll(\PDO::FETCH_CLASS,$class);
  }



}
