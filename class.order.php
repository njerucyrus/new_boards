<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/4/17
 * Time: 3:15 AM
 */
require_once '../class.db.php';
require_once 'interface.crud.php';

class Order implements Crud
{

    private $orderNo;
    private $boardId;
    private $amount;
    private $status;
    private $date;

    /**
     * @return mixed
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     * @param mixed $orderNo
     */
    public function setOrderNo($orderNo)
    {
        $this->orderNo = $orderNo;
    }


    /**
     * @return mixed
     */
    public function getBoardId()
    {
        return $this->boardId;
    }

    /**
     * @param mixed $boardId
     */
    public function setBoardId($boardId)
    {
        $this->boardId = $boardId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function create()
    {
        global $conn;
        try {
            $orderNo = $this->getorderNo();
            $boardId = $this->getBoardId();
            $amount = $this->getAmount();
            $status = $this->getStatus();
            $date = $this->getDate();

            $stmt = $conn->prepare("INSERT INTO orders(order_id, 
                                    board_id, amount, status, order_date)
                                    VALUES (:order_no,   :board_id, :amount, :status, :order_date)");

            $stmt->bindParam(':order_no', $orderNo);
            $stmt->bindParam(':board_id', $boardId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':order_date', $date);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {

            print_r(json_encode(array(
                "statusCode" => 500,
                "status" => "failed",
                "message" => "error " . $e->getMessage()
            )));

            return false;

        }
    }

    function update($id)
    {
        global $conn;
        try {

            $boardId = $this->getBoardId();
            $amount = $this->getAmount();
            $status = $this->getStatus();
            $date = $this->getDate();

            $stmt = $conn->prepare("UPDATE orders SET board_id=:board_id, amount=:amount,
                                    status=:status, order_date=:order_date WHERE
                                    id=:id
                                    ");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':board_id', $boardId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':order_date', $date);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            print_r(json_encode(array(
                "statusCode" => 500,
                "status" => "failed",
                "message" => "error " . $e->getMessage()
            )));

            return false;
        }
    }

    public static function delete($id)
    {
        global $conn;
        try {
            $stmt = $conn->prepare("DELETE FROM orders WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $e) {
            print_r(json_encode(array(
                "statusCode" => 500,
                "status" => "failed",
                "message" => "error " . $e->getMessage()
            )));

            return false;
        }

    }

    /*
     * return order matching certain id
     */
    public static function filterById($id)
    {
        global $conn;
        try {
            $stmt = $conn->prepare("SELECT * FROM orders WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;

            } else {
                return null;
            }

        } catch (PDOException $e) {
            print_r(json_encode(array(
                "statusCode" => 500,
                "status" => "failed",
                "message" => "error " . $e->getMessage()
            )));
            return null;

        }
    }

    /*
     * Filter with more options
     */
    public static function filter($query)
    {
        global $conn;
        try {
            $stmt = $conn->prepare($query);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;
            } else {
                return null;
            }

        } catch (PDOException $e) {
            print_r(json_encode(array(
                "statusCode" => 500,
                "status" => "failed",
                "message" => "error " . $e->getMessage()
            )));
            return null;

        }
    }

    /*
     * Get all orders
     */
    public static function all()
    {
        global $conn;
        try {
            $stmt = $conn->prepare("SELECT * FROM orders WHERE 1");

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
               return $stmt;
            } else {
                return null;
            }

        } catch (PDOException $e) {
            print_r(json_encode(array(
                "statusCode" => 500,
                "status" => "failed",
                "message" => "error " . $e->getMessage()
            )));
            return null;

        }
    }


}


