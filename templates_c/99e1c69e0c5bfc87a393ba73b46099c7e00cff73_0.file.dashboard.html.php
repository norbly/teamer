<?php
/* Smarty version 3.1.32, created on 2018-07-12 09:53:07
  from '/var/www/html/teamer/templates/dashboard.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b4708e3df3ad8_33965005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99e1c69e0c5bfc87a393ba73b46099c7e00cff73' => 
    array (
      0 => '/var/www/html/teamer/templates/dashboard.html',
      1 => 1531381986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b4708e3df3ad8_33965005 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div>
           <h3></h3>
            <span id="start_date"></span> 
        </div>      
    </a> 
    <hr>   
</template>

<?php echo '<script'; ?>
 src="./templates/main.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    var do_ajax_request = (function() {
        var offset = 0;
        return function() {
            ajax_request("./libs/get_own_events.php?user_id=<?php echo $_SESSION['user_id'];?>
&offset=" + offset,load_events);
            offset += 5;
        };
    })();

    // event listeners
    window.addEventListener("load", function() {
        do_ajax_request();
    });
     
    document.getElementById("more").addEventListener("click", function() { 
        do_ajax_request();
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

    
<?php echo '</script'; ?>
><?php }
}
