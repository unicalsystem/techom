{*<!--
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
-->*}
<div class="col-sm-12 col-xs-12 ">
    <br>
    <input type='hidden' name="pageNumber" id='pageNumber' value="{$PAGE_START}">
    <input type="hidden" name="totalCount" id="totalCount" value="{$RECORD_COUNT}" />
    <input type='hidden' name="pageLimit" id='pageLimit' value="{$PAGE_END}">
    <input type="hidden" name="noOfEntries" id="noOfEntries" value="{$PAGE_END}">
    <input type="hidden" name="nextPageExist" id="nextPageExist" value="{$NEXT_PAGE_EXIST}" />
    <div id="listview-actions" class="listview-actions-container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-sm-5"></div>
            <div class="col-sm-3">
                <div class="listViewActions">
                    <div class="btn-group pull-right">
                        <button type="button" id="PreviousPageButton" class="btn btn-default" {if $PAGE_START eq 1} disabled {/if}><i class="fa fa-caret-left"></i></button>
                            <button type="button" id="PageJump" data-toggle="dropdown" class="btn btn-default">
                                <i class="fa fa-ellipsis-h icon" title="{vtranslate('LBL_LISTVIEW_PAGE_JUMP', $moduleName)}"></i>
                            </button>
                            <ul class="dropdown-menu" id="PageJumpDropDown">
                                <li>
                                    <div class="listview-pagenum">
                                        <span >{vtranslate('LBL_PAGE', $moduleName)}</span>&nbsp;
                                        <strong><span>{$PAGE_START}</span></strong>&nbsp;
                                        <span >{vtranslate('LBL_OF', $moduleName)}</span>&nbsp;
                                        <strong><span id="totalPageCount">{$TOTAL_PAGES}</span></strong>
                                    </div>
                                    <div class="listview-pagejump">
                                        <input type="text" id="pageToJump" placeholder="{vtranslate('LBL_LISTVIEW_JUMP_TO',$moduleName)}" class="{$CLASS_VIEW_PAGING_INPUT} text-center"/>&nbsp;
                                        <button type="button" id="pageToJumpSubmit" class="btn btn-success {$CLASS_VIEW_PAGING_INPUT_SUBMIT} text-center">{'GO'}</button>
                                    </div>    
                                </li>
                            </ul>
                      <button type="button" id="NextPageButton" class="btn btn-default" {if $TOTAL_PAGES eq $PAGE_START}disabled{/if}><i class="fa fa-caret-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button onclick='window.location.href = "index.php?module=CTGoogleCalendar&view=CTGoogleCalendarSyncData"' class="btn btn-success" style="margin-right: -20px;">{vtranslate('LBL_BACK', $MODULE)}</button>
                    </div>
                    <span class="pageNumbers pull-right" style="position:relative;top:7px;">
                        <span class="pageNumbersText">
                            {if $RECORD_COUNT}{$START_RANGE} {vtranslate('LBL_TO', $MODULE)} {$END_RANGE}{else}
                            {/if}
                        </span>
                        &nbsp;<span class="totalNumberOfRecords cursorPointer{if !$RECORD_COUNT} hide{/if}" title="{vtranslate('LBL_SHOW_TOTAL_NUMBER_OF_RECORDS', $MODULE)}">{vtranslate('LBL_OF', $MODULE)} <i class="fa fa-question showTotalCountIcon"></i></span>&nbsp;&nbsp;
                    </span>
                </div>
            </div>
        </div>
    </div>
    <table border=0 cellspacing=0 cellpadding=0 width=98% align=center>
        <tr>
            <td class="showPanelBg" valign="top" width=100% style="padding:10px;">
                <div id="searchAcc" style="display: block;position:relative;">
                    <form name="basicSearch">
                        <table width="100%" cellspacing="0" class="table listview-table" align="center" border=0 style="border-collapse: collapse; border: 0px none rgb(51, 51, 51); display: table; margin: 0px; table-layout: fixed; width: 100%;">
                            <tr class="listViewContentHeader">
                                <td nowrap align=right><b>{vtranslate('LBL_SEARCH_FOR', $QUALIFIED_MODULE)}</b></td>
                                <td><input type="text" class="inputElement nameField" style="width:120px" name="search_text"></td>
                                <td nowrap><b>{vtranslate('LBL_IN', $QUALIFIED_MODULE)}</b>&nbsp;</td>
                                <td nowrap>
                                    <div id="basicsearchcolumns_real">
                                        <select name="search_field" id="bas_searchfield" class="select2" style="width:150px">
                                            <option value="subject">{vtranslate('LBL_FULL_NAME', $QUALIFIED_MODULE)}</option>
                                            <option value="createdtime">{vtranslate('LBL_CREATED_TIME', $QUALIFIED_MODULE)}</option>
                                            <option value="modifiedtime">{vtranslate('LBL_MODIFIED_TIME', $QUALIFIED_MODULE)}</option>
                                            <option value="last_sync_to_google">{vtranslate('LBL_LAST_SYNC_TIME_GOOGLE', $QUALIFIED_MODULE)}</option>
                                            <option value="google_event_id">{vtranslate('LBL_GOOGLE_ID', $QUALIFIED_MODULE)}</option>
                                            <option value="sync_result">{vtranslate('LBL_SYNC_RESULT', $QUALIFIED_MODULE)}</option>
                                            <option value="comments">{vtranslate('LBL_COMMENTS', $QUALIFIED_MODULE)}</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="searchtype" value="BasicSearch">
                                    <input type="hidden" name="module" value="CTGoogleCalendar">
                                    <input type="hidden" name="view" value="CTGoogleCalendarLog">
                                    <input type="hidden" name="query" value="true">
                                </td>
                                <td nowrap width=20% >
                                    <input name="submit" type="submit" class="btn btn-default module-buttons" value="{vtranslate('LBL_SEARCH', $QUALIFIED_MODULE)}">&nbsp;
                                </td>
                                <td nowrap>
                                    <input name="reset" type="button" class="btn btn-default module-buttons" value="{vtranslate('LBL_RESET', $QUALIFIED_MODULE)}" onclick='window.location.href="{$LOG_URL}"'>&nbsp;
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br>
                </div>
                {*<!-- Searching UI -->*}
                <!-- PUBLIC CONTENTS STARTS-->
                <div id="ListViewContents" class="floatThead-wrapper" style="position: relative; clear:both;">
                    <div class="table-container ps-container ps-active-y" style="position: relative;width: 100%;">
                        <table class="table listview-table" style="table-layout: fixed;height: 100%;">
                            <!-- Table Headers -->
                            <thead>
                                <th class="floatThead-col">{vtranslate('LBL_SUBJECT', $QUALIFIED_MODULE)}</th>
                                <th class="floatThead-col">{vtranslate('LBL_CREATED_TIME', $QUALIFIED_MODULE)}</th>
                                <th class="floatThead-col">{vtranslate('LBL_MODIFIED_TIME', $QUALIFIED_MODULE)}</th>
                                <th class="floatThead-col">{vtranslate('LBL_LAST_SYNC_TIME_GOOGLE', $QUALIFIED_MODULE)}</th>
                                <th class="floatThead-col">{vtranslate('LBL_GOOGLE_ID', $QUALIFIED_MODULE)}</th>
                                <th class="floatThead-col">{vtranslate('LBL_SYNC_RESULT', $QUALIFIED_MODULE)}</th>
                                <th class="floatThead-col">{vtranslate('LBL_COMMENTS', $QUALIFIED_MODULE)}</th>
                            </thead>
                            <!-- Table Contents -->
                            {if $EVENT_LOGS|@count gt 0}
    	                        {foreach item=data key=entity_id from=$EVENT_LOGS}
    		                        <tr class="listViewEntries" bgcolor=white onMouseOver="this.className='lvtColDataHover'" onMouseOut="this.className='lvtColData'" id="row_{$entity_id}">
    		                            <td ><a style="color:#15c;" target="_blank" href="{$EVENT_URL}{$entity_id}">{$data.subject}</a></td>
    		                            <td >{$data.createdtime}</td>
    		                            <td >{$data.modifiedtime}</td>
    		                            <td >{$data.vtiger_updated}</td>
    		                            <td >{$data.gc_event_id}</td>
    		                            <td >{$data.sync_result}</td>
    		                            <td >{$data.comments}</td>
    		                        </tr>
    	                        {/foreach}
                            {else}
    	                        <tr class="emptyRecordsDiv">
    	                            <td style="border-bottom: 1px solid rgb(204, 204, 204);" colspan="10">
                                        <center>
                                            <span class="genHeader">
        	                                   {vtranslate('LBL_NO_RECORDS_FOUND', $QUALIFIED_MODULE)}
        	                                </span>
                                        </center>
    	                            </td>
    	                        </tr>
                            {/if}
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
