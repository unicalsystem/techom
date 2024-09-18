jQuery(document).ready(function() {
    let allBroadcasts = [];
    let templates = [];

    function fetchBroadcasts() {
        const url = 'https://24by7chat.com/api/broadcast/get_broadcast';
        const bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOiJHcUVIRnVWalBlRFhCNTI5aEhOaEpHV1J6cmZzaHlTZSIsInJvbGUiOiJ1c2VyIiwicGFzc3dvcmQiOiIkMmIkMTAkNG5nY00ydlNuVmZITzJiT3V4MC9oLkROQ2lZbDlNREpET2NHT0guVXpqNldrYVpYb1Vkd3kiLCJlbWFpbCI6InNvdXJjaW5nQHVuaWNhbHN5c3RlbXMuY29tIiwiaWF0IjoxNzIzMjYzOTQ3fQ.37-b1YX4eUnRJiHn04Dc2MGCsFzaBnOE6q-lCyZDVkQ'; 

        fetch(url, {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + bearerToken,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.data) {
                allBroadcasts = data.data.sort((a, b) => new Date(b.createdAt) - new Date(a.createdAt));
                updateTable();
            } else {
                console.error('No data received from API');
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    }

    function fetchTemplates() {
        const url = 'https://24by7chat.com/api/user/get_my_meta_templets';
        const bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOiJHcUVIRnVWalBlRFhCNTI5aEhOaEpHV1J6cmZzaHlTZSIsInJvbGUiOiJ1c2VyIiwicGFzc3dvcmQiOiIkMmIkMTAkNG5nY00ydlNuVmZITzJiT3V4MC9oLkROQ2lZbDlNREpET2NHT0guVXpqNldrYVpYb1Vkd3kiLCJlbWFpbCI6InNvdXJjaW5nQHVuaWNhbHN5c3RlbXMuY29tIiwiaWF0IjoxNzIzMjYzOTQ3fQ.37-b1YX4eUnRJiHn04Dc2MGCsFzaBnOE6q-lCyZDVkQ'; 

        fetch(url, {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + bearerToken,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.data) {
                templates = data.data;
                updateTemplateFilter();
            } else {
                console.error('No template data received from API');
            }
        })
        .catch(error => {
            console.error('Error fetching template data:', error);
        });
    }

    function updateTable() {
        const tableBody = document.getElementById('broadcast-list-body');
        tableBody.innerHTML = ''; // Clear existing content
    
        const searchTerm = jQuery('#searchInput').val().toLowerCase();
        const statusFilter = jQuery('#statusFilter').val();
        const templateFilter = jQuery('#templateFilter').val();
        const startDate = new Date(jQuery('#startDateFilter').val());
        const endDate = new Date(jQuery('#endDateFilter').val());
        endDate.setHours(23, 59, 59, 999); // Set to end of day
    
        // console.log('Applying filters:');
        // console.log('Search Term:', searchTerm);
        // console.log('Status Filter:', statusFilter);
        // console.log('Template Filter:', templateFilter);
        // console.log('Start Date:', startDate);
        // console.log('End Date:', endDate);
    
        allBroadcasts.forEach(broadcast => {
            const templateData = JSON.parse(broadcast.templet);
            const templateName = templateData.name || 'N/A';
            const broadcastDate = new Date(broadcast.createdAt);
    
            // Apply filters
            const statusMatches = statusFilter === '' || broadcast.status === statusFilter;
            const templateMatches = templateFilter === '' || templateName === templateFilter;
            const dateMatches = (isNaN(startDate.getTime()) || broadcastDate >= startDate) &&
                                (isNaN(endDate.getTime()) || broadcastDate <= endDate);
    
            // console.log('Broadcast:', broadcast.title);
            // console.log('Status Matches:', statusMatches);
            // console.log('Template Matches:', templateMatches);
            // console.log('Date Matches:', dateMatches);
    
            if (searchTerm === '' || broadcast.title.toLowerCase().includes(searchTerm)) {
                if (statusMatches && templateMatches && dateMatches) {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${broadcast.title}</td>
                        <td>${templateName}</td>
                        <td>${broadcast.status}</td>
                        <td>${broadcastDate.toLocaleString()}</td>
                        <td><button class="btn btn-sm btn-info view-details" data-id="${broadcast.broadcast_id}"><i class="fa fa-eye"></i></button></td>
                    `;
                    tableBody.appendChild(row);
                }
            }
        });
    }
    
    

    function updateTemplateFilter() {
        const templateFilter = jQuery('#templateFilter');
        templateFilter.find('option:not(:first)').remove(); // Clear existing options except the first one
        templates.forEach(template => {
            templateFilter.append(`<option value="${template.name}">${template.name}</option>`);
        });
    }

    function fetchBroadcastLogs(broadcastId) {
        const url = `https://24by7chat.com/api/broadcast/get_broadcast_logs`;
        const bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOiJHcUVIRnVWalBlRFhCNTI5aEhOaEpHV1J6cmZzaHlTZSIsInJvbGUiOiJ1c2VyIiwicGFzc3dvcmQiOiIkMmIkMTAkNG5nY00ydlNuVmZITzJiT3V4MC9oLkROQ2lZbDlNREpET2NHT0guVXpqNldrYVpYb1Vkd3kiLCJlbWFpbCI6InNvdXJjaW5nQHVuaWNhbHN5c3RlbXMuY29tIiwiaWF0IjoxNzIzMjYzOTQ3fQ.37-b1YX4eUnRJiHn04Dc2MGCsFzaBnOE6q-lCyZDVkQ';

        fetch(url, {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + bearerToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: broadcastId })
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.data) {
                populateLogsTable(data.data);
                jQuery('#broadcastLogsModal').modal('show');
            } else {
                console.error('No log data received from API');
            }
        })
        .catch(error => {
            console.error('Error fetching log data:', error);
        });
    }

    function populateLogsTable(logs) {
    const tableBody = jQuery('#broadcastLogsTable tbody');
    tableBody.empty(); // Clear existing content

    logs.forEach(log => {
        let errorDetails = 'N/A';
        if (log.err) {
            try {
                const errorObj = JSON.parse(log.err);
                if (errorObj.entry && 
                    errorObj.entry[0].changes && 
                    errorObj.entry[0].changes[0].value.statuses && 
                    errorObj.entry[0].changes[0].value.statuses[0].errors) {
                    const error = errorObj.entry[0].changes[0].value.statuses[0].errors[0];
                    errorDetails = error.error_data.details || error.message || 'Unknown error';
                }
            } catch (e) {
                console.error('Error parsing error details:', e);
                errorDetails = log.err; // Fallback to the original error string
            }
        }

        const row = `
            <tr>
                <td>${log.send_to}</td>
                <td>${log.delivery_status}</td>
                <td class="error-cell"><div class="error-content">${errorDetails}</div></td>
                <td>${new Date(parseInt(log.delivery_time)).toLocaleString()}</td>
            </tr>
        `;
        tableBody.append(row);
    });
}

    // Initial fetch
    fetchBroadcasts();
    fetchTemplates();

    // Apply Filter button click event
    jQuery('#applyFilter').on('click', function() {
        updateTable();
    });

    // Reset Filter button click event
    jQuery('#resetFilter').on('click', function() {
        jQuery('#searchInput').val('');
        jQuery('#statusFilter').val('');
        jQuery('#templateFilter').val('');
        jQuery('#startDateFilter').val('');
        jQuery('#endDateFilter').val('');
        updateTable();
    });

    // Refresh button (optional)
    jQuery('#refresh-list').on('click', function() {
        fetchBroadcasts();
    });

    // View details button click event
    jQuery(document).on('click', '.view-details', function() {
        const broadcastId = jQuery(this).data('id');
        fetchBroadcastLogs(broadcastId);
    });
});