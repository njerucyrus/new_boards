<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:25 PM
 */

namespace App\AppInterface;


/**
 * Interface CrudInterface
 * @package AppInterface
 */
interface CrudInterface
{

    /**
     * @return bool
     */
    public function create();

    /**
     * @param $id
     * @return bool
     */
    public function update($id);

    /**
     * @param $id
     * @return int
     */
    public static function delete($id);

    /**
     * @return bool
     */
    public static function destroy();

    /**
     * @param $id
     * @return array
     */
    public static function getId($id);

    /**
     * @return array
     */
    public static function all();

}