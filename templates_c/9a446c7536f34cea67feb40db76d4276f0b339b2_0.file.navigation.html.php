<?php
/* Smarty version 3.1.32, created on 2018-07-13 12:53:14
  from '/var/www/html/teamer/templates/navigation.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b48849ae51da9_41467758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a446c7536f34cea67feb40db76d4276f0b339b2' => 
    array (
      0 => '/var/www/html/teamer/templates/navigation.html',
      1 => 1531479193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b48849ae51da9_41467758 (Smarty_Internal_Template $_smarty_tpl) {
?><ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=index&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
">index</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=add_event&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
">add event</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=search&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
">search</a></li>
   <?php if ($_SESSION['active'] == true) {?>
   <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=dashboard&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
">dashboard</a></li>
    username: <?php echo $_SESSION['username'];?>

    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=logout&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
">log out</a></li>
    <?php } else { ?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=register&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
">register</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=login&lang=<?php echo $_smarty_tpl->tpl_vars['CURRENT_LANG']->value;?>
">log in</a></li>
    <?php }?>
    <div>languages</div>
    <div><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=<?php echo $_smarty_tpl->tpl_vars['CURRENT_ACTION']->value;?>
&lang=de">de</a></div>
    <div><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=<?php echo $_smarty_tpl->tpl_vars['CURRENT_ACTION']->value;?>
&lang=en">en</a></div>
</ul><?php }
}
