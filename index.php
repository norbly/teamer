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
    $m->page_title = 'teamer - register';
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
case 'error' :
    $m->load_doc('error.html');
    break;
case 'add_event' :
    $m->add_event($_POST);
    $m->load_doc('add_event.html');
    break;
case 'event' :
    $m->show_event();
    $m->load_doc('event.html');
    break;
case 'search' :
    $m->search();
    $m->load_doc('search.html');
    break;
default : 
    $m->load_doc('index.html');
    break;
} 
?>