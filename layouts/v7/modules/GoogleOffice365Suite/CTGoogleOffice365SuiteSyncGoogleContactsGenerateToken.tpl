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
    		<h3>{vtranslate('LBL_GOOGLE_CONTACTS_SETTINGS', $QUALIFIED_MODULE)}</h3>
    	</div>
    	<div class="col-md-6 text-right mt-15">
    	    <a href="index.php?module=GoogleOffice365Suite&view=List" class="btn btn-success br-3 mr-5">{vtranslate('LBL_HOME', $MODULE)}</a>

            <button class="btn btn-success mr-5 br-3" id="saveGoogleCalendarLogout">{vtranslate('LBL_REVOKE_ACCESS', $MODULE)}</button>
            
            <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" target="_blank" class="btn btn-success mr-5 br-3">
            {vtranslate('LBL_HELP', $MODULE)}
            </a>
    	</div>
    	<hr>
   	</div>
    <div class="clearfix"></div>
    {if $GOOGLE_USEREMAIL neq ''}
	    <div class="">
	             <span class="dt-custom"><b>{vtranslate('LBL_CONNECTED', $MODULE)}</b></span>
	             <a href="#" class="dt-custom text-primary"><span><b>{$GOOGLE_USEREMAIL}</b></span></a>
	    </div>
    {/if}
    <div>
    	<input type="hidden" name="userId" id="userId" value="{$USER_ID}"/>
        <input type="hidden" name="isAdmin" id="isAdmin" value="{$IS_ADMIN}">
        <button class="btn btn-success pull-right contactBackBtn br-3" id="saveGoogleCalendarConfiguration2">{vtranslate('LBL_SAVE_AND_NEXT', $MODULE)}</button>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="contactsSettingspage">
            <tr>
                <td class="showPanelBg" id="showPanelBg" valign="top">
                    <div align=center>
                        <table class="mainContactsSettings" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="padTab" align="left">
                                    <form method="post" name="syncGoogleCalendarSetting" id="syncGoogleCalendarSetting">
                                        <input type="hidden" name="userId" id="userId" value="{$USER_ID}"/>
                                        <table border=0 cellspacing=0 cellpadding=0 width=98% align=center>
                                            <tr>
                                                <td>&nbsp;
                                                </td>
                                            </tr>
                                        </table>
                                        <table border=0 cellspacing=0 cellpadding=2 width="100%"%>
                                            <tr>
                                                <td align="left">
                                                    <table class="mainContactsSettings">
                                                        <tr>
                                                            <td class="detailedViewHeader" colspan="3">
                                                                <b>{vtranslate('LBL_GOOGLE_TO_VTIGER_SETTINGS', $QUALIFIED_MODULE)}</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" align="left">&nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                {vtranslate('LBL_IF_CONTACTS_IS_DELETED_FROM_GOOGLE_THEN', $QUALIFIED_MODULE)}
                                                            </td>
                                                            <td width="40%">
                                                                <select class="select2 mainContactsSettings" name="deletedFromGoogle">
                                                                <option value="1" {if $DELETEDFROMGOOGLE eq 1}selected{/if}>{vtranslate('LBL_DELETE_CONTACTS_FROM_VTIGER', $QUALIFIED_MODULE)}</option>
                                                                <option value="0" {if $DELETEDFROMGOOGLE eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_CONTACTS_FROM_VTIGER', $QUALIFIED_MODULE)}</option>
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
                                                            <td colspan="3" align="left">&nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="detailedViewHeader" colspan="3">
                                                                <b>{vtranslate('LBL_VTIGER_TO_GOOGLE_SETTINGS', $QUALIFIED_MODULE)}</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" align="left">&nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                {vtranslate('LBL_IF_CONTACTS_IS_DELETED_FROM_VTIGER_THEN', $QUALIFIED_MODULE)}
                                                            </td>
                                                            <td width="40%">
                                                                <select class="select2 mainContactsSettings" name="deletedFromVtiger">
                                                                <option value="1" {if $DELETEDFROMVTIGER eq 1}selected{/if}>{vtranslate('LBL_DELETE_CONTACTS_FROM_GOOGLE', $QUALIFIED_MODULE)}</option>
                                                                <option value="0" {if $DELETEDFROMVTIGER eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_CONTACTS_FROM_GOOGLE', $QUALIFIED_MODULE)}</option>
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
                                                    <b>{vtranslate('LBL_SELECT_WHICH_GOOGLE_CONTACTS_TO_SYNC_WITH_VTIGER', $QUALIFIED_MODULE)}</b> <span class="redColor">*</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=top>
                                                    <table border=0 cellspacing=0 cellpadding=2 width=100%>
                                                        <tr>
                                                            <td colspan="3">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width=40% align=center valign="middle" height="100%">
                                                            	<input type="hidden" name="calendarLimit" id="calendarLimit" value="{$CONTACTLIMIT}">
                                                                <select name="availableCalendar" id="availableCalendar" class="small availableCalendar" size=5>
                                                                    {foreach from=$CONTACTSGROUPDATA item=val key=email}
                                                                    	<option value="{$email}">{$val}</option>
                                                                    {/foreach}
                                                                </select>
                                                            </td>
                                                            <td width=20% align=center valign="middle">
                                                                <input id="addCalendar" type=button value="{vtranslate('LBL_ADD', $QUALIFIED_MODULE)} >>" class="btn btn-success addGroup br-3"><br><br>
                                                                <input id="removeCalendar" type=button value="<< {vtranslate('LBL_REMOVE', $QUALIFIED_MODULE)} " class="btn btn-warning addGroup br-3">
                                                            </td>
                                                            <td width=40% align=center valign="middle" height="100%">
                                                                <select name="selectedCalendar" id="selectedCalendar" class=small size=5>
                                                                    {foreach from=$CONTACTGROUPSELECTED item=val key=email}
                                                                    	{assign var=SELECTEDCONTACTGRUP value = $email}
	                                                                    <option value="{$email}">{$val}</option>
                                                                    {/foreach}
                                                                </select>
                                                            	<input type="hidden" name="selectCalendar" id="selectCalendar" value="{$SELECTEDCONTACTGRUP}">
                                                            </td>
                                                        </tr>
                                                        {if $IS_ADMIN eq 'on'}
                                                        	<tr>
	                                                            <td colspan="3">&nbsp;</td>
	                                                        </tr>
                                                        	<tr>
																<td colspan="3">
																	<b>{vtranslate('LBL_PLEASE_ADD_USERS_TEXT_FOR_CONTACTS', $QUALIFIED_MODULE)}.</b> <span class="redColor">*</span>
																</td>
															</tr>
	                                                        <tr>
	                                                            <td colspan="3">&nbsp;</td>
	                                                        </tr>
	                                                        <tr>
	                                                        	<input type="hidden" name="selectedUsersValue" id="selectedUsersValue" value="">
																<input type="hidden" name="userLimit" id="userLimit" value="{$USER_LIMIT}">
																<td width=40% align=center valign="middle" height="100%">
																	<select multiple="" size="5" class="small availableCalendar" id="availableUsers" name="availableUsers">
																		{foreach from=$AVAILABLE_USERS key=userId item=userName}
																			<option value="{$userId}">{$userName}</option>
																		{/foreach}
																	</select>
																</td>
																<td width=20% align=center valign="middle">
																	<input id="addVtigerUser" type="button" class="btn btn-success addGroup br-3" value="{vtranslate('LBL_ADD', $QUALIFIED_MODULE)} >>"><br><br>
																	<input id="removeVtigerUser" type="button" class="btn btn-warning addGroup br-3" value=" << {vtranslate('LBL_REMOVE', $QUALIFIED_MODULE)}">
																</td>
																<td width=40% align=center valign="middle" height="100%">
																	<select multiple="" size="5" class="small availableCalendar" id="selectedUsers" name="selectedUsers">
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
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <br><br>
                                    <table border=0 cellspacing=0 cellpadding=2 width="100%"%>
                                        <tr>
                                            <td align="left">
                                                <table width=100%>
                                                    <tr>
                                                        <td class="detailedViewHeader" colspan="3">
                                                            <b>{vtranslate('LBL_CTGOOGLE_CONTACTS_FIELD_MAPPING_CONFIGURATION', $MODULE)}</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="left">&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_SELECT_MODULE', $MODULE)} <span class="redColor">*</span>
                                                        </td>
                                                        <td width="40%">
                                                            <select class="select2 mainContactsSettings" id ="sourceModuleName" name="sourceModuleName" data-rule-required="true" aria-required="true">
                                                          	<option value="none">{vtranslate('LBL_SELECT_AN_OPTION', $MODULE)}</option>
						                                   {foreach item=VALUE key=KEY from=$MODULEDATA}
						                                            <option value="{$VALUE}" {if $SELECTEDMODULE eq $VALUE} selected="" {/if}>{vtranslate($VALUE, $VALUE)}</option>
						                                    {/foreach}
						                                    </select>
						                                    <input type="hidden" id="selectedSourceModule" value="{$SELECTEDMODULE}">	
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <div id="moduleFilters">
        										</div>
        										<input type="hidden" id="selectedModuleFilter" value="{$SELECTEDFILTER}">
                                            </td>
                                        </tr>
                                        
                                    </table>
					                <div id="mappingCondition">
                                        {if $SELECTEDMODULE neq ''}
                                        <div class="customLoader" style="opacity: 0.5;
                                        background-color: white;
                                        z-index: 100000;
                                        top: 0px;
                                        width: 100%;
                                        height: 100%;
                                        margin-top: 5%;"><div style="text-align:center;top:50%;left:40%;"><img src="layouts/v7/skins/images/loading.gif"></div></div>
                                        {/if}
            						</div>
            						<br><br>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center" colspan="3">
                                                    <input class="btn btn-success saveBtn w-100-btn br-3" type="button" name="button" id="saveGoogleCalendarConfiguration" value="{vtranslate('LBL_SAVE_AND_NEXT', $QUALIFIED_MODULE)}">
                                                    <!-- <a class='cancelLink' href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a> -->
                                                </td>
                                            </tr>
                                        </table>
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