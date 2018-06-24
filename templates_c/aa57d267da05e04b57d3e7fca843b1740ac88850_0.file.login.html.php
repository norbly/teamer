<?php
/* Smarty version 3.1.32, created on 2018-06-24 21:41:29
  from '/var/www/html/teamer/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2ff3e9921067_77124808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa57d267da05e04b57d3e7fca843b1740ac88850' => 
    array (
      0 => '/var/www/html/teamer/templates/login.html',
      1 => 1529869286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2ff3e9921067_77124808 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>log in</h2> 
<?php echo $_smarty_tpl->tpl_vars['ERROR_LOGIN']->value;?>

<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=login" method="POST">
    email<input type="text" name="email" id="email" value="<?php echo $_POST['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['email_error']->value;?>
</br>
    password<input type="password" name="password" id="password"></br>
    <input type="submit" value="log in">
</form><?php }
}
