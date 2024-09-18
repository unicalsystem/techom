

jQuery(document).ready(function($) {
    const apiUrl = 'https://24by7chat.com/api/inbox/get_chats';
    const convoApiUrl = 'https://24by7chat.com/api/inbox/get_convo';
    const sendTextApiUrl = 'https://24by7chat.com/api/inbox/send_text';
    const bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOiJHcUVIRnVWalBlRFhCNTI5aEhOaEpHV1J6cmZzaHlTZSIsInJvbGUiOiJ1c2VyIiwicGFzc3dvcmQiOiIkMmIkMTAkNG5nY00ydlNuVmZITzJiT3V4MC9oLkROQ2lZbDlNREpET2NHT0guVXpqNldrYVpYb1Vkd3kiLCJlbWFpbCI6InNvdXJjaW5nQHVuaWNhbHN5c3RlbXMuY29tIiwiaWF0IjoxNzIxNzE2ODA3fQ.ITQeBHgxrs4y_HfP7tLTHFyycczmcNhiji91dZ8venk';
     const templateApiUrl = 'https://24by7chat.com/api/user/get_my_meta_templets';

	let currentChatId = null;
    let currentToNumber = null;
    let currentToName = null;
    let currentConversation = [];
    let conversationFetchInterval;
    let templates = [];

    function fetchChats() {
        fetch(apiUrl, {
            headers: {
                'Authorization': `Bearer ${bearerToken}`
            }
        })
        .then(response => response.json())
        .then(data => {
            const chats = data.data;
            const inboxData = chats.map(chat => ({
                name: chat.sender_name,
                message: parseMessage(chat.last_message),
                date: formatDate(new Date(chat.last_message_came * 1000)),
                chatId: chat.chat_id,
                mobile: chat.sender_mobile,
                timestamp: chat.last_message_came // Add this line to include the timestamp
            }));
            
            // Sort the inboxData array based on timestamp in descending order
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
            }, 1000); // Fetch every 5 seconds
        }
    }


    function stopPeriodicFetch() {
        clearInterval(conversationFetchInterval);
    }

    function scrollToBottom() {
        const messagesContainer = document.querySelector('.messages');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    function parseMessage(last_message) {
        try {
            const parsedMessage = JSON.parse(last_message);
            if (parsedMessage && parsedMessage.msgContext && parsedMessage.msgContext.text && parsedMessage.msgContext.text.body) {
                const messageBody = parsedMessage.msgContext.text.body;
                return messageBody.length > 15 ? messageBody.substring(0, 15) + '...' : messageBody;
            }
            return 'Message content not available';
        } catch (error) {
            console.error('Error parsing message:', error);
            return 'Error parsing message';
        }
    }

    function formatDate(date) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }

    function fetchConversation(chatId) {
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
        .then(response => response.json())
        .then(data => {
            const newConversation = data.data;
            if (JSON.stringify(newConversation) !== JSON.stringify(currentConversation)) {
                currentConversation = newConversation;
                const name = currentConversation[0].senderName; 
                const mobile = currentConversation[0].senderMobile; 
                currentChatId = chatId;
                currentToNumber = mobile;
                currentToName = name;
                renderConversation(currentConversation, name, mobile);
                checkMessageWindow(currentConversation);
                scrollToBottom();
            }
        })
        .catch(error => {
            console.error('Error fetching conversation:', error);
        });
    }

    function renderInbox(inboxData) {
        const inboxHtml = inboxData.map(item => `
            <div class="inbox-item" data-chatid="${item.chatId}" data-name="${item.name}" data-mobile="${item.mobile}">
                <div class="profile-pic"></div>
                <div class="inbox-content">
                    <div class="inbox-name">${item.name}</div>
                    <div class="inbox-message">${item.message}</div>
                </div>
                <div class="inbox-time">${item.date}</div>
            </div>
        `).join('');
        $('#chat-inbox').html(inboxHtml);
    }

    function renderConversation(messages, name, mobile) {
        $('.conversation-header').html(`
            <i class="fa fa-arrow-left back-to-inbox"></i>
            <div class="header-info">
                <div class="contact-name">${name}</div>
                <div class="mobile">${mobile}</div>
            </div>
        `);

        const conversationHtml = messages.map(message => {
            const formattedDate = formatDate(new Date(message.timestamp * 1000));
            const messageBody = message.msgContext.text.body;
            const messageType = message.route.toLowerCase() === 'incoming' ? 'incoming' : 'outgoing';
            return `
                <div class="message ${messageType}">
                    <p>${messageBody}</p>
                    <div class="time">${formattedDate}</div>
                </div>
            `;
        }).join('');
        $('#chat-conversation .messages').html(conversationHtml);
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
        // Remove any existing popup
        console.log('Rendered template');
        $('#template-popup').remove();

        let popupHtml = `
            <div id="template-popup" class="template-popup">
                <div class="template-popup-content">
                    <span class="close-popup">&times;</span>
                    <h2>Select a Template</h2>
                    <div class="accordion">
        `;

        templates.forEach((template, index) => {
            popupHtml += `
                <div class="accordion-item">
                    <h3 class="accordion-header">${template.name}</h3>
                    <div class="accordion-content">
                        <p>${getTemplateBody(template)}</p>
                        ${getPlaceholderInputs(template)}
                        <button class="select-template-btn" data-template-index="${index}">Select Template</button>
                    </div>
                </div>
            `;
        });

        popupHtml += `
                    </div>
                    <button class="send-selected-template-btn" disabled>Send Selected Template</button>
                </div>
            </div>
        `;

        // Append the popup to the chat widget
        $('#whatsapp-chat-widget .chat-body').append(popupHtml);

        // Add event listeners
        $('.close-popup').click(closeTemplatePopup);
        $('.accordion-header').click(toggleAccordion);
        $('.select-template-btn').click(selectTemplate);
        $('.send-selected-template-btn').click(sendSelectedTemplate);

        // Show the popup
       
        $('#template-popup').show();
        $('#chat-conversation').hide();
        $('#chat-inbox').show();
    }



    function selectTemplate() {
        $('.select-template-btn').removeClass('selected');
        $(this).addClass('selected');
        $('.send-selected-template-btn').prop('disabled', false);
    }

    function sendSelectedTemplate() {
        const selectedButton = $('.select-template-btn.selected');
        if (selectedButton.length > 0) {
            const selectedTemplateIndex = selectedButton.data('template-index');
            const selectedTemplate = templates[selectedTemplateIndex];
            useTemplate(selectedTemplate);
            closeTemplatePopup();
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

    function getPlaceholderInputs(template) {
        const bodyComponent = template.components.find(component => component.type === 'BODY');
        if (!bodyComponent) return '';

        const placeholders = bodyComponent.text.match(/{{(\d+)}}/g) || [];
        let inputHtml = '';

        placeholders.forEach(placeholder => {
            const placeholderNumber = placeholder.match(/\d+/)[0];
            inputHtml += `
                <div class="placeholder-input">
                    <label for="placeholder-${placeholderNumber}">Placeholder ${placeholderNumber}:</label>
                    <input type="text" id="placeholder-${placeholderNumber}" name="placeholder-${placeholderNumber}">
                </div>
            `;
        });

        return inputHtml;
    }

    function toggleAccordion() {
        $(this).next('.accordion-content').slideToggle();
    }

    function closeTemplatePopup() {
        $('#template-popup').hide();
    }

    //useTemplate function
    function useTemplate(template) {
        const bodyComponent = template.components.find(component => component.type === 'BODY');
        if (!bodyComponent) {
            console.error('No body component found in the template');
            return;
        }

        let messageText = bodyComponent.text;
        const placeholders = messageText.match(/{{(\d+)}}/g) || [];

        placeholders.forEach(placeholder => {
            const placeholderNumber = placeholder.match(/\d+/)[0];
            const inputValue = $(`#placeholder-${placeholderNumber}`).val();
            messageText = messageText.replace(placeholder, inputValue || '');
        });

        sendMessage(messageText);
        closeTemplatePopup();
    }


    //  checkMessageWindow function
    function checkMessageWindow(messages) {
        const lastMessage = messages[messages.length - 1];
        const currentTime = new Date().getTime() / 1000; // Convert to seconds
        const timeDifference = currentTime - lastMessage.timestamp;

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
        </style>
    `);

    function sendMessage(text) {
        if (!currentChatId || !currentToNumber || !currentToName) {
            console.error('Chat details are not available');
            return;
        }
    
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
            // Add the sent message to the conversation
            const newMessage = {
                msgContext: { text: { body: text } },
                route: 'outgoing',
                timestamp: Math.floor(Date.now() / 1000)
            };
            currentConversation.push(newMessage);
            renderConversation(currentConversation, currentToName, currentToNumber);
            scrollToBottom();
        })
        .catch(error => {
            console.error('Error sending message:', error);
        });
    }
    $('#whatsapp-chat-icon').click(function(e) {
        e.preventDefault();
        $('#whatsapp-chat-widget').toggleClass('active');
        $('#chat-inbox').show();
        $('#chat-conversation').hide();
        fetchChats();
    });

    $('#close-chat').click(function() {
        $('#whatsapp-chat-widget').removeClass('active');
        stopPeriodicFetch(); // Stop periodic fetching when closing the chat widget
    });

    $(document).on('click', '.inbox-item', function() {
        const chatId = $(this).data('chatid');
        currentChatId = chatId;
        currentToName = $(this).data('name');
        currentToNumber = $(this).data('mobile');
        $('#chat-inbox').hide();
        $('#chat-conversation').show();
        fetchConversation(chatId);
        startPeriodicFetch(); // Start periodic fetching when a conversation is opened
    });

    $(document).on('click', '.back-to-inbox', function() {
    
        $('#chat-conversation').hide();
        $('#chat-inbox').show();
        stopPeriodicFetch(); 
        console.log('done');
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('.whatsapp-container').length) {
            $('#whatsapp-chat-widget').removeClass('active');
        }
    });

    // New event listener for send button
    $('.send-message-btn').click(function() {
        const messageText = $('#message-input-area input[type="text"]').val().trim();
        if (messageText) {
            sendMessage(messageText);
            $('#message-input-area input[type="text"]').val('');
        }
    });

    // Allow sending message with Enter key
    $('#message-input-area input[type="text"]').keypress(function(e) {
        if (e.which == 13) {
            $('.send-message-btn').click();
            return false;
        }
    });


    $(document).ready(function() {
        $('#whatsapp-chat-widget').draggable({
            handle: ".chat-header",
            containment: "window" 
        });
    });
    
});

