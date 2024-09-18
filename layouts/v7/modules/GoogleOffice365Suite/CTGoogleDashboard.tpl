<div class="main-container main-container-GoogleOffice365Suite">
    <div class="m-20" style="display: flex; justify-content: flex-end;">
        <a href="index.php?module=GoogleOffice365Suite&view=List" class="btn btn-success br-3 mr-5"><strong>{vtranslate('Home', $MODULE)}</strong></a>
        <button type="button" class="btn btn-success br-3 mr-5" id="saveGoogleCalendarLogout">
            <strong>{vtranslate('LBL_REVOKE_ACCESS', $MODULE)}</strong>
        </button>
        <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" class="btn btn-success br-3"  target="_blank">
            <strong>{vtranslate('LBL_HELP', $MODULE)}</strong>
        </a>
    </div>
    <div class="google-services">
        <p class="info-line">{vtranslate('GOOGLE_INFORMATION_SYNC', $MODULE)}</p>
        <input type="hidden" id="userId" value="{$USER_ID}" />
        <div class="features">
            <div class="container">
                <div class="features-wrapper justify-content-space-even">
                    <div class="features-wrapper-section w-25-pr">
                        <h3 style="text-align: center;">{vtranslate('LBL_SYNC_EMAIL', $MODULE)}</h3>
                        <div class="feature-img">
                            <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleEmail" ><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/gmail.png" alt="gmail"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>{vtranslate('LBL_SYNC_GOOGLE_VTIGER', $MODULE)}</li>
                        </ul>
                    </div>
                    <div class="features-wrapper-section w-25-pr">
                        <h3 style="text-align: center;">{vtranslate('LBL_SYNC_CONTACTS', $MODULE)}</h3>
                        <div class="feature-img">
                            {if $CON_SETTING_STATUS gt 0}
                            <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleData"><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/google-contacts.png" alt="gmail"></a>
                            {else}
                            <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleContactsGenerateToken"><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/google-contacts.png" alt="gmail"></a>
                            {/if}
                        </div>
                        <hr>
                        <ul>
                            <li>{vtranslate('LBL_SYNC_CONTACTS_GOOGLE_VTIGER', $MODULE)}</li>
                        </ul>
                    </div>
                    <div class="features-wrapper-section w-25-pr">
                        <h3 style="text-align: center;">{vtranslate('LBL_SYNC_CALENDAR', $MODULE)}</h3>
                        <div class="feature-img">
                            {if $CAL_SETTING_STATUS gt 0}
                            <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleData"><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/google-calender.png" alt="gmail"></a>
                            {else}
                            <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleCalendarGenerateToken"><img src="layouts/v7/modules/GoogleOffice365Suite/resources/css/img/google-calender.png" alt="gmail"></a>
                            {/if}
                        </div>
                        <hr>
                        <ul>
                            <li>{vtranslate('LBL_SYNC_CALENDAR_GOOGLE_VTIGER', $MODULE)}</li>
                        </ul>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
