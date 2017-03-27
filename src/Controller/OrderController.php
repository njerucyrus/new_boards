<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:42 PM
 */

namespace Controller;


use AppInterface\CrudInterface;
use Entity\Order;

/**
 * Class OrderController
 * @package Controller
 */
class OrderController implements CrudInterface
{

    private $order;

    /**
     * OrderController constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    /**
     * @return mixed
     */
    public function create()
    {
        global $conn;
        try {
            $orderNo = $this->order->getorderNo();
            $boardId = $this->order->getBoardId();
            $amount = $this->order->getAmount();
            $status = $this->order->getStatus();
            $date = $this->order->getDate();

            $stmt = $conn->prepare("INSERT INTO orders
                                                    (
                                                        order_id, 
                                                        board_id,
                                                        amount,
                                                        status,
                                                        order_date
                                                    )
                                                    VALUES
                                                    (
                                                        :order_no,
                                                        :board_id,
                                                        :amount,
                                                        :status,
                                                        :order_date
                                                    )");

            $stmt->bindParam(':order_no', $orderNo);
            $stmt->bindParam(':board_id', $boardId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':order_date', $date);

            $stmt->execute();
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

        global $conn;
        try {


            $boardId = $this->order->getBoardId();
            $amount = $this->order->getAmount();
            $status = $this->order->getStatus();
            $date = $this->order->getDate();


            $stmt = $conn->prepare("UPDATE orders SET 
                                                    board_id=:board_id,
                                                    amount=:amount,
                                                    status=:status,
                                                    order_date=:order_date
                                                  WHERE
                                                        id=:id
                                                        ");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':board_id', $boardId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':order_date', $date);
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
    public static function delete($id)
    {
        global $conn;
        try{

            $stmt = $conn->prepare("DELETE FROM orders WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * @return mixed
     * this method deletes all the data from orders table.
     * this used be called with caution!
     */
    public static function destroy()
    {
        global $conn;
        try{

            $stmt = $conn->prepare("DELETE FROM orders");

            $stmt->execute();
            return true;

        } catch (\PDOException $e){
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
            $stmt = $conn->prepare("SELECT * FROM orders WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $order = $stmt->rowCount() > 0 ? $stmt->fetch(\PDO::FETCH_ASSOC) : [];
            return $order;

        } catch (PDOException $e) {

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

            $stmt = $conn->prepare("SELECT * FROM orders WHERE 1");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $orders = array();
                while ($order = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    if (!empty($orders)) {
                        $orders[] = $order;
                    }
                }
                return $orders;
            } else {
                return [];
            }

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }


}