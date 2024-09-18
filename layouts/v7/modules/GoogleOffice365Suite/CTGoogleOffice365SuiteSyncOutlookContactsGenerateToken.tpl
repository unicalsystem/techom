  {*<!--
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
-->*}
<div id="listViewPageDiv">
<div class="listViewTopMenuDiv">
   	 <div class="col-md-12">
        <div class="col-md-6">
            <h3>{vtranslate('LBL_OUTLOOK_CONTACTS_SETTINGS', $MODULE)}</h3>
        </div>
        <div class="m-20" style="display: flex; justify-content: flex-end;">
            <button class="btn btn-success br-3 mr-5" id="homePage">{vtranslate('LBL_HOME', $MODULE)}</button>
            <button class="btn btn-success br-3 mr-5 revokeToken" id="outlook365Logout">{vtranslate('LBL_REVOKE_ACCESS', $MODULE)}</button>
            <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" class="btn btn-success br-3 mr-5"  target="_blank">
            {vtranslate('LBL_HELP', $MODULE)}
            </a>
        </div>
    </div>
   
    <div class="clearfix"></div>
    {if $USER_EMAIL_ID neq ''}
    <div class="">
             <span class="dt-custom"><b>{vtranslate('LBL_CONNECTED', $MODULE)}</b></span>
             <a href="#" class="dt-custom text-primary"><span><b>{$USER_EMAIL_ID}</b></span></a>
    </div>
    {/if}

    <div>
    	<input type="hidden" name="selectedModule" id="selectedModule" value="{$sourcemodule}"	/>
    	<input type="hidden" name="redirectUrl" id="redirectUrl" value="{$REDIRECTURL}"	/>
    	<input type="hidden" name="isAdminUsers" id="isAdminUsers" value="{$IS_ADMIN_USER}" />
    	<button class="btn btn-success br-3 mr-5 pull-right" id="saveOutlookContactConfiguration2" style="margin-right: 34px;">{vtranslate('LBL_SAVE_AND_NEXT', $MODULE)}</button>
    	
	        <input type="hidden" name="userId" id="userId" value="{$USER_ID}"	/>
	        <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
	            <tr>
	                <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	                    <div align=center>
	                        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
	                            <tr>
	                                <td class="padTab" align="left">
	                                    <form method="post" name="syncGoogleCalendarSetting" id="syncGoogleCalendarSetting">
	                                        <table border=0 cellspacing=0 cellpadding=2 width="100%"%>
	                                            <tr>
	                                                <td align="left">
	                                                    <table width=100%>
	                                                        <tr>
	                                                            <td class="detailedViewHeader" colspan="3">
	                                                                <b>{vtranslate('LBL_OUTLOOK_TO_VTIGER_SETTINGS', $MODULE)}</b>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td colspan="3" align="left">&nbsp;
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td colspan="2">
	                                                                {vtranslate('LBL_IF_CONTACTS_IS_DELETED_FROM_OUTLOOK_THEN', $MODULE)}
	                                                            </td>
	                                                            <td width="40%">
	                                                                <select class="select2" name="deletedFromOutlook" style="width:100%;">
	                                                                <option value="1" {if $DELETEDFROMOUTLOOK eq 1}selected{/if}>{vtranslate('LBL_DELETE_CONTACTS_FROM_VTIGER', $MODULE)}</option>
	                                                                <option value="0" {if $DELETEDFROMOUTLOOK eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_CONTACTS_FROM_VTIGER', $MODULE)}</option>
	                                                                </select>
	                                                            </td>
	                                                        </tr>
	                                                    </table>
	                                                </td>
	                                            </tr>
	                                            <tr>
	                                            	<td align="left">
	                                                  	<table width=100%>
	                                                  		<tr>
	                                                            <td colspan="3" align="left">{$DST_MSG}
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td colspan="3" align="left">&nbsp;
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="detailedViewHeader" colspan="3">
	                                                                <b>{vtranslate('LBL_VTIGER_TO_OUTLOOK_SETTINGS', $MODULE)}</b>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td colspan="3" align="left">&nbsp;
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td colspan="2">
	                                                                {vtranslate('LBL_IF_CONTACTS_IS_DELETED_FROM_VTIGER_THEN', $MODULE)}
	                                                            </td>
	                                                            <td width="40%">
	                                                                <select class="select2" name="deletedFromVtiger" style="width:100%;">
	                                                                <option value="1" {if $DELETEDFROMVTIGER eq 1}selected{/if}>{vtranslate('LBL_DELETE_CONTACTS_FROM_OUTLOOK', $MODULE)}</option>
	                                                                <option value="0" {if $DELETEDFROMVTIGER eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_CONTACTS_FROM_OUTLOOK', $MODULE)}</option>
	                                                                </select>
	                                                            </td>
	                                                        </tr>
	                                                    </table>
	                                                </td>
	                                            </tr>
	                                        </table>
	                                        <br><br>
	                                        <table border=0 cellspacing=0 cellpadding=2 width=100% bgcolor="#FFFFFF">
	                                            <tr>
	                                                <td class="detailedViewHeader">
	                                                    <b>{vtranslate('LBL_SELECT_WHICH_OUTLOOK_CONTACTS_TO_SYNC_WITH_VTIGER', $MODULE)}</b> <span class="redColor">*</span>
	                                                </td>
	                                            </tr>
	                                            <tr>
	                                                <td valign=top>
	                                                    <table border=0 cellspacing=0 cellpadding=2 width=100%>
	                                                    	<br>
	                                                        <tr>
	                                                            <td width=40% align=center valign="middle" height="100%">
	                                                            	<input type="hidden" name="contactsGroupLimit" id="contactsGroupLimit" value="{$SELECTED_CONTACTS_LIMIT}">
	                                                                <select name="availableContactsGroups" id="availableContactsGroups" class="small" size=5 style="margin:0;width:95%;height:100%;">
	                                                                    {foreach from=$CONTACTSGROUPDATA item=val key=email}
	                                                                    	<option value="{$email}">{$val}</option>
	                                                                    {/foreach}
	                                                                </select>
	                                                            </td>
	                                                            <td width=20% align=center valign="middle">
	                                                                <input id="addContactsGroup" type=button value="{vtranslate('LBL_ADD', $MODULE)} >>" class="btn btn-success" style="color:#FFFFFF ! important;width:100%;font-size:11px !important;font-weight: bold;"><br><br>
	                                                                <input id="removeContactsGroup" type=button value="<< {vtranslate('LBL_REMOVE', $MODULE)} " class="btn btn-warning" style="color:#FFFFFF ! important;width:100%;font-size:11px !important;font-weight: bold;">
	                                                            </td>
	                                                            <td width=40% align=center valign="middle" height="100%">
	                                                                <select name="selectedContactsGroups" id="selectedContactsGroups" class=small size=5 style="margin:0; width:95%;height:100%;">
	                                                                    {foreach from=$CONTACTGROUPSELECTED item=val key=email}
		                                                                    {if $val neq ''}
		                                                                    	<option value="{$email}">{$val}</option>
		                                                                    {/if}
	                                                                    {/foreach}
	                                                                </select>
	                                                            </td>
	                                                        </tr>
	                                                        {if $IS_ADMIN eq 'on'}
	                                                        	<tr>
		                                                            <td colspan="3">&nbsp;</td>
		                                                        </tr>
	                                                        	<tr>
																	<td colspan="3">
																		<b>{vtranslate('LBL_PLEASE_CONTACTS_ADD_USERS_TEXT', $MODULE)}.</b> <span class="redColor">*</span>
																	</td>
																</tr>
		                                                        <tr>
		                                                            <td colspan="3">&nbsp;</td>
		                                                        </tr>
		                                                        <tr>
		                                                        	<input type="hidden" name="selectedUsersValue" id="selectedUsersValue" value="">
																	<input type="hidden" name="userLimit" id="userLimit" value="{$USER_LIMIT}">
																	<td width=40% align=center valign="middle" height="100%">
																		<select style="margin:0;width:95%;height:100%;" size="5" class="small" id="availableUsers" name="availableUsers[]" multiple> 
																			{foreach from=$AVAILABLE_USERS key=userId item=userName}
																				<option value="{$userId}">{$userName}</option>
																			{/foreach}
																		</select>
																	</td>
																	<td width=20% align=center valign="middle">
																		<input id="addVtigerUser" type="button" style="color:#FFFFFF ! important;width:100%;font-size:11px !important;font-weight: bold;" class="btn btn-success" value="{vtranslate('LBL_ADD', $MODULE)} >>"><br><br>
																		<input id="removeVtigerUser" type="button" style="color:#FFFFFF ! important;width:100%;font-size:11px !important;font-weight: bold;" class="btn btn-warning" value=" << {vtranslate('LBL_REMOVE', $MODULE)}">
																	</td>
																	<td width=40% align=center valign="middle" height="100%">
																		<select style="margin:0; width:95%;height:100%;" multiple="" size="5" class="small" id="selectedUsers" name="selectedUsers">
																			{foreach from=$SELECTED_USERS_OPTION key=userId item=userName}
																				<option value="{$userId}">{$userName}</option>
																			{/foreach}
																		</select>
																	</td>
																</tr>
																{/if}
	                                                    </table>
	                                                </td>
	                                            </tr>
	                                           
	                                        </table>
	                                        <br><br>
	                                        <table border=0 cellspacing=0 cellpadding=2 width="100%"%>
	                                            <tr>
	                                                <td align="left">
	                                                    <table width=100%>
	                                                        <tr>
	                                                            <td class="detailedViewHeader" colspan="3">
	                                                                <b>{vtranslate('LBL_CTOUTLOOK_CONTACTS_FIELD_MAPPING_CONFIGURATION', $MODULE)}</b>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td colspan="3" align="left">&nbsp;
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td colspan="2">
	                                                                {vtranslate('LBL_SELECT_MODULE', $MODULE)}&nbsp;<span class="redColor">*</span>
	                                                            </td>
	                                                            <td width="40%">
	                                                                <select class="select2" id ="sourceModuleName" name="sourceModuleName" style="width:100%;">
	                                                              	<option value="">{vtranslate('LBL_SELECT_AN_OPTION', $MODULE)}</option>
								                                    {foreach item=ALL_SOURCEMODULE_VALUE key=ALL_SOURCEMODULE_KEY from=$ALL_SOURCEMODULE}
								                                        {if $sourcemodule}
								                                            <option value="{$ALL_SOURCEMODULE_VALUE}" {if $sourcemodule eq $ALL_SOURCEMODULE_VALUE} selected="" {/if}>{vtranslate($ALL_SOURCEMODULE_VALUE, $ALL_SOURCEMODULE_VALUE)}</option>
								                                        {else}
								                                            <option value="{$ALL_SOURCEMODULE_VALUE}" {if $OUTLOOKEVENTSETTINGDATA['sourcemodulename'] eq $ALL_SOURCEMODULE_VALUE} selected="" {/if}>{vtranslate($ALL_SOURCEMODULE_VALUE, $ALL_SOURCEMODULE_VALUE)}</option>
								                                        {/if}
								                                    {/foreach}
	                                                            </td>
	                                                        </tr>
	                                                    </table>
	                                                </td>
	                                            </tr>
	                                            <tr>
	                                                <td align="left">
	                                                    <div id="moduleFilters">
	                                                    	<input type="hidden" id="selectedModuleFilter" value="{$SELECTEDFILTER}">
	            										</div>
	                                                </td>
	                                            </tr>
	                                            
	                                        </table>
							                <div id="mappingCondition">
							                {if $sourcemodule neq ''}
		                                        <div class="customLoader" style="opacity: 0.5;
		                                        background-color: white;
		                                        z-index: 100000;
		                                        top: 0px;
		                                        width: 100%;
		                                        height: 100%;
		                                        margin-top: 5%;"><div style="text-align:center;top:50%;left:40%;"><img src="layouts/v7/skins/images/loading.gif"></div></div>
		                                        {/if}
		            						</div>
		            						<br>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center" colspan="3">
                                                    <input class="btn btn-success saveBtn w-100-btn br-3" type="button" name="button" id="saveOutlookContactConfiguration2" value="{vtranslate('LBL_SAVE_AND_NEXT', $QUALIFIED_MODULE)}">
                                                    <!-- <a class='cancelLink' href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a> -->
                                                </td>
                                            </tr>
	                                    </form>
	                                </td>
	                            </tr>
	                        </table> 
	                    </div>
	                </td>
	            </tr>
	        </table>
    </div>
</div>