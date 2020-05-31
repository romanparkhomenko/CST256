<?php


namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class OrderDAO {
    private $db = NULL;

    public function __construct($db){
        $this->db = $db;
    }

    function addOrder($product){
        $stmt = $this->db->prepare("INSERT INTO ORDERS (product, customer_id) VALUES ('$product', 1)");

        $r = $stmt->execute();

        if ($stmt->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }
}
