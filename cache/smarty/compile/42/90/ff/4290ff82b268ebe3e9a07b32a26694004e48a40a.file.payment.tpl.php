<?php /* Smarty version Smarty-3.1.14, created on 2014-02-04 18:45:03
         compiled from "/var/www/prestashop/modules/bankwire/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12465515152f0e7d7453e29-35204710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4290ff82b268ebe3e9a07b32a26694004e48a40a' => 
    array (
      0 => '/var/www/prestashop/modules/bankwire/views/templates/hook/payment.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12465515152f0e7d7453e29-35204710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'this_path_bw' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f0e7d7474822_97434953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e7d7474822_97434953')) {function content_52f0e7d7474822_97434953($_smarty_tpl) {?>

<p class="payment_module">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('bankwire','payment'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Pay by bank wire','mod'=>'bankwire'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_bw']->value;?>
bankwire.jpg" alt="<?php echo smartyTranslate(array('s'=>'Pay by bank wire','mod'=>'bankwire'),$_smarty_tpl);?>
" width="86" height="49"/>
		<?php echo smartyTranslate(array('s'=>'Pay by bank wire (order process will be longer)','mod'=>'bankwire'),$_smarty_tpl);?>

	</a>
</p><?php }} ?>