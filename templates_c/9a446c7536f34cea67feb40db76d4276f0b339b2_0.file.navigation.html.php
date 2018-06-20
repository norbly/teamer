<?php
/* Smarty version 3.1.32, created on 2018-06-20 10:28:31
  from '/var/www/html/teamer/templates/navigation.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2a102f2e15a1_00464260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a446c7536f34cea67feb40db76d4276f0b339b2' => 
    array (
      0 => '/var/www/html/teamer/templates/navigation.html',
      1 => 1529483285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2a102f2e15a1_00464260 (Smarty_Internal_Template $_smarty_tpl) {
?><ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=index">index</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=register">register</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=login">login</a></li>
</ul><?php }
}
