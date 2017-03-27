<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:43 PM
 */

namespace Controller;


use AppInterface\CrudInterface;
use Entity\BoardTracker;

/**
 * Class BoardTrackerController
 * @package Controller
 */
class BoardTrackerController implements CrudInterface
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