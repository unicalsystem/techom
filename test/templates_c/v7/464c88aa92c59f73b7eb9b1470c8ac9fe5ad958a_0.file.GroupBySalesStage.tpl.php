<?php
/* Smarty version 4.3.4, created on 2024-04-25 14:07:07
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Potentials/dashboards/GroupBySalesStage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_662a638b18fbf2_58844725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '464c88aa92c59f73b7eb9b1470c8ac9fe5ad958a' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Potentials/dashboards/GroupBySalesStage.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_662a638b18fbf2_58844725 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
	Vtiger_Funnel_Widget_Js('Vtiger_GroupedBySalesStage_Widget_Js',{},{});
<?php echo '</script'; ?>
>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['STYLES']->value, 'cssModel', false, 'index');
$_smarty_tpl->tpl_vars['cssModel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['cssModel']->value) {
$_smarty_tpl->tpl_vars['cssModel']->do_else = false;
?>
	<link rel="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getRel();?>
" href="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getHref();?>
" type="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getType();?>
" media="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getMedia();?>
" />
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SCRIPTS']->value, 'jsModel', false, 'index');
$_smarty_tpl->tpl_vars['jsModel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['jsModel']->value) {
$_smarty_tpl->tpl_vars['jsModel']->do_else = false;
?>
	<?php echo '<script'; ?>
 type="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getType();?>
" src="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getSrc();?>
"><?php echo '</script'; ?>
>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<div class="dashboardWidgetHeader">
    <div class="title clearfix">
        <div class="col-lg-4 dashboardTitle" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"><b><?php echo vtranslate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</b></div>
        
        <div class="userList col-lg-5">
            <div>
                <select class="widgetFilter select2" id="owner" name="owner" style='width:30%;margin-bottom:0px'>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['CURRENTUSER']->value->getId();?>
" ><?php echo vtranslate('LBL_MINE');?>
</option>
                    <option value="all"><?php echo vtranslate('LBL_ALL');?>
</option>
                    <?php $_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', $_smarty_tpl->tpl_vars['CURRENTUSER']->value->getAccessibleUsers());?>
                    <?php if (php7_count($_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value) > 1) {?>
                        <optgroup label="<?php echo vtranslate('LBL_USERS');?>
">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = false;
?>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['CURRENTUSER']->value->getId();
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['OWNER_ID']->value != $_prefixVariable1) {?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
</option>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </optgroup>
                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('ALL_ACTIVEGROUP_LIST', $_smarty_tpl->tpl_vars['CURRENTUSER']->value->getAccessibleGroups());?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value)) {?>
                        <optgroup label="<?php echo vtranslate('LBL_GROUPS');?>
">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
$_smarty_tpl->tpl_vars['OWNER_NAME']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </optgroup>
                    <?php }?>
                </select>
            </div>
    </div>

    </div>
</div>
<div class="dashboardWidgetContent">
	<?php $_smarty_tpl->_subTemplateRender(vtemplate_path("dashboards/DashBoardWidgetContents.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div>
<div class="widgeticons dashBoardWidgetFooter">
    <div class="filterContainer">
		<div class="row">
			<span class="col-lg-5">
				<span class="pull-right">
					<?php echo vtranslate('Expected Close Date',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 &nbsp; <?php echo vtranslate('LBL_BETWEEN',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>

				</span>
			</span>
			<span class="col-lg-7">
                <div class="input-daterange input-group dateRange widgetFilter" id="datepicker" name="expectedclosedate">
                    <input type="text" class="input-sm form-control" name="start" style="height:30px;"/>
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="end" style="height:30px;"/>
                </div>
			</span>
		</div>
	</div>
    <div class="footerIcons pull-right">
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("dashboards/DashboardFooterIcons.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('SETTING_EXIST'=>true), 0, true);
?>
    </div>
</div><?php }
}
