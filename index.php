<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/28/17
 * Time: 1:57 AM
 */
require_once 'vendor/autoload.php';
require_once __DIR__.'/src/App/Controller/BoardController.php';
require_once __DIR__.'/src/App/Controller/OrderController.php';

//include __DIR__.'/src/templates/board_list.php';
//////print_r(App\Controller\BoardController::all());
////
////print_r(\App\Controller\BoardController::all());
////echo "***************************************".PHP_EOL;
////print_r(\App\Controller\OrderController::all());
//
$bc = new \App\Controller\BoardController(new \App\Entity\Board());
$table = 'boards';
$tableColumns = ['location', 'town', 'owned_by', 'board_code'];
$search_text = 'hudutech';

$board = \App\Controller\BoardController::search($table, $tableColumns, $search_text);
print_r(json_encode($board));