<input type="hidden" name='user_id' value="{$USERID}" id="userId">
<div class="main-container main-container-GoogleOffice365Suite">
        <div class="m-20" style="display: flex; justify-content: flex-end;">
            <button class="btn btn-success br-3 mr-5" id="homePage"><strong>{vtranslate('LBL_HOME', $MODULE)}</strong></button>
            <button class="btn btn-success br-3 mr-5 revokeToken" id="outlook365Logout"><strong>{vtranslate('LBL_REVOKE_ACCESS', $MODULE)}</strong></button>
            <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" class="btn btn-success br-3"  target="_blank">
            <strong>{vtranslate('LBL_HELP', $MODULE)}</strong>
            </a>
        </div>
    <div class="google-services">
        <p class="info-line">{vtranslate('OFFICE365_INFORMATION_SYNC', $MODULE)}</p>
        <div class="features">
            <div class="container">
                <div class="features-wrapper justify-content-space-even">
                    <div class="features-wrapper-section w-25-pr">
                        <h3 style="text-align: center;">{vtranslate('LBL_SYNC_EMAIL', $MODULE)}</h3>
                        <div class="feature-img">
                            <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookEmail"><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/office-365.png" alt="gmail"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>{vtranslate('LBL_SYNC_OFFICE_VTIGER', $MODULE)}</li>
                        </ul>
                    </div>
                    <div class="features-wrapper-section w-25-pr">
                        <h3 style="text-align: center;">{vtranslate('LBL_SYNC_CONTACTS', $MODULE)}</h3>
                        <div class="feature-img">
                            {if $CON_SETTING_STATUS eq 1}
                                <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookData" ><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/office365-contacts.png" alt="gmail"></a>
                            {else}
                                <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookContactsGenerateToken"><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/office365-contacts.png" alt="gmail"></a>
                            {/if}
                        </div>
                        <hr>
                        <ul>
                            <li>{vtranslate('LBL_SYNC_CONTACTS_OFFICE_VTIGER', $MODULE)}</li>
                        </ul>
                    </div>
                    <div class="features-wrapper-section w-25-pr">
                        <h3 style="text-align: center;">{vtranslate('LBL_SYNC_CALENDAR', $MODULE)}</h3>
                        <div class="feature-img">
                            {if $CAL_SETTING_STATUS eq 1}
                                <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookData" ><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/office365-calender.png" alt="gmail"></a>
                            {else}
                                <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookEventsGenerateToken"><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/office365-calender.png" alt="gmail"></a>
                            {/if}
                        </div>
                        <hr>
                        <ul>
                            <li>{vtranslate('LBL_SYNC_CALENDAR_OFFICE_VTIGER', $MODULE)}</li>
                        </ul>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>