<?php
require_once '../includes/db.php';
require_once '../includes/session.php';
require_once '../includes/admin.php';
require_once '../includes/reservations.php';
requireAdmin();

$stats = getAdminStats();
$reservations = getReservations(5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Billiards Bar & Café</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="admin-panel active">
        <div class="container">
            <div class="admin-header">
                <h2>Admin Dashboard</h2>
                <div>
                    <span style="color: #d4af37; margin-right: 20px;">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></span>
                    <a href="logout.php" class="cta-button">Logout</a>
                </div>
            </div>
            <div class="admin-content">
                <div class="admin-card">
                    <h3>Business Overview</h3>
                    <div class="admin-stats">
                        <div class="stat-item">
                            <div class="stat-value"><?php echo $stats['todayReservations']; ?></div>
                            <div class="stat-label">Today's Reservations</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">$2,847</div>
                            <div class="stat-label">Today's Revenue</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value"><?php echo $stats['totalUsers']; ?></div>
                            <div class="stat-label">Total Users</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value"><?php echo $stats['activeEvents']; ?></div>
                            <div class="stat-label">Active Events</div>
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <h3>Recent Reservations</h3>
                    <div style="max-height: 300px; overflow-y: auto;">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 10px;">
                            <?php foreach($reservations as $res): ?>
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong><?php echo htmlspecialchars($res['name']); ?></strong> - 
                                <?php echo date('M d, Y', strtotime($res['date'])); ?> at <?php echo date('g:i A', strtotime($res['time'])); ?> - 
                                Party of <?php echo $res['party_size']; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <h3>Quick Actions</h3>
                    <div style="display: grid; grid-template-columns: 1fr; gap: 10px;">
                        <a href="reservations.php" class="cta-button">Manage Reservations</a>
                        <a href="menu.php" class="cta-button">Update Menu</a>
                        <a href="events.php" class="cta-button">Manage Events</a>
                        <a href="users.php" class="cta-button">User Management</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
