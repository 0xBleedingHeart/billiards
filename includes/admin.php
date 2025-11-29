<?php
require_once 'db.php';

function getAdminStats() {
    global $pdo;
    
    $today = date('Y-m-d');
    
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM reservations WHERE date = ?");
    $stmt->execute([$today]);
    $todayReservations = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM events WHERE active = 1");
    $activeEvents = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
    $totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM reservations");
    $totalReservations = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    return [
        'todayReservations' => $todayReservations,
        'activeEvents' => $activeEvents,
        'totalUsers' => $totalUsers,
        'totalReservations' => $totalReservations
    ];
}
?>
