<?php
/* Smarty version 4.3.4, created on 2024-04-02 09:10:05
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Google/CalendarSyncSettings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660bcb6de03af8_17859264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '029757b4d132405f34afc6cea50987c331543196' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Google/CalendarSyncSettings.tpl',
      1 => 1711370908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660bcb6de03af8_17859264 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-dialog modal-lg googleSettings" style="min-width: 800px;"><div class="modal-content" ><?php ob_start();
echo vtranslate('LBL_FIELD_MAPPING',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', $_prefixVariable1);
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?><form class="form-horizontal" name="calendarsyncsettings"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULENAME']->value;?>
" /><input type="hidden" name="action" value="SaveSettings" /><input type="hidden" name="sourcemodule" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" /><div class="modal-body"><div id="mappingTable"><table class="table table-bordered"><thead><tr><td><b><?php echo vtranslate('APPTITLE',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b></td><td><b><?php echo vtranslate('EXTENTIONNAME',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</b></td></tr></thead><tbody><tr><td><?php echo vtranslate('Subject',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('Event Title',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr><tr><td><?php echo vtranslate('Start Date & Time',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('From Date & Time',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr><tr><td><?php echo vtranslate('End Date & Time',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('Until Date & Time',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr><tr><td><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('Description',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr><tr><td><?php echo vtranslate('Location',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('Where',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr><tr><td><?php echo vtranslate('Status',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('Planned',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr><tr><td><?php echo vtranslate('Activity Type',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('Meeting',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr><tr><td><?php echo vtranslate('Visibility',$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
</td><td><?php echo vtranslate('Privacy',$_smarty_tpl->tpl_vars['MODULENAME']->value);?>
</td></tr></tbody></table></div></div></form><div class="modal-footer "><center><a href="#" class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></div></div></div><?php }
}
