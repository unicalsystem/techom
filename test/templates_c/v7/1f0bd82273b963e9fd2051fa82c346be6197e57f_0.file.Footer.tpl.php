<?php
/* Smarty version 4.3.4, created on 2024-08-14 17:01:43
  from 'C:\xampp\htdocs\unical\layouts\v7\modules\Vtiger\Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66bce2f7746760_48875369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f0bd82273b963e9fd2051fa82c346be6197e57f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\unical\\layouts\\v7\\modules\\Vtiger\\Footer.tpl',
      1 => 1723653964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66bce2f7746760_48875369 (Smarty_Internal_Template $_smarty_tpl) {
?>
<footer class="app-footer">
		<p>
		Powered by Unical Systems &nbsp;&nbsp;©2024&nbsp;&nbsp;
		<a href="https://unicalsystems.com/" target="_blank">Unical Systems</a>&nbsp;|&nbsp;
		<a href="https://unicalsystems.com/privacy-policy/" target="_blank">Privacy Policy</a>
	</p>
</footer>
</div>
<div id='overlayPage'>
	<!-- arrow is added to point arrow to the clicked element (Ex:- TaskManagement), 
	any one can use this by adding "show" class to it -->
	<div class='arrow'></div>
	<div class='data'>
	</div>
</div>
<div id='helpPageOverlay'></div>
<div id="js_strings" class="hide noprint"><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div>
<div id="maxListFieldsSelectionSize" class="hide noprint"><?php echo $_smarty_tpl->tpl_vars['MAX_LISTFIELDS_SELECTION_SIZE']->value;?>
</div>
<div class="modal myModal fade"></div>
<?php $_smarty_tpl->_subTemplateRender(vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</body>

</html>
<?php }
}
