<?php
/* Smarty version 4.3.4, created on 2024-08-23 11:43:41
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Calendar/CalendarViewTypes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66c875edec0377_36235137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ca34374cee9ca6a69f30ce8251aec3cd5f50ae7' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Calendar/CalendarViewTypes.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66c875edec0377_36235137 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sidebar-widget-contents" name='calendarViewTypes'><div id="calendarview-feeds"><ul class="list-group feedslist"><li class="activitytype-indicator calendar-feed-indicator mass-edit-option" style="background-color:#2c3b49; color:#FFFFFF;"><span><?php echo vtranslate('LBL_MASS_SELECT');?>
</span><span class="activitytype-actions pull-right"><input class="mass-select" type="checkbox"></span></li><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['VIEWTYPES']->value['visible'], 'VIEWINFO', false, NULL, 'calendarview', array (
));
$_smarty_tpl->tpl_vars['VIEWINFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['VIEWINFO']->value) {
$_smarty_tpl->tpl_vars['VIEWINFO']->do_else = false;
?><li class="activitytype-indicator calendar-feed-indicator container-fluid" style="background-color: <?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['color'];?>
;"><span><?php echo vtranslate($_smarty_tpl->tpl_vars['VIEWINFO']->value['module'],$_smarty_tpl->tpl_vars['VIEWINFO']->value['module']);
if ($_smarty_tpl->tpl_vars['VIEWINFO']->value['conditions']['name'] != '') {?> (<?php echo vtranslate($_smarty_tpl->tpl_vars['VIEWINFO']->value['conditions']['name'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
) <?php }?>-<?php echo vtranslate($_smarty_tpl->tpl_vars['VIEWINFO']->value['fieldlabel'],$_smarty_tpl->tpl_vars['VIEWINFO']->value['module']);?>
</span><span class="activitytype-actions pull-right"><input class="toggleCalendarFeed cursorPointer" type="checkbox" data-calendar-sourcekey="<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['module'];?>
_<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['fieldname'];
if ($_smarty_tpl->tpl_vars['VIEWINFO']->value['conditions']['name'] != '') {?>_<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['conditions']['name'];
}?>" data-calendar-feed="<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['module'];?>
"data-calendar-feed-color="<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['color'];?>
" data-calendar-fieldlabel="<?php echo vtranslate($_smarty_tpl->tpl_vars['VIEWINFO']->value['fieldlabel'],$_smarty_tpl->tpl_vars['VIEWINFO']->value['module']);?>
"data-calendar-fieldname="<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['fieldname'];?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['VIEWINFO']->value['module'],$_smarty_tpl->tpl_vars['VIEWINFO']->value['module']);?>
" data-calendar-type="<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['type'];?>
"data-calendar-feed-textcolor="white" data-calendar-feed-conditions='<?php echo $_smarty_tpl->tpl_vars['VIEWINFO']->value['conditions']['rules'];?>
' />&nbsp;&nbsp;<i class="fa fa-pencil editCalendarFeedColor cursorPointer"></i>&nbsp;&nbsp;<i class="fa fa-trash deleteCalendarFeed cursorPointer"></i></span></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php $_smarty_tpl->_assignInScope('INVISIBLE_CALENDAR_VIEWS_EXISTS', 'false');
if ($_smarty_tpl->tpl_vars['ADDVIEWS']->value) {
$_smarty_tpl->_assignInScope('INVISIBLE_CALENDAR_VIEWS_EXISTS', 'true');
}?><input type="hidden" class="invisibleCalendarViews" value="<?php echo $_smarty_tpl->tpl_vars['INVISIBLE_CALENDAR_VIEWS_EXISTS']->value;?>
" /><ul class="hide dummy"><li class="activitytype-indicator calendar-feed-indicator feed-indicator-template container-fluid"><span></span><span class="activitytype-actions pull-right"><input class="toggleCalendarFeed cursorPointer" type="checkbox" data-calendar-sourcekey="" data-calendar-feed="" data-calendar-feed-color="" data-calendar-fieldlabel="" data-calendar-fieldname="" title="" data-calendar-type="" data-calendar-feed-textcolor="white">&nbsp;&nbsp;<i class="fa fa-pencil editCalendarFeedColor cursorPointer"></i>&nbsp;&nbsp;<i class="fa fa-trash deleteCalendarFeed cursorPointer"></i></span></li></ul></div></div>
<?php }
}
