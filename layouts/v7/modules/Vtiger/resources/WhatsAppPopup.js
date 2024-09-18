jQuery(document).ready(function($) {
    const userApiUrl = 'https://24by7chat.com/api/inbox/get_chats';
    const agentApiUrl = 'https://24by7chat.com/api/agent/get_my_assigned_chats';
    const userConvoApiUrl = 'https://24by7chat.com/api/inbox/get_convo';
    const agentConvoApiUrl = 'https://24by7chat.com/api/agent/get_convo';
    const userSendTextApiUrl = 'https://24by7chat.com/api/inbox/send_text';
    const agentSendTextApiUrl = 'https://24by7chat.com/api/agent/send_text';
    const templateApiUrl = 'https://24by7chat.com/api/user/get_my_meta_templets';
    const sendTemplateApiUrl = 'https://24by7chat.com/api/inbox/send_meta_templet';
    const userLoginApiUrl  = 'https://24by7chat.com/api/user/login';
    const agentLoginApiUrl = 'https://24by7chat.com/api/agent/login';
    let bearerToken = sessionStorage.getItem('bearerToken') || '';
    let userType = sessionStorage.getItem('userType') || '';

	let currentChatId = null;
    let currentToNumber = null;
    let currentToName = null;
    let currentConversation = [];
    let conversationFetchInterval;
    let templates = [];
    let chatInputs = {}; 
    let inboxRefreshInterval;
    let selectedTemplate;   
    let placeholderValues = {};
    let isFirstLoad = true;
    let isUserScrolling = false;
    let selectedTemplateIndex = null;
    let isMinimized = false;    
    
    
    function getInitials(name) {
        const names = name.split(' ');
        const initials = names.map(name => name.charAt(0)).join('');
        return initials.toUpperCase();
    }
    function minimizeWidget() {
        $('#whatsapp-chat-widget').removeClass('active');
        isMinimized = true;
        stopInboxRefresh();
        stopPeriodicFetch();
    }
    
    $('#search-icon').click(function() {
        $('#search-container').slideToggle();
        $('#search-input').focus();
    });

    $('#search-input').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('.inbox-item').each(function() {
            const name = $(this).find('.inbox-name').text().toLowerCase();
            const message = $(this).find('.inbox-message').text().toLowerCase();
            if (name.includes(searchTerm) || message.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    function hideSearchContainer() {
        $('#search-container').hide();
    }
    
  // login popup
$('body').append(`
    <div id="login-popup" style="display:none;">
        <div class="login-popup-content">
            <button id="close-button">&times;</button>
            <img src="https://24by7chat.com/media/RbaQN4XEWBNaJUQEEDw9JrHZ1JroeIYu.png" alt="Logo" class="logo">
            <h1>Welcome to 24By7Chat</h1>
            <h2>Connect with Your Customers</h2>
            <p>Streamline your business communication</p>
           
            <div id="user-type-selection">
                <button id="user-select">Business Owner</button>
                <button id="agent-select">Agent</button>
            </div>
            <div id="login-form" style="display:none;">
                <input type="email" id="login-email" placeholder="Business Email">
                <input type="password" id="login-password" placeholder="Password">
                <button id="login-button">Login to Chat</button>
                <button id="back-button">Back</button>
            </div>
        </div>
    </div>
`);
 
//css for login popup
$('head').append(`
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');
 
        #login-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            font-family: 'Open Sans', sans-serif;
        }
        .login-popup-content {
            position: relative;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        #close-button {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            color: #128C7E;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        #close-button:hover {
            color: #075E54;
        }
        .logo {
            width: 100px;
            margin-bottom: 20px;
        }
        .login-popup-content h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #128C7E;
            font-weight: 600;
        }
        .login-popup-content h2 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #4A4A4A;
            font-weight: 400;
        }
        .login-popup-content p {
            font-size: 14px;
            margin-bottom: 25px;
            color: #777;
        }
        .login-popup-content input {
            display: block;
            width: 100%;
            margin: 15px 0;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        .login-popup-content input:focus {
            border-color: #128C7E;
            outline: none;
        }
        #login-button, #user-select, #agent-select, #back-button {
            background-color: #128C7E;
            color: white;
            border: none;
            padding: 12px 0;
            border-radius: 25px;
            cursor: pointer;
            margin: 10px 0;
            width: 100%;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        #login-button:hover, #user-select:hover, #agent-select:hover {
            background-color: #075E54;
        }
        #back-button {
            background-color: #ECE5DD;
            color: #128C7E;
            margin-top: 20px;
        }
        #back-button:hover {
            background-color: #DCF8C6;
        }
        #user-type-selection {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        #user-type-selection button {
            width: 48%;
        }
    </style>
`);
 
$('#close-button').on('click', function() {
    $('#login-popup').hide();
});

$('#close-button').on('click', function() {
    $('#login-popup').hide();
});


let selectedUserType = '';

// Modify login function
function login(email, password) {
    const loginDetails = {
        email: email,
        password: password
    };

    const loginApiUrl = selectedUserType === 'agent' ? agentLoginApiUrl : userLoginApiUrl;

    return fetch(loginApiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(loginDetails)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            bearerToken = data.token;
            userType = selectedUserType;
            sessionStorage.setItem('bearerToken', bearerToken);
            sessionStorage.setItem('userType', userType);
            console.log('Login successful, token received:', bearerToken);
            initializeWidget();
            return true;
        } else {
            console.error('Login failed');
            return false;
        }
    })
    .catch(error => {
        console.error('Error during login:', error);
        return false;
    });
}

function logout() {
    bearerToken = '';
    userType = '';
    sessionStorage.removeItem('bearerToken');
    sessionStorage.removeItem('userType');
    $('#whatsapp-chat-widget').removeClass('active');
    isMinimized = true;
    showUserTypeSelection();
}

$(document).on('click', '#logout-icon', logout);


// Show login popup when chat icon is clicked
$('#whatsapp-chat-icon').click(function(e) {
    e.preventDefault();
    showUserTypeSelection();
});

function showUserTypeSelection() {
    if (!bearerToken) {
        $('#login-popup').show();
        $('#user-type-selection').show();
        $('#login-form').hide();
    } else {
        initializeWidget();
    }
}

$(document).on('click', '#login-popup .close-popup', function() {
    $('#login-popup').hide();
});

// Handle user type selection
$('#agent-select, #user-select').click(function() {
    selectedUserType = $(this).attr('id').split('-')[0];
    $('#user-type-selection').hide();
    $('#login-form').show();
});

// Handle back button click
$('#back-button').click(function() {
    showUserTypeSelection();
});

// Handle login button click
$('#login-button').click(function() {
    const email = $('#login-email').val();
    const password = $('#login-password').val();
    
    login(email, password).then(isLoggedIn => {
        if (isLoggedIn) {
            $('#login-popup').hide();
            $('#whatsapp-chat-widget').addClass('active');
            $('#chat-inbox').show();
            $('#chat-conversation').hide();
            startInboxRefresh();
        } else {
            alert('Login failed. Please try again.');
        }
    });
});

function fetchChats() {
    const apiUrl = userType === 'agent' ? agentApiUrl : userApiUrl;
    fetch(apiUrl, {
        headers: {
            'Authorization': `Bearer ${bearerToken}`
        }
    })
    .then(response => response.json())
    .then(data => {
        const chats = data.data;
        const inboxData = chats.map(chat => {
            let lastMessage;
            try {
                lastMessage = JSON.parse(chat.last_message);
            } catch (error) {
                console.error('Error parsing last_message:', error);
                lastMessage = { msgContext: { text: { body: 'Error parsing message' } } };
            }

            return {
                name: chat.sender_name,
                message: parseMessage(lastMessage),
                date: formatDateForInbox(new Date(chat.last_message_came * 1000)),
                chatId: chat.chat_id,
                mobile: chat.sender_mobile,
                timestamp: chat.last_message_came,
                isUnread: chat.unread_count > 0
            };
        });
        
        inboxData.sort((a, b) => b.timestamp - a.timestamp);
        
        renderInbox(inboxData);
    })
    .catch(error => {
        console.error('Error fetching chats:', error);
    });
}

    function startPeriodicFetch() {
        if (currentChatId) {
            fetchConversation(currentChatId);
            conversationFetchInterval = setInterval(() => {
                fetchConversation(currentChatId);
            }, 1000);
        }
    }


    function stopPeriodicFetch() {
        clearInterval(conversationFetchInterval);
    }

    function scrollToBottom(container) {
        container.scrollTop(container[0].scrollHeight);
    }
    

    function parseMessage(lastMessage) {
        if (lastMessage && lastMessage.msgContext && lastMessage.msgContext.text && lastMessage.msgContext.text.body) {
            const messageBody = lastMessage.msgContext.text.body;
            return messageBody.length > 15 ? messageBody.substring(0, 15) + '...' : messageBody;
        }
        return 'Message content not available';
    }

    function formatDateForInbox(date) {
        const now = new Date();
        const isToday = date.toDateString() === now.toDateString();
        
        if (isToday) {
            // For today's messages, return time in hh:mm AM/PM format
            return date.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
        } else {
            // For other dates, return only the date in DD/MM/YYYY format
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-indexed
            const year = date.getFullYear();
    
            return `${day}/${month}/${year}`;
        }
    }
    

    function formatDateTimeForConversation(date) {
        // Extract day, month, year, hour, and minute
        const day = date.getDate().toString().padStart(2, '0');
        const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-indexed
        const year = date.getFullYear().toString().slice(-2); // Get last two digits of the year
        const hours = date.getHours() % 12 || 12; // Convert to 12-hour format
        const minutes = date.getMinutes().toString().padStart(2, '0');
        const ampm = date.getHours() >= 12 ? 'PM' : 'AM';
    
        // Format date as DDMMYY and time as HH:MM AM/PM
        return `${day}/${month}/${year}, ${hours}:${minutes} ${ampm}`;
    }

    function fetchConversation(chatId) {
        const convoApiUrl = userType === 'agent' ? agentConvoApiUrl : userConvoApiUrl;
        const requestBody = {
            chatId: chatId
        };
    
        fetch(convoApiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${bearerToken}`
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (!data.success) {
                throw new Error(data.message || 'API returned unsuccessful response');
            }
            const newConversation = data.data;
            if (Array.isArray(newConversation) && newConversation.length > 0) {
                if (JSON.stringify(newConversation) !== JSON.stringify(currentConversation)) {
                    currentConversation = newConversation;
                    const name = newConversation[0].senderName || 'Unknown'; 
                    const mobile = newConversation[0].senderMobile || 'Unknown'; 
                    currentChatId = chatId;
                    currentToNumber = mobile;
                    currentToName = name;
                    renderConversation(currentConversation, name, mobile);
                }
            } else {
                console.warn('Conversation is empty or not in expected format');
                renderConversation([], 'Unknown', 'Unknown');
            }
            checkMessageWindow(currentConversation);
        })
        .catch(error => {
            console.error('Error fetching conversation:', error);
            showErrorMessage('Failed to load conversation. Please try again later.');
        });
    }


    function renderInbox(inboxData) {
        const inboxHtml = inboxData.map(item => {
            const initials = getInitials(item.name);
            const messageDate = new Date(item.timestamp * 1000);
            const formattedDate = formatDateForInbox(messageDate);
            return `
                <div class="inbox-item ${item.isUnread ? 'unread' : ''}" data-chatid="${item.chatId}" data-name="${item.name}" data-mobile="${item.mobile}">
                    <div class="profile-pic">${initials}</div>
                    <div class="inbox-content">
                        <div class="inbox-name">${item.name}</div>
                        <div class="inbox-message">${item.message}</div>
                    </div>
                    <div class="inbox-time">${formattedDate}</div>
                </div>
            `;
        }).join('');
        $('#chat-inbox').html(inboxHtml);
    }
    
    function renderConversation(messages, name, mobile) {
        const messagesContainer = $('#chat-conversation .messages');
        const scrollPosition = messagesContainer.scrollTop();
        const scrollHeight = messagesContainer[0].scrollHeight;
    
        $('.conversation-header').html(`
            <i class="fa fa-arrow-left back-to-inbox"></i>
            <div class="header-info">
                <div class="contact-name">${name}</div>
                <div class="mobile">${mobile}</div>
            </div>
        `);
    
        const conversationHtml = messages.map(message => {
            const messageDate = new Date(message.timestamp * 1000);
            const formattedDate = formatDateTimeForConversation(messageDate);
            
            // Safely access message properties
            const messageBody = message.msgContext && message.msgContext.text && message.msgContext.text.body
                ? message.msgContext.text.body
                : (message.msgContext && message.msgContext.body) // fallback to msgContext.body if it exists
                    ? message.msgContext.body
                    : 'Message content not available'; // fallback message if no content is found
    
            const messageType = (message.route && message.route.toLowerCase() === 'incoming') ? 'incoming' : 'outgoing';
            const statusIndicator = getStatusIndicator(message);
            
            return `
                <div class="message ${messageType}">
                    <p>${messageBody}</p>
                    <div class="message-footer">
                        <span class="time">${formattedDate}</span>
                        ${messageType === 'outgoing' ? statusIndicator : ''}
                    </div>
                </div>
            `;
        }).join('');
    
        messagesContainer.html(conversationHtml);
    
        // Set the input field value to the stored input for this chat
        $('#message-input-area input[type="text"]').val(chatInputs[currentChatId] || '');
    
        if (isFirstLoad) {
            scrollToBottom(messagesContainer);
            isFirstLoad = false;
        } else {
            const newScrollHeight = messagesContainer[0].scrollHeight;
            const scrollDiff = newScrollHeight - scrollHeight;
            messagesContainer.scrollTop(scrollPosition + scrollDiff);
        }
    }


    function getStatusIndicator(message) {
        if (!message || !message.route || message.route.toLowerCase() !== 'outgoing') {
            return '';
        }
    
        let statusSvg = '';
        let statusTitle = '';
    
        switch (message.status) {
            case 'sent':
                statusSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15" width="16" height="15"><path fill="#92A58C" d="M10.91 3.316l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.879a.32.32 0 0 1-.484.033L1.891 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"></path></svg>`;
                statusTitle = 'Sent';
                break;
            case 'delivered':
                statusSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15" width="16" height="15"><path fill="#92A58C" d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.879a.32.32 0 0 1-.484.033L1.891 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"></path></svg>`;
                statusTitle = 'Delivered';
                break;
            case 'read':
                statusSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15" width="16" height="15"><path fill="#4FC3F7" d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.879a.32.32 0 0 1-.484.033L1.891 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"></path></svg>`;
                statusTitle = 'Read';
                break;
            default:
                statusSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15" width="16" height="15"><path fill="#92A58C" d="M10.91 3.316l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.879a.32.32 0 0 1-.484.033L1.891 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"></path></svg>`;
                statusTitle = 'Pending';
        }
    
        return `<span class="message-status" title="${statusTitle}">${statusSvg}</span>`;
    }

    function fetchTemplates() {
        fetch(templateApiUrl, {
            headers: {
                'Authorization': `Bearer ${bearerToken}`
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                templates = data.data; 
                console.log("Selected templates: " + templates);
                renderTemplatePopup(templates);
            } else {
                console.error('Failed to fetch templates');
            }
        })
        .catch(error => {
            console.error('Error fetching templates:', error);
        });
    }
    

    function renderTemplatePopup(templates) {
        $('#template-popup').remove();
    
        let popupHtml = `
            <div id="template-popup" class="template-popup">
                <div class="template-popup-content">
                    <span class="close-popup">&times;</span>
                    <h4 style="font-weight: bold; color: #333; font-family: 'Arial', sans-serif; text-align: center; margin-bottom: 20px; font-size: 18px; border-bottom: 2px solid #ddd; padding-bottom: 10px;">
  Templates
</h4>

                    <div class="accordion">
        `;
    
        templates.forEach((template, index) => {
            popupHtml += `
                <div class="accordion-item">
                    <h6 class="accordion-header">${template.name}</h6>
                    <div class="accordion-content">
                        <p>${getTemplateBody(template)}</p>
                        ${getPlaceholderInputs(template, index)}
                        <button class="template-action-btn" data-template-index="${index}">Select Template</button>
                    </div>
                </div>
            `;
        });
    
        popupHtml += `
                    </div>
                </div>
            </div>
        `;
    
    
        $('#whatsapp-chat-widget .chat-body').append(popupHtml);
    
        $('.close-popup').click(closeTemplatePopup);
        $('.accordion-header').click(toggleAccordion);
        $('.select-template-btn').click(selectTemplate);
        $('.send-selected-template-btn').click(sendSelectedTemplate);
        $('.template-action-btn').click(handleTemplateAction);
    
        $('#template-popup').show();
        $('#chat-conversation').hide();
        $('#chat-inbox').show();
    
        // Disable all placeholder inputs by default and add tooltip
        $('.placeholder-input input').prop('disabled', true).attr('title', 'Please select a template to edit placeholders');
    }
    
    function handleTemplateAction() {
        const templateIndex = $(this).data('template-index');
        
        if (selectedTemplateIndex === null) {
            // No template selected yet, so select this one
            selectTemplate(templateIndex);
            $(this).text('Send Template');
            selectedTemplateIndex = templateIndex;
        } else if (selectedTemplateIndex === templateIndex) {
            // This template is already selected, so send it
            sendSelectedTemplate();
        } else {
            // A different template was previously selected, so select this new one
            $('.template-action-btn').text('Select Template');
            selectTemplate(templateIndex);
            $(this).text('Send Template');
            selectedTemplateIndex = templateIndex;
        }
    }
    
    function selectTemplate(templateIndex) {
        selectedTemplate = templates[templateIndex];
        console.log('Selected template:', selectedTemplate);
    
        // Remove 'selected' class from all buttons and add it to the clicked one
        $('.template-action-btn').removeClass('selected');
        $(`.template-action-btn[data-template-index="${templateIndex}"]`).addClass('selected');
    
        // Disable all placeholder inputs and reset tooltips
        $('.placeholder-input input').prop('disabled', true)
            .attr('title', 'Please select a template to edit placeholders');
    
        // Enable only the placeholder inputs for the selected template and remove tooltips
        $(`.placeholder-inputs-container[data-template-index="${templateIndex}"] input`)
            .prop('disabled', false)
            .removeAttr('title');
    
        // Clear and update placeholder values
        placeholderValues = {};
        $(`.placeholder-inputs-container[data-template-index="${templateIndex}"] input`).each(function() {
            const placeholderNumber = $(this).data('placeholder');
            placeholderValues[placeholderNumber] = $(this).val();
        });
    }

    
    
    $(document).on('input', '.placeholder-input input', function() {
        if (!$(this).prop('disabled')) {
            const placeholderNumber = $(this).data('placeholder');
            placeholderValues[placeholderNumber] = $(this).val();
        }
    });

    function sendSelectedTemplate() {
        if (selectedTemplate) {
            console.log('Sending selected template:', selectedTemplate);
            useTemplate(selectedTemplate);
            closeTemplatePopup();
            selectedTemplateIndex = null; // Reset the selected template index
            $('.template-action-btn').text('Select Template'); // Reset all buttons text
        } else {
            console.error('No template selected');
        }
    }
    
function getTemplateContent(template) {
     return template.components.map(component => component.text).join(' ');
}
    function getTemplateBody(template) {
        const bodyComponent = template.components.find(component => component.type === 'BODY');
        return bodyComponent ? bodyComponent.text : 'No body found in template';
    }

    function getPlaceholderInputs(template, templateIndex) {
        const bodyComponent = template.components.find(component => component.type === 'BODY');
        if (!bodyComponent) return '';
    
        const placeholders = bodyComponent.text.match(/{{(\d+)}}/g) || [];
        let inputHtml = `<div class="placeholder-inputs-container" data-template-index="${templateIndex}">`;
    
        placeholders.forEach((placeholder) => {
            const placeholderNumber = placeholder.match(/\d+/)[0];
            inputHtml += `
                <div class="placeholder-input">
                    <label for="placeholder-${placeholderNumber}">Placeholder ${placeholderNumber}:</label>
                    <input type="text" id="placeholder-${placeholderNumber}" 
                           name="placeholder-${placeholderNumber}" 
                           data-placeholder="${placeholderNumber}" 
                           disabled 
                           title="Please click on select template to edit placeholders">
                </div>
            `;
        });
    
        inputHtml += '</div>';
        return inputHtml;
    }
    

    function toggleAccordion() {
        $(this).next('.accordion-content').slideToggle();
    }

    function closeTemplatePopup() {
        $('#template-popup').hide();
        placeholderValues = {};
    }
    //useTemplate function
    
    function sendTemplateMessage(template, placeholderValues) {
        if (!currentChatId || !currentToNumber || !currentToName) {
            console.error('Chat details are not available');
            return;
        }
    
        console.log('Preparing to send template with placeholders:', placeholderValues);
    
        // Prepare the template data
        const templateData = {
            name: template.name,
            components: template.components.map(component => {
                if (component.type === 'BODY') {
                    let filledText = component.text;
                    Object.entries(placeholderValues).forEach(([number, value]) => {
                        const placeholder = `{{${number}}}`;
                        filledText = filledText.replace(placeholder, value);
                        console.log(`Replacing ${placeholder} with ${value}`);
                    });
                    console.log('Filled text:', filledText);
                    return { ...component, text: filledText };
                }
                return component;
            }),
            language: template.language,
            status: template.status,
            category: template.category,
            id: template.id
        };
    
        // Construct the request body
        const requestBody = {
            toNumber: currentToNumber,
            toName: currentToName,
            chatId: currentChatId,
            template: templateData,
            example: Object.values(placeholderValues)
        };
    
        console.log("Sending template request:", JSON.stringify(requestBody, null, 2));
    
    
        fetch(sendTemplateApiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${bearerToken}`
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error('API responded with an error:', data.msg);
                console.error('Full error response:', JSON.stringify(data, null, 2));
                return;
            }
            console.log('Template message sent successfully:', data);
            
            // Add the sent template message to the conversation
            const newMessage = {
                msgContext: { 
                    text: { 
                        body: templateData.components.find(c => c.type === 'BODY').text 
                    } 
                },
                route: 'outgoing',
                timestamp: Math.floor(Date.now() / 1000),
                status: 'sent'
            };
            currentConversation.push(newMessage);
            
            renderConversation(currentConversation, currentToName, currentToNumber);
            checkMessageWindow(currentConversation);
            scrollToBottom();
            
            closeTemplatePopup();
        })
        .catch(error => {
            console.error('Error sending template message:', error);
            console.error('Full error object:', error);
        });
    }
    
    function useTemplate(template) {
        console.log('Using template:', template);
        console.log('Collected placeholder values:', placeholderValues);
    
        sendTemplateMessage(template, placeholderValues);
    }
    
    
    $(document).on('input', '.placeholder-input input', function() {
        const placeholderNumber = $(this).data('placeholder');
        placeholderValues[placeholderNumber] = $(this).val();
    });
    


    //  checkMessageWindow function
    function checkMessageWindow(messages) {
        const currentTime = new Date().getTime() / 1000; // Convert to seconds
        const lastIncomingMessage = messages.slice().reverse().find(msg => msg.route.toLowerCase() === 'incoming');
        
        if (!lastIncomingMessage) {
            // No incoming messages, only allow templates
            $('#message-input-area').hide();
            $('#template-message-area').show();
            return;
        }
    
        const timeDifference = currentTime - lastIncomingMessage.timestamp;
    
        if (timeDifference > 24 * 60 * 60) { // More than 24 hours
            $('#message-input-area').hide();
            $('#template-message-area').show();
        } else {
            $('#message-input-area').show();
            $('#template-message-area').hide();
        }
    }

     // function to show the template popup
     function showTemplatePopup() {
        fetchTemplates();
    }

    
    // event listener for the template button
    $(document).on('click', '.send-template-btn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showTemplatePopup();
    });

    // CSS for the template popup
    $('head').append(`
        <style>
        .accordion-header {
  font-weight: bold;
  color: #4A4A4A;
  font-family: 'Arial', sans-serif;
  text-align: left;
  padding: 10px 20px;
  font-size: 13px;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin: 10px 0;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.accordion-header:hover {
  background-color: #ececec;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

        .template-action-btn {
    background-color: #25D366;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
    outline: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    width: 100%;
    margin-top: 10px;
    text-align: center;
}

.template-action-btn:hover {
    background-color: #128C7E;
}

.template-action-btn:active {
    transform: scale(0.98);
}

.template-action-btn.selected {
    background-color: #128C7E;
}

.template-action-btn:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
    box-shadow: none;
}

@media (max-width: 480px) {
    .template-action-btn {
        font-size: 12px;
        padding: 8px 12px;
    }
}
         .placeholder-input input[disabled] {
            cursor: not-allowed;
        }
        .placeholder-input input[title] {
            position: relative;
        }
        .placeholder-input input[title]:hover::after {
            content: attr(title);
            position: absolute;
            left: 0;
            top: 100%;
            white-space: nowrap;
            z-index: 20;
            background-color: #f9f9f9;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            font-size: 12px;
        }
            .template-popup {
                position: absolute;
                top: 60px;
                left: 10px;
                right: 10px;
                bottom: 70px;
                background-color: #fff;
                z-index: 1001;
                overflow-y: auto;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                display: none;
            }
            .template-popup-content {
                padding: 15px;
            }
            .close-popup {
                position: absolute;
                right: 10px;
                top: 10px;
                color: #aaa;
                font-size: 20px;
                font-weight: bold;
                cursor: pointer;
            }
            .accordion-item {
                margin-bottom: 8px;
            }
            .accordion-header {
                background-color: #f1f1f1;
                padding: 8px;
                cursor: pointer;
                border-radius: 4px;
            }
            .accordion-content {
                display: none;
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 0 0 4px 4px;
            }
            .placeholder-input {
                margin-bottom: 8px;
            }
            .placeholder-input input {
                width: 100%;
                padding: 5px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
            .select-template-btn, .send-selected-template-btn {
                background-color: #25D366;
                color: white;
                padding: 8px 12px;
                border: none;
                cursor: pointer;
                border-radius: 4px;
                width: 100%;
                margin-top: 8px;
            }
            .select-template-btn.selected {
                background-color: #128C7E;
            }
            .send-selected-template-btn:disabled {
                background-color: #cccccc;
                cursor: not-allowed;
            }
             .message-footer {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                font-size: 0.8em;
            }
            .message-status {
                margin-left: 5px;
                display: inline-flex;
                align-items: center;
            }
            .message-status svg {
                width: 16px;
                height: 15px;
            }

             .inbox-item.unread {
        background-color: #dcf8c6; /* Light green color */
    }

    /* You might want to adjust other styles for better visibility */
    .inbox-item.unread .inbox-name,
    .inbox-item.unread .inbox-message {
        font-weight: bold;
    }
            
        </style>
    `);

    function sendMessage(text) {
        if (!currentChatId || !currentToNumber || !currentToName) {
            console.error('Chat details are not available');
            return;
        }
    
        const sendTextApiUrl = userType === 'agent' ? agentSendTextApiUrl : userSendTextApiUrl;
    
        const requestBody = {
            text: text,
            toNumber: currentToNumber,
            toName: currentToName,
            chatId: currentChatId
        };
    
        fetch(sendTextApiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${bearerToken}`
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Add the sent message to the conversation
                const newMessage = {
                    msgContext: { text: { body: text } },
                    route: 'outgoing',
                    timestamp: Math.floor(Date.now() / 1000),
                    status: 'sent' // Initial status
                };
                currentConversation.push(newMessage);
                renderConversation(currentConversation, currentToName, currentToNumber);
                scrollToBottom($('#chat-conversation .messages'));
                
                // Simulate status changes (replace this with actual status updates from your backend)
                setTimeout(() => {
                    newMessage.status = 'delivered';
                    renderConversation(currentConversation, currentToName, currentToNumber);
                }, 2000);
                setTimeout(() => {
                    newMessage.status = 'read';
                    renderConversation(currentConversation, currentToName, currentToNumber);
                }, 4000);
            } else {
                console.error('Failed to send message:', data.message || 'Unknown error');
                // Optionally, show an error message to the user
                showErrorMessage('Failed to send message. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error sending message:', error);
            // Optionally, show an error message to the user
            showErrorMessage('An error occurred while sending the message. Please try again.');
        });
    }

    function startInboxRefresh() {
        // Fetch chats immediately
        fetchChats();
        
        // Set up interval to fetch chats every 2 seconds
        inboxRefreshInterval = setInterval(fetchChats, 200000);
    }

    function stopInboxRefresh() {
        clearInterval(inboxRefreshInterval);
    }

    function initializeWidget() {
        if (bearerToken) {
            // Don't automatically open the widget
            isMinimized = true;
        }
    }

    $(document).ready(function() {
        bearerToken = sessionStorage.getItem('bearerToken');
        userType = sessionStorage.getItem('userType');
    
        // Initialize click event for WhatsApp chat icon
        $('#whatsapp-chat-icon').click(function(e) {
            e.preventDefault();
            if (bearerToken) {
                if (isMinimized) {
                    $('#whatsapp-chat-widget').addClass('active');
                    isMinimized = false;
                    if ($('#chat-inbox').is(':visible')) {
                        startInboxRefresh();
                    } else if ($('#chat-conversation').is(':visible')) {
                        startPeriodicFetch();
                    }
                } else {
                    $('#whatsapp-chat-widget').toggleClass('active');
                    if ($('#whatsapp-chat-widget').hasClass('active')) {
                        $('#chat-inbox').show();
                        $('#chat-conversation').hide();
                        startInboxRefresh();
                    } else {
                        minimizeWidget();
                    }
                }
            } else {
                showUserTypeSelection();
            }
        });
    
       
        // Initialize click event for closing the chat
        $('#close-chat').click(function() {
            minimizeWidget();
            stopInboxRefresh();
            stopPeriodicFetch();
        });
    
        // Initialize click event for inbox items
        $(document).on('click', '.inbox-item', function() {
            const chatId = $(this).data('chatid');
            currentChatId = chatId;
            currentToName = $(this).data('name');
            currentToNumber = $(this).data('mobile');
            isFirstLoad = true;
            $('#chat-inbox').hide();
            $('#chat-conversation').show();
            fetchConversation(chatId);
            startPeriodicFetch();
            stopInboxRefresh();
    
            $('#message-input-area input[type="text"]').val(chatInputs[chatId] || '');
            hideSearchContainer();
        });
    
        // Initialize click event for back to inbox
        $(document).on('click', '.back-to-inbox', function() {
            chatInputs[currentChatId] = $('#message-input-area input[type="text"]').val();
            $('#chat-conversation').hide();
            $('#chat-inbox').show();
            stopPeriodicFetch();
            startInboxRefresh();
            hideSearchContainer();
        });
    
        // Initialize click event for send message button
        $('.send-message-btn').click(function() {
            const messageText = $('#message-input-area input[type="text"]').val().trim();
            if (messageText) {
                sendMessage(messageText);
                $('#message-input-area input[type="text"]').val('');
                chatInputs[currentChatId] = '';
            }
        });
    
        // Initialize keypress event for message input
        $('#message-input-area input[type="text"]').keypress(function(e) {
            if (e.which == 13) {
                $('.send-message-btn').click();
                return false;
            }
        });
    
        // Make the chat widget draggable
        $('#whatsapp-chat-widget').draggable({
            handle: ".chat-header",
            containment: "window"
        });
    
        // Initialize scroll event for messages container
        const messagesContainer = $('#chat-conversation .messages');
        messagesContainer.on('scroll', function() {
            isUserScrolling = true;
            clearTimeout($.data(this, 'scrollTimer'));
            $.data(this, 'scrollTimer', setTimeout(function() {
                isUserScrolling = false;
            }, 250));
        });
    
        // Initialize the widget
        initializeWidget();
    });
    
    initializeWidget();
    
});