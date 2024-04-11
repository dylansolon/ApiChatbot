<?php

namespace App\Models;

use \PDO;
use stdClass;

class BotsModel extends SqlConnect {
    public function getAllBots() {
      $req = $this->db->prepare("SELECT * FROM bots");
      $req->execute();
      $result = $req->fetchAll(PDO::FETCH_ASSOC);

      if ($result) {
          return $result;
      } else {
          return array();
      }
  }
}