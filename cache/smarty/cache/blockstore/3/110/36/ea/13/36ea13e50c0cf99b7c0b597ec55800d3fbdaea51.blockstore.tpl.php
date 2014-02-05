<?php /*%%SmartyHeaderCode:99114677852f0e5d2946f49-76413937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36ea13e50c0cf99b7c0b597ec55800d3fbdaea51' => 
    array (
      0 => '/var/www/prestashop/themes/default/modules/blockstore/blockstore.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99114677852f0e5d2946f49-76413937',
  'variables' => 
  array (
    'link' => 0,
    'module_dir' => 0,
    'store_img' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f0e5d2990607_04337969',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e5d2990607_04337969')) {function content_52f0e5d2990607_04337969($_smarty_tpl) {?>
<!-- Block stores module -->
<div id="stores_block_left" class="block">
	<p class="title_block"><a href="http://localhost/prestashop/index.php?controller=stores" title="Our store(s)!">Our store(s)!</a></p>
	<div class="block_content blockstore">
		<p class="store_image"><a href="http://localhost/prestashop/index.php?controller=stores" title="Our store(s)!"><img src="/prestashop/modules/blockstore/store.jpg" alt="Our store(s)!" width="174" height="115" /></a></p>
		<p>
			<a href="http://localhost/prestashop/index.php?controller=stores" title="Our store(s)!">&raquo; Discover our store(s)!</a>
		</p>
	</div>
</div>
<!-- /Block stores module -->
<?php }} ?>