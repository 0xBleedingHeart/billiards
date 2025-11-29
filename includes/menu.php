<?php
require_once 'db.php';

function getMenuByCategory($category) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM menu_items WHERE category = ? AND active = 1 ORDER BY subcategory, name");
    $stmt->execute([$category]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $grouped = [];
    foreach($items as $item) {
        $grouped[$item['subcategory']][] = $item;
    }
    
    return $grouped;
}

function getEvents() {
    global $pdo;
    
    $stmt = $pdo->query("SELECT * FROM events WHERE active = 1 ORDER BY id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
