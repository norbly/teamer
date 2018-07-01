<?php
/* Smarty version 3.1.32, created on 2018-07-01 16:59:00
  from '/var/www/html/teamer/templates/dashboard.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b38ec344c64b8_47747959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99e1c69e0c5bfc87a393ba73b46099c7e00cff73' => 
    array (
      0 => '/var/www/html/teamer/templates/dashboard.html',
      1 => 1530457138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b38ec344c64b8_47747959 (Smarty_Internal_Template $_smarty_tpl) {
echo $_GET['message'];?>

welcome back <?php echo $_SESSION['username'];?>

id: <?php echo $_SESSION['user_id'];?>

<div id="own_events" style="margin-left: 50px;width:200px">
    <h2>own events</h2>
    <div id="boxes_own_events"></div>
    <button id="more">more</button>
</div>

<template> 
    <a>  
    <h3></h3>
    <span id="start_date"></span>
</a> 
    <hr>   
</template>

<?php echo '<script'; ?>
>
    // event listeners
    window.addEventListener("load", function() {
        ajax_request("./libs/get_own_events.php?user_id=<?php echo $_SESSION['user_id'];?>
&offset=" + offset,load_events);
        offset += 5;
    });
     var offset = 0;
    document.getElementById("more").addEventListener("click", function() { 
        ajax_request("./libs/get_own_events.php?user_id=<?php echo $_SESSION['user_id'];?>
&offset=" + offset,load_events);
        offset += 5;
    });
    // callback functions

    // display events in the div boxes_own_event
    function load_events(xhttp) {
        var events = JSON.parse(xhttp.responseText);
        var boxes_own_events = document.getElementById("boxes_own_events");
        var event_template = document.querySelectorAll("template")[0];
        events.forEach(element => {
            var clon = event_template.content.cloneNode(true);
            clon.querySelectorAll("a")[0].href = "index.php?action=event&id="+element.event_id;
            clon.querySelectorAll("h3")[0].innerHTML = element.event_title;
            clon.getElementById('start_date').innerHTML = element.start_date;
             boxes_own_events.appendChild(clon);
        });  
    }

    // AJAX request function
    function ajax_request(url, callback_function) {
        var xhttp = new XMLHttpRequest;
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                callback_function(this);
            }
        }
        xhttp.open("GET", url);
        xhttp.send();
    }
    
<?php echo '</script'; ?>
><?php }
}
