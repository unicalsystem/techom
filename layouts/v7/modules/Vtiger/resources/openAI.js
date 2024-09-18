 // Show OpenAI modal as popup
 document.getElementById('askOpenAIButton').addEventListener('click', function() {
    document.getElementById('openAIContainer').style.display = 'block';
});

// Close OpenAI modal
function closeOpenAIContainer() {
    document.getElementById('openAIContainer').style.display = 'none';
}

// Function to call OpenAI API and display the response
function askOpenAI() {
    var prompt = document.getElementById('openAIInput').value;
    if (!prompt) {
        alert('Please enter a prompt.');
        return;
    }

    var apiUrl = 'https://api.openai.com/v1/chat/completions';
    var apiKey = 'secret-key';

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + apiKey
        },
        body: JSON.stringify({
            model: 'gpt-3.5-turbo',
            messages: [{ role: 'user', content:'rephrase' + prompt }],
            max_tokens: 150
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('HTTP error! Status: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        var responseContent = document.getElementById('responseContent');
        responseContent.textContent = data.choices[0].message.content.trim();
        document.getElementById('openAIResponse').style.display = 'block';
        
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred: ' + error.message);
    });
}

// Function to copy response text to clipboard
function copyResponse() {
    var responseContent = document.getElementById('responseContent').textContent;
    if (responseContent) {
        navigator.clipboard.writeText(responseContent).then(function() {
            alert('Response copied to clipboard!');
            closeOpenAIContainer();
        }, function(err) {
            console.error('Error copying text: ', err);
            alert('Failed to copy response.');
        });
    } else {
        alert('No response text to copy.');
    }
}