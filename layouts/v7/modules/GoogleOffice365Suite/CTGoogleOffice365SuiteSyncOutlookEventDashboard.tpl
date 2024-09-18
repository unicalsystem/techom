{*<!--
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
-->*}
<div class="col-md-12 text-right">
    <button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=List"' class="btn btn-success" style="margin-top: 17px;margin-left: 570px;">{vtranslate('LBL_BACK', $MODULE)}</button>
</div> 
<br><br>
<div class="dashboard1" style="width: 98%;margin: auto;"><br>
    {if $NUMOFUSERROWS eq 0 && $ISADMIN eq 'off'}
        <table class='table table-bordered' style='width: 70%; margin: 15%;'>
            <thead>
                <tr>
                    <th style='text-align: center;'>{vtranslate('LBL_GOOGLE_CALENDAR_ACCESS_DENIED', $MODULE)}</th>
                </tr>
                <tr>
                    <td style='text-align: center;font-size:16px;'>
                        <a href='javascript:window.history.back();'>Go back</a><br>
                    </td>
                </tr>
            </thead>
        </table>
    {else}
        <br>
        <center>
            <div class="ds-header dashboard2" style="border: 1px solid;"><br>
                <center>
                    <b style="font-size: 14px;">{vtranslate('LBL_CONFIGURE_CTOUTLOOK_EVENTS', $MODULE)}</b><br><br>
                </center>
            </div>
        </center><br>
        <div>
                <div class="col-md-4 pull-left">
                    <div class="ds-header dashboard3" style="border: 1px solid;">
                        <center>
                            <h2><b style="font-size: 18px;">{vtranslate('LBL_STEP1', $MODULE)}</b></h2>
                            <h2><b style="font-size: 18px;">{vtranslate('LBL_AUTHENTICATION_CONFIGURATION', $MODULE)}</b></h2>
                            <h2><b class= "dashdescriptionstep3">{vtranslate('LBL_CTOUTLOOK_CONFIGURE_CREDENTIALS', $MODULE)} </b></h2>
                            <button class="btn btn-success btn-sm" onclick='window.location.href = "{$STEP1_URL}"' style="margin-bottom: 10px;"><b>{vtranslate('LBL_SELECT', $MODULE)}</b></button><br>
                        </center>
                    </div>
                </div>
                <div class="col-md-4 pull-left">
                    <div class="ds-header dashboard3" style="border: 1px solid;">
                        <center>
                            <h2><b style="font-size: 18px;">{vtranslate('LBL_STEP2', $MODULE)}</b></h2>
                            <h2><b style="font-size: 18px;">{vtranslate('LBL_GENERATE_TOKEN', $MODULE)}</b></h2>
                            <h2><b class= "dashdescriptionstep3">{vtranslate('LBL_GENERATE_TOKEN', $MODULE)} {vtranslate('LBL_AND', $MODULE)} {vtranslate('LBL_CONFIGURE_OUTLOOK_EVENTS_SETTING', $MODULE)}</b></h2>
                            <button class="btn btn-success btn-sm" onclick='window.location.href = "{$STEP2_URL}"' style="margin-bottom: 10px;"><b>{vtranslate('LBL_SELECT', $MODULE)}</b></button>
                        </center>
                    </div>
                </div>
                <div class="col-md-4 pull-left">
                    <div class="ds-header dashboard3" style="border: 1px solid;">
                        <center>
                            <h2><b style="font-size: 18px;">{vtranslate('LBL_STEP3', $MODULE)}</b></h2>
                            <h2><b style="font-size: 18px;">{vtranslate('LBL_SYNC_OFFICE_EVENTS', $MODULE)}</b></h2>
                            <h2><b class= "dashdescriptionstep3" title="{vtranslate('LBL_SYNC_LOG', $MODULE)}">{vtranslate('LBL_SYNC_EVENTS_LOG', $MODULE)}</b></h2>
                            <button class="btn btn-success btn-sm" onclick='window.location.href = "{$STEP3_URL}"' style="margin-bottom: 10px;" {if $NUMOFSETTINGROWS eq 0} disabled="disabled" {/if}><b>{vtranslate('LBL_SELECT', $MODULE)}</b></button>
                        </center>
                    </div>
                </div>
            </div>
    {/if}
</div>