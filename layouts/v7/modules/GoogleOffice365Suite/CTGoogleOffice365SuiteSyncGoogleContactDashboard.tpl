{*<!--
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
-->*}

<div class="col-md-12 text-right calBackBtn">
    <button onclick='window.location.href = "{$GOOGLEOFFICEDASHBOARD}"' class="btn btn-success">{vtranslate('LBL_BACK', $MODULE)}</button>
</div>
<div class="dashboard1"><br>
	{if $NUMOFUSERROWS eq 0 && $ISADMIN eq 'off'}
		<table class='table table-bordered step1'>
			<thead>
				<tr>
					<th class="goBack"><center>{vtranslate('LBL_GOOGLE_CONTACTS_ACCESS_DENIED', $MODULE)}</center></th>
				</tr>
				<tr>
					<td class="goBack">
						<center>
						<a href='javascript:window.history.back();'>{vtranslate('LBL_GO_BACK', $MODULE)}</a><br>
						</center>
					</td>
				</tr>
			</thead>
		</table>
	{else}
		<br>
		<center>
			<div class="ds-header dashboard2 dashboard3 mt-10"><br>
				<center>
					<b class="goBack">{vtranslate('LBL_CONFIGURE_GOOGLE_CONTACTS', $MODULE)}</b><br><br>
				</center>
			</div>
		</center><br>
		<div>
			<div class="col-md-4 pull-left">
				<div class="ds-header dashboard3">
					<center>
						<h2><b class="dashstep1">{vtranslate('LBL_STEP1', $MODULE)}</b></h2>
						<h2><b class="dashstep1">{vtranslate('LBL_AUTHENTICATION_CONFIGURATION', $MODULE)}</b></h2>
						<h2><b class="dashdescriptionstep3">{vtranslate('LBL_CONFIGURE_CREDENTIALS', $MODULE)} </b></h2>
						<button class="btn btn-success btn-sm selectBtn" onclick='window.location.href = "{$STEP1_URL}"'><b>{vtranslate('LBL_SELECT', $MODULE)}</b></button><br>
					</center>
				</div>
			</div>
			<div class="col-md-4 pull-left">
				<div class="ds-header dashboard3">
					<center>
						<h2><b class="dashstep1">{vtranslate('LBL_STEP2', $MODULE)}</b></h2>
						<h2><b class="dashstep1">{vtranslate('LBL_GENERATE_TOKEN', $MODULE)}</b></h2>
						<h2><b class="dashdescriptionstep3">{vtranslate('LBL_GENERATE_TOKEN', $MODULE)} {vtranslate('LBL_AND', $MODULE)} {vtranslate('LBL_CONFIGURE_CONTACT_SETTING', $MODULE)}</b></h2>
						<button class="btn btn-success btn-sm selectBtn" onclick='window.location.href = "{$STEP2_URL}"' {if $CHECKSTEP2 eq 0}disabled{/if}><b>{vtranslate('LBL_SELECT', $MODULE)}</b></button>
					</center>
				</div>
			</div>
			<div class="col-md-4 pull-left">
				<div class="ds-header dashboard3">
					<center>
						<h2><b class="dashstep1">{vtranslate('LBL_STEP3', $MODULE)}</b></h2>
						<h2><b class="dashstep1">{vtranslate('LBL_SYNC_GOOGLE_CONTACTS', $MODULE)}</b></h2>
						<h2><b class="dashdescriptionstep3" title="{vtranslate('LBL_SYNC_CONTACT_LOG', $MODULE)}">{vtranslate('LBL_SYNC_CONTACT_LOG', $MODULE)}</b></h2>
						<button class="btn btn-success btn-sm selectBtn" onclick='window.location.href = "{$STEP3_URL}"' {if $CHECKSTEP3 eq 0}disabled{/if}><b>{vtranslate('LBL_SELECT', $MODULE)}</b></button>
					</center>
				</div>
			</div>
			</div>
	{/if}
</div>
	