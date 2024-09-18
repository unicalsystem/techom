{*<!--
/***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
-->*}
<div id="listViewPageDiv">
<div class="listViewTopMenuDiv">
    <div class="col-md-12">
        <div class="col-md-6">
            <h3>{vtranslate('LBL_SYNC_GOOGLE_CALENDAR', $QUALIFIED_MODULE)}</h3>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-success mt-15 mr-5" id="saveGoogleCalendarLogout">{vtranslate('LBL_LOGOUT', $MODULE)}</button>
            <button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleCalendarGenerateToken"' class="btn btn-success contactBackBtn mt-15 mr-5">{vtranslate('LBL_GOOGLE_CALENDAR_SETTING', $QUALIFIED_MODULE)}</button>

            <button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=List"' class="btn btn-success contactBackBtn mt-15"><i class="fa fa-home"></i></button>
        </div>
    </div>
    <hr>
    <div class="clearfix"></div>
    <div>
        <input type="hidden" name="userId" id="userId" value="{$USER_ID}"/>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
            <tr>
                <td class="showPanelBg" valign="top" width="100%">
                    <div align=center>
                        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="padTab" align="left">
                                    <table border=0 cellspacing=0 cellpadding=0 width=98% align=center>
                                        <tr>
                                            <td colspan="3" class="detailedViewHeader">
                                                <b>{vtranslate('LBL_TRIGER_THE_SYNC_MANUALLY', $QUALIFIED_MODULE)}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="left">&nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="left">
                                                <input type="button" id="syncFromGoogle" value="{vtranslate('LBL_SYNC_FROM_GOOGLE', $QUALIFIED_MODULE)}" class="btn btn-primary syncGoogleData">

                                                <input type="button" id="syncFromVtiger" value="{vtranslate('LBL_SYNC_TO_GOOGLE', $QUALIFIED_MODULE)}" class="btn btn-primary syncGoogleData">

                                                 <input name="reset" type="button" class="btn btn-primary" value="{vtranslate('LBL_VIEW_SYNC_LOGS', $QUALIFIED_MODULE)}" onclick='window.location.href="{$GOOGLECONTACTSLOG}"'>&nbsp;
                                            </td>
                                            <td align="right">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <b>{vtranslate('LBL_BATCH_SIZE', $QUALIFIED_MODULE)}</b>
                                                <input type="hidden" name="batchs" id="batchs">
                                                <input type="number" class="inputElement batch" name="batch" id="batch" value="{$CALENDARBATCH}" max="100" min="1" oninput="this.value = Math.abs(this.value)">
                                                <span><i class="fa fa-info-circle" title="{vtranslate('LBL_BATCH_INFO', $QUALIFIED_MODULE)}"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            {assign var=myArray  value = array(5,10,15)}
                                            <td align="left">
                                                <div class="form-group">
                                                    <b>{vtranslate('LBL_ENTER_MINUTES', $QUALIFIED_MODULE)}</b>
                                                    <input type="hidden" name="frequency" id="frequency">
                                                    <!-- <input type="number" class="inputElement minutes" name="minutes" id="minutes" value="{$FREQUENCY}" data-max="3600" data-min="900"> -->
                                                     <select class="inputElement minutes select2 custom-select2" name="minutes" id="minutes">
                                                        <option value="0">Select Minutes</option>
                                                        {foreach from=$myArray item=min}
                                                            <option value="{$min}" {if $min == $FREQUENCY} selected {/if}>{$min}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="left">&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="left">&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td class="padTab" align="left">
                                    <table border=0 cellspacing=0 cellpadding=0 width=98% align=center>
                                        <tr>
                                            <td colspan="3" class="detailedViewHeader">
                                                <b>{vtranslate('LBL_TRIGER_THE_SYNC_AUTOMATICALLY', $QUALIFIED_MODULE)}</b>&nbsp;&nbsp;<input type="checkbox" name="enableAutoSync" id="enableAutoSync" {if $ENABLESYNC eq 1}checked{/if}>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div align="center">
        <input class="btn btn-success saveBtn" type="button" name="button" id="saveGoogleSyncCalendar" value="{vtranslate('LBL_SAVE', $MODULE)}">
        <a class='cancelLink' href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a>
    <div>
</div>

