<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'sevilla/polling.php';
require_once 'config.php';
$from_id = 297005196;

$poll = new Poll();
$data = $poll->get(
    'members',
    'user_id, balance',
    'WHERE user_id = ' . $from_id
);
var_dump($data);