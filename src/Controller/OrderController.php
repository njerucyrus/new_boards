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

    private  $order;

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
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getId($id)
    {
        // TODO: Implement getId() method.
    }

    /**
     * @return mixed
     */
    public static function all()
    {
        // TODO: Implement all() method.
    }

}