<?php
/* Smarty version 4.3.4, created on 2024-08-16 08:31:14
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Broadcast/ListViewContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66bf0e52090de8_17845333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3865bd325aff106594d26f1c52d14650b1bade75' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Broadcast/ListViewContents.tpl',
      1 => 1723797070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66bf0e52090de8_17845333 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar-right"></nav><div class="container-fluid"><div class="row"><div class="col-12"><div class= "sidebar-essentials" id="sidebar-essentials" style="margin-left: -250px;"></div><div id="listview-actions" class="listview-actions-container"><!-- Add filter section here --><div class="filter-section mb-3"><div class="row mb-2"><div class="col-md-3"><label for="searchInput">Search</label><input type="text" id="searchInput" class="form-control" placeholder="Search broadcast"></div><div class="col-md-3"><label for="statusFilter">Status</label><select id="statusFilter" class="form-control"><option value="">All Statuses</option><option value="Finished">FINISHED</option><option value="Queue">QUEUE</option><option value="Pending">PENDING</option><option value="Failed">FAILED</option></select></div><div class="col-md-3"><label for="templateFilter">Template</label><select id="templateFilter" class="form-control"><option value="">All Templates</option><!-- Template populated dynamically --></select></div><div class="col-md-3"><label for="startDateFilter">From</label><input type="date" id="startDateFilter" class="form-control" placeholder="Start Date"></div></div><div class="row"><div class="col-md-3 mt-3"><label for="endDateFilter">To</label><input type="date" id="endDateFilter" class="form-control" placeholder="End Date"></div><div class="col-md-3 mt-4"><button id="applyFilter" class="btn btn-primary" style="margin-top: 1.6rem">Apply Filter</button></div><div class="col-md-3 mt-4" style="margin-left: -162px;"><button id="resetFilter" class="btn btn-secondary" style="margin-top: 1.6rem; margin-left: -10px">Reset Filter</button></div></div></div><!-- End of filter section --><hr /><!-- Table section --><div class="list-content"><div class="listview-table table-engine" style="max-height: 600px; overflow-y: auto;"><table id="listview-table" class="table listview-table"><thead><tr class="listViewContentHeader"><th>Title</th><th>Template Name</th><th>Status</th><th>Schedule</th><th>Action</th></tr></thead><tbody id="broadcast-list-body"></tbody></table></div></div></div></div></div></div><!-- End table --><!--Broadcast Logs --><div class="modal fade" id="broadcastLogsModal" tabindex="-1" role="dialog" aria-labelledby="broadcastLogsModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="broadcastLogsModalLabel">WhatsApp Broadcast Logs</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div style="max-height: 700px; overflow-y: auto;"><button id="exportButton" class="btn  mb-3" style="margin-bottom: 10px;">Export to CSV</button><table class="table" id="broadcastLogsTable"><thead><tr><th>Send To</th><th>Delivery Status</th><th>Error</th><th>Delivery Time</th></tr></thead><tbody></tbody></table></div></div><div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div></div></div></div><!-- End Broadcat logs --><style>.sidebar-essentials {margin-left: -241px}.listview-table thead {position: sticky;top: 0;background-color: #fff;z-index: 1;}.navbar-right{display:none;}.listViewContentHeader {text-align: center;}.listViewPageDiv{margin-left: -120px;}.table {border: 1px solid #ddd;border-collapse: collapse;}.table th,.table td {border: 1px solid #ddd;padding: 8px;}.table th {background-color: #f2f2f2;text-align: left;}.error-cell {max-width: 200px;overflow: hidden;}.error-content {max-height: 100px;overflow-y: auto;white-space: pre-wrap;word-wrap: break-word;}.mt-3 {margin-top: 1rem;}.mt-4 {margin-top: 1.5rem;}</style>
<?php echo '<script'; ?>
 src="layouts/v7/modules/Broadcast/resources/broadcast.js"><?php echo '</script'; ?>
>
<?php }
}