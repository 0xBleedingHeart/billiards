<?php
require_once '../includes/db.php';
require_once '../includes/session.php';
requireAdmin();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO events (title, date, description) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['title'], $_POST['date'], $_POST['description']]);
    } elseif(isset($_POST['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
        $stmt->execute([$_POST['id']]);
    }
    header('Location: events.php');
    exit;
}

$events = $pdo->query("SELECT * FROM events ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>ADMIN PANEL</h1>
                <h2>EVENTS MANAGEMENT</h2>
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
                    <li><a href="events.php" class="active">Events</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title">MANAGE EVENTS</h2>
            
            <div class="admin-card" style="margin-bottom: 30px;">
                <h3>Add New Event</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>Event Title</label>
                        <input type="text" name="title" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                    </div>
                    <div class="form-group">
                        <label>Date/Schedule</label>
                        <input type="text" name="date" placeholder="e.g., Every Monday | 7PM-10PM" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="3" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;"></textarea>
                    </div>
                    <button type="submit" name="add" class="cta-button">ADD EVENT</button>
                </form>
            </div>

            <div class="admin-card">
                <h3>Current Events</h3>
                <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                    <?php foreach($events as $event): ?>
                    <div style="padding: 15px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                        <div style="display: flex; justify-content: space-between; align-items: start;">
                            <div style="flex: 1;">
                                <div style="color: #d4af37; font-weight: bold; margin-bottom: 5px;"><?php echo htmlspecialchars($event['date']); ?></div>
                                <div style="font-size: 1.1rem; margin-bottom: 5px;"><?php echo htmlspecialchars($event['title']); ?></div>
                                <div style="color: #8a9a8a;"><?php echo htmlspecialchars($event['description']); ?></div>
                            </div>
                            <form method="POST" style="margin-left: 15px;">
                                <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                                <button type="submit" name="delete" onclick="return confirm('Delete this event?')" style="padding: 8px 15px; background: #8b0000; color: #fff; border: none; cursor: pointer; border-radius: 3px;">Delete</button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
