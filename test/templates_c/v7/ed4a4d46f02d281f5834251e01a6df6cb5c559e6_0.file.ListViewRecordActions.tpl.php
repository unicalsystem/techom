<?php
/* Smarty version 4.3.4, created on 2024-03-27 06:09:12
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/Vtiger/ListViewRecordActions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6603b808be6230_35011739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed4a4d46f02d281f5834251e01a6df6cb5c559e6' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/Vtiger/ListViewRecordActions.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6603b808be6230_35011739 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="table-actions" style = "width:60px">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getRecordLinks(), 'RECORD_LINK', true);
$_smarty_tpl->tpl_vars['RECORD_LINK']->iteration = 0;
$_smarty_tpl->tpl_vars['RECORD_LINK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['RECORD_LINK']->value) {
$_smarty_tpl->tpl_vars['RECORD_LINK']->do_else = false;
$_smarty_tpl->tpl_vars['RECORD_LINK']->iteration++;
$_smarty_tpl->tpl_vars['RECORD_LINK']->last = $_smarty_tpl->tpl_vars['RECORD_LINK']->iteration === $_smarty_tpl->tpl_vars['RECORD_LINK']->total;
$__foreach_RECORD_LINK_0_saved = $_smarty_tpl->tpl_vars['RECORD_LINK'];
?>
        <?php $_smarty_tpl->_assignInScope('RECORD_LINK_URL', $_smarty_tpl->tpl_vars['RECORD_LINK']->value->getUrl());?>
        <a <?php if (stripos($_smarty_tpl->tpl_vars['RECORD_LINK_URL']->value,'javascript:') === 0) {?> onclick="<?php echo substr($_smarty_tpl->tpl_vars['RECORD_LINK_URL']->value,strlen("javascript:"));?>
;
                if (event.stopPropagation){
        event.stopPropagation();} else{
        event.cancelBubble = true;}" <?php } else { ?> href='<?php echo $_smarty_tpl->tpl_vars['RECORD_LINK_URL']->value;?>
' <?php }?>>
            <i class="<?php if ($_smarty_tpl->tpl_vars['RECORD_LINK']->value->getLabel() == 'LBL_EDIT') {?>fa fa-pencil<?php } elseif ($_smarty_tpl->tpl_vars['RECORD_LINK']->value->getLabel() == 'LBL_DELETE') {?>fa fa-trash<?php } else {
echo $_smarty_tpl->tpl_vars['RECORD_LINK']->value->getIcon();
}?>" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['RECORD_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></i>
        </a>
        <?php if (!$_smarty_tpl->tpl_vars['RECORD_LINK']->last) {?>
            &nbsp;&nbsp;
        <?php }?>
    <?php
$_smarty_tpl->tpl_vars['RECORD_LINK'] = $__foreach_RECORD_LINK_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
