// Send message function
document.getElementById("sendButton").addEventListener("click", sendMessage);

function sendMessage() {
    const messageBox = document.querySelector(".chat-box");
    const inputField = document.querySelector(".chat-input input");
    const messageText = inputField.value.trim();

    if (messageText === "") return;

    // Create a new message element
    const newMessage = document.createElement("div");
    newMessage.classList.add("message", "sent");

    const messageContent = document.createElement("p");
    messageContent.innerHTML = `<strong>You:</strong><br>${messageText}`;
    newMessage.appendChild(messageContent);

    const timestamp = document.createElement("span");
    timestamp.classList.add("timestamp");
    const currentTime = new Date();
    timestamp.textContent = currentTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    newMessage.appendChild(timestamp);

    // Append the message to the chat box
    messageBox.appendChild(newMessage);
    messageBox.scrollTop = messageBox.scrollHeight;

    // Clear the input field
    inputField.value = "";

    // Add fade-in effect
    newMessage.style.opacity = 0;
    setTimeout(() => {
        newMessage.style.opacity = 1;
        newMessage.style.transition = "opacity 0.5s ease";
    }, 10);
}
