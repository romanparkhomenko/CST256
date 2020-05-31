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

    public function updateUser(UserModel $user){
        try {
            $id = $user->getId();
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $username = $user->getUsername();
            $phone = $user->getPhone();
            $about = $user->getAbout();
            $jobtitle = $user->getJobtitle();
            $isAdmin = $user->getIsAdmin();
            $skills = $user->getSkills();
            $jobhistory = $user->getJobhistory();
            $education = $user->getEducation();
            $updatedAt = now();

            $stmt = $this->db->prepare('UPDATE users
                                        SET firstname = :firstname,
                                            lastname = :lastname,
                                            username = :username,
                                            phone = :phone,
                                            about = :about,
                                            jobtitle = :jobtitle,
                                            isAdmin = :isAdmin,
                                            skills = :skills,
                                            jobhistory = :jobhistory,
                                            education = :education,
                                            updated_at = :updatedAt
                                        WHERE ID = :id');
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':about', $about);
            $stmt->bindParam(':jobtitle', $jobtitle);
            $stmt->bindParam(':isAdmin', $isAdmin);
            $stmt->bindParam(':skills', $skills);
            $stmt->bindParam(':jobhistory', $jobhistory);
            $stmt->bindParam(':education', $education);
            $stmt->bindParam(':updatedAt', $updatedAt);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() == 1){
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            throw new PDOException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }


}
