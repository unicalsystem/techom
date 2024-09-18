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
{assign var=minArray  value = array(5,10,15)}
{assign var=batchArray  value = array(25,50,100)}
<input type ='hidden' name='userid' id='userid' value="{$USER_ID}">
<div class="main-container main-container-GoogleOffice365Suite">
<div id="listViewPageDiv">
  <div class="listViewTopMenuDiv">
    <div class="col-md-12">
      <div class="col-md-5">
        <p style="margin-top:5px; color: #3d78f9; font-size: 18px">
           <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleDashboard">{vtranslate('LBL_GOOGLE', $QUALIFIED_MODULE)} > </a><a href="#">{$GOOGLEUSER}</a>
        </p>
        <h3>{vtranslate('LBL_SYNC_GOOGLE_CALENDAR_CONTACT', $QUALIFIED_MODULE)}</h3>
      </div>
      <div class="col-md-7 text-right">
        <button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleDashboard"'
          class="btn btn-success mr-5 br-3">{vtranslate('LBL_HOME', $QUALIFIED_MODULE)}
        </button>

        <button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleContactsGenerateToken"' class="btn btn-success contactBackBtn mr-5 br-3">{vtranslate('LBL_GOOGLE_CONTACT_SETTING', $QUALIFIED_MODULE)}</button>

        <button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleCalendarGenerateToken"' class="btn btn-success contactBackBtn mr-5 br-3">{vtranslate('LBL_GOOGLE_CALENDAR_SETTING', $QUALIFIED_MODULE)}</button> 

         <a href="index.php?module=CTGoogleOffice365SuiteLog&view=List" target="_blank"
          class="btn btn-success mr-5 br-3">
        {vtranslate('LBL_VIEW_SYNC_LOG', $QUALIFIED_MODULE)}
        </a>

        <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" target="_blank" class="btn btn-success br-3">
            {vtranslate('LBL_HELP', $MODULE)}
        </a>
        <!-- <button
          onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=List"'
          class="btn btn-success br-3">{vtranslate('LBL_HELP', $QUALIFIED_MODULE)}
        </button> -->
      </div>
    </div>
    <hr />
    <div class="clearfix"></div>

    <div style="margin-top: 20px;">
      <div class="col-md-12">
        <div class="col-md-12">
          <h2 style="font-size: 28px; font-weight: bold">
            {vtranslate('LBL_MANUAL_SYNC', $QUALIFIED_MODULE)}
          </h2>
        </div>
      </div>
      <div class="col-md-12 manual-sync">
        <div class="col-md-4">
          <p>{vtranslate('LBL_CONTACT_FROM_TO_VTIGER', $QUALIFIED_MODULE)}</p>
        </div>
        <div class="col-md-8">
          <button class="btn btn-success contactBackBtn br-3 mr-5" 
          {if $CON_SETTING_STATUS eq 0}
          disabled
          {else}
          id="syncFromGoogleContact"
          {/if} title="{vtranslate('LBL_TITLE_SYNC_GOOGLE_TO_VTIGER', $QUALIFIED_MODULE)}">
            {vtranslate('LBL_LOG_SYNC_TO_VTIGER', $QUALIFIED_MODULE)} <i class="fa fa-arrow-down"></i>
          </button>

          <button class="btn btn-success contactBackBtn br-3"
          {if $CON_SETTING_STATUS eq 0}
          disabled
          {else}
          id="syncFromVtigerContact"
          {/if} title="{vtranslate('LBL_TITLE_SYNC_VTIGER_TO_GOOGLE', $QUALIFIED_MODULE)}">
            {vtranslate('LBL_SYNC_TO_GOOGLE', $QUALIFIED_MODULE)} <i class="fa fa-arrow-up"></i>
          </button>
        </div>

        {if $CON_SETTING_STATUS eq 0}
        <div class="col-md-8 mt-10">
          <span style="color:red;">{vtranslate('LBL_CON_DISABLE_BTN_NOTE', $QUALIFIED_MODULE)} <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleContactsGenerateToken"><u>here</u></a><span>
        </div>
        {/if}
      </div>
      <div class="col-md-12 manual-sync">
        <div class="col-md-4">
          <p>{vtranslate('LBL_EVENT_FROM_TO_VTIGER', $QUALIFIED_MODULE)}</p>
        </div>
        <div class="col-md-8">
          <button class="btn btn-success br-3 mr-5"
          {if $CAL_SETTING_STATUS eq 0}
          disabled
          {else}
          id="syncFromGoogleEvent"
          {/if} title="{vtranslate('LBL_TITLE_SYNC_GOOGLE_TO_VTIGER', $QUALIFIED_MODULE)}">
            {vtranslate('LBL_LOG_SYNC_TO_VTIGER', $QUALIFIED_MODULE)} <i class="fa fa-arrow-down"></i>
          </button>
          <button class="btn btn-success br-3"
          {if $CAL_SETTING_STATUS eq 0}
          disabled
          {else}
          id="syncFromVtigerEvent" 
          {/if} title="{vtranslate('LBL_TITLE_SYNC_VTIGER_TO_GOOGLE', $QUALIFIED_MODULE)}">
            {vtranslate('LBL_SYNC_TO_GOOGLE', $QUALIFIED_MODULE)} <i class="fa fa-arrow-up"></i>
          </button>
        </div>
        {if $CAL_SETTING_STATUS eq 0}
        <div class="col-md-8 mt-10">
          <span style="color:red;">{vtranslate('LBL_CAL_DISABLE_BTN_NOTE', $QUALIFIED_MODULE)} <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleCalendarGenerateToken"><u>here</u></a><span>
        </div>
        {/if}
      </div>
    </div>

    <div>
      <div class="col-md-12">
        <div class="col-md-12">
          <h2 style="font-size: 28px; font-weight: bold">
            {vtranslate('LBL_AUTO_SYNC', $QUALIFIED_MODULE)}
          </h2>
        </div>
      </div>
      {if $IS_ADMIN eq 'on'}
      <div class="col-md-12 manual-sync">
        <div class="col-md-12">
          <b>{vtranslate('LBL_ENABLE_AUTOSYNC_CONTACT', $QUALIFIED_MODULE)}</b>&nbsp;&nbsp;<input
            type="checkbox"
            name="enableAutoSyncContact"
            id="enableAutoSyncContact" {if $CONTACT_ENABLESYNC eq 1}checked{/if}/>
        </div>
      </div>
      <div {if $CONTACT_ENABLESYNC eq 1}class="col-md-12 manual-sync mb-15"{else}class="col-md-12 manual-sync mb-15 hide"{/if} id="contactSettingsEnable">
        <div class="col-md-4">
          <p class="mt-25">{vtranslate('LBL_CONTACT_PER_BATCH', $QUALIFIED_MODULE)}</p>
        </div>
        <div class="col-md-8">
            <input type="hidden" name="frequency" id="frequency" />
            <select class="inputElement minutes select2" name="batchContact" id="batchContact">
                <option value="0">{vtranslate('LBL_SELECT_BATCHSIZE', $QUALIFIED_MODULE)}</option>
                {foreach from=$batchArray item=batch}
                    <option value="{$batch}" {if $batch == $CONTACTBATCH} selected {/if}>{$batch}</option>
                {/foreach}
            </select>
            {if $IS_ADMIN eq 'on'}
            <select class="inputElement minutes select2" name="minutesContact" id="minutesContact">
                <option value="0">{vtranslate('LBL_SELECT_MINUTES', $QUALIFIED_MODULE)}</option>
                {foreach from=$minArray item=min}
                    <option value="{$min}" {if $min == $CONTACT_FREQUENCY} selected {/if}>{$min}</option>
                {/foreach}
            </select>
            {/if}
        </div>
      </div>
      {else}
      <div class="col-md-12 manual-sync mb-15" id="contactSettingsEnable">
        <div class="col-md-4">
          <p class="mt-25">{vtranslate('LBL_CONTACT_PER_BATCH', $QUALIFIED_MODULE)}</p>
        </div>
        <div class="col-md-8">
            <input type="hidden" name="frequency" id="frequency" />
            <select class="inputElement minutes select2" name="batchContact" id="batchContact">
                <option value="0">{vtranslate('LBL_SELECT_BATCHSIZE', $QUALIFIED_MODULE)}</option>
                {foreach from=$batchArray item=batch}
                    <option value="{$batch}" {if $batch == $CONTACTBATCH} selected {/if}>{$batch}</option>
                {/foreach}
            </select>
        </div>
      </div>
      {/if}
      {if $IS_ADMIN eq 'on'}
      <div class="col-md-12 manual-sync">
        <div class="col-md-12 mt-20">
          <b>{vtranslate('LBL_ENABLE_AUTOSYNC_EVENT', $QUALIFIED_MODULE)}</b>&nbsp;&nbsp;
            <input type="checkbox" name="enableAutoSyncEvent" id="enableAutoSyncEvent" {if $EVENT_ENABLESYNC eq 1}checked{/if}>
        </div>
      </div>
      <div {if $EVENT_ENABLESYNC eq 1}class="col-md-12 manual-sync mb-15"{else}class="col-md-12 manual-sync mb-15 hide"{/if} id="eventSettingsEnable">  
        <div class="col-md-4">
          <p class="mt-25">{vtranslate('LBL_EVENTS_PER_BATCH', $QUALIFIED_MODULE)}</p>
        </div>
        <div class="col-md-8">
             <select class="inputElement minutes select2" name="batchEvent" id="batchEvent">
                <option value="0">{vtranslate('LBL_SELECT_BATCHSIZE', $QUALIFIED_MODULE)}</option>
                {foreach from=$batchArray item=batch}
                    <option value="{$batch}" {if $batch == $CALENDARBATCH} selected {/if}>{$batch}</option>
                {/foreach}
            </select>
            {if $IS_ADMIN eq 'on'}
            <select class="inputElement minutes select2" name="minutesEvent" id="minutesEvent">
                <option value="0">{vtranslate('LBL_SELECT_MINUTES', $QUALIFIED_MODULE)}</option>
                {foreach from=$minArray item=min}
                    <option value="{$min}" {if $min == $EVENT_FREQUENCY} selected {/if}>{$min}</option>
                {/foreach}
            </select>
            {/if}
        </div>
      </div>
      {else}
      <div class="col-md-12 manual-sync mb-15" id="eventSettingsEnable">  
        <div class="col-md-4">
          <p class="mt-25">{vtranslate('LBL_EVENTS_PER_BATCH', $QUALIFIED_MODULE)}</p>
        </div>
        <div class="col-md-8">
             <select class="inputElement minutes select2" name="batchEvent" id="batchEvent">
                <option value="0">{vtranslate('LBL_SELECT_BATCHSIZE', $QUALIFIED_MODULE)}</option>
                {foreach from=$batchArray item=batch}
                    <option value="{$batch}" {if $batch == $CALENDARBATCH} selected {/if}>{$batch}</option>
                {/foreach}
            </select>
            {if $IS_ADMIN eq 'on'}
            <select class="inputElement minutes select2" name="minutesEvent" id="minutesEvent">
                <option value="0">{vtranslate('LBL_SELECT_MINUTES', $QUALIFIED_MODULE)}</option>
                {foreach from=$minArray item=min}
                    <option value="{$min}" {if $min == $EVENT_FREQUENCY} selected {/if}>{$min}</option>
                {/foreach}
            </select>
            {/if}
        </div>
      </div>
      {/if}
      <div class="col-md-12 text-center mt-15 mb-15">
        <input
        class="btn btn-success saveBtn br-3"
        type="button"
        name="button"
        id="saveGoogleAutoSettings"
        value="Save" />
      </div>
    </div>

    <div class="note">
        <div class="col-md-12">
            <div class="col-md-12">
                <b>{vtranslate('LBL_NOTE', $QUALIFIED_MODULE)} : </b>
                <ol>
                    <li>{vtranslate('LBL_STEP3_NOTE_1', $QUALIFIED_MODULE)}</li>
                    <li>{vtranslate('LBL_STEP3_NOTE_2', $QUALIFIED_MODULE)}</li>
                </ol>
            </div>
        </div>
    </div>

    <div>
      <div class="col-md-12">
        <div class="col-md-12" id="logTable">
          <div class="customLoader" style="opacity: 0.5;
                                    background-color: white;
                                    z-index: 100000;
                                    top: 0px;
                                    width: 100%;
                                    height: 100%;
                                    margin-top: 5%;"><div style="text-align:center;top:50%;left:40%;"><img src="layouts/v7/skins/images/loading.gif"></div></div>
        </div>
        <div class="col-md-12 text-muted text-right hide" id="refreshLogBtn">
              <span id="lastSyncTime"></span> <span class="reloadTable" id="reloadTable"><i class="fa fa-refresh"></i></span> 
        </div>
    </div>
    </div>
  </div>
</div>
</div>
