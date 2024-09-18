{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}

{strip}
    <div class="row">
        <div class="col-lg-12" id="gptintegrationlogscontainer">
            <div class="contents table-container" id="detailView">
                <table class="table listview-table" id="listview-table">
                    <thead>
                        <tr>
                            {foreach item=HEADERNAME from=$AILOGS_HEADERS}
                                <th>{vtranslate($HEADERNAME, $QUALIFIED_MODULE)}</th>
                            {/foreach}
                        </tr>
                    </thead>
                    <tbody>
                        {foreach key=LOG_ID item=LOGDATA from=$AILOGS}
                            <tr class="listViewEntries" data-cfmid="{$LOG_ID}">
                                {foreach item=HEADERNAME from=$AILOGS_HEADERS}
                                    <td>{$LOGDATA[$HEADERNAME]}</td>
                                {/foreach}
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
        <div id="scroller_wrapper" class="bottom-fixed-scroll">
            <div id="scroller" class="scroller-div"></div>
        </div>
    </div>
{/strip}