<?php
/* Smarty version 4.3.4, created on 2024-04-01 10:10:52
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Import/ImportStepThree.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660a882c2a94b0_98246039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e60d479bb90093ebc8606a7b6390355069cb0de5' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Import/ImportStepThree.tpl',
      1 => 1711370906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660a882c2a94b0_98246039 (Smarty_Internal_Template $_smarty_tpl) {
?>


<span>
    <h4><?php echo vtranslate('LBL_IMPORT_MAP_FIELDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4>
</span>
<hr>
<div id="savedMapsContainer"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Import_Saved_Maps.tpl",'Import'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
<div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Import_Mapping.tpl",'Import'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
<div class="form-inline" style="padding-bottom: 10%;">
    <input type="checkbox" name="save_map" id="save_map">&nbsp;&nbsp;<label for="save_map"><?php echo vtranslate('LBL_SAVE_AS_CUSTOM_MAPPING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label>
    &nbsp;&nbsp;<input type="text" name="save_map_as" id="save_map_as" class = "form-control">
</div>
<?php if (!$_smarty_tpl->tpl_vars['IMPORTABLE_FIELDS']->value) {?>
	<?php $_smarty_tpl->_assignInScope('IMPORTABLE_FIELDS', $_smarty_tpl->tpl_vars['AVAILABLE_FIELDS']->value);
}
$_smarty_tpl->_subTemplateRender(vtemplate_path("Import_Default_Values_Widget.tpl",'Import'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('IMPORTABLE_FIELDS'=>$_smarty_tpl->tpl_vars['IMPORTABLE_FIELDS']->value), 0, true);
}
}
