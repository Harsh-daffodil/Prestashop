<?php /*%%SmartyHeaderCode:55253822452f0e5f8f242e6-03228158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '782f7f8d43bf98d1549474e29a46d345472b29a2' => 
    array (
      0 => '/var/www/prestashop/modules/homeslider/homeslider.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55253822452f0e5f8f242e6-03228158',
  'variables' => 
  array (
    'homeslider' => 0,
    'homeslider_slides' => 0,
    'slide' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f0e5f90b44b4_97789861',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e5f90b44b4_97789861')) {function content_52f0e5f90b44b4_97789861($_smarty_tpl) {?>
<!-- Module HomeSlider -->
<script type="text/javascript">
			var homeslider_loop = true;
	var homeslider_speed = 500;
var homeslider_pause = 3000;
</script>
<ul id="homeslider">
			<li>
			<a href="http://www.prestashop.com" title="This is a sample picture">
			<img src="/prestashop/modules/homeslider/images/sample-1.jpg" alt="sample-1" height="300" width="535" />
			</a>
		</li>
				<li>
			<a href="http://www.prestashop.com" title="This is a sample picture">
			<img src="/prestashop/modules/homeslider/images/sample-2.jpg" alt="sample-2" height="300" width="535" />
			</a>
		</li>
				<li>
			<a href="http://www.prestashop.com" title="This is a sample picture">
			<img src="/prestashop/modules/homeslider/images/sample-3.jpg" alt="sample-3" height="300" width="535" />
			</a>
		</li>
				<li>
			<a href="http://www.prestashop.com" title="This is a sample picture">
			<img src="/prestashop/modules/homeslider/images/sample-4.jpg" alt="sample-4" height="300" width="535" />
			</a>
		</li>
				<li>
			<a href="http://www.prestashop.com" title="This is a sample picture">
			<img src="/prestashop/modules/homeslider/images/sample-5.jpg" alt="sample-5" height="300" width="535" />
			</a>
		</li>
	</ul>
<!-- /Module HomeSlider -->
<?php }} ?>