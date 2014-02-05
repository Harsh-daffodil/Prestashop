<?php /* Smarty version Smarty-3.1.14, created on 2014-02-04 18:41:10
         compiled from "/var/www/prestashop/admin6/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210185699952f0e6ee93f710-20751126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0f30c061c75709cb77a7198671fd4aa0187569e' => 
    array (
      0 => '/var/www/prestashop/admin6/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210185699952f0e6ee93f710-20751126',
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
  'unifunc' => 'content_52f0e6ee94eeb9_71772506',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e6ee94eeb9_71772506')) {function content_52f0e6ee94eeb9_71772506($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>