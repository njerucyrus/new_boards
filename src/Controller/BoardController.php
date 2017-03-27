<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:40 PM
 */

namespace Controller;

use AppInterface\CrudInterface;
use Entity\Board;

/**
 * Class BoardController
 * @package Controller
 */
class BoardController implements CrudInterface
{
    /**
     * @var Board
     */
    private $board;

    /**
     * BoardController constructor.
     * @param $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
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
     * @return bool
     */
    public function update($id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @return bool
     */
    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return mixed
     */
    public static function destroy()
    {
        // TODO: Implement destroy() method.
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