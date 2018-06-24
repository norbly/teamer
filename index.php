<?php
session_start();

define('HOME_DIR', '/var/www/html/teamer/');
require(HOME_DIR .'libs/setup.php');

$m = new Main;
$action = $_REQUEST['action'] ? $_REQUEST['action'] : 'index';

switch($action) {
case 'index' :
    $m->load_doc('index.html');
    break;

case 'login' :
    $m->login($_POST);
    $m->load_doc('login.html');
    break;

case 'register' :
    $m->register($_POST);
    $m->load_doc('register.html'); 
    break;
case 'logout' : 
    $m->logout();
    $m->load_doc('index.html');
    break;
case 'dashboard' :
    $m->dashboard();
    $m->load_doc('dashboard.html');
    break;
} 
 
?>