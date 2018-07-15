<?php
require('paths.php');
require('libs/ajaxobject.class.php');
$action = $_REQUEST['action'];
$ajaxobject = new AJAXObject;

switch ($action) {
    case 'search_results':
      
    $ajaxobject->search_results($_REQUEST);
    break;
    
    case 'own_events' :
    
    $ajaxobject->own_events($_REQUEST);
    break;

    case 'get_label' :
    
    $ajaxobject->get_label($_REQUEST);
    break;

    case 'test' : 
    $ajaxobject->test($_REQUEST);
    break;

    default:
    
    break;
}
?>