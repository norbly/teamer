<?php
/* Smarty version 3.1.32, created on 2018-07-13 14:08:31
  from '/var/www/html/teamer/templates/head.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b48963f60a451_94743972',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee96fd0d1331ff0745b2e0bec228133245be797f' => 
    array (
      0 => '/var/www/html/teamer/templates/head.html',
      1 => 1531483435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b48963f60a451_94743972 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "templates/languages/".((string)$_smarty_tpl->tpl_vars['CURRENT_LANG']->value)."/lang.config", ((string)$_smarty_tpl->tpl_vars['CURRENT_ACTION']->value), 16);
?>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_SERVER['server_name'];?>
/teamer/templates/main.css" />    
</head>

<?php }
}
