<?php
/* Smarty version 3.1.32, created on 2018-06-20 12:14:48
  from '/var/www/html/teamer/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2a2918970ea4_36197635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa57d267da05e04b57d3e7fca843b1740ac88850' => 
    array (
      0 => '/var/www/html/teamer/templates/login.html',
      1 => 1529489559,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2a2918970ea4_36197635 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>log in</h2> 
<?php echo $_smarty_tpl->tpl_vars['ERROR_LOGIN']->value;?>

<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=login" method="POST">
    email<input type="text" name="email" id="email"><?php echo $_smarty_tpl->tpl_vars['email_error']->value;?>
</br>
    password<input type="password" name="password" id="password"></br>
    <input type="submit" value="log in">
</form><?php }
}
