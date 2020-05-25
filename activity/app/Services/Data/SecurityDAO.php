<?php


namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class SecurityDAO {
    private $db = NULL;

    public function __construct($db){
        $this->db = $db;
    }

    public function findByUser(UserModel $user){
        Log::info("Entering SecurityDAO.findByUser()");
        try {

            $name = $user->getUsername();
            $password = $user->getPassword();

            $stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD FROM USERS WHERE USERNAME = :username AND PASSWORD = :password");


            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $password);
            $r = $stmt->execute();

            if ($stmt->rowCount() == 1){
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
