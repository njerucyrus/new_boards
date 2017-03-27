<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/28/17
 * Time: 1:13 AM
 */

require_once __DIR__.'/../Controller/BoardController.php';

//include __DIR__.'/../templates/board_list.php';

$b = new \Controller\BoardController(new \Entity\Board());

$table = "boards";

print_r($b->customFilter($table,[], []));