<?php
require_once '../includes/db.php';
require_once '../includes/session.php';
requireAdmin();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO menu_items (category, subcategory, name, description, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['category'], $_POST['subcategory'], $_POST['name'], $_POST['description'], $_POST['price']]);
    } elseif(isset($_POST['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM menu_items WHERE id = ?");
        $stmt->execute([$_POST['id']]);
    }
    header('Location: menu.php');
    exit;
}

$menuItems = $pdo->query("SELECT * FROM menu_items ORDER BY category, subcategory, name")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Menu - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>ADMIN PANEL</h1>
                <h2>MENU MANAGEMENT</h2>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="nav-container">
                <ul class="nav-menu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="reservations.php">Reservations</a></li>
                    <li><a href="menu.php" class="active">Menu</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title">MANAGE MENU ITEMS</h2>
            
            <div class="admin-card" style="margin-bottom: 30px;">
                <h3>Add New Menu Item</h3>
                <form method="POST">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                                <option value="cafe">Cafe</option>
                                <option value="bar">Bar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subcategory</label>
                            <input type="text" name="subcategory" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" step="0.01" name="price" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" required style="width: 100%; padding: 10px; background: rgba(15,26,15,0.8); color: #e0e0e0; border: 1px solid #1a3d1a;">
                    </div>
                    <button type="submit" name="add" class="cta-button">ADD ITEM</button>
                </form>
            </div>

            <div class="admin-card">
                <h3>Current Menu Items</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #1a3d1a;">
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Category</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Subcategory</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Name</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Description</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Price</th>
                            <th style="padding: 10px; text-align: left; color: #d4af37;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($menuItems as $item): ?>
                        <tr style="border-bottom: 1px solid #1a3d1a;">
                            <td style="padding: 10px;"><?php echo ucfirst($item['category']); ?></td>
                            <td style="padding: 10px;"><?php echo htmlspecialchars($item['subcategory']); ?></td>
                            <td style="padding: 10px;"><?php echo htmlspecialchars($item['name']); ?></td>
                            <td style="padding: 10px;"><?php echo htmlspecialchars($item['description']); ?></td>
                            <td style="padding: 10px;">$<?php echo number_format($item['price'], 2); ?></td>
                            <td style="padding: 10px;">
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" name="delete" onclick="return confirm('Delete this item?')" style="padding: 5px 10px; background: #8b0000; color: #fff; border: none; cursor: pointer;">Delete</button>
                                </form>
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
