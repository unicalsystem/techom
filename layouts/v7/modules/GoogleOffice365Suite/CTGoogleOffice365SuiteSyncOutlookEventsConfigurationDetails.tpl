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
				 <h3 class="span4 textOverflowEllipsis" title="{vtranslate('LBL_OUTLOOK_API_SETTING', $MODULE)}" style="height: 30px;">{vtranslate('LBL_CONFIGURE_CTOUTLOOK_EVENTS', $MODULE)}</h3>
			</div>

			<div class="col-lg-6	 col-md-6 col-sm-6 col-xs-6">
				<div class="btn-group pull-right">
				    <button onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookEventDashboard"' class="btn btn-default"	>{vtranslate('LBL_BACK', $MODULE)}</button>
				</div> 
				<div class="btn-group pull-right" style="margin-right: 10px;">
					<button class="btn btn-default editButton" onclick='window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookEventsConfigurationEdit"' type="button" title="{vtranslate('LBL_EDIT', $MODULE)}">{vtranslate('LBL_EDIT', $MODULE)}</button>
				</div>
				<div class="btn-group pull-right" style="margin-right: 10px;">
					<button class="btn btn-default editButton" onclick='window.location.href = "https://outlook.office.com/calendar/view/month"' type="button" title="{vtranslate('LBL_CTOUTLOOK_EVENTS_DASHBOARD', $MODULE)}">{vtranslate('LBL_CTOUTLOOK_EVENTS_DASHBOARD', $MODULE)}</button>
				</div>

			</div>
		</div>

		<h4><a class='fa fa-info-circle' href="index.php?module=GoogleOffice365Suite&view=CTOffice365SuiteDocument&type=Events" title="{vtranslate('LBL_CLIECK_HERE_TO_GET_CLIENT_ID_AND_CLIENT_SECRET_AND_REDIRECT_URL', $MODULE)}"></a></h4>
		
		<div>
			<div class="block">
				<table class="table editview-table no-border">
					<tbody>
						<tr>
							<td class="fieldLabel"style="width:25%" ><label>{vtranslate('LBL_CLIENT_ID', $MODULE)}</label></td>
							<td class="fieldValue"><span>{$CLIENTID}</span></td>
						</tr>
						<tr>
							<td class="fieldLabel" ><label>{vtranslate('LBL_CLIENT_SECRET', $MODULE)}</label></td>
							<td class="fieldValue" ><span>{$CLIENTSECRET}</span></td>
						</tr>
						<tr>
							<td class="fieldLabel"><label>{vtranslate('LBL_TENANTID', $MODULE)}</label></td>
							<td class="fieldValue" style="border-left: none;">
								<span class="password">{$TENANTID}</span>
							</td>
						</tr>
						<tr>
							<td class="fieldLabel"><label>{vtranslate('LBL_REDIRECT_URL', $MODULE)}</label></td>
							<td class="fieldValue" style="border-left: none;">
								<span class="password">{$REDIRECTURL}</span>
							</td>
						</tr>
						<tr>
							<td class="fieldLabel" ><label>{vtranslate('LBL_USERNAME', $MODULE)}</label></td>
							<td class="fieldValue" ><span>{$USERNAME}</span></td>
						</tr>
						<tr>
							<td class="fieldLabel" ><label>{vtranslate('LBL_PASSWORD', $MODULE)}</label></td>
							<td class="fieldValue" ><span>*****</span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
