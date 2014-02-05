<?php /*%%SmartyHeaderCode:140011931852f0e5d2a4c574-64417757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c1fe4e7f2a0f45df0372a22be9ef767fe593f1d' => 
    array (
      0 => '/var/www/prestashop/themes/default/modules/blockmyaccountfooter/blockmyaccountfooter.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140011931852f0e5d2a4c574-64417757',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f0e5d2b18ee5_58560443',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e5d2b18ee5_58560443')) {function content_52f0e5d2b18ee5_58560443($_smarty_tpl) {?>
<!-- Block myaccount module -->
<div class="block myaccount">
	<p class="title_block"><a href="http://localhost/prestashop/index.php?controller=my-account" title="Manage your customer account" rel="nofollow">My account</a></p>
	<div class="block_content">
		<ul class="bullet">
			<li><a href="http://localhost/prestashop/index.php?controller=history" title="My orders" rel="nofollow">My orders</a></li>
						<li><a href="http://localhost/prestashop/index.php?controller=order-slip" title="My credit slips" rel="nofollow">My credit slips</a></li>
			<li><a href="http://localhost/prestashop/index.php?controller=addresses" title="My addresses" rel="nofollow">My addresses</a></li>
			<li><a href="http://localhost/prestashop/index.php?controller=identity" title="Manage your personal information" rel="nofollow">My personal info</a></li>
						
		</ul>
		<p class="logout"><a href="http://localhost/prestashop/index.php?mylogout" title="Sign out" rel="nofollow">Sign out</a></p>
	</div>
</div>
<!-- /Block myaccount module -->
<?php }} ?>