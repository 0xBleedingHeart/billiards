<?php
require_once 'includes/db.php';

try {
    // Create orders table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS orders (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            menu_item_id INT,
            quantity INT NOT NULL,
            total_price DECIMAL(10,2) NOT NULL,
            status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
            FOREIGN KEY (menu_item_id) REFERENCES menu_items(id) ON DELETE CASCADE
        )
    ");
    echo "✓ Orders table created<br>";
    
    // Create event_registrations table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS event_registrations (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            event_id INT,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
            FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
        )
    ");
    echo "✓ Event registrations table created<br>";
    
    echo "<br><strong>✓ All tables created successfully!</strong><br>";
    echo "<a href='index.html'>Go to Homepage</a> | <a href='user/profile.php'>Go to Profile</a>";
    
} catch(PDOException $e) {
    echo "✗ Error: " . $e->getMessage();
}
?>
