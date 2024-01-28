<?php

namespace App\Model;

use PDO;
use PDOException;
use App\Config\Database;

class Model
{
  static $conn;
  protected $table_name;
  protected $class_name;
  public $id;

  function __construct()
  {
    $this->conn = Database::connect();
  }

  public function getLatest()
  {
    return $this->getData("select * from $this->table_name where deleted_at is NULL order by created_at desc");
  }
  public function latest()
  {
    return $this->getDatas("select * from $this->table_name where deleted_at is NULL order by created_at desc");
  }

  public function  all()
  {
    // echo ("select * from $this->table_name where deleted_at is NULL");
    // echo
    return $this->getDatas("select * from $this->table_name where deleted_at is NULL");
  }
  public function  find($id)
  {
    return $this->getData("select * from $this->table_name where id = '$id' and deleted_at is NULL");
  }

  public function  findByOptions($options)
  {
    // echo $this->table_name;
    $ops = "";
    $indexes = count($options);
    // echo($indexes);
    $i = 1;
    foreach ($options as $index => $value) {
      if ($i === $indexes) {
        $ops .= "$index = '$value' ";
      } else {
        $ops .= "$index = '$value' and ";
      }
      $i += 1;
    }

    return $this->getData("select * from $this->table_name where $ops and deleted_at is NULL");
  }
  public function  getByOptions($options)
  {
    // echo $this->table_name;
    $ops = "";
    $indexes = count($options);
    // echo($indexes);
    $i = 1;
    foreach ($options as $index => $value) {
      if ($i === $indexes) {
        $ops .= "$index = '$value' ";
      } else {
        $ops .= "$index = '$value' and ";
      }
      $i += 1;
    }
    // echo $ops;
    // echo ("select * from $this->table_name where $ops and deleted_at is NULL");
    // die();
    return $this->getDatas("select * from $this->table_name where $ops and deleted_at is NULL order by created_at desc");
  }
  public function  getByCustomQuery($options)
  {
    // // echo $this->table_name;
    // $ops = "";
    // $indexes = count($options);
    // // echo($indexes);
    // $i = 1;
    // foreach ($options as $index => $value) {
    //   if ($i === $indexes) {
    //     $ops .= "$index = '$value' ";
    //   } else {
    //     $ops .= "$index = '$value' and ";
    //   }
    //   $i += 1;
    // }
    // echo $ops;
    // echo ("select * from $this->table_name where $ops and deleted_at is NULL");
    // var_dump($options);
    // die();
    return $this->getDatas("select * from $this->table_name where $options");
  }

  public function  select($options, $id)
  {
    $ops = "";
    // echo count($options);
    foreach ($options as $index => $value) {
      if ((count($options) - 1) === $index) {
        $ops .= "$value";
      } else {
        $ops .= "$value,";
      }
    }

    return $this->getData("select $ops from $this->table_name where id = '$id' and deleted_at is NULL order by created_at desc");
  }
  public function  update($options, $id)
  {

    // echo $this->table_name;
    $ops = "";
    $indexes = count($options);
    // echo($indexes);
    $i = 1;
    foreach ($options as $index => $value) {
      if (!is_null($value)) {
        if ($i === $indexes) {
          $ops .= '' . $index . ' = "' . $value  . '"';
        } else {
          $ops .= '' . $index . ' = "' . $value  . '", ';
        }
      }
      $i += 1;
    }

    // echo ("UPDATE $this->table_name set $ops where id = $id");
    return $this->execute("UPDATE $this->table_name set $ops where id = '$id'");
  }
  public function  save($options)
  {

    // echo $this->table_name;
    $ops = "";
    $indexes = count($options);
    // echo($indexes);
    $i = 1;
    foreach ($options as $index => $value) {
      if (!is_null($value)) {
        if ($i === $indexes) {
          $ops .= '' . $index . ' = "' . $value  . '"';
        } else {
          $ops .= '' . $index . ' = "' . $value  . '", ';
        }
      }
      $i += 1;
    }



    // echo ("UPDATE $this->table_name set $ops where id = $this->id");
    // die();
    return $this->execute("UPDATE $this->table_name set $ops where id = '$this->id'");
  }

  public function  create($options)
  {
    // return 1;
    $ops = "";
    $values = "";
    $indexes = count($options);
    // echo($indexes);
    $i = 1;
    foreach ($options as $index => $value) {
      if ($i === $indexes) {
        $ops .= "$index";
        $values .= $value === null ? "NULL"  : '"' . $value . '"';
      } else {
        $ops .= "$index, ";
        $values .= $value === null ? "NULL,"  : '"' . $value . '", ';
      }
      $i += 1;
    }

    // echo ("UPDATE $this->table_name set $ops where id = $id");
    // return var_dump("INSERT into $this->table_name ($ops) values ($values)");
    return $this->execute("INSERT into $this->table_name ($ops) values ($values)");
    // return $this->execute("INSERT intp $this->table_name $ops values ($values)");
  }

  public function delete($id = null)
  {
    // echo("UPDATE $this->table_name set deleted_at = CURRENT_TIMESTAMP  where id = $id");
    if ($id) {
      return $this->execute("UPDATE $this->table_name set deleted_at = CURRENT_TIMESTAMP  where id = '$id'");
    } else {
      return $this->execute("UPDATE $this->table_name set deleted_at = CURRENT_TIMESTAMP  where id = '$this->id'");
    }
  }
  public function restore($id)
  {
    // echo("UPDATE $this->table_name set deleted_at = CURRENT_TIMESTAMP  where id = $id");
    return $this->execute("UPDATE $this->table_name set deleted_at = NULL  where id = '$id'");
  }

  public function  getData($query)
  {
    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchObject($this->class_name);
      // return $stmt->fetchAll(PDO::FETCH_CLASS, $this->class_name);
      // return $this->class_name;
    } catch (PDOException $e) {
      http_response_code(500);
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function  getDatas($query)
  {
    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, $this->class_name);
      // return $stmt->fetchAll(PDO::FETCH_CLASS, $this->class_name);
      // return $this->class_name;
    } catch (PDOException $e) {
      http_response_code(500);
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function  execute($query)
  {
    // echo $query;
    // var_dump($this->conn);
    // die();
    try {
      $stmt = $this->conn->query($query);
      if ($stmt) {
        return $this->find($this->conn->lastInsertId());
      } else {
        http_response_code(500);
        return "Error While updating record: ";
      }
    } catch (PDOException $e) {
      http_response_code(500);
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function  uploadImage($name, $folder)
  {
    $path = __DIR__ . '/../../public/assets/images/' . $folder;
    // die();

    if (isset($_FILES[$name])) {
      $fileName = $_FILES[$name]['name'];
      $fileSize = $_FILES[$name]['size'];
      $filePath = $_FILES[$name]['tmp_name'];
      $extension = pathinfo($fileName, PATHINFO_EXTENSION);
      $bytes = random_bytes(5);
      $imageCover = bin2hex($bytes) . "." . $extension;
      if (move_uploaded_file($filePath, $path . $imageCover)) {

        return $imageCover;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
