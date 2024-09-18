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
            <h3>{vtranslate('LBL_GOOGLE_CALENDAR_SETTINGS', $QUALIFIED_MODULE)}</h3>
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
        <input type="hidden" name="isAdmin" id="isAdmin" value="{$IS_ADMIN}"   />
        <button class="btn btn-success pull-right contactBackBtn br-3" id="saveGoogleCalendarConfiguration2">{vtranslate('LBL_SAVE_AND_NEXT', $MODULE)}</button>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
            <tr>
                <td class="showPanelBg" id="showPanelBg" valign="top" width="100%">
                    <div align=center>
                        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="padTab" align="left">
                                    <form method="post" name="syncGoogleCalendarSetting" id="syncGoogleCalendarSetting">
                                    <input type="hidden" name="userId" id="userId" value="{$USER_ID}"/>
                                    <input type="hidden" name="selectedCalendarValue" id="selectedCalendarValue" value="" />
                                    <input type="hidden" name="primaryCalendarValue" id="primaryCalendarValue" value="{$CALENDAR_PRIMARY}" />
                                    <input type="hidden" name="googleUsersSelected" id="googleUsersSelected" value="" />
                                    <input type="hidden" name="dateFormat" id="dateFormat" value="{$DATE_FORMAT}" />
                                    <table border=0 cellspacing=0 cellpadding=0 width=98% align=center>
                                        <tr>
                                            <td>&nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                    <table border=0 cellspacing=0 cellpadding=2 width="100%"%>
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
                                                            <b>{vtranslate('LBL_GOOGLE_TO_VTIGER_SETTINGS', $QUALIFIED_MODULE)}</b>
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
                                                            <select class="select2 mainContactsSettings" name="eventType">
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
                                                            <select class="select2 mainContactsSettings" name="defaultStatus">
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
                                                            <select class="select2 mainContactsSettings" name="startTimePast">
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
                                                            <select class="select2 mainContactsSettings" name="startTimeFuture">
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
                                                            {vtranslate('LBL_IF_EVENT_IS_DELETED_FROM_GOOGLE_THEN', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <select class="select2 mainContactsSettings" name="deletedFromGoogle">
                                                            <option value="1" {if $EVENTSETTINGSDATA['deletedFromGoogle'] eq 1}selected{/if}>{vtranslate('LBL_DELETE_EVENT_FROM_VTIGER', $QUALIFIED_MODULE)}</option>
                                                            <option value="0" {if $EVENTSETTINGSDATA['deletedFromGoogle'] eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_EVENT_FROM_VTIGER', $QUALIFIED_MODULE)}</option>
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
                                                            <b>{vtranslate('LBL_VTIGER_TO_GOOGLE_SETTINGS', $QUALIFIED_MODULE)}</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="left">&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_IF_EVENT_IS_DELETED_FROM_VTIGER_THEN', $QUALIFIED_MODULE)}
                                                        </td>
                                                        <td width="40%">
                                                            <select class="select2 mainContactsSettings" name="deletedFromVtiger">
                                                            <option value="1" {if $EVENTSETTINGSDATA['deletedFromVtiger'] eq 1}selected{/if}>{vtranslate('LBL_DELETE_EVENT_FROM_GOOGLE', $QUALIFIED_MODULE)}</option>
                                                            <option value="0" {if $EVENTSETTINGSDATA['deletedFromVtiger'] eq 0}selected{/if}>{vtranslate('LBL_DO_NOT_DELETE_EVENT_FROM_GOOGLE', $QUALIFIED_MODULE)}</option>
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
                                                                <div class="input-group inputElement dateRange">
                                                                    <input id="fromDates" type="hidden" value="{$SYNC_FROM_DATE}" />
                                                                    <input id="syncFromDate" type="text" class="dateField form-control" name="syncFromDate" value="{$SYNC_FROM_DATE}" />
                                                                    <span class="input-group-addon"><i class="fa fa-calendar "></i></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td colspan="2">
                                                            {vtranslate('LBL_SYNC_EVENTS_TO', $QUALIFIED_MODULE)} <span style="color: red;">*</span>
                                                        </td>
                                                        <!-- {} -->
                                                        <td width="40%">
                                                            <select class="select2" name="syncToDate" id="syncToDate" style="width:100%;">
                                                                <option value="none">Select To Date</option>
                                                                {foreach from=$TO_DATE_WEEKLY_DROPDOWN item=val key=key}
                                                                    <option value="{$key}" {if $FROM_CURRENT_DATE eq $key}selected{/if}>{$val}</option>
                                                                {/foreach}
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
                                                <b>{vtranslate('LBL_SELECT_WHICH_GOOGLE_CALENDARS_TO_SYNC_WITH_VTIGER', $QUALIFIED_MODULE)}</b> <span class="redColor">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="detailedViewHeader">
                                                {foreach from=$EVENTSETTINGS['googleCalendarListData']['reader'] item=val key=email name=smartyloop}
                                                    {if $smarty.foreach.smartyloop.iteration eq 1}
                                                        <b>{$val}</b>
                                                    {else}
                                                        <b>, {$val}</b>
                                                    {/if}
                                                {/foreach}
                                                {vtranslate('LBL_CALENDAR_DOES_NOT_HAVE_WRITER_ACCESS', $QUALIFIED_MODULE)}
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
                                                            <input type="hidden" name="calendarLimit" id="calendarLimit" value="{count($EVENTSETTINGS['calendarSettings'])}">
                                                            <input type="hidden" name="selectCalendar" id="selectCalendar" value="">
                                                            <select name="availableCalendar" id="availableCalendar" class="small availableCalendar" size=5>
                                                                {foreach from=$LIST_GOOGLE_CALENDAR item=val key=email}
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
                                                                {foreach from=$EVENTSETTINGS['calendarSettings'] item=val key=email}
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
                                                                <b>{vtranslate('LBL_PLEASE_ADD_USERS_TEXT_FOR_CALENDAR', $QUALIFIED_MODULE)}.</b> <span class="redColor">*</span>
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
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="3">
                                                <input class="btn btn-success saveBtn w-100-btn br-3" type="button" name="button" id="saveGoogleCalendarConfiguration" value="{vtranslate('LBL_SAVE_AND_NEXT', $MODULE)}">
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