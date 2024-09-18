const templateSelect = document.getElementById("templateSelect");
const previewContent = document.getElementById("previewContent");
const inputFields = document.getElementById("inputFields");
const templatePreview = document.getElementById("templatePreview");
const broadcastNameInput = document.getElementById("broadcastName");

// Add new UI elements for scheduling
const scheduleCheckbox = document.getElementById("scheduleCheckbox");
const scheduleDatetime = document.getElementById("scheduleDateTime");
let templates = [];
let authToken = ''; // Global variable to store the authentication token



// Function to login and get the bearer token
function loginAndFetchToken() {
    const loginUrl = "https://24by7chat.com/api/user/login";
    const loginBody = {
        email: 'sourcing@unicalsystems.com',
        password: 'Unical@2025'
    };

    return fetch(loginUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(loginBody)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Login failed');
        }
        return response.json();
    })
    .then(data => {
        if (data.success && data.token) {
            authToken = data.token; // Store the token
            return data.token;
        } else {
            throw new Error('Failed to retrieve bearer token');
        }
    })
    .catch(error => {
       // console.error('Error during login:', error);
        alert('Failed to login. Please check your credentials.');
    });
}


// Fetch templates using the API
function fetchTemplates() {
    const templatesUrl = "https://24by7chat.com/api/user/get_my_meta_templets";
    
    return fetch(templatesUrl, {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${authToken}`
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to fetch templates');
        }
        return response.json();
    })
    .then(data => {
        if (data.success && Array.isArray(data.data)) {
            return data.data;
        } else {
            throw new Error('Error fetching templates');
        }
    })
    .catch(error => {
       // console.error('Error fetching templates:', error);
    });
}

// Initialize the process by logging in and then fetching templates
loginAndFetchToken().then(() => {
    if (authToken) {
        fetchTemplates().then(fetchedTemplates => {
            if (fetchedTemplates && fetchedTemplates.length > 0) {
                templates = fetchedTemplates; // Assign fetched templates to global variable
                templates.forEach(template => {
                    const option = document.createElement("option");
                    option.value = template.name;
                    option.textContent = template.name;
                    templateSelect.appendChild(option);
                });
            }
        });

        // Add event listener for send message button
        document.querySelector('button[name="sendWhatsappButton"]').addEventListener('click', sendMessage);
    }
}); 

templateSelect.addEventListener("change", function() {
    const selectedTemplateName = this.value;
    const selectedTemplate = templates.find(template => template.name === selectedTemplateName);

    if (selectedTemplate) {
        inputFields.innerHTML = "";

        if (selectedTemplate.components) {
            const bodyComponent = selectedTemplate.components.find(component => component.type === "BODY");
            if (bodyComponent && bodyComponent.text) {
                const bodyText = bodyComponent.text;
                const placeholders = bodyText.match(/\{\{\d+\}\}/g) || [];

                const previewTextarea = document.createElement("textarea");
                previewTextarea.value = bodyText;
                previewTextarea.readOnly = true;
                previewTextarea.style.width = "100%";
                previewTextarea.style.minHeight = "100px";
                previewTextarea.style.resize = "vertical";

                previewContent.innerHTML = "";
                previewContent.appendChild(previewTextarea);

                const inputValues = Array(placeholders.length).fill('');
                placeholders.forEach((placeholder, index) => {
                    const textareaContainer = document.createElement("div");
                    textareaContainer.className = "textarea-container";

                    const label = document.createElement("label");
                    label.textContent = `Enter value for ${placeholder}:`;
                    textareaContainer.appendChild(label);

                    const textarea = document.createElement("textarea");
                    textarea.placeholder = `Enter value for ${placeholder}`;
                    textarea.value = inputValues[index];
                    textarea.style.width = "100%";
                    textarea.style.minHeight = "60px";
                    textarea.style.resize = "vertical";
                    textarea.addEventListener("input", () => {
                        inputValues[index] = textarea.value;
                        updatePreview(bodyText, placeholders, inputValues);
                    });
                    textareaContainer.appendChild(textarea);

                    inputFields.appendChild(textareaContainer);
                });
            }
        }

        templatePreview.style.display = "block";
    }
});

function updatePreview(bodyText, placeholders, inputValues) {
    const previewText = bodyText.replace(/\{\{\d+\}\}/g, match => {
        const index = parseInt(match.match(/\d+/)[0]) - 1;
        return inputValues[index] !== undefined ? inputValues[index] : match;
    });
    const previewTextarea = previewContent.querySelector("textarea");
    if (previewTextarea) {
        previewTextarea.value = previewText;
    }
}

let isSending = false; // Flag to prevent multiple executions


// Function to send the Whatsapp messages using the API
function sendMessage() {
    if (isSending) return;
    isSending = true;

    // Check if the bearer token is valid
    if (!authToken) {
       // alert('No authentication token found. Please log in again.');
        isSending = false;
        return;
    }

    const selectedTemplateName = templateSelect.value;
    const broadcastName = broadcastNameInput.value.trim();
    
    if (!broadcastName) {
        alert('Please enter a Broadcast Name.');
        isSending = false;
        return;
    }
    
    const phoneNumbers = JSON.parse(document.getElementById('phone_numbers_json').value);

    if (!selectedTemplateName || phoneNumbers.length === 0) {
        alert('Please select a template and ensure phone numbers are available.');
        isSending = false;
        return;
    }

    const inputFieldValues = Array.from(inputFields.querySelectorAll('textarea')).map(textarea => textarea.value);

    if (inputFieldValues.some(value => !value.trim())) {
        alert('Please fill in all placeholder fields before sending the message.');
        isSending = false;
        return;
    }

    const isScheduled = scheduleCheckbox.checked;
    const scheduleTimestamp = isScheduled ? new Date(scheduleDatetime.value).toISOString() : new Date().toISOString();

    const requestBody = {
        title: broadcastName,
        templet: {
            name: selectedTemplateName
        },
        contacts: phoneNumbers.map(phoneNumber => ({ mobile: [phoneNumber] })),
        scheduleTimestamp: scheduleTimestamp,
        example: inputFieldValues
    };

    //console.log("Request Body:", JSON.stringify(requestBody, null, 2));

    const sendButton = document.querySelector('button[name="sendWhatsappButton"]');
    const originalButtonText = sendButton.innerHTML;
    sendButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Sending...';
    sendButton.disabled = true;

    fetch("https://24by7chat.com/api/broadcast/add_new_with_contacts", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${authToken}`
        },
        body: JSON.stringify(requestBody)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(errorData => {
                throw new Error(errorData.msg || 'Failed to send broadcast');
            });
        }
        return response.json();
    })
    .then(data => {
        alert('Broadcast sent successfully!');
        closeModal();
    })
    .catch(error => {
     //   console.error('Error sending broadcast:', error);
        if (error.message === 'Invalid token found') {
            alert('Your session has expired. Please refresh the page to log in again.');
        } else {
            alert(`Failed to send broadcast: ${error.message}`);
        }
    })
    .finally(() => {
        sendButton.innerHTML = originalButtonText;
        sendButton.disabled = false;
        isSending = false;
    });
}

// Handle the schedule checkbox change
scheduleCheckbox.addEventListener('change', function() {
    scheduleDatetime.style.display = this.checked ? 'block' : 'none';
});

// Open the calendar when clicking anywhere in the input field
scheduleDatetime.addEventListener('focus', function() {
    this.click();
});

// Open the date and time picker when clicking anywhere in the input field
scheduleDatetime.addEventListener('click', function() {
    this.showPicker();
});

function closeModal() {
    var modalElement = document.getElementById('sendWhatsappContainer');
    if (modalElement) {
        modalElement.style.display = 'none';
        var backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.parentNode.removeChild(backdrop);
        }
        document.body.classList.remove('modal-open');
    }

    var cancelLink = document.querySelector('#sendWhatsappContainer .cancelLink');
    if (cancelLink) {
        cancelLink.click();

    }
}