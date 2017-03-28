<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/28/17
 * Time: 1:57 AM
 */

require_once __DIR__.'/Controller/BoardController.php';
require_once __DIR__.'/Controller/UserController.php';

//include __DIR__.'/templates/board_list.php';

print_r(\Controller\UserController::all());