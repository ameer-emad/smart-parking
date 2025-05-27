
function randomReply(arr) {
    return arr[Math.floor(Math.random() * arr.length)];
}
        function toggleChat() {
            const chatContainer = document.getElementById('chatContainer');
            chatContainer.style.display = chatContainer.style.display === 'none' ? 'block' : 'none';
            if(chatContainer.style.display === 'block') {
                addBotMessage("Hello! How can I help you with parking today?");
            }
        }

        function addBotMessage(message) {
            const chatBody = document.getElementById('chatBody');
            const msgDiv = document.createElement('div');
            msgDiv.className = 'mb-3';
            msgDiv.innerHTML = `
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-robot me-2"></i>
                    <small class="text-muted">Bot</small>
                </div>
                <div class="bg-light p-3 rounded">
                    ${message}
                </div>
            `;
            chatBody.appendChild(msgDiv);
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function addUserMessage(message) {
            const chatBody = document.getElementById('chatBody');
            const msgDiv = document.createElement('div');
            msgDiv.className = 'mb-3 text-end';
            msgDiv.innerHTML = `
                <div class="d-flex align-items-center justify-content-end mb-2">
                    <small class="text-muted">You</small>
                    <i class="fas fa-user ms-2"></i>
                </div>
                <div class="bg-primary text-white p-3 rounded">
                    ${message}
                </div>
            `;
            chatBody.appendChild(msgDiv);
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function sendMessage() {
            const userInput = document.getElementById('userInput');
            const message = userInput.value.trim();
            
            if(message) {
                addUserMessage(message);
                userInput.value = '';
                
                //  bot response
                // setTimeout to delay response 1 sec as thining
                setTimeout(() => {
                    let botResponse = "I'm here to help! For specific parking inquiries, please use our search feature above or contact our support team.";
                    if(message.toLowerCase().includes('park') || message.toLowerCase().includes('parking')|| message.toLowerCase().includes('places')) {
                        botResponse =["You can find available parking spots on our interactive map"," try checking the nearest mall for parking "];
                    } else if(message.toLowerCase().includes('price') || message.toLowerCase().includes('cost')|| message.toLowerCase().includes('how much')) {
                        botResponse = "Our parking rates vary by location and duration. You can view specific rates when you select a parking spot. Would you like to search for available spots now?";
                    } else if(message.toLowerCase().includes('help') || message.toLowerCase().includes('assist')) {
                        botResponse = "I can help you with finding parking spots, checking rates, or answering general questions about our service. What would you like to know?";

                    }else {
                        botResponse = [
                            "I'm sorry, I didn't get that. Could you rephrase?",
                            "Hmm, I'm not sure how to help with that yet.",
                            "Try asking about parking, prices, or help.",
                            "Can you be more specific? I'm still learning!"
                        ];
                        addBotMessage(randomReply(botResponse));
                        return; }
                      
                // to pass the message to the pot interface to display 
                    addBotMessage(botResponse);
                }, 1000);
            }
        }

        // Allow sending message with Enter key
        document.getElementById('userInput').addEventListener('keypress', function(e) {
            if(e.key === 'Enter') {
                sendMessage();
            }
        });


        // how you can help me ?
        // are there available parking?
        // how much it cost?


    