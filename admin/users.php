<?php
require_once '../includes/db.php';
require_once '../includes/session.php';
requireAdmin();

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND role != 'admin'");
    $stmt->execute([$_POST['id']]);
    header('Location: users.php');
    exit;
}

$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>ADMIN PANEL</h1>
                <h2>USER MANAGEMENT</h2>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="nav-container">
                <ul class="nav-menu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="reservations.php">Reservations</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="users.php" class="active">Users</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title">MANAGE USERS</h2>
            
            <div class="admin-card">
                <h3>Registered Users</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #1a3d1a;">
                            <th style="padding: 10px; text-align: left; color: #d4af37;">ID</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Name</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Email</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Role</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Registered</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr style="border-bottom: 1px solid #1a3d1a;">
                            <td style="padding: 10px;"><?php echo $user['id']; ?></td>
                            <td style="padding: 10px;"><?php echo htmlspecialchars($user['name']); ?></td>
                            <td style="padding: 10px;"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td style="padding: 10px;">
                                <span style="color: <?php echo $user['role'] === 'admin' ? '#d4af37' : '#8a9a8a'; ?>;">
                                    <?php echo ucfirst($user['role']); ?>
                                </span>
                            </td>
                            <td style="padding: 10px;"><?php echo date('M d, Y', strtotime($user['created_at'])); ?></td>
                            <td style="padding: 10px;">
                                <?php if($user['role'] !== 'admin'): ?>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" name="delete" onclick="return confirm('Delete this user?')" style="padding: 5px 10px; background: #8b0000; color: #fff; border: none; cursor: pointer;">Delete</button>
                                </form>
                                <?php else: ?>
                                <span style="color: #8a9a8a;">Protected</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
