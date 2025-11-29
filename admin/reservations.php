<?php
require_once '../includes/db.php';
require_once '../includes/session.php';
require_once '../includes/reservations.php';
requireAdmin();

$reservations = getReservations(50);

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if($_POST['action'] === 'update_status') {
        $stmt = $pdo->prepare("UPDATE reservations SET status = ? WHERE id = ?");
        $stmt->execute([$_POST['status'], $_POST['id']]);
        header('Location: reservations.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>ADMIN PANEL</h1>
                <h2>RESERVATIONS</h2>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="nav-container">
                <ul class="nav-menu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="reservations.php" class="active">Reservations</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title">MANAGE RESERVATIONS</h2>
            
            <div class="admin-card">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid #1a3d1a;">
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Name</th>
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Email</th>
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Date</th>
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Time</th>
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Party</th>
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Type</th>
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Status</th>
                                <th style="padding: 10px; text-align: left; color: #d4af37;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reservations as $res): ?>
                            <tr style="border-bottom: 1px solid #1a3d1a;">
                                <td style="padding: 10px;"><?php echo htmlspecialchars($res['name']); ?></td>
                                <td style="padding: 10px;"><?php echo htmlspecialchars($res['email']); ?></td>
                                <td style="padding: 10px;"><?php echo date('M d, Y', strtotime($res['date'])); ?></td>
                                <td style="padding: 10px;"><?php echo date('g:i A', strtotime($res['time'])); ?></td>
                                <td style="padding: 10px;"><?php echo $res['party_size']; ?></td>
                                <td style="padding: 10px;"><?php echo ucfirst($res['type']); ?></td>
                                <td style="padding: 10px;">
                                    <span style="color: <?php echo $res['status'] === 'confirmed' ? '#2a5d2a' : ($res['status'] === 'cancelled' ? '#8b0000' : '#8a9a8a'); ?>;">
                                        <?php echo ucfirst($res['status']); ?>
                                    </span>
                                </td>
                                <td style="padding: 10px;">
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="action" value="update_status">
                                        <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
                                        <select name="status" onchange="this.form.submit()" style="padding: 5px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                                            <option value="pending" <?php echo $res['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="confirmed" <?php echo $res['status'] === 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                            <option value="cancelled" <?php echo $res['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
