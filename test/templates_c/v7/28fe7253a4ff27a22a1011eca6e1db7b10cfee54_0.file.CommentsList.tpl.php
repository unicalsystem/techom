<?php
/* Smarty version 4.3.4, created on 2024-03-26 09:55:09
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/CommentsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66029b7d17d996_42019683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28fe7253a4ff27a22a1011eca6e1db7b10cfee54' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/CommentsList.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66029b7d17d996_42019683 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('IS_CREATABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('CreateView'));
$_smarty_tpl->_assignInScope('IS_EDITABLE', $_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value->isPermitted('EditView'));
if (!empty($_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value)) {?><ul class="unstyled"><?php if ($_smarty_tpl->tpl_vars['CURRENT_COMMENT']->value) {
$_smarty_tpl->_assignInScope('CHILDS_ROOT_PARENT_MODEL', $_smarty_tpl->tpl_vars['CURRENT_COMMENT']->value);
$_smarty_tpl->_assignInScope('CURRENT_COMMENT_PARENT_MODEL', $_smarty_tpl->tpl_vars['CURRENT_COMMENT']->value->getParentCommentModel());
while ($_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value != false) {
$_smarty_tpl->_assignInScope('TEMP_COMMENT', $_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value);
$_smarty_tpl->_assignInScope('CURRENT_COMMENT_PARENT_MODEL', $_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value->getParentCommentModel());
if ($_smarty_tpl->tpl_vars['CURRENT_COMMENT_PARENT_MODEL']->value == false) {
$_smarty_tpl->_assignInScope('CHILDS_ROOT_PARENT_MODEL', $_smarty_tpl->tpl_vars['TEMP_COMMENT']->value);
}
}
}
if (is_array($_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value, 'COMMENT', false, 'Index');
$_smarty_tpl->tpl_vars['COMMENT']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Index']->value => $_smarty_tpl->tpl_vars['COMMENT']->value) {
$_smarty_tpl->tpl_vars['COMMENT']->do_else = false;
$_smarty_tpl->_assignInScope('PARENT_COMMENT_ID', $_smarty_tpl->tpl_vars['COMMENT']->value->getId());?><li class="commentDetails"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('Comment.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('COMMENT'=>$_smarty_tpl->tpl_vars['COMMENT']->value,'COMMENT_MODULE_MODEL'=>$_smarty_tpl->tpl_vars['COMMENTS_MODULE_MODEL']->value), 0, true);
if ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value) {
if ($_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value->getId() == $_smarty_tpl->tpl_vars['PARENT_COMMENT_ID']->value) {
$_smarty_tpl->_assignInScope('CHILD_COMMENTS_MODEL', $_smarty_tpl->tpl_vars['CHILDS_ROOT_PARENT_MODEL']->value->getChildComments());
$_smarty_tpl->_subTemplateRender(vtemplate_path('CommentsListIteration.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('CHILD_COMMENTS_MODEL'=>$_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value), 0, true);
}
}?></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
$_smarty_tpl->_subTemplateRender(vtemplate_path('Comment.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('COMMENT'=>$_smarty_tpl->tpl_vars['PARENT_COMMENTS']->value), 0, true);
}?></ul><?php } else { ?><div class="noCommentsMsgContainer" style='padding:20px;'><p class="textAlignCenter"><?php echo vtranslate('LBL_NO_COMMENTS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</p></div><?php }
}
}
