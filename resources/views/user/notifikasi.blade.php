<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Panel with Counter</title>
    <link rel="stylesheet" href="{{ asset('assets/css/notification.css') }}">
</head>
<body>
    <!-- Notification Icon -->
    <div class="notification-icon" onclick="toggleNotificationPanel()">
        🔔
        <span id="notification-counter" class="counter">0</span>
    </div>

    <!-- Notification Panel -->
    <div class="notification-panel" id="notificationPanel">
        <div class="notification-header">
            <span class="icon">🔔</span> 
            <h2>Notifikasi</h2>
        </div>
        
        <div class="notification-list" id="notificationList">
            <div class="notification-item">
                <p>Pembeli dengan nomor invoice <strong>#155122235</strong> melakukan konfirmasi pembayaran.</p>
                <button class="delete-btn" onclick="removeNotification(this)">🗑️</button>
            </div>
            <div class="notification-item">
                <p>Pembeli dengan nomor invoice <strong>#628842632</strong> mengirim ulang konfirmasi pembayaran.</p>
                <button class="delete-btn" onclick="removeNotification(this)">🗑️</button>
            </div>
            <div class="notification-item">
                <p>Hai Toko Naura, Ada pesanan masuk dengan nomor invoice <strong>#460710553</strong>.</p>
                <button class="delete-btn" onclick="removeNotification(this)">🗑️</button>
            </div>
        </div>
    </div>

    <button class="add-notification-btn" onclick="addNotification()">New Message</button>

    <script src="{{ asset('assets/js/notification.js') }}"></script>
</body>
</html>
