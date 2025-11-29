<?php
require_once 'db.php';

function createOrder($userId, $menuItemId, $quantity) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT price FROM menu_items WHERE id = ?");
    $stmt->execute([$menuItemId]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$item) {
        return ['success' => false, 'message' => 'Menu item not found'];
    }
    
    $totalPrice = $item['price'] * $quantity;
    
    try {
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, menu_item_id, quantity, total_price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $menuItemId, $quantity, $totalPrice]);
        return ['success' => true, 'message' => 'Order placed successfully!'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Could not place order'];
    }
}

function getUserOrders($userId) {
    global $pdo;
    
    $stmt = $pdo->prepare("
        SELECT o.*, m.name, m.price 
        FROM orders o 
        JOIN menu_items m ON o.menu_item_id = m.id 
        WHERE o.user_id = ? 
        ORDER BY o.created_at DESC
    ");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function registerForEvent($userId, $eventId, $name, $email) {
    global $pdo;
    
    // Check if already registered
    $stmt = $pdo->prepare("SELECT id FROM event_registrations WHERE user_id = ? AND event_id = ?");
    $stmt->execute([$userId, $eventId]);
    if($stmt->fetch()) {
        return ['success' => false, 'message' => 'Already registered for this event'];
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO event_registrations (user_id, event_id, name, email) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $eventId, $name, $email]);
        return ['success' => true, 'message' => 'Successfully registered for event!'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Could not register for event'];
    }
}

function getUserEventRegistrations($userId) {
    global $pdo;
    
    $stmt = $pdo->prepare("
        SELECT er.*, e.title, e.date, e.description 
        FROM event_registrations er 
        JOIN events e ON er.event_id = e.id 
        WHERE er.user_id = ? 
        ORDER BY er.created_at DESC
    ");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteEventRegistration($id, $userId) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("DELETE FROM event_registrations WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        return ['success' => true, 'message' => 'Event registration cancelled'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Could not cancel registration'];
    }
}
?>
