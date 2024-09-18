<?php
/* Smarty version 4.3.4, created on 2024-04-02 09:11:45
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/showDuplicateSearch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660bcbd1771490_72771284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa3850b18b8a1265bde2546a50a7de8cc04c52cd' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/showDuplicateSearch.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660bcbd1771490_72771284 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal" id="findDuplicate">
            <input type='hidden' name='module' value='<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
' />
            <input type='hidden' name='view' value='FindDuplicates' />
            
            <?php ob_start();
echo vtranslate('LBL_MATCH_CRITERIA',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', $_prefixVariable1);?>
            <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo vtranslate('LBL_MATCH_FIELDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label>
                    <div class="col-lg-8">
                        <select id="fieldList" class="select2 form-control" multiple="true" name="fields[]"
							data-rule-required="true">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FIELDS']->value, 'FIELD');
$_smarty_tpl->tpl_vars['FIELD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD']->value) {
$_smarty_tpl->tpl_vars['FIELD']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['FIELD']->value->isViewableInDetailView()) {?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['FIELD']->value->getName();?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</select> 
                    </div>
                </div>    
                <div class="form-group">
                    <div class="col-lg-3">&nbsp;</div>
                    <div class="col-lg-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked="checked" name="ignoreEmpty"/> &nbsp;<?php echo vtranslate('LBL_IGNORE_EMPTY_VALUES',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <?php ob_start();
echo vtranslate('LBL_FIND_DUPLICATES',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_subTemplateRender(vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BUTTON_NAME'=>$_prefixVariable2), 0, true);
?>
        </form>
    </div>
</div>
<?php }
}
