<?php
session_start();

define('PREF_FILE', "preferences.json");

$pref_file = fopen(PREF_FILE,"r");
$str = fread($pref_file, filesize(PREF_FILE));
$pref = json_decode($str);
fclose($pref_file);

define('HOME_DIR', $pref->home_dir);
require(HOME_DIR .'libs/setup.php');

$m = new Main;
$action = $_REQUEST['action'] ? $_REQUEST['action'] : 'index';

switch($action) {
case 'index' :
    $m->load_doc('index');
    break;

case 'login' :
    $m->login($_POST);
    $m->load_doc('login');
    break;

case 'register' :
    $m->page_title = 'teamer - register';
    $m->register($_POST);
    $m->load_doc('register'); 
    break;
case 'logout' : 
    $m->logout();
    $m->load_doc('index');
    break;
case 'dashboard' :
    $m->dashboard();
    $m->load_doc('dashboard');
    break;
case 'error' :
    $m->load_doc('error');
    break;
case 'add_event' :
    $m->add_event($_POST);
    $m->load_doc('add_event');
    break;
case 'event' :
    $m->show_event();
    $m->load_doc('event');
    break;
case 'search' :
    $m->search($_REQUEST);
    $m->load_doc('search');
    break;
default : 
    $m->load_doc('index');
    break;
} 
?>