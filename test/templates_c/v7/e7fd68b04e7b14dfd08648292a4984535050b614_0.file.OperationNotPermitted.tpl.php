<?php
/* Smarty version 4.3.4, created on 2024-08-14 17:01:37
  from 'C:\xampp\htdocs\unical\layouts\v7\modules\Vtiger\OperationNotPermitted.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66bce2f1db6b29_58818986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7fd68b04e7b14dfd08648292a4984535050b614' => 
    array (
      0 => 'C:\\xampp\\htdocs\\unical\\layouts\\v7\\modules\\Vtiger\\OperationNotPermitted.tpl',
      1 => 1723653965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66bce2f1db6b29_58818986 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="margin:0 auto;width: 50em;">
	<table border='0' cellpadding='5' cellspacing='0' height='600px' width="700px">
	<tr><td align='center'>
		<div style='border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 80%; position: relative; z-index: 100000020;'>

		<table border='0' cellpadding='5' cellspacing='0' width='98%'>
		<tr>
			<td rowspan='2' width='11%'><img src="<?php echo vimage_path('denied.gif');?>
" ></td>
			<td style='border-bottom: 1px solid rgb(204, 204, 204);' nowrap='nowrap' width='70%'>
				<span class='genHeaderSmall'><?php echo vtranslate($_smarty_tpl->tpl_vars['MESSAGE']->value);?>
</span></td>
		</tr>
		<tr>
			<td class='small' align='right' nowrap='nowrap'>
				<a href='javascript:window.history.back();'><?php echo vtranslate('LBL_GO_BACK');?>
</a><br>
			</td>
		</tr>
		</table>
		</div>
	</td></tr>
	</table>
</div><?php }
}
