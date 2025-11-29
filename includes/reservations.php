<?php
require_once 'db.php';

function createReservation($data) {
    global $pdo;
    
    if(empty($data['name']) || empty($data['email']) || empty($data['date']) || 
       empty($data['time']) || empty($data['party']) || empty($data['type'])) {
        return ['success' => false, 'message' => 'All required fields must be filled'];
    }
    
    $userId = $_SESSION['user_id'] ?? null;
    
    try {
        $stmt = $pdo->prepare("INSERT INTO reservations (user_id, name, email, date, time, party_size, type, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $userId, 
            $data['name'], 
            $data['email'], 
            $data['date'], 
            $data['time'], 
            $data['party'], 
            $data['type'], 
            $data['notes'] ?? ''
        ]);
        return ['success' => true, 'message' => 'Reservation accepted! We look forward to seeing you.'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Could not process reservation'];
    }
}

function getReservations($limit = 10) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM reservations ORDER BY date DESC, time DESC LIMIT " . (int)$limit);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserReservations($userId) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE user_id = ? ORDER BY date DESC, time DESC");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateReservation($id, $userId, $data) {
    global $pdo;
    
    // Check if reservation belongs to user and is still pending
    $stmt = $pdo->prepare("SELECT status FROM reservations WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $userId]);
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$reservation) {
        return ['success' => false, 'message' => 'Reservation not found'];
    }
    
    if($reservation['status'] !== 'pending') {
        return ['success' => false, 'message' => 'Cannot modify confirmed or cancelled reservations'];
    }
    
    try {
        $stmt = $pdo->prepare("UPDATE reservations SET date = ?, time = ?, party_size = ?, type = ?, notes = ? WHERE id = ? AND user_id = ?");
        $stmt->execute([
            $data['date'],
            $data['time'],
            $data['party'],
            $data['type'],
            $data['notes'] ?? '',
            $id,
            $userId
        ]);
        return ['success' => true, 'message' => 'Reservation updated successfully'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Could not update reservation'];
    }
}

function deleteReservation($id, $userId) {
    global $pdo;
    
    // Check if reservation belongs to user and is still pending
    $stmt = $pdo->prepare("SELECT status FROM reservations WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $userId]);
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$reservation) {
        return ['success' => false, 'message' => 'Reservation not found'];
    }
    
    if($reservation['status'] !== 'pending') {
        return ['success' => false, 'message' => 'Cannot delete confirmed or cancelled reservations'];
    }
    
    try {
        $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        return ['success' => true, 'message' => 'Reservation deleted successfully'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Could not delete reservation'];
    }
}
?>
