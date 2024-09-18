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
            <h3>{vtranslate('LBL_OUTLOOK_EVENTS_SETTINGS', $MODULE)}</h3>
        </div>
        <div class="m-20" style="display: flex; justify-content: flex-end;">
            <button class="btn btn-success br-3 mr-5" id="homePage">{vtranslate('LBL_HOME', $MODULE)}</button>
            <button class="btn btn-success br-3 mr-5 revokeToken" id="outlook365Logout" > {vtranslate('LBL_REVOKE_ACCESS', $MODULE)}</button>
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
        <input type="hidden" name="selectedModule" id="selectedModule" value="{$sourcemodule}"  />
        <input type="hidden" name="userId" id="userId" value="{$USER_ID}"   />
        <button class="btn btn-success br-3 mr-5 pull-right" id="saveOutlookEventsConfiguration2" style="margin-right: 34px;"" >{vtranslate('LBL_SAVE_AND_NEXT', $MODULE)}</button>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
            <tr>
                <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
                    <div align=center>
                        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="padTab" align="left">
                                    <form method="post" name="syncGoogleCalendarSetting" id="syncGoogleCalendarSetting">
                                        <input type="hidden" name="primaryCalendarValue" id="primaryCalendarValue" value="{$CALENDAR_PRIMARY}" />
                                        <input type="hidden" name="dateFormat" id="dateFormat" value="{$DATE_FORMAT}" />
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
                                                            {vtranslate('LBL_CREATE_VTIGER_EVENTS_AS', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <select class="select2" name="eventType" style="width:100%;">
                                                            {foreach key=k item=v from=$EVENTSETTINGS['eventTypeData']}
                                                                <option {if $EVENTSETTINGSDATA['eventType'] eq $k}selected="selected"{/if} value="{$v}">{$v}</option>
                                                            {/foreach}
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_DEFAULT_PRIORITY_OF_VTIGER_EVENT', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <select class="select2" name="defaultStatus" style="width:100%;">
                                                            {foreach key=k item=v from=$EVENTSETTINGS['taskPriorityData']}
                                                                <option {if $EVENTSETTINGSDATA['defaultStatus'] eq $k}selected="selected"{/if} value="{$v}">{$v}</option>
                                                            {/foreach}
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_IF_START_TIME_IS_IN_THE_PAST_MAKE_THE_EVENT_STATUS', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <select class="select2" name="startTimePast" style="width:100%;">
                                                            {foreach key=k item=v from=$EVENTSETTINGS['eventStatusData']}
                                                                <option {if $EVENTSETTINGSDATA['stPastEvent'] eq $k}selected="selected"{/if} value="{$v}">{$v}</option>
                                                            {/foreach}
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_IF_START_TIME_IS_IN_THE_FUTURE_MAKE_THE_EVENT_STATUS', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <select class="select2" name="startTimeFuture" style="width:100%;">
                                                            {foreach key=k item=v from=$EVENTSETTINGS['eventStatusData']}
                                                                {if $v neq 'Held'}
                                                                    <option {if $EVENTSETTINGSDATA['stFutureEvent'] eq $k}selected="selected"{/if} value="{$v}">{$v}</option>
                                                                {/if}
                                                            {/foreach}
                                                            </select>
                                                        </td>
                                                    </tr>

                                                        <tr>
                                                            <td colspan="2">
                                                                {vtranslate('LBL_IF_EVENTS_IS_DELETED_FROM_OUTLOOK_THEN', $MODULE)}
                                                            </td>
                                                            <td width="40%">
                                                                <select class="select2" name="deletedFromOutlook" style="width:100%;">
                                                                    <option value="1" {if $DELETEDFROMOUTLOOK eq 1}selected{/if}>{vtranslate('LBL_DELETE_EVENTS_FROM_VTIGER', $MODULE)}</option>
                                                                    <option value="0" {if $DELETEDFROMOUTLOOK eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_EVENTS_FROM_VTIGER', $MODULE)}</option>
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
                                                                {vtranslate('LBL_IF_EVENTS_IS_DELETED_FROM_VTIGER_THEN', $MODULE)}
                                                            </td>
                                                            <td width="40%">
                                                                <select class="select2" name="deletedFromVtiger" style="width:100%;">
                                                                    <option value="1" {if $DELETEDFROMVTIGER eq 1}selected{/if}>{vtranslate('LBL_DELETE_EVENTS_FROM_OUTLOOK', $MODULE)}</option>
                                                                    <option value="0" {if $DELETEDFROMVTIGER eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_EVENTS_FROM_OUTLOOK', $MODULE)}</option>
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
                                                            <b>{vtranslate('LBL_SYNC_EVENTS_DATE_RANGE', $QUALIFIED_MODULE)}</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="left">&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_SYNC_EVENTS_FROM', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <div class="input-append row-fluid">
                                                                <div class="input-group inputElement" style="margin-bottom: 3px">
                                                                    <input id="fromDates" type="hidden" value="{$SYNC_FROM_DATE}" />
                                                                    <input id="syncFromDate" type="text" class="dateField form-control" name="syncFromDate" value="{$SYNC_FROM_DATE}" />
                                                                    <span class="input-group-addon"><i class="fa fa-calendar "></i></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_SYNC_EVENTS_TO', $QUALIFIED_MODULE)}
                                                            <span class="redColor">*</span>
                                                        </td>
                                                    
                                                        <td width="40%">
                                                            <select class="select2" name="syncToDate" id="syncToDate" style="width:100%;">
                                                                <option value="none">Select To Date</option>
                                                                {foreach from=$TO_DATE_WEEKLY_DROPDOWN item=val key=key}
                                                                    <option value="{$key}" {if $FROM_CURRENT_DATE eq $key}selected{/if}>{$val}</option>
                                                                {/foreach}
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_SYNC_EVENTS_TO', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <div class="input-append row-fluid">
                                                                <div class="input-group inputElement" style="margin-bottom: 3px">
                                                                    <input id="toDates" type="hidden" value="{$SYNC_TO_DATE}" />
                                                                    <input id="syncToDate" type="text" class="dateField form-control" name="syncToDate" value="{$SYNC_TO_DATE}" />
                                                                    <span class="input-group-addon"><i class="fa fa-calendar "></i></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr> -->
                                                </table>
                                            </td>
                                            </tr>
                                        </table>
                                        <br><br>
                                        <table border=0 cellspacing=0 cellpadding=2 width=100% bgcolor="#FFFFFF">
                                            <tr>
                                                <td class="detailedViewHeader">
                                                    <b>{vtranslate('LBL_SELECT_WHICH_OUTLOOK_EVENTS_TO_SYNC_WITH_VTIGER', $MODULE)}</b>
                                                    <span class="redColor">*</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="detailedViewHeader">
                                                    <b>{$OUTLOOK_DEFAULT_EVENTSNAME}</b>{vtranslate('LBL_INFORMATION', $MODULE)}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign=top>
                                                    <table border=0 cellspacing=0 cellpadding=2 width=100%>
                                                        <br>
                                                        <tr>
                                                            <td width=40% align=center valign="middle" height="100%">
                                                                <input type="hidden" name="calendarLimit" id="calendarLimit" value="{$SELECTED_CALENDAR_LIMIT}">
                                                                <select name="availableCalendar" id="availableCalendar" class="small" size=5 style="margin:0;width:95%;height:100%;">
                                                                    {foreach from=$EVENTSGROUPDATA item=val key=email}
                                                                        <option value="{$email}">{$val}</option>
                                                                    {/foreach}
                                                                </select>
                                                            </td>
                                                            <td width=20% align=center valign="middle">
                                                                <input id="addCalendar" type=button value="{vtranslate('LBL_ADD', $MODULE)} >>" class="btn btn-success" style="color:#FFFFFF ! important;width:100%;font-size:11px !important;font-weight: bold;"><br><br>
                                                                <input id="removeCalendar" type=button value="<< {vtranslate('LBL_REMOVE', $MODULE)} " class="btn btn-warning" style="color:#FFFFFF ! important;width:100%;font-size:11px !important;font-weight: bold;">
                                                            </td>
                                                            <td width=40% align=center valign="middle" height="100%">
                                                                <select name="selectedCalendar" id="selectedCalendar" class=small size=5 style="margin:0; width:95%;height:100%;">
                                                                    {foreach from=$EVENTSGROUPSELECTED item=val key=email}
                                                                    {assign var=SELECTEDCONTACTGRUP value = $email}
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
                                                                    <b>{vtranslate('LBL_PLEASE_EVENTS_ADD_USERS_TEXT', $MODULE)}.</b>
                                                                    <span class="redColor">*</span>
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
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" colspan="3">
                                                                <input class="btn btn-success saveBtn w-100-btn br-3" type="button" name="button" id="saveOutlookEventsConfiguration2" value="{vtranslate('LBL_SAVE_AND_NEXT', $QUALIFIED_MODULE)}">
                                                                <!-- <a class='cancelLink' href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a> -->
                                                            </td>
                                                        </tr>
                                                    </table>
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