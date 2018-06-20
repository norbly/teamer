<?php
/* Smarty version 3.1.32, created on 2018-06-20 15:27:07
  from '/var/www/html/teamer/templates/navigation.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2a562bd6cc87_72004117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a446c7536f34cea67feb40db76d4276f0b339b2' => 
    array (
      0 => '/var/www/html/teamer/templates/navigation.html',
      1 => 1529501224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2a562bd6cc87_72004117 (Smarty_Internal_Template $_smarty_tpl) {
?><ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=index">index</a></li>
   <?php if ($_SESSION['active'] == true) {?>
   <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=dashboard">dashboard</a></li>
    username: <?php echo $_SESSION['username'];?>

    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=logout">log out</a></li>
    <?php } else { ?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=register">register</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=login">log in</a></li>
    <?php }?>
</ul><?php }
}
