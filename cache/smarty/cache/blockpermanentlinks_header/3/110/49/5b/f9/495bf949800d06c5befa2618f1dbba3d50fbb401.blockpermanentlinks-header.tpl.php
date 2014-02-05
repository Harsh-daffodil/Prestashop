<?php /*%%SmartyHeaderCode:212061024652f0e5d1907889-34966456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '495bf949800d06c5befa2618f1dbba3d50fbb401' => 
    array (
      0 => '/var/www/prestashop/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1381129110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212061024652f0e5d1907889-34966456',
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f0e5d194a894_98640226',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0e5d194a894_98640226')) {function content_52f0e5d194a894_98640226($_smarty_tpl) {?>
<!-- Block permanent links module HEADER -->
<ul id="header_links">
	<li id="header_link_contact"><a href="http://localhost/prestashop/index.php?controller=contact" title="Contact">Contact</a></li>
	<li id="header_link_sitemap"><a href="http://localhost/prestashop/index.php?controller=sitemap" title="Sitemap">Sitemap</a></li>
	<li id="header_link_bookmark">
		<script type="text/javascript">writeBookmarkLink('http://localhost/prestashop/index.php?controller=contact', 'Contact us - heartbeat', 'bookmark');</script>
	</li>
</ul>
<!-- /Block permanent links module HEADER -->
<?php }} ?>