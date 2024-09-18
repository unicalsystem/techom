{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
<br>
<div class="detailViewContainer">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				 <h3 class="span4 textOverflowEllipsis googleApiSettings" title="{vtranslate('LBL_GOOGLE_API_SETTING', $QUALIFIED_MODULE)}">{vtranslate('LBL_GOOGLE_API_SETTING', $QUALIFIED_MODULE)}</h3>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			    <div class="btn-group pull-right">
					<button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncGoogleCalendarDashboard"' class="btn btn-success mr-24">{vtranslate('LBL_BACK', $MODULE)}</button>
				</div>
				<div class="btn-group pull-right" id="editBtn">
					<button class="btn btn-default editButton" onclick='window.location.href = "{$GOOGLECALENDARSEDITURL}"' type="button" title="{vtranslate('LBL_EDIT', $QUALIFIED_MODULE)}">{vtranslate('LBL_EDIT', $QUALIFIED_MODULE)}</button>
				</div>
				<div class="btn-group pull-right contactsDashboardBtn">
					<button class="btn btn-default editButton" onclick='window.location.href = "{$GOOGLECALENDARSURL}"' type="button" title="{vtranslate('LBL_GOOGLE_CONTACT_DASHBOARD', $QUALIFIED_MODULE)}">{vtranslate('LBL_GOOGLE_CALENDAR_DASHBOARD', $QUALIFIED_MODULE)}</button>
				</div>
			</div>
		</div>
		<div><h4>{vtranslate('LBL_MORE_INFORMATION', $MODULE)} <a href="https://kb.crmtiger.com/article-categories/gcalendar-integration-for-vtiger/" id="moreInfo" target="_blank">{vtranslate('LBL_CLICK_HERE', $MODULE)}</a> {vtranslate('LBL_GET_CLIENT_ID_SECRET', $MODULE)}</h4></div>
		<br>
		<div>
			<div class="block">
				<table class="table editview-table no-border">
					<tbody>
						<tr>
							<td class="fieldLabel" ><label>{vtranslate('LBL_CLIENT_ID', $QUALIFIED_MODULE)}</label></td>
							<td class="fieldValue"><span>{$CLIENTID}</span></td>
						</tr>
						<tr>
							<td class="fieldLabel" ><label>{vtranslate('LBL_CLIENT_SECRET', $QUALIFIED_MODULE)}</label></td>
							<td class="fieldValue" ><span>{$CLIENTSECRET}</span></td>
						</tr>
						<tr>
							<td class="fieldLabel"><label>{vtranslate('LBL_DOMAIN_URL', $QUALIFIED_MODULE)}</label></td>
							<td class="fieldValue">
								<span class="password">{$DOMAINURL}</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
