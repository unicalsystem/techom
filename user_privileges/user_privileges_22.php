<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H4';

$current_user_parent_role_seq='H1::H2::H3::H4';

$current_user_profiles=array(4,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'18'=>0,'19'=>0,'20'=>0,'21'=>0,'22'=>0,'23'=>0,'24'=>0,'25'=>0,'26'=>0,'27'=>1,'30'=>0,'31'=>0,'32'=>0,'33'=>1,'34'=>0,'35'=>0,'36'=>0,'37'=>0,'38'=>1,'39'=>0,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>1,'45'=>1,'46'=>1,'47'=>1,'48'=>0,'49'=>0,'50'=>1,'51'=>1,'52'=>1,'53'=>1,'54'=>1,'28'=>0,);

$profileActionPermission=array(2=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),4=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),6=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,9=>0,10=>0,),8=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,6=>0,),9=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,),10=>array(0=>0,1=>0,2=>0,4=>0,),13=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),14=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,5=>1,6=>1,10=>0,),15=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,),16=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,),18=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,5=>1,6=>1,10=>0,),19=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,5=>1,6=>1,10=>1,),20=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,5=>0,6=>0,),21=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,5=>0,6=>0,),22=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,5=>0,6=>0,),23=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,3=>0,4=>0,7=>0,6=>0,13=>0,),26=>array(0=>1,1=>1,2=>1,3=>0,4=>0,7=>1,),30=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),31=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,11=>1,12=>1,),32=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),40=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,),41=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>1,6=>1,10=>1,),42=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),43=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),47=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,),48=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,),51=>array(0=>1,1=>1,2=>1,3=>0,4=>1,7=>1,5=>0,6=>0,8=>0,),52=>array(0=>1,1=>1,2=>1,3=>0,4=>1,7=>1,5=>0,6=>0,8=>0,),);

$current_user_groups=array(2,3,);

$subordinate_roles=array('H5','H7',);

$parent_roles=array('H1','H2','H3',);

$subordinate_roles_users=array('H5'=>array(13,15,16,),'H7'=>array(21,),);

$user_info=array('user_name'=>'test_mail','is_admin'=>'off','user_password'=>'$2y$10$IJaTm6jzMD.xs.Baso9gMOBACyylZHAe1mmEQUNsr9qz5z5avsnya','confirm_password'=>'$2y$10$VluMf6hENRBfCH7A73nR0eDMz3w3u5gPq9efH86kEogRrOmSQGT.C','first_name'=>'TEST','last_name'=>'T','roleid'=>'H4','email1'=>'rajkumar.mahi6@gmail.com','status'=>'Inactive','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'','phone_work'=>'','department'=>'','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'yyyy-mm-dd','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'gvhMeTLTkbbsUTo','time_zone'=>'UTC','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'medium','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'Home','userlabel'=>'TEST T','currency_name'=>'USA, Dollars','currency_code'=>'USD','currency_symbol'=>'&#36;','conv_rate'=>'1.00000','record_id'=>'','id'=>'22');
?>