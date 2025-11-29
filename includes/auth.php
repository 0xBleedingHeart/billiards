<?php
require_once 'db.php';
require_once 'session.php';

function registerUser($name, $email, $password) {
    global $pdo;
    
    if(empty($email) || empty($password) || empty($name)) {
        return ['success' => false, 'message' => 'All fields required'];
    }
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (email, password, name) VALUES (?, ?, ?)");
        $stmt->execute([$email, $hashedPassword, $name]);
        return ['success' => true, 'message' => 'Registration successful'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Email already exists'];
    }
}

function loginUser($email, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        return ['success' => true, 'message' => 'Login successful', 'name' => $user['name']];
    }
    
    return ['success' => false, 'message' => 'Invalid credentials'];
}

function logoutUser() {
    session_destroy();
    return ['success' => true, 'message' => 'Logged out'];
}
?>
