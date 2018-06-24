<?php
/* Smarty version 3.1.32, created on 2018-06-24 22:20:51
  from '/var/www/html/teamer/templates/dashboard.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2ffd2385fe57_40176088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99e1c69e0c5bfc87a393ba73b46099c7e00cff73' => 
    array (
      0 => '/var/www/html/teamer/templates/dashboard.html',
      1 => 1529871636,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2ffd2385fe57_40176088 (Smarty_Internal_Template $_smarty_tpl) {
?>welcome back <?php echo $_SESSION['username'];?>

id: <?php echo $_SESSION['id'];
}
}
