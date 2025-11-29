<?php
require_once 'includes/db.php';
require_once 'includes/session.php';
require_once 'includes/auth.php';
require_once 'includes/reservations.php';
require_once 'includes/menu.php';
require_once 'includes/admin.php';
require_once 'includes/orders.php';

header('Content-Type: application/json');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch($action) {
    case 'register':
        $result = registerUser($_POST['name'] ?? '', $_POST['email'] ?? '', $_POST['password'] ?? '');
        echo json_encode($result);
        break;
        
    case 'login':
        $result = loginUser($_POST['email'] ?? '', $_POST['password'] ?? '');
        echo json_encode($result);
        break;
        
    case 'logout':
        $result = logoutUser();
        echo json_encode($result);
        break;
        
    case 'admin_login':
        $email = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin'");
        $stmt->execute([$email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($admin && password_verify($password, $admin['password'])) {
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['name'] = $admin['name'];
            $_SESSION['role'] = 'admin';
            echo json_encode(['success' => true, 'message' => 'Admin login successful']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid admin credentials']);
        }
        break;
        
    case 'create_reservation':
        $result = createReservation($_POST);
        echo json_encode($result);
        break;
        
    case 'update_reservation':
        if(!isLoggedIn()) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }
        $result = updateReservation($_POST['id'], $_SESSION['user_id'], $_POST);
        echo json_encode($result);
        break;
        
    case 'delete_reservation':
        if(!isLoggedIn()) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }
        $result = deleteReservation($_POST['id'], $_SESSION['user_id']);
        echo json_encode($result);
        break;
        
    case 'get_menu':
        $category = $_GET['category'] ?? 'cafe';
        $items = getMenuByCategory($category);
        echo json_encode(['success' => true, 'items' => $items]);
        break;
        
    case 'get_events':
        $events = getEvents();
        echo json_encode(['success' => true, 'events' => $events]);
        break;
        
    case 'get_reservations':
        if(!isAdmin()) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }
        
        $reservations = getReservations();
        echo json_encode(['success' => true, 'reservations' => $reservations]);
        break;
        
    case 'get_stats':
        if(!isAdmin()) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }
        
        $stats = getAdminStats();
        echo json_encode(['success' => true, 'stats' => $stats]);
        break;
        
    case 'check_auth':
        if(isLoggedIn()) {
            $stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            echo json_encode([
                'success' => true, 
                'authenticated' => true,
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $_SESSION['role']
            ]);
        } else {
            echo json_encode(['success' => true, 'authenticated' => false]);
        }
        break;
        
    case 'create_order':
        if(!isLoggedIn()) {
            echo json_encode(['success' => false, 'message' => 'Please login to place orders']);
            exit;
        }
        $result = createOrder($_SESSION['user_id'], $_POST['menu_item_id'], $_POST['quantity']);
        echo json_encode($result);
        break;
        
    case 'register_event':
        if(!isLoggedIn()) {
            echo json_encode(['success' => false, 'message' => 'Please login to register for events']);
            exit;
        }
        $stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $result = registerForEvent($_SESSION['user_id'], $_POST['event_id'], $user['name'], $user['email']);
        echo json_encode($result);
        break;
        
    case 'delete_event_registration':
        if(!isLoggedIn()) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }
        $result = deleteEventRegistration($_POST['id'], $_SESSION['user_id']);
        echo json_encode($result);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
