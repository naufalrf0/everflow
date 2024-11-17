<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discuss Pendulum System</title>
    <link rel="stylesheet" href="{{ asset('assets/css/forum.css') }}">
</head>
<body>
    <div class="chat-container">
        <div class="participants">
            <h2>Participants</h2>
            <ul>
                <li>Dwi Anisa</li>
                <li>Ane Siti Jahra</li>
                <li>Dhafin</li>
                <li>Haura</li>
                <li>Daffa</li>
                <li>Customer</li>
            </ul>
        </div>
        
        <div class="chat-section">
            <div class="chat-header">
                <h1>Discuss Pendulum System</h1>
                <p>Share your insights and discuss setups with other users.</p>
            </div>

            <div class="chat-box">
                @foreach($forums->reverse() as $forum) {{-- Menggunakan reverse() untuk pesan terbaru di bawah --}}
                    <div class="message {{ $forum->customer_id === auth()->id() ? 'sent' : 'received' }}">
                        <p><strong>{{ $forum->customer->name ?? $forum->admin->name ?? 'Unknown' }}:</strong><br>{{ $forum->isi_postingan }}</p>
                        <span class="timestamp">{{ $forum->waktu_post->format('H:i') }}</span>
                    </div>
                @endforeach
            </div>
            

            <div class="chat-input">
                <input type="text" placeholder="Type a message..." id="chatInput">
                <button id="sendButton">Send</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const sendButton = document.getElementById("sendButton");
    const chatInput = document.getElementById("chatInput");
    const chatBox = document.querySelector(".chat-box");

    async function fetchMessages() {
        const response = await fetch("/forum/messages");
        const data = await response.json();

        chatBox.innerHTML = ""; // Clear chat box

        data.forums.reverse().forEach(forum => { // Reverse the data for latest at bottom
            const messageDiv = document.createElement("div");
            messageDiv.classList.add("message", forum.customer_id === {{ auth()->id() }} ? 'sent' : 'received');

            const messageContent = document.createElement("p");
            messageContent.innerHTML = `<strong>${forum.customer?.name || forum.admin?.name || 'Unknown'}:</strong><br>${forum.isi_postingan}`;
            messageDiv.appendChild(messageContent);

            const timestamp = document.createElement("span");
            timestamp.classList.add("timestamp");
            timestamp.textContent = new Date(forum.waktu_post).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            messageDiv.appendChild(timestamp);

            chatBox.appendChild(messageDiv);
        });

        scrollToBottom();
    }

    function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    sendButton.addEventListener("click", async () => {
        const message = chatInput.value.trim();
        if (!message) return;

        const response = await fetch("/forum/message", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ message })
        });

        const result = await response.json();
        if (result.success) {
            chatInput.value = "";
            fetchMessages(); // Refresh chat messages
        } else {
            alert("Failed to send message!");
        }
    });

    setInterval(fetchMessages, 5000); // Refresh messages every 5 seconds
});

    </script>
</body>
</html>
