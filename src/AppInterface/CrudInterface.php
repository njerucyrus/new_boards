<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:25 PM
 */

namespace AppInterface;


/**
 * Interface CrudInterface
 * @package AppInterface
 */
interface CrudInterface
{

    /**
     * @return mixed
     */
    public function create();

    /**
     * @param $id
     * @return mixed
     */
    public function update($id);

    /**
     * @param $id
     * @return int
     */
    public static function delete($id);

    /**
     * @return mixed
     */
    public static function destroy();

    /**
     * @param $id
     * @return mixed
     */
    public static function getId($id);

    /**
     * @return mixed
     */
    public static function all();

}