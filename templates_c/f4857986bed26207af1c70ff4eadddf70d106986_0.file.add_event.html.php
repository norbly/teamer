<?php
/* Smarty version 3.1.32, created on 2018-06-25 10:51:41
  from '/var/www/html/teamer/templates/add_event.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b30ad1ddf5999_22953494',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4857986bed26207af1c70ff4eadddf70d106986' => 
    array (
      0 => '/var/www/html/teamer/templates/add_event.html',
      1 => 1529916698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b30ad1ddf5999_22953494 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>add a new event</h1>
<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=add_event" method="post">
    title: <input type="text" name="title" id="title"><?php echo $_smarty_tpl->tpl_vars['ERROR_TITLE']->value;?>
</br>
    description: </br><textarea name="description" id="description" cols="30" rows="10"></textarea><?php echo $_smarty_tpl->tpl_vars['ERROR_DESCRIPTION']->value;?>
</br>
    <input type="date" name="starte_date" id="">
    <input type="time" name="start_time" id=""></br>
    <input type="submit" value="create event"> 
</form>
<?php }
}
