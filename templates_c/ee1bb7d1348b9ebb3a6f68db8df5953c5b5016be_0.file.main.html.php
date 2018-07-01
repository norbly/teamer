<?php
/* Smarty version 3.1.32, created on 2018-06-24 21:35:45
  from '/var/www/html/teamer/templates/main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2ff29180f6c4_16313050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee1bb7d1348b9ebb3a6f68db8df5953c5b5016be' => 
    array (
      0 => '/var/www/html/teamer/templates/main.html',
      1 => 1529868942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.html' => 1,
    'file:navigation.html' => 1,
  ),
),false)) {
function content_5b2ff29180f6c4_16313050 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender('file:head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:navigation.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['TEMPLATE']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>    
</body>
</html><?php }
}
