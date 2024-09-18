    <div class="m-20" style="display: flex; justify-content: flex-end;">
        <button type="button" class="btn btn-success br-3 mr-5" id="deactive">
            <strong>{vtranslate('LBL_DEACTIVATE_LICENSE', $MODULE)}</strong>
        </button>
        <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" target="_blank" class="btn btn-success br-3">
            <strong>{vtranslate('LBL_HELP', $MODULE)}</strong>
        </a>
    </div>
    <div class="google-services">
        <input type="hidden" id="userId" value="{$USER_ID}" />
        <p class="info-line">{vtranslate('INFORMATION_SYNC', $MODULE)}</p>
        <div class="features">
            <div class="container">
                <div class="features-wrapper" style="justify-content: space-evenly;">
                    <div class="features-wrapper-section features-wrapper-section-1" style="width: 20%;">
                        <div class="features-wrapper-section-box" {if $IS_GOOGLEUSER_LOGGEDIN eq 1} id="googleDashboard" {/if}>
                            <h3 style="text-align: center;">{vtranslate('LBL_SYNC_GOOGLE', $MODULE)}</h3>
                            <div class="feature-img googleDashborad pointer" style="margin: 22px 0px;">
                                <img src="layouts/v7/modules/GoogleOffice365Suite/images/google.png" style="width: 60px;">
                            </div>
                            {if $IS_GOOGLEUSER_LOGGEDIN neq '1'}
                            <div class="features-wrapper-section-button">
                                <a href="index.php?module=GoogleOffice365Suite&amp;view=CTGoogleLogin" class="btn btn-success signin_btn br-3"><b> {vtranslate('LBL_SIGN_UP', $QUALIFIED_MODULE)}</b></a>
                            </div>
                            {else}
                             <span class="dt-custom"><b>{vtranslate('LBL_CONNECTED_TO', $QUALIFIED_MODULE)}</b></span>
                             <a href="index.php?module=GoogleOffice365Suite&amp;view=CTGoogleLogin" class="dt-custom text-primary googleDashborad"><span><b>{$GOOGLE_ID}</b></span></a>
                             <div class="features-wrapper-section-button">
                                <a href="#" id="saveGoogleCalendarLogout" class="btn btn-success br-3"><b> {vtranslate('LBL_REVOKE_ACCESS', $QUALIFIED_MODULE)}</b></a>
                            </div>
                            {/if}
                        </div>
                        <div class="features-wrapper-section-button"></div>
                    </div>
                    <div class="features-wrapper-section features-wrapper-section-1" style="width: 20%;">
                        <div class="features-wrapper-section-box" {if $IS_OUTLOOKUSER_LOGGEDIN eq 1} id="officeDashboard" {/if}>
                            <h3 style="text-align: center;">{vtranslate('LBL_SYNC_OFFICE365', $MODULE)}</h3>
                            <div class="feature-img pointer officeDashboard" style="margin: 22px 0px;">
                                <img src="layouts/v7/modules/GoogleOffice365Suite/images/microsoft.png" alt="gmail" style="width: 60px;">
                            </div>
                            {if $IS_OUTLOOKUSER_LOGGEDIN neq '1'}
                            <div class="features-wrapper-section-button">
                                <a href="index.php?module=GoogleOffice365Suite&amp;view=CTOffice365Dashboard" class="btn btn-success signin_btn br-3"><b> {vtranslate('LBL_SIGN_UP', $QUALIFIED_MODULE)}</b></a>
                            </div>
                            {else}
                            <span class="dt-custom"><b>{vtranslate('LBL_CONNECTED_TO', $QUALIFIED_MODULE)}</b></span>
                            <a href="index.php?module=GoogleOffice365Suite&amp;view=CTOffice365Dashboard" class="dt-custom text-primary emailId"><span><b>{$OUTLOOK_USER_ID}</b></span></a>
                            <div class="features-wrapper-section-button">
                                <a href="#" id="outlook365Logout" class="btn btn-success br-3"><b> {vtranslate('LBL_REVOKE_ACCESS', $QUALIFIED_MODULE)}</b></a>
                            </div>
                            {/if}
                        </div>
                        <div class="features-wrapper-section-button"></div>
                    </div>     
                </div>
            </div>
        </div>
    </div>