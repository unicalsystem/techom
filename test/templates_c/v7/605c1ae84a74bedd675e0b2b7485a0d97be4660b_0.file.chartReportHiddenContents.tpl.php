<?php
/* Smarty version 4.3.4, created on 2024-04-25 06:31:17
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Reports/chartReportHiddenContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6629f8b58c9325_29173399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '605c1ae84a74bedd675e0b2b7485a0d97be4660b' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Reports/chartReportHiddenContents.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6629f8b58c9325_29173399 (Smarty_Internal_Template $_smarty_tpl) {
?><select id="groupbyfield_element">
    <option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRIMARY_MODULE_FIELDS']->value, 'PRIMARY_MODULE', false, 'PRIMARY_MODULE_NAME');
$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value => $_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value) {
$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->do_else = false;
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value, 'BLOCK', false, 'BLOCK_LABEL');
$_smarty_tpl->tpl_vars['BLOCK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK']->value) {
$_smarty_tpl->tpl_vars['BLOCK']->do_else = false;
?>
            <optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
-<?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
'>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK']->value, 'FIELD_LABEL', false, 'FIELD_KEY');
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_KEY']->value => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('FIELD_INFO', explode(':',$_smarty_tpl->tpl_vars['FIELD_KEY']->value));?>
                    <?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'D' || $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'DT') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:Y"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_YEAR',$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:MY"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_MONTH',$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
</option>
                    <?php } elseif ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'I' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'N' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'NN') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
</option>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </optgroup>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECONDARY_MODULE_FIELDS']->value, 'SECONDARY_MODULE', false, 'SECONDARY_MODULE_NAME');
$_smarty_tpl->tpl_vars['SECONDARY_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value => $_smarty_tpl->tpl_vars['SECONDARY_MODULE']->value) {
$_smarty_tpl->tpl_vars['SECONDARY_MODULE']->do_else = false;
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECONDARY_MODULE']->value, 'BLOCK', false, 'BLOCK_LABEL');
$_smarty_tpl->tpl_vars['BLOCK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK']->value) {
$_smarty_tpl->tpl_vars['BLOCK']->do_else = false;
?>
            <optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
-<?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
'>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK']->value, 'FIELD_LABEL', false, 'FIELD_KEY');
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_KEY']->value => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('FIELD_INFO', explode(':',$_smarty_tpl->tpl_vars['FIELD_KEY']->value));?>
                    <?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'D' || $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'DT') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:Y"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_YEAR',$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:MY"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_MONTH',$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
</option>
                    <?php } elseif ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'I' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'N' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'NN') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
</option>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </optgroup>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>

<select id="datafields_element">
    <option value='count(*)'><?php echo vtranslate('LBL_RECORD_COUNT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CALCULATION_FIELDS']->value, 'CALCULATION_FIELDS_MODULE', false, 'CALCULATION_FIELDS_MODULE_LABEL');
$_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE_LABEL']->value => $_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->value) {
$_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->do_else = false;
?>
        <optgroup label="<?php echo vtranslate($_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE_LABEL']->value,$_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE_LABEL']->value);?>
">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->value, 'CALCULATION_FIELD_TRANSLATED_LABEL', false, 'CALCULATION_FIELD_KEY');
$_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CALCULATION_FIELD_KEY']->value => $_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->value) {
$_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['CALCULATION_FIELD_KEY']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->value;?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </optgroup>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select><?php }
}
