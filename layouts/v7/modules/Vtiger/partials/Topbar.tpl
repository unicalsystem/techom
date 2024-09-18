

{strip}
	{include file="modules/Vtiger/Header.tpl"}

	{assign var=APP_IMAGE_MAP value=Vtiger_MenuStructure_Model::getAppIcons()}
	<nav class="navbar navbar-inverse navbar-fixed-top app-fixed-navbar">
		<div class="container-fluid global-nav">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-8 app-navigator-container">
					<div class="row">
						<div id="appnavigator" class="col-sm-2 col-xs-2 cursorPointer app-switcher-container" data-app-class="{if $MODULE eq 'Home' || !$MODULE}fa-dashboard{else}{$APP_IMAGE_MAP[$SELECTED_MENU_CATEGORY]}{/if}">
							<div class="row app-navigator">
								<span class="app-icon fa fa-bars"></span>
							</div>
						</div>
						<div class="logo-container col-sm-3 col-xs-9">
                            <div class="row">
                               	<a href="index.php" class="company-logo">
									<img src="{$COMPANY_LOGO->get('imagepath')}" alt="{$COMPANY_LOGO->get('alt')}"/>
								</a>
                            </div>
                        </div>
					</div>
				</div>
				<div class="navbar-header paddingTop5">
					<button type="button" class="navbar-toggle collapsed border0" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<i class="fa fa-th"></i>
					</button>
					<button type="button" class="navbar-toggle collapsed border0" data-toggle="collapse" data-target="#search-links-container" aria-expanded="false">
						<i class="fa fa-search"></i>
					</button>
				</div>

				<div class="col-sm-3">
					<div id="search-links-container" class="search-links-container collapse navbar-collapse">
						<div class="search-link">
							<span class="fa fa-search" aria-hidden="true"></span>
							<input class="keyword-input" type="text" placeholder="{vtranslate('LBL_TYPE_SEARCH')}" value="{$GLOBAL_SEARCH_VALUE}">
							<span id="adv-search" class="adv-search fa fa-chevron-circle-down pull-right cursorPointer" aria-hidden="true"></span>
						</div>
					</div>
				</div>
				
				
					<ul id="left-shortcuts" class="nav navbar-nav" style=" display: flex; align-items: center; margin-top: -8px">
					<li style="margin-right: 15px; text-align: center;">
						<a href="index.php?module=Accounts&amp;view=List&amp;app=SALES" title="Clients" class="shortcut-icon">
							<img src="layouts/v7/resources/Images/icons/Clients.png" alt="Clients" style="width: 25px; height: 25px;">
							<div class="shortcut-label">Clients</div>
						</a>
					</li>
					<li style="margin-right: 15px; text-align: center;">
						<a href="index.php?module=Contacts&amp;view=List&amp;app=SALES" title="Contacts" class="shortcut-icon">
							<img src="layouts/v7/resources/Images/icons/Contacts.png" alt="Contacts" style="width: 22px; height: 24px;">
							<div class="shortcut-label">Contacts</div>
						</a>
					</li>
					<li style="margin-right: 15px; text-align: center;">
						<a href="index.php?module=Potentials&amp;view=List&amp;app=SALES" title="Openings" class="shortcut-icon">
							<img src="layouts/v7/resources/Images/icons/openings.png" alt="Openings" style="width: 24px;height: 25px;">
							<div class="shortcut-label">Openings</div>
						</a>
					</li>
					<li style="margin-right: 15px; text-align: center;">
						<a href="index.php?module=Leads&amp;view=List&amp;app=MARKETING" title="Profiles" class="shortcut-icon">
							<img src="layouts/v7/resources/Images/icons/Profile.png" alt="Profile" style="width: 22px; height: 25px;">
							<div class="shortcut-label">Candidates</div>
						</a>
					</li>
					<li style="margin-right: 15px;">
						<div class="whatsapp-container">
							<a href="#" id="whatsapp-chat-icon" title="WhatsApp Chat" class="shortcut-icon" style="margin-top: -2px">
								<img src="layouts/v7/resources/Images/icons/whatsapp.png" alt="WhatsApp" style="width: 24px;height: 25px; margin-bottom: 1px">
								<div class="shortcut-label">WhatsApp</div>
							</a>
							
							
								<!-- WhatsApp Chat Widget -->
								<div id="whatsapp-chat-widget" class="whatsapp-chat-widget">
    <div class="chat-header">
        <span>WhatsApp</span>
        <div class="chat-header-icons">
              <i class="fa fa-search" id="search-icon"></i>
               <i class="fa fa-sign-out" id="logout-icon"></i>
        </div>
		<div id="search-container" style="display: none;">
           <input type="text" id="search-input" class="curved-input" placeholder="Search chats..." style="color:#050505;">
        </div>

        <span id="close-chat" class="close-chat">&times;</span>
    </div>
    <div id="chat-inbox" class="chat-body">
        <!-- Inbox items will be dynamically added here -->
    </div>
    <div id="chat-conversation" class="chat-body" style="display: none;">
        <div class="conversation-header">
            <i class="fa fa-arrow-left back-to-inbox"></i>
            <div class="profile-pic"></div>
            <span class="contact-name" ></span>
        </div>
        <div class="messages">
            <!-- Messages will be dynamically added here -->
        </div>
        <div class="chat-footer">
            <div id="message-input-area">
                <i class="fa fa-smile-o"></i>
                <i class="fa fa-paperclip"></i>
                <input type="text" placeholder="Type a message">
                <button class="send-message-btn" type="button"><i class="fa fa-paper-plane"></i></button>
            </div>
            <div id="template-message-area" style="display: none;">
    <div class="template-message-container">
        <p>Chat passed the 24-hour window</p>
        <button class="send-template-btn" type="button">Send Template</button>
    </div>
</div>

        </div>
    </div>
</div>
							</div>
						</li>
                </ul>

				
				<div id="navbar" class="col-sm-6 col-xs-12 collapse navbar-collapse navbar-right global-actions">
					<ul class="nav navbar-nav" style="margin-top: -8px">
				
						<li>
							<div class="dropdown pull-left">
								<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<a href="#" id="menubar_quickCreate" class="" title="{vtranslate('LBL_QUICK_CREATE',$MODULE)}" aria-hidden="true">
									 <img src="layouts/v7/resources/Images/icons/Contacts-white.png" alt="Create" style="width: 25px; height: 25px;">
									</a>
								</div>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="width:500px;">
									<li class="title" style="padding: 5px 0 0 15px;">
										<strong>{vtranslate('LBL_QUICK_CREATE',$MODULE)}</strong>
									</li>
									<hr/>	
									<li id="quickCreateModules" style="padding: 0 5px;">
										<div class="col-lg-12" style="padding-bottom:15px;">
											{assign var='count' value=0}
											{foreach key=moduleName item=moduleModel from=$QUICK_CREATE_MODULES}
												{if $moduleModel->isPermitted('CreateView') || $moduleModel->isPermitted('EditView')}
													{assign var='quickCreateModule' value=$moduleModel->isQuickCreateSupported()}
													{assign var='singularLabel' value=$moduleModel->getSingularLabelKey()}
													{assign var=hideDiv value={!$moduleModel->isPermitted('CreateView') && $moduleModel->isPermitted('EditView')}}
													{if $quickCreateModule == '1'}
														{if $count % 3 == 0}
															<div class="row">
															{/if}
															{* Adding two links,Event and Task if module is Calendar *}
															{if $singularLabel == 'SINGLE_Calendar'}
																{assign var='singularLabel' value='LBL_TASK'}
																<div class="{if $hideDiv}create_restricted_{$moduleModel->getName()} hide{else}col-lg-4 col-xs-4{/if}">
																	<a id="menubar_quickCreate_Events" class="quickCreateModule" data-name="Events"
																	   data-url="index.php?module=Events&view=QuickCreateAjax" href="javascript:void(0)">{$moduleModel->getModuleIcon('Event')}<span class="quick-create-module">{vtranslate('LBL_EVENT',$moduleName)}</span></a>
																</div>
																{if $count % 3 == 2}
																	</div>
																	<br>
																	<div class="row">
																{/if}
																<div class="{if $hideDiv}create_restricted_{$moduleModel->getName()} hide{else}col-lg-4 col-xs-4{/if}">
																	<a id="menubar_quickCreate_{$moduleModel->getName()}" class="quickCreateModule" data-name="{$moduleModel->getName()}"
																	   data-url="{$moduleModel->getQuickCreateUrl()}" href="javascript:void(0)">{$moduleModel->getModuleIcon('Task')}<span class="quick-create-module">{vtranslate($singularLabel,$moduleName)}</span></a>
																</div>
																{if !$hideDiv}
																	{assign var='count' value=$count+1}
																{/if}
															{else if $singularLabel == 'SINGLE_Documents'}
																<div class="{if $hideDiv}create_restricted_{$moduleModel->getName()} hide{else}col-lg-4 col-xs-4{/if} dropdown">
																	<a id="menubar_quickCreate_{$moduleModel->getName()}" class="quickCreateModuleSubmenu dropdown-toggle" data-name="{$moduleModel->getName()}" data-toggle="dropdown" 
																	   data-url="{$moduleModel->getQuickCreateUrl()}" href="javascript:void(0)">
																		{$moduleModel->getModuleIcon()}
																		<span class="quick-create-module">
																			{vtranslate($singularLabel,$moduleName)}
																			<i class="fa fa-caret-down quickcreateMoreDropdownAction"></i>
																		</span>
																	</a>
																	<ul class="dropdown-menu quickcreateMoreDropdown" aria-labelledby="menubar_quickCreate_{$moduleModel->getName()}">
																		<li class="dropdown-header"><i class="fa fa-upload"></i> {vtranslate('LBL_FILE_UPLOAD', $moduleName)}</li>
																		<li id="VtigerAction">
																			<a href="javascript:Documents_Index_Js.uploadTo('Vtiger')">
																				<img style=" margin-right: 4%;" title="Vtiger" alt="Vtiger" src="layouts/v7/skins//images/Vtiger.png">
																				{vtranslate('LBL_TO_SERVICE', $moduleName, {vtranslate('LBL_VTIGER', $moduleName)})}
																			</a>
																		</li>
																		<li class="dropdown-header"><i class="fa fa-link"></i> {vtranslate('LBL_LINK_EXTERNAL_DOCUMENT', $moduleName)}</li>
																		<li id="shareDocument"><a href="javascript:Documents_Index_Js.createDocument('E')">&nbsp;<i class="fa fa-external-link"></i>&nbsp;&nbsp; {vtranslate('LBL_FROM_SERVICE', $moduleName, {vtranslate('LBL_FILE_URL', $moduleName)})}</a></li>
																		<li role="separator" class="divider"></li>
																		<li id="createDocument"><a href="javascript:Documents_Index_Js.createDocument('W')"><i class="fa fa-file-text"></i> {vtranslate('LBL_CREATE_NEW', $moduleName, {vtranslate('SINGLE_Documents', $moduleName)})}</a></li>
																	</ul>
																</div>
															{else}
																<div class="{if $hideDiv}create_restricted_{$moduleModel->getName()} hide{else}col-lg-4 col-xs-4{/if}">
																	<a id="menubar_quickCreate_{$moduleModel->getName()}" class="quickCreateModule" data-name="{$moduleModel->getName()}"
																	   data-url="{$moduleModel->getQuickCreateUrl()}" href="javascript:void(0)">
																		{$moduleModel->getModuleIcon()}
																		<span class="quick-create-module">{vtranslate($singularLabel,$moduleName)}</span>
																	</a>
																</div>
															{/if}
															{if $count % 3 == 2}
																</div>
																<br>
															{/if}
														{if !$hideDiv}
															{assign var='count' value=$count+1}
														{/if}
													{/if}
												{/if}
											{/foreach}
										</div>
									</li>
								</ul>
							</div>
						</li>
						{assign var=USER_PRIVILEGES_MODEL value=Users_Privileges_Model::getCurrentUserPrivilegesModel()}
						{assign var=CALENDAR_MODULE_MODEL value=Vtiger_Module_Model::getInstance('Calendar')}
						{if $USER_PRIVILEGES_MODEL->hasModulePermission($CALENDAR_MODULE_MODEL->getId())}
						<li>
    <div>
        <a href="index.php?module=Calendar&view={$CALENDAR_MODULE_MODEL->getDefaultViewName()}" title="{vtranslate('Calendar','Calendar')}" aria-hidden="true">
            <img src="layouts/v7/resources/Images/icons/Calender.png" alt="Calendar" style="width: 23px; height: 25px;">
        </a>
    </div>
</li>
						{/if}
						{assign var=REPORTS_MODULE_MODEL value=Vtiger_Module_Model::getInstance('Reports')}
						{if $USER_PRIVILEGES_MODEL->hasModulePermission($REPORTS_MODULE_MODEL->getId())}
							<li>
    <div>
        <a href="index.php?module=Reports&view=List" title="{vtranslate('Reports','Reports')}" aria-hidden="true">
            <img src="layouts/v7/resources/Images/icons/Report.png" alt="Reports" style="width: 23px; height: 25px;">
        </a>
    </div>
</li>
						{/if}
						{if $USER_PRIVILEGES_MODEL->hasModulePermission($CALENDAR_MODULE_MODEL->getId())}
							 <li>
        <div>
            <a href="#" class="taskManagement" title="{vtranslate('Tasks','Vtiger')}" aria-hidden="true">
                <img src="layouts/v7/resources/Images/icons/Task.png" alt="Tasks" style="width: 23px; height: 25px;">
            </a>
        </div>
    </li>
						{/if}
						<li class="dropdown">
							<div>
								<a href="#" class="userName dropdown-toggle pull-right" data-toggle="dropdown" role="button">
									 <img src="layouts/v7/resources/Images/icons/Profilesetting.png" alt="Profile Settings" style="width: 23px; height: 25px;">
									<span class="" aria-hidden="true" title="{$USER_MODEL->get('userlabel')}
										  ({$USER_MODEL->get('user_name')})"></span>
									<span class="link-text-xs-only hidden-lg hidden-md hidden-sm">{$USER_MODEL->getName()}</span>
								</a>
								<div class="dropdown-menu logout-content" role="menu">
									<div class="row">
										<div class="col-lg-4 col-sm-4">
											<div class="profile-img-container">
												{assign var=IMAGE_DETAILS value=$USER_MODEL->getImageDetails()}
												{if $IMAGE_DETAILS neq '' && $IMAGE_DETAILS[0] neq '' && $IMAGE_DETAILS[0].path eq ''}
													<i class='vicon-vtigeruser' style="font-size:90px"></i>
												{else}
													{foreach item=IMAGE_INFO from=$IMAGE_DETAILS}
														{if !empty($IMAGE_INFO.url)}
															<img src="{$IMAGE_INFO.url}" width="100px" height="100px">
														{/if}
													{/foreach}
												{/if}
											</div>
										</div>
										<div class="col-lg-8 col-sm-8">
											<div class="profile-container">
												<h4>{$USER_MODEL->get('first_name')} {$USER_MODEL->get('last_name')}</h4>
												<h5 class="textOverflowEllipsis" title='{$USER_MODEL->get('user_name')}'>{$USER_MODEL->get('user_name')}</h5>
												<p>{$USER_MODEL->getUserRoleName()}</p>
											</div>
										</div>
									</div>
									<div id="logout-footer" class="logout-footer clearfix">
										<hr style="margin: 10px 0 !important">
										<div class="">
											<span class="pull-left">
												<span class="fa fa-cogs"></span>
												<a id="menubar_item_right_LBL_MY_PREFERENCES" href="{$USER_MODEL->getPreferenceDetailViewUrl()}">{vtranslate('LBL_MY_PREFERENCES')}</a>
											</span>
											<span class="pull-right">
												<span class="fa fa-power-off"></span>
												<a id="menubar_item_right_LBL_SIGN_OUT" href="index.php?module=Users&action=Logout">{vtranslate('LBL_SIGN_OUT')}</a>
											</span>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		
 <link rel="stylesheet" href="layouts/v7/modules/Vtiger/partials/WhatsAppPopup.css">
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

{literal}


<script src="layouts/v7/modules/Vtiger/resources/WhatsAppPopup.js"></script>



<style>
   
	#left-shortcuts li {
			margin-right: 15px;
			margin-bottom: -30px; 
		}
		.shortcut-icon {
			display: flex;
			flex-direction: column;
			align-items: center;
			text-decoration: none;
		}
		.shortcut-label {
			margin-top: -4px;
			font-size: 11px;

			color: #00008B;
			transition: color 0.3s ease;
		}
		.shortcut-icon:hover .shortcut-label {
			color: black;
			
		}
		 .curved-input {
        border-radius: 20px;
        border: 1px solid #075e54;
        outline: none;
    }
    .curved-input:focus {
        border-color: #075e54;
        box-shadow: #075e54;
    }

</style>
	
{/literal}
{/strip}
