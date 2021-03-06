<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:43 PM
 */

namespace App\Controller;


use App\AppInterface\CrudInterface;
use App\Entity\BoardTracker;
use App\DBManager\ComplexQuery;

/**
 * Class BoardTrackerController
 * @package Controller
 */
class BoardTrackerController extends ComplexQuery implements CrudInterface
{

    /**
     * @var BoardTracker
     */
    private $boardTracker;

    /**
     * BoardTrackerController constructor.
     * @param BoardTracker $boardTracker
     */
    public function __construct(BoardTracker $boardTracker)
    {
        $this->boardTracker = $boardTracker;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        global $db, $conn;
        try {
            $boardCode = $this->boardTracker->getBoardCode();
            $customer = $this->boardTracker->getCustomer();
            $dateBooked = $this->boardTracker->getDateBooked();
            $expiryDate = $this->boardTracker->getExpiryDate();


            $stmt = $conn->prepare("INSERT INTO board_tracker
                                                            (
                                                                board_code, 
                                                                customer,
                                                                date_booked,
                                                                expiry_date
                                                            )
                                                        VALUES
                                                        (
                                                            :board_code,
                                                            :customer,
                                                            :date_booked,
                                                            :expiry_date
                                                        )");

            $stmt->bindParam(":board_code", $boardCode);
            $stmt->bindParam(":customer", $customer);
            $stmt->bindParam(":date_booked", $dateBooked);
            $stmt->bindParam(":expiry_date", $expiryDate);

            $stmt->execute();
            $db->closeConnection();
            return true;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;

        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        global $db, $conn;
        try {
            $boardCode = $this->boardTracker->getBoardCode();
            $customer = $this->boardTracker->getCustomer();
            $dateBooked = $this->boardTracker->getDateBooked();
            $expiryDate = $this->boardTracker->getExpiryDate();

            $stmt = $conn->prepare("UPDATE board_tracker SET 
                                                            board_code=:board_code,
                                                            customer=:customer,
                                                            date_booked=:date_booked,
                                                            expiry_date=:expiry_date
                                                          WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":board_code", $boardCode);
            $stmt->bindParam(":customer", $customer);
            $stmt->bindParam(":date_booked", $dateBooked);
            $stmt->bindParam(":expiry_date", $expiryDate);

            $stmt->execute();
            $db->closeConnection();
            return true;

        } catch (\PDOException $e) {

            echo $e->getMessage();

            return false;

        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function delete($id)
    {
        global $db, $conn;
        try {

            $stmt = $conn->prepare("DELETE FROM board_tracker WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $db->closeConnection();

            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    /**
     * @return bool
     */
    public static function destroy()
    {
        global $db, $conn;
        try {

            $stmt = $conn->prepare("DELETE FROM board_tracker");
            $stmt->execute();
            $db->closeConnection();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    /**
     * @param $id
     * @return mixed
     */
    public static function getId($id)
    {
        global $db, $conn;
        try {
            $stmt = $conn->prepare("SELECT * FROM board_tracker WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $board_tracker = array();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $board_tracker = array(
                    "id" => $row['id'],
                    "board_code" => $row['board_code'],
                    "customer" => $row['customer'],
                    "date_booked" => $row['date_booked'],
                    "expiry_date" => $row['expiry_date']
                );
            }
            $db->closeConnection();
            return $board_tracker;

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
        global $db, $conn;

        try {

            $stmt = $conn->prepare("SELECT * FROM board_tracker WHERE 1");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $board_trackers = array();
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    if (!empty($row)) {
                        $board_tracker = array(
                            "id" => $row['id'],
                            "board_code" => $row['board_code'],
                            "customer" => $row['customer'],
                            "date_booked" => $row['date_booked'],
                            "expiry_date" => $row['expiry_date']
                        );

                        $board_trackers[] = $board_tracker;

                    }
                }

                $db->closeConnection();

                return $board_trackers;
            } else {
                return [];
            }

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }


}