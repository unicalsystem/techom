{*<!--
/*+***********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************/
-->*}

{strip}
    {assign var=LISTVIEW_MASSACTIONS_1 value=array()}
    <div id="listview-actions" class="listview-actions-container">
        {foreach item=LIST_MASSACTION from=$LISTVIEW_MASSACTIONS name=massActions}
            {if $LIST_MASSACTION->getLabel() eq 'LBL_EDIT'}
                {assign var=editAction value=$LIST_MASSACTION}
            {else if $LIST_MASSACTION->getLabel() eq 'LBL_DELETE'}
                {assign var=deleteAction value=$LIST_MASSACTION}
            {else if $LIST_MASSACTION->getLabel() eq 'LBL_ADD_COMMENT'}
                {assign var=commentAction value=$LIST_MASSACTION}
            {else}
                {$a = array_push($LISTVIEW_MASSACTIONS_1, $LIST_MASSACTION)}
                {* $a is added as its print the index of the array, need to find a way around it *}
            {/if}
        {/foreach}
        <div class="row">
            <div class="col-md-8">
                <div class="btn-group listViewActionsContainer" role="group" aria-label="...">
                    {if $editAction}
                        <button type="button" class="btn btn-default" id={$MODULE}_listView_massAction_{$editAction->getLabel()} 
                                {if stripos($editAction->getUrl(), 'javascript:')===0} href="javascript:void(0);" onclick='{$editAction->getUrl()|substr:strlen("javascript:")}'{else} href='{$editAction->getUrl()}' {/if} title="{vtranslate('LBL_EDIT', $MODULE)}" disabled="disabled">
                            <i class="fa fa-pencil"></i>
                        </button>
                    {/if}
                    {if $deleteAction}
                        <button type="button" class="btn btn-default" id={$MODULE}_listView_massAction_{$deleteAction->getLabel()} 
                                {if stripos($deleteAction->getUrl(), 'javascript:')===0} href="javascript:void(0);" onclick='{$deleteAction->getUrl()|substr:strlen("javascript:")}'{else} href='{$deleteAction->getUrl()}' {/if} title="{vtranslate('LBL_DELETE', $MODULE)}" disabled="disabled">
                            <i class="fa fa-trash"></i>
                        </button>
                    {/if}
                    {if $commentAction}
                        <button type="button" class="btn btn-default" id="{$MODULE}_listView_massAction_{$commentAction->getLabel()}" 
                                onclick="Vtiger_List_Js.triggerMassAction('{$commentAction->getUrl()}')" title="{vtranslate('LBL_COMMENT', $MODULE)}" disabled="disabled">
                            <i class="fa fa-comment"></i>
                        </button>
                    {/if}

                    {if php7_count($LISTVIEW_MASSACTIONS_1) gt 0 or $LISTVIEW_LINKS['LISTVIEW']|@count gt 0}
                        <div class="btn-group listViewMassActions" role="group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                {vtranslate('LBL_MORE','Vtiger')}&nbsp;
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                {foreach item=LISTVIEW_MASSACTION from=$LISTVIEW_MASSACTIONS_1 name=advancedMassActions}
                                    <li class="hide"><a id="{$MODULE}_listView_massAction_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($LISTVIEW_MASSACTION->getLabel())}" {if stripos($LISTVIEW_MASSACTION->getUrl(), 'javascript:')===0} href="javascript:void(0);" onclick='{$LISTVIEW_MASSACTION->getUrl()|substr:strlen("javascript:")};'{else} href='{$LISTVIEW_MASSACTION->getUrl()}' {/if}>{vtranslate($LISTVIEW_MASSACTION->getLabel(), $MODULE)}</a></li>
                                {/foreach}
                                {if php7_count($LISTVIEW_MASSACTIONS_1) gt 0 and $LISTVIEW_LINKS['LISTVIEW']|@count gt 0}
                                    <li class="divider hide"></li>
                                {/if}
                                {if $MODULE_MODEL->isStarredEnabled()}
                                    <li class="hide">
                                        <a id="{$MODULE}_listView_massAction_LBL_ADD_STAR" onclick="Vtiger_List_Js.triggerAddStar()">
                                            {vtranslate('LBL_FOLLOW',$MODULE)}
                                        </a>
                                    </li>
                                    <li class="hide">
                                        <a id="{$MODULE}_listView_massAction_LBL_REMOVE_STAR" onclick="Vtiger_List_Js.triggerRemoveStar()">
                                            {vtranslate('LBL_UNFOLLOW',$MODULE)}
                                        </a>
                                    </li>
                                {/if}
                                <li class="hide">
                                    <a id="{$MODULE}_listView_massAction_LBL_ADD_TAG" onclick="Vtiger_List_Js.triggerAddTag()">
                                        {vtranslate('LBL_ADD_TAG',$MODULE)}
                                    </a>
                                </li>
                                {if $CURRENT_TAG neq ''}
                                <li class="hide">
                                    <a id="{$MODULE}_listview_massAction_LBL_REMOVE_TAG" onclick="Vtiger_List_Js.triggerRemoveTag({$CURRENT_TAG})">
                                        {vtranslate('LBL_REMOVE_TAG', $MODULE)}
                                    </a>
                                </li>
                                {/if}
                                <li class="divider hide" style="margin:9px 0px;"></li>
                                {assign var=FIND_DUPLICATES_EXITS value=false}
                                {foreach item=LISTVIEW_ADVANCEDACTIONS from=$LISTVIEW_LINKS['LISTVIEW']}
                                    {if $LISTVIEW_ADVANCEDACTIONS->getLabel() == 'Print'}
                                        {assign var=PRINT_TEMPLATE value=$LISTVIEW_ADVANCEDACTIONS}
                                    {else}
                                        {if $LISTVIEW_ADVANCEDACTIONS->getLabel() == 'LBL_FIND_DUPLICATES'}
                                            {assign var=FIND_DUPLICATES_EXISTS value=true}
                                        {/if}
                                    {/if}
                                {/foreach}
                                
                                {if $PRINT_TEMPLATE}
                                    <li class="hide"><a id="{$MODULE}_listView_advancedAction_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($PRINT_TEMPLATE->getLabel())}" {if stripos($PRINT_TEMPLATE->getUrl(), 'javascript:')===0} href="javascript:void(0);" onclick='{$PRINT_TEMPLATE->getUrl()|substr:strlen("javascript:")};'{else} href='{$PRINT_TEMPLATE->getUrl()}' {/if}>{vtranslate($PRINT_TEMPLATE->getLabel(), $MODULE)}</a></li>
                                {/if}
                                {if $FIND_DUPLICATES_EXISTS}
                                    <li class="hide"><a id="{$MODULE}_listView_advancedAction_MERGE_RECORD"  href="javascript:void(0);" onclick='Vtiger_List_Js.triggerMergeRecord()'>{vtranslate('LBL_MERGE_SELECTED_RECORDS', $MODULE)}</a></li>
                                {/if}
                                {foreach item=LISTVIEW_ADVANCEDACTIONS from=$LISTVIEW_LINKS['LISTVIEW']}
                                    {if $LISTVIEW_ADVANCEDACTIONS->getLabel() == 'LBL_IMPORT'}
                                    {*Remove Import Action*}  
                                    {elseif $LISTVIEW_ADVANCEDACTIONS->getLabel() == 'Print'}
                                        {assign var=PRINT_TEMPLATE value=$LISTVIEW_ADVANCEDACTIONS}
                                    {else}
                                        {if $LISTVIEW_ADVANCEDACTIONS->getLabel() == 'LBL_FIND_DUPLICATES'}
                                            {assign var=FIND_DUPLICATES_EXISTS value=true}
                                        {/if}
                                        {if $LISTVIEW_ADVANCEDACTIONS->getLabel() != 'Print'}
                                            <li class="selectFreeRecords"><a id="{$MODULE}_listView_advancedAction_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($LISTVIEW_ADVANCEDACTIONS->getLabel())}" {if stripos($LISTVIEW_ADVANCEDACTIONS->getUrl(), 'javascript:')===0} href="javascript:void(0);" onclick='{$LISTVIEW_ADVANCEDACTIONS->getUrl()|substr:strlen("javascript:")};'{else} href='{$LISTVIEW_ADVANCEDACTIONS->getUrl()}' {/if}>{vtranslate($LISTVIEW_ADVANCEDACTIONS->getLabel(), $MODULE)}</a></li>
                                        {/if}  
                                    {/if}
                                {/foreach}
                            </ul>
                        </div>
                    {/if}
        
                       {if $MODULE == 'Potentials'}
    <div class="listViewStatusActions">
        <a class="btn btn-success" id="{$MODULE}_listView_massAction_LBL_ACTIVE"
           href="https://unical.smartrecruitmentsolution.com/index.php?module=Potentials&parent=&page=&view=List&viewname=67&orderby=&sortorder=&app=SALES&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">
            {vtranslate('Active', $MODULE)}
        </a>
        <a class="btn btn-warning" id="{$MODULE}_listView_massAction_LBL_HOLD"
           href="https://unical.smartrecruitmentsolution.com/index.php?module=Potentials&parent=&page=&view=List&viewname=68&orderby=&sortorder=&app=SALES&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">
            {vtranslate('Hold', $MODULE)}
        </a>
        <a class="btn btn-danger" id="{$MODULE}_listView_massAction_LBL_INACTIVE"
           href="https://unical.smartrecruitmentsolution.com/index.php?module=Potentials&parent=&page=&view=List&viewname=69&orderby=&sortorder=&app=SALES&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">
            {vtranslate('InActive', $MODULE)}
        </a>
        
    </div>
{/if}
                </div>
            </div>
            <div class="col-md-4">
                {assign var=RECORD_COUNT value=$LISTVIEW_ENTRIES_COUNT}
                {include file="Pagination.tpl"|vtemplate_path:$MODULE SHOWPAGEJUMP=true}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {if $LISTVIEW_ENTRIES_COUNT eq '0' and $REQUEST_INSTANCE and $REQUEST_INSTANCE->isAjax()}
                    {if $smarty.session.lvs.$MODULE.viewname}
                        {assign var=VIEWID value=$smarty.session.lvs.$MODULE.viewname}
                    {/if}
                    {if $VIEWID}
                        {foreach item=FILTER_TYPES from=$CUSTOM_VIEWS}
                            {foreach item=FILTERS from=$FILTER_TYPES}
                                {if $FILTERS->get('cvid') eq $VIEWID}
                                    {assign var=CVNAME value=$FILTERS->get('viewname')}
                                    {break}
                                {/if}
                            {/foreach}
                        {/foreach}
                        {assign var=DEFAULT_FILTER_URL value=$MODULE_MODEL->getDefaultUrl()}
                        {assign var=DEFAULT_FILTER_ID value=$MODULE_MODEL->getDefaultCustomFilter()}
                        {if $DEFAULT_FILTER_ID}
                            {assign var=DEFAULT_FILTER_URL value=$MODULE_MODEL->getListViewUrl()|cat:"&viewname="|cat:$DEFAULT_FILTER_ID|cat:"&app="|cat:$SELECTED_MENU_CATEGORY}
                        {/if}
                        {if $CVNAME neq 'All'}
                            <div>{vtranslate('LBL_DISPLAYING_RESULTS',$MODULE)} {vtranslate('LBL_FROM',$MODULE)} <b>{$CVNAME}</b>. <a style="color:blue" href='{$DEFAULT_FILTER_URL}'>{vtranslate('LBL_SEARCH_IN',$MODULE)} {vtranslate('All',$MODULE)} {vtranslate($MODULE, $MODULE)}</a> </div>
                        {/if}
                    {/if}
                {/if}
                <div class="hide messageContainer" style = "height:30px;">
                    <center><a href="#" id="selectAllMsgDiv">{vtranslate('LBL_SELECT_ALL',$MODULE)}&nbsp;{vtranslate($MODULE ,$MODULE)}&nbsp;(<span id="totalRecordsCount" value=""></span>)</a></center>
                </div>
                <div class="hide messageContainer" style = "height:30px;">
                    <center><a href="#" id="deSelectAllMsgDiv">{vtranslate('LBL_DESELECT_ALL_RECORDS',$MODULE)}</a></center>
                </div>            
            </div>
        </div>
    </div>
    
<style>
    .listViewStatusActions {
        display: inline-flex;
        background: #f0f0f0;
        padding: 5px;
        padding-top: 0px !important;
        border-radius: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .listViewStatusActions .btn {
        padding: 5.5px 20px;
        margin: 0 4px;
        transition: all 0.3s ease;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        border: none;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .listViewStatusActions .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .listViewStatusActions .btn-success {
        background-color: #2ecc71;
        color: white;
    }
    .listViewStatusActions .btn-warning {
        background-color: #f39c12;
        color: white;
    }
    .listViewStatusActions .btn-danger {
        background-color: #e74c3c;
        color: white;
    }
    .listViewStatusActions .btn i {
        margin-right: 8px;
        font-size: 14px;
    }
    .listViewStatusActions .btn:first-child {
        margin-left: 0;
    }
    .listViewStatusActions .btn:last-child {
        margin-right: 0;
    }
</style>