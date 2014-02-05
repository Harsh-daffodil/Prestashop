<?php /* Smarty version Smarty-3.1.14, created on 2014-02-04 18:41:10
         compiled from "/var/www/prestashop/admin6/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48231822852f0e6ee92b626-46827310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '233ab1aa5e369001847f8266029ab043d1c3d2e2' => 
    array (
      0 => '/var/www/prestashop/admin6/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48231822852f0e6ee92b626-46827310',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f0e6ee93bea6_68927158',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e6ee93bea6_68927158')) {function content_52f0e6ee93bea6_68927158($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<img src="../img/admin/details.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>