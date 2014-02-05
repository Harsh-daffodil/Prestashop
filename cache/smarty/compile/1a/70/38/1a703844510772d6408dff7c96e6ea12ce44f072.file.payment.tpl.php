<?php /* Smarty version Smarty-3.1.14, created on 2014-02-04 18:45:03
         compiled from "/var/www/prestashop/modules/cheque/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94350803152f0e7d73d7857-15030187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a703844510772d6408dff7c96e6ea12ce44f072' => 
    array (
      0 => '/var/www/prestashop/modules/cheque/views/templates/hook/payment.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94350803152f0e7d73d7857-15030187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'this_path_cheque' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f0e7d7444af5_70850556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e7d7444af5_70850556')) {function content_52f0e7d7444af5_70850556($_smarty_tpl) {?>

<p class="payment_module">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('cheque','payment',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Pay by check.','mod'=>'cheque'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_cheque']->value;?>
cheque.jpg" alt="<?php echo smartyTranslate(array('s'=>'Pay by check.','mod'=>'cheque'),$_smarty_tpl);?>
" width="86" height="49" />
		<?php echo smartyTranslate(array('s'=>'Pay by check (order processing will take more time).','mod'=>'cheque'),$_smarty_tpl);?>

	</a>
</p>
<?php }} ?>