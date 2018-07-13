<?php
/* Smarty version 3.1.32, created on 2018-07-13 17:43:55
  from '/var/www/html/teamer/templates/add_event.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b48c8bb6bba66_92480689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4857986bed26207af1c70ff4eadddf70d106986' => 
    array (
      0 => '/var/www/html/teamer/templates/add_event.html',
      1 => 1531496061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/modules/template_label.html' => 1,
  ),
),false)) {
function content_5b48c8bb6bba66_92480689 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h1><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title_add_event');?>
</h1>
<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=add_event" method="post">
    <div>
        <label for="title">title</label><input type="text" name="title" id="title"><?php echo $_smarty_tpl->tpl_vars['ERROR_TITLE']->value;?>

    </div>
    <div>
        <label for="label">label</label><input type="text" name="input_label" id="input_label">
        <div id="suggestions_label">
            <div></div>
        </div>
        <div id="selected_label"></div>
    </div>
   <div>
       description:<textarea name="description" id="description" cols="30" rows="10"></textarea><?php echo $_smarty_tpl->tpl_vars['ERROR_DESCRIPTION']->value;?>

   </div> 
    <div>
        <input type="checkbox" name="fixed_date" id="fixed_date"checked> <label for="fixed_date">fixes Datum</label>
    </div>
    <div>
        <input type="date" name="start_date" id="start_date">
        <input type="time" name="start_time" id="">
    </div>
    <div>
        <input type="checkbox" name="fixed_location" id="fixed_location" checked>fixer Ort
        
    </div>  
    <div>
        Ort: <input type="text" name="location" id="location">
    </div>
    <div>
        <input type="checkbox" name="limited_number_of_participants" id="limited_number_of_participants" checked>begrenzte Teilnehmeranzahl
    </div>
    <div>
        number_of_participants:<input type="number" name="max_number_of_participants" id="max_number_of_participants">
    </div>
    <div>
        <input type="checkbox" name="advance_reservation_required" id="advance_reservation_required" checked>advance_reservation_required
    </div>
    <div>
        <input type="checkbox" name="confirm_reservations" id="confirm_reservations" >confirm_reservations
    </div>
    <input type="submit" value="create event"> 
    
</form>

<p id="demo"></p>
<?php $_smarty_tpl->_subTemplateRender("file:templates/modules/template_label.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="templates/main.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var input_label = document.getElementById('input_label');
    var input_fixed_date = document.getElementById('fixed_date');
    var input_start_date = document.getElementById('start_date');
    var input_fixed_location = document.getElementById('fixed_location');
    var input_location = document.getElementById('location');
    var input_limited_number_of_participants = document.getElementById('limited_number_of_participants');
    var input_max_number_of_participants = document.getElementById('max_number_of_participants');
    var input_advance_reservation_required = document.getElementById('advance_reservation_required');
    var input_confirm_reservations = document.getElementById('confirm_reservations');

    input_fixed_date.addEventListener('click', function() {
        if (input_fixed_date.checked) {
            input_start_date.parentNode.style.display = "block";
        } else {
            input_start_date.parentNode.style.display = "none";
        }
    });

    input_fixed_location.addEventListener('click', function() {
        if (input_fixed_location.checked) {
            input_location.parentNode.style.display = "block";
        } else {
            input_location.parentNode.style.display = "none";
        }
    });

    input_limited_number_of_participants.addEventListener('click', function() {
        if (input_limited_number_of_participants.checked) {
            input_max_number_of_participants.parentNode.style.display = "block";
        } else {
            input_max_number_of_participants.parentNode.style.display = "none";
        }
    });

    input_advance_reservation_required.addEventListener("click", function() {
        if (input_advance_reservation_required.checked) {
            input_confirm_reservations.parentNode.style.display = "block";
        } else {
            input_confirm_reservations.parentNode.style.display = "none";
        }
    })

    input_label.addEventListener("keyup", function() {
       ajax_request('./ajax.php?action=get_label&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
&q='+input_label.value, displayLabel, document.getElementById("suggestions_label")); 
    });
    
    function displayLabel(xhttp) {
        var target = document.getElementById("suggestions_label");
        var temp_target = document.createElement("div");
        var label = JSON.parse(xhttp.responseText);
        
        if (label.error != null) {
            var entry = document.createElement("div");
            entry.innerHTML = label.error;
            temp_target.appendChild(entry);
        } else {
            label.forEach(element => {
                var entry = document.createElement("div");
                entry.innerHTML = element['translation'];
                temp_target.appendChild(entry);
            });
        }
        target.replaceChild(temp_target, target.firstChild);
    }

    // addLabel(this)
<?php echo '</script'; ?>
>
<?php }
}
