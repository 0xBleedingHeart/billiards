<?php
require_once '../includes/db.php';
require_once '../includes/session.php';
requireLogin();

require_once '../includes/reservations.php';
require_once '../includes/orders.php';
$reservations = getUserReservations($_SESSION['user_id']);
$orders = getUserOrders($_SESSION['user_id']);
$eventRegistrations = getUserEventRegistrations($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Billiards Bar & Café</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>BILLIARDS</h1>
                <h2>BAR & CAFÉ</h2>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="nav-container">
                <ul class="nav-menu">
                    <li><a href="../index.html">HOME</a></li>
                    <li><a href="profile.php" class="active">MY PROFILE</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title">MY PROFILE</h2>
            
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="admin-card">
                    <h3>Account Information</h3>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                    <p><strong>User ID:</strong> <?php echo $_SESSION['user_id']; ?></p>
                </div>

                <div class="admin-card" style="margin-top: 30px;">
                    <h3>My Reservations</h3>
                    <?php if(empty($reservations)): ?>
                        <p style="color: #8a9a8a;">No reservations found.</p>
                    <?php else: ?>
                        <div style="display: grid; grid-template-columns: 1fr; gap: 10px;">
                            <?php foreach($reservations as $res): ?>
                            <div style="padding: 15px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <strong style="color: #d4af37;"><?php echo date('M d, Y', strtotime($res['date'])); ?> at <?php echo date('g:i A', strtotime($res['time'])); ?></strong>
                                    <span style="color: <?php echo $res['status'] === 'confirmed' ? '#2a5d2a' : ($res['status'] === 'cancelled' ? '#8b0000' : '#8a9a8a'); ?>;">
                                        <?php echo ucfirst($res['status']); ?>
                                    </span>
                                </div>
                                <p>Party of <?php echo $res['party_size']; ?> - <?php echo ucfirst($res['type']); ?></p>
                                <?php if($res['notes']): ?>
                                    <p style="color: #8a9a8a; font-size: 0.9rem; margin-top: 5px;">Notes: <?php echo htmlspecialchars($res['notes']); ?></p>
                                <?php endif; ?>
                                
                                <?php if($res['status'] === 'pending'): ?>
                                <div style="margin-top: 10px; display: flex; gap: 10px;">
                                    <button class="cta-button edit-reservation" data-id="<?php echo $res['id']; ?>" 
                                            data-date="<?php echo $res['date']; ?>" 
                                            data-time="<?php echo $res['time']; ?>"
                                            data-party="<?php echo $res['party_size']; ?>"
                                            data-type="<?php echo $res['type']; ?>"
                                            data-notes="<?php echo htmlspecialchars($res['notes']); ?>"
                                            style="padding: 8px 15px; font-size: 0.8rem;">
                                        Edit
                                    </button>
                                    <button class="cta-button delete-reservation" data-id="<?php echo $res['id']; ?>" 
                                            style="padding: 8px 15px; font-size: 0.8rem; background: linear-gradient(to bottom, #8b0000, #600000);">
                                        Delete
                                    </button>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="admin-card" style="margin-top: 30px;">
                    <h3>My Orders</h3>
                    <?php if(empty($orders)): ?>
                        <p style="color: #8a9a8a;">No orders found.</p>
                    <?php else: ?>
                        <div style="display: grid; grid-template-columns: 1fr; gap: 10px;">
                            <?php foreach($orders as $order): ?>
                            <div style="padding: 15px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <strong style="color: #d4af37;"><?php echo htmlspecialchars($order['name']); ?></strong>
                                    <span style="color: <?php echo $order['status'] === 'completed' ? '#2a5d2a' : ($order['status'] === 'cancelled' ? '#8b0000' : '#8a9a8a'); ?>;">
                                        <?php echo ucfirst($order['status']); ?>
                                    </span>
                                </div>
                                <p>Quantity: <?php echo $order['quantity']; ?> × $<?php echo number_format($order['price'], 2); ?> = $<?php echo number_format($order['total_price'], 2); ?></p>
                                <p style="color: #8a9a8a; font-size: 0.9rem;">Ordered: <?php echo date('M d, Y g:i A', strtotime($order['created_at'])); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="admin-card" style="margin-top: 30px;">
                    <h3>My Event Registrations</h3>
                    <?php if(empty($eventRegistrations)): ?>
                        <p style="color: #8a9a8a;">No event registrations found.</p>
                    <?php else: ?>
                        <div style="display: grid; grid-template-columns: 1fr; gap: 10px;">
                            <?php foreach($eventRegistrations as $reg): ?>
                            <div style="padding: 15px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <div style="color: #d4af37; font-weight: bold; margin-bottom: 5px;"><?php echo htmlspecialchars($reg['date']); ?></div>
                                <div style="font-size: 1.1rem; margin-bottom: 5px;"><?php echo htmlspecialchars($reg['title']); ?></div>
                                <p style="color: #8a9a8a; font-size: 0.9rem;">Registered: <?php echo date('M d, Y', strtotime($reg['created_at'])); ?></p>
                                <button class="cta-button delete-event-reg" data-id="<?php echo $reg['id']; ?>" 
                                        style="padding: 8px 15px; font-size: 0.8rem; margin-top: 10px; background: linear-gradient(to bottom, #8b0000, #600000);">
                                    Cancel Registration
                                </button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p class="footer-text">CAFÉ BAR & GRILL © 2023 | BILLIARDS MEN & GRILL</p>
        </div>
    </footer>

    <div class="modal" id="edit-modal">
        <div class="modal-container">
            <span class="modal-close" id="close-edit">×</span>
            <div class="modal-header">
                <h2>Edit Reservation</h2>
            </div>
            <form id="edit-form">
                <input type="hidden" id="edit-id">
                <div class="form-group">
                    <label for="edit-date">Date</label>
                    <input type="date" id="edit-date" required>
                </div>
                <div class="form-group">
                    <label for="edit-time">Time</label>
                    <input type="time" id="edit-time" required>
                </div>
                <div class="form-group">
                    <label for="edit-party">Party Size</label>
                    <select id="edit-party" required>
                        <option value="1">1 person</option>
                        <option value="2">2 people</option>
                        <option value="3">3 people</option>
                        <option value="4">4 people</option>
                        <option value="5">5 people</option>
                        <option value="6">6 people</option>
                        <option value="7">7+ people</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-type">Reservation Type</label>
                    <select id="edit-type" required>
                        <option value="dining">Dining Only</option>
                        <option value="billiards">Billiards Only</option>
                        <option value="both">Dining & Billiards</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-notes">Special Requests</label>
                    <textarea id="edit-notes" rows="3"></textarea>
                </div>
                <button type="submit" class="cta-button" style="width: 100%;">UPDATE RESERVATION</button>
            </form>
        </div>
    </div>

    <div id="notification" class="notification"></div>

    <script>
        document.querySelectorAll('.edit-reservation').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-date').value = this.dataset.date;
                document.getElementById('edit-time').value = this.dataset.time;
                document.getElementById('edit-party').value = this.dataset.party;
                document.getElementById('edit-type').value = this.dataset.type;
                document.getElementById('edit-notes').value = this.dataset.notes;
                document.getElementById('edit-modal').classList.add('active');
            });
        });

        document.getElementById('close-edit').addEventListener('click', () => {
            document.getElementById('edit-modal').classList.remove('active');
        });

        document.getElementById('edit-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('action', 'update_reservation');
            formData.append('id', document.getElementById('edit-id').value);
            formData.append('date', document.getElementById('edit-date').value);
            formData.append('time', document.getElementById('edit-time').value);
            formData.append('party', document.getElementById('edit-party').value);
            formData.append('type', document.getElementById('edit-type').value);
            formData.append('notes', document.getElementById('edit-notes').value);

            fetch('../api.php', { method: 'POST', body: formData })
                .then(res => res.json())
                .then(data => {
                    showNotification(data.message, data.success ? 'success' : 'error');
                    if(data.success) {
                        setTimeout(() => location.reload(), 1500);
                    }
                });
        });

        document.querySelectorAll('.delete-reservation').forEach(btn => {
            btn.addEventListener('click', function() {
                if(confirm('Are you sure you want to delete this reservation?')) {
                    const formData = new FormData();
                    formData.append('action', 'delete_reservation');
                    formData.append('id', this.dataset.id);

                    fetch('../api.php', { method: 'POST', body: formData })
                        .then(res => res.json())
                        .then(data => {
                            showNotification(data.message, data.success ? 'success' : 'error');
                            if(data.success) {
                                setTimeout(() => location.reload(), 1500);
                            }
                        });
                }
            });
        });

        document.querySelectorAll('.delete-event-reg').forEach(btn => {
            btn.addEventListener('click', function() {
                if(confirm('Cancel this event registration?')) {
                    const formData = new FormData();
                    formData.append('action', 'delete_event_registration');
                    formData.append('id', this.dataset.id);

                    fetch('../api.php', { method: 'POST', body: formData })
                        .then(res => res.json())
                        .then(data => {
                            showNotification(data.message, data.success ? 'success' : 'error');
                            if(data.success) {
                                setTimeout(() => location.reload(), 1500);
                            }
                        });
                }
            });
        });

        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = 'notification ' + type;
            notification.classList.add('show');
            setTimeout(() => notification.classList.remove('show'), 5000);
        }
    </script>
</body>
</html>
