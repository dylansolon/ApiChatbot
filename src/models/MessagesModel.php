<?php

namespace App\Models;

use \PDO;
use stdClass;

class MessagesModel extends SqlConnect {
    public function add(array $data) {
      $query = "
        INSERT INTO messages (reponse)
        VALUES (:reponse)
      ";

      $req = $this->db->prepare($query);
      $req->execute($data);
    }

    public function delete(int $id) {
      $req = $this->db->prepare("DELETE FROM messages WHERE id = :id");
      $req->execute(["id" => $id]);
    }

    public function getAllMessages() {
      $req = $this->db->prepare("SELECT * FROM messages");
      $req->execute();
      
      return $req->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function get(int $id) {
      $req = $this->db->prepare("SELECT * FROM messages WHERE id = :id");
      $req->execute(["id" => $id]);
  
      return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : [];
  }  

    public function getLast() {
      $req = $this->db->prepare("SELECT * FROM messages ORDER BY id DESC LIMIT 1");
      $req->execute();

      return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
    }
}