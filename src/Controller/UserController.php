<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:45 PM
 */

namespace Controller;

require_once __DIR__.'/../AppInterface/CrudInterface.php';
require_once __DIR__.'/../Entity/User.php';
require_once __DIR__.'/../DBManager/DBConnect.php';

use AppInterface\CrudInterface;
use Entity\User;

/**
 * Class UserController
 * @package Controller
 */
class UserController implements CrudInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function create()
    {
        global $conn;

        $firstName = $this->user->getFirstName();
        $lastName = $this->user->getLastName();
        $email = $this->user->getEmail();
        $phoneNumber = $this->user->getPhoneNumber();
        $company = $this->user->getCompany();
        $accountType = $this->user->getAccountType();
        $username = $this->user->getUsername();
        $password = $this->user->getPassword();

        try {
            $stmt = $conn->prepare("INSERT INTO users(
                                                        first_name,
                                                        last_name,
                                                        email,
                                                        phone_number,
                                                        company,
                                                        account_type,
                                                        username,
                                                        password
                                                      )
                                                    VALUES
                                                     (
                                                        :first_name,
                                                        :last_name,
                                                        :email,
                                                        :phone_number,
                                                        :company,
                                                        :account_type,
                                                        :username,
                                                        :password
                                                    )");


            $stmt->bindParam(":first_name", $firstName);
            $stmt->bindParam(":last_name", $lastName);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":company", $company);
            $stmt->bindParam(":account_type", $accountType);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function update($id)
    {
        global $conn;

        $firstName = $this->user->getFirstName();
        $lastName = $this->user->getLastName();
        $email = $this->user->getEmail();
        $phoneNumber = $this->user->getPhoneNumber();
        $company = $this->user->getCompany();
        $accountType = $this->user->getAccountType();
        $username = $this->user->getUsername();
        $password = $this->user->getPassword();

        try {
            $stmt = $conn->prepare("UPDATE users SET
                                    first_name=:first_name,
                                    last_name=:last_name,
                                    email=:email,
                                    phone_number=:phone_number,
                                    company=:company,
                                    account_type=:account_type,
                                    username=:username,
                                    `password`=:password
                                    WHERE 
                                    id=:id"
            );

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":first_name", $firstName);
            $stmt->bindParam(":last_name", $lastName);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":company", $company);
            $stmt->bindParam(":account_type", $accountType);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);

            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    /**
     * @param $id
     * @return bool
     * this method deletes user with the specified id.
     */
    public static function delete($id)
    {
        global $conn;
        try {
            $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * @return bool
     * this method deletes all the data from users table.
     * this used be called with caution!
     */
    public static function destroy()
    {
        global $conn;
        try {
            $stmt = $conn->prepare("DELETE FROM users");
            $stmt->execute();
            return true;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    /**
     * @param $id
     * @return array
     */
    public static function getId($id)
    {
        global $conn;

        try {

            $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $user = $stmt->rowCount() == 1 ? $stmt->fetch(\PDO::FETCH_ASSOC) : [];
            return $user;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }

    }

    /**
     * @return mixed
     */
    public static function all()
    {
        global $conn;

        try {

            $stmt = $conn->prepare("SELECT * FROM users WHERE 1");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $users = array();
                while ($user = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                       if (!empty($user)) {
                           $users[] = $user;
                       }

                }
                return $users;
            } else {
                return [];
            }

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

}