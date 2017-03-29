<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/28/17
 * Time: 1:13 AM
 */

require_once __DIR__.'/../../../vendor/autoload.php';
//require_once __DIR__ . '/../Controller/BoardController.php';

//include __DIR__.'/../templates/board_list.php';

$b = new App\Controller\BoardController(new App\Entity\Board());

$table = "boards";
$options = array(
    "location"=>"stage"

);

print_r($b->customFilter($table,[], $options));