<?php
/* Smarty version 3.1.32, created on 2018-06-24 21:49:32
  from '/var/www/html/teamer/templates/register.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2ff5cc80eb85_62211323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2509e6115d15a4fc02f8479f7cba2772a2ee2d7f' => 
    array (
      0 => '/var/www/html/teamer/templates/register.html',
      1 => 1529869769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2ff5cc80eb85_62211323 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>registration area</h2> 
<?php echo $_smarty_tpl->tpl_vars['ERROR_REGISTER']->value;?>

<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=register" method="POST">
    username<input type="text" name="username" id="username" value="<?php echo $_POST['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['ERROR_USERNAME']->value;?>
</br>
    email<input type="text" name="email" id="email"value="<?php echo $_POST['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['ERROR_EMAIL']->value;?>
</br>
    password<input type="password" name="password_0" id="password_0"><?php echo $_smarty_tpl->tpl_vars['ERROR_PASSWORD_0']->value;?>
</br>
    repeat password<input type="password" name="password_1" id="password_1"><?php echo $_smarty_tpl->tpl_vars['ERROR_PASSWORD_1']->value;?>
</br>
    <input type="submit" value="register">
</form> <?php }
}
