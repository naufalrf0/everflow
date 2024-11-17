let notificationCount = 3; // Initial count based on existing notifications

// Function to toggle notification panel visibility
function toggleNotificationPanel() {
    const panel = document.getElementById("notificationPanel");
    panel.style.display = panel.style.display === "none" ? "block" : "none";

    // Reset counter when panel is opened
    if (panel.style.display === "block") {
        resetCounter();
    }
}

// Function to add a new notification
function addNotification() {
    notificationCount++;
    updateCounter();

    const notificationList = document.getElementById("notificationList");
    const newNotification = document.createElement("div");
    newNotification.classList.add("notification-item");

    const message = document.createElement("p");
    message.innerHTML = `Pesan baru dengan nomor invoice <strong>#${Math.floor(Math.random() * 100000000)}</strong>.`;
    newNotification.appendChild(message);

    const deleteBtn = document.createElement("button");
    deleteBtn.classList.add("delete-btn");
    deleteBtn.innerHTML = "🗑️";
    deleteBtn.onclick = () => removeNotification(newNotification);
    newNotification.appendChild(deleteBtn);

    notificationList.appendChild(newNotification);
    notificationList.scrollTop = notificationList.scrollHeight;
}

// Function to update notification counter
function updateCounter() {
    const counter = document.getElementById("notification-counter");
    counter.innerText = notificationCount;
    counter.style.display = notificationCount > 0 ? "flex" : "none";
}

// Function to reset the counter to zero
function resetCounter() {
    notificationCount = 0;
    updateCounter();
}

// Function to remove a notification
function removeNotification(notification) {
    notification.remove();
}

// Initial call to update counter based on initial notifications
updateCounter();
