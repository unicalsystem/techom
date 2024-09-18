{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}

{strip}
    {if $TYPE eq 'formal'}
        <div class="openairesponse-container" >
            <div class="message">
                <span class="user-message">{$QUERY}</span>
            </div>
            <div class="message copy-container">
                <span class="bot-message pull-right" style="padding: 2px;"> {$RESPONSE}</span>
                <i title='Use as Mail Body' class="fa fa-arrow-left copy-icon" style="font-size: large;font-weight: bolder;"></i>
            </div>
            <div class="message pull-right"><b> {$CREATEDON}</b></div>    
        </div>
    {elseif $TYPE eq 'suggestion'}
        {if !empty($RESPONSE)}
            <div class='popover-body' style="max-width: 250px;">
                <div class='suggestions'>
                    {foreach item=SUGGESTION from=$RESPONSE}
                        <span  style='background: #ebf5f7;padding: 5px;overflow: hidden;  max-width: 98%; display: inline-block;'>
                            <span id="sub_suggestion">{$SUGGESTION}</span>
                            <i title='Use as subject' class='fa fa-arrow-right copyandclose' style="padding-left: 10px;font-weight: bolder;"></i>
                            <i title='Copy to clipboard' class='fa fa-copy copysuggestion' style="padding-left: 10px;font-weight: bolder;"></i>
                        </span>
                        <br><br>
                    {/foreach}
                </div>
            </div>
        {/if}
    {/if}
{/strip}