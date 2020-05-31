<?php

namespace App\Services\Business;

use App\Services\Data\CustomerDAO;
use App\Services\Data\OrderDAO;
use App\Services\Data\SecurityDAO;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use \PDO;

class OrderBusinessService
{

    public function createOrder() {
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $customerdao = new CustomerDAO($db);
        $orderdao = new OrderDAO($db);

        $db->beginTransaction();
        $customerAdded = $customerdao->addCustomer('roman', 'parkhomenko');
        $productAdded = $orderdao->addOrder('Test Product');

        if ($customerAdded && $productAdded) {
            $db->commit();
        } else {
            $db->rollBack();
        }

    }

}
