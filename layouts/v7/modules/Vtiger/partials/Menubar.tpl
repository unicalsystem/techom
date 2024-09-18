{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}

{if $MENU_STRUCTURE}
{assign var="topMenus" value=$MENU_STRUCTURE->getTop()}
{assign var="moreMenus" value=$MENU_STRUCTURE->getMore()}

<div id="modules-menu" class="modules-menu">
   {foreach key=moduleName item=moduleModel from=$SELECTED_CATEGORY_MENU_LIST}
    {assign var='translatedModuleLabel' value=vtranslate($moduleModel->get('label'),$moduleName )}
    <ul title="{$translatedModuleLabel}" class="module-qtip">
        <li {if $MODULE eq $moduleName}class="active"{else}class=""{/if}>
            <a href="{$moduleModel->getDefaultUrl()}&app={$SELECTED_MENU_CATEGORY}">
                {if $moduleName eq 'Potentials'}
                    <div class="potentials-icon-wrapper">
                        <img src="layouts/v7/resources/Images/icons/openings-white.png" class="potentials-icon" style="width: 26px; height: 26px;">
                        <div class="potentials-icon-overlay"></div>
                    </div>
                {elseif $moduleName eq 'Accounts'}
                    <img src="layouts/v7/resources/Images/icons/Clients-white.png" class="accounts-icon" style="width: 27px; height: 27px;">
                {elseif $moduleName eq 'Contacts'}
                    <img src="layouts/v7/resources/Images/icons/Contacts-white.png" class="contacts-icon" style="width: 26px; height: 26px;">
                {elseif $moduleName eq 'Leads'}
                    <img src="layouts/v7/resources/Images/icons/Profile-white.png" class="leads-icon" style="width: 26px; height: 26px;">
                {elseif $moduleName eq 'Broadcast'}
    <i class="fas fa-broadcast-tower" style="color: white;"></i>
{else}
                
                
                
                    {$moduleModel->getModuleIcon()}
                {/if}
                <span>{$translatedModuleLabel}</span>
            </a>
        </li>
    </ul>
{/foreach}
</div>
{/if}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
