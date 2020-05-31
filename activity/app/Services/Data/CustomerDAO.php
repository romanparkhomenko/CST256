<?php


namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class CustomerDAO {
    private $db = NULL;

    public function __construct($db){
        $this->db = $db;
    }

    function addCustomer($firstName, $lastName){

        $stmt = $this->db->prepare("INSERT INTO CUSTOMER (firstname, lastname) VALUES ('$firstName', '$lastName')");

        $r = $stmt->execute();

        if ($stmt->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }
}
