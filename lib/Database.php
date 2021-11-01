<?php

class Database
{
  private static $instance;
  private $connection;

  public function __construct()
  {
    
  }

  public static function get_instance()
  {
    if(empty(self::$instance))
    {
      self::$instance = new Database;
    }

    return self::$instance;
  }

  private function get_connection()
  {
    if(empty($this->connection))
    {
      $this->set_connection();
    }

    return $this->connection;
  }

  private function set_connection()
  {
    $this->connection = new PDO(DATABASE_CONNECTION, DATABASE_USER, DATABASE_PASSWORD, unserialize(DATABASE_OPTIONS));
  }

  public function change_query($sql, $params = [], $return_insert_id = FALSE)
  {
    $query = $this->get_connection()->prepare($sql);
    $query->execute($params);

    return $return_insert_id ? $this->get_connection()->lastInsertId() : $query->rowCount();
  }

  public function select_query($sql, $params = [], $return_collection = TRUE)
  {
    $query = $this->get_connection()->prepare($sql);
    $query->execute($params);

    return $return_collection ? $query->fetchAll(PDO::FETCH_CLASS) : $query->fetchObject();
  }
}
