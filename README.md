# 🎱 Billiards Bar & Café - Full-Stack Web Application

A complete restaurant and billiards bar management system with user authentication, online ordering, event registration, and admin dashboard.

![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=flat&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=flat&logo=javascript&logoColor=black)
![License](https://img.shields.io/badge/License-MIT-green.svg)

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Features](#-features)
- [Screenshots](#-screenshots)
- [Installation Guide](#-installation-guide)
  - [For Non-Technical Users](#for-non-technical-users)
  - [For Technical Users](#for-technical-users)
- [Usage Guide](#-usage-guide)
- [Project Structure](#-project-structure)
- [API Documentation](#-api-documentation)
- [Database Schema](#-database-schema)
- [Security Features](#-security-features)
- [Troubleshooting](#-troubleshooting)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🎯 Overview

This is a modern, full-stack web application designed for a billiards bar and café. It provides a complete digital experience for customers to browse menus, make reservations, order food/drinks, and register for events. The admin panel allows staff to manage all aspects of the business.

**Perfect for:**
- Restaurant and bar owners
- Billiards halls
- Entertainment venues
- Café and lounge businesses

---

## ✨ Features

### 👥 For Customers

- **🔐 User Authentication**
  - Secure registration and login
  - Password encryption
  - Session management
  - Personal profile dashboard

- **🍽️ Menu Browsing & Ordering**
  - Browse café and bar menus
  - View item descriptions and prices
  - Place orders directly from menu
  - Track order history

- **📅 Reservation System**
  - Book tables for dining
  - Reserve billiards tables
  - Specify party size and preferences
  - Modify or cancel pending reservations

- **🎉 Event Registration**
  - View upcoming events
  - Register for events
  - Cancel registrations
  - Track registered events

### 👨‍💼 For Administrators

- **📊 Dashboard**
  - Real-time statistics
  - Today's reservations count
  - Active events tracking
  - User management overview

- **🗓️ Reservation Management**
  - View all reservations
  - Confirm or cancel bookings
  - Update reservation status
  - Filter by date and status

- **📝 Menu Management**
  - Add new menu items
  - Update prices and descriptions
  - Delete items
  - Organize by categories

- **🎪 Event Management**
  - Create new events
  - Edit event details
  - Delete events
  - View registrations

- **👤 User Management**
  - View all registered users
  - Delete user accounts
  - Protected admin accounts

---

## 📸 Screenshots

### Customer View
- **Homepage**: Elegant landing page with billiards theme
- **Menu**: Interactive menu with order buttons
- **Events**: Event cards with registration
- **Profile**: Personal dashboard with orders and reservations

### Admin View
- **Dashboard**: Business overview with statistics
- **Reservations**: Table view with status management
- **Menu Manager**: Add/edit/delete menu items
- **Events Manager**: Create and manage events

---

## 🚀 Installation Guide

### For Non-Technical Users

**What You Need:**
- A computer with Windows, Mac, or Linux
- XAMPP (free software that runs websites on your computer)
- A web browser (Chrome, Firefox, Edge, etc.)

**Step-by-Step Instructions:**

#### 1. Install XAMPP

1. Download XAMPP from: https://www.apachefriends.org/
2. Run the installer
3. Install with default settings
4. Open XAMPP Control Panel

#### 2. Start the Services

1. In XAMPP Control Panel, click **Start** next to "Apache"
2. Click **Start** next to "MySQL"
3. Both should show green "Running" status

#### 3. Set Up the Files

1. Download this project as a ZIP file
2. Extract the ZIP file
3. Copy the `billiard-bar` folder to:
   - **Windows**: `C:\xampp\htdocs\`
   - **Mac**: `/Applications/XAMPP/htdocs/`
   - **Linux**: `/opt/lampp/htdocs/`

#### 4. Create the Database

1. Open your web browser
2. Go to: `http://localhost/phpmyadmin`
3. Click "New" on the left sidebar
4. Database name: `billiard_bar`
5. Click "Create"
6. Click "Import" tab
7. Click "Choose File"
8. Select `database.sql` from the billiard-bar folder
9. Click "Go" at the bottom
10. Wait for "Import has been successfully finished"

#### 5. Create Additional Tables

1. In your browser, go to: `http://localhost/billiard-bar/setup_tables.php`
2. You should see success messages
3. This creates the orders and event registration tables

#### 6. Access the Website

**Customer Site:**
- Open: `http://localhost/billiard-bar/`

**Admin Panel:**
- Click "Admin Login"
- Email: `admin@billiardbar.com`
- Password: `password`

**🎉 You're Done! The website is now running on your computer.**

---

### For Technical Users

**Requirements:**
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache 2.4 or higher
- Modern web browser

**Quick Setup:**

```bash
# Clone or download the repository
cd /path/to/xampp/htdocs/
git clone <repository-url> billiard-bar

# Import database
mysql -u root -p < billiard-bar/database.sql

# Create additional tables
mysql -u root -p billiard_bar < billiard-bar/add_tables.sql

# Or visit in browser
http://localhost/billiard-bar/setup_tables.php

# Configure database (if needed)
# Edit includes/db.php with your credentials

# Access application
http://localhost/billiard-bar/
```

**Default Credentials:**
- Admin: `admin@billiardbar.com` / `password`

---

## 📖 Usage Guide

### For Customers

#### Creating an Account
1. Click "Register" in the top navigation
2. Enter your name, email, and password
3. Click "REGISTER"
4. You'll be redirected to your profile

#### Making a Reservation
1. Click "RESERVATIONS" in the menu
2. Your name and email are auto-filled (if logged in)
3. Select date, time, party size, and type
4. Add any special requests
5. Click "SUBMIT RESERVATION"

#### Ordering from Menu
1. Click "MENU" in the navigation
2. Browse Café or Bar & Grill sections
3. Click "Order" on any item
4. Enter quantity
5. Confirm order

#### Registering for Events
1. Click "EVENTS" in the navigation
2. Browse available events
3. Click "Register" on desired event
4. Confirm registration

#### Managing Your Account
1. Click "My Profile" (when logged in)
2. View all your:
   - Reservations (edit/delete pending ones)
   - Orders
   - Event registrations (cancel if needed)

### For Administrators

#### Accessing Admin Panel
1. Click "Admin Login"
2. Enter admin credentials
3. You'll see the dashboard

#### Managing Reservations
1. Click "Reservations" in admin menu
2. View all bookings in table format
3. Change status using dropdown:
   - Pending → Confirmed
   - Pending → Cancelled

#### Adding Menu Items
1. Click "Menu" in admin menu
2. Fill in the form:
   - Category (Cafe/Bar)
   - Subcategory (e.g., "Cocktails")
   - Name, Description, Price
3. Click "ADD ITEM"

#### Creating Events
1. Click "Events" in admin menu
2. Enter event details:
   - Title
   - Date/Schedule
   - Description
3. Click "ADD EVENT"

#### Managing Users
1. Click "Users" in admin menu
2. View all registered users
3. Delete users if needed (admin accounts protected)

---

## 📁 Project Structure

```
billiard-bar/
├── 📁 admin/                    # Admin-only pages
│   ├── dashboard.php            # Main admin dashboard
│   ├── reservations.php         # Manage reservations
│   ├── menu.php                 # Manage menu items
│   ├── events.php               # Manage events
│   ├── users.php                # Manage users
│   └── logout.php               # Admin logout
│
├── 📁 user/                     # User-only pages
│   ├── profile.php              # User profile & history
│   └── logout.php               # User logout
│
├── 📁 includes/                 # Backend logic (PHP)
│   ├── db.php                   # Database connection
│   ├── session.php              # Session management
│   ├── auth.php                 # Login/register functions
│   ├── reservations.php         # Reservation CRUD
│   ├── menu.php                 # Menu & events functions
│   ├── admin.php                # Admin statistics
│   └── orders.php               # Orders & event registrations
│
├── 📁 assets/                   # Frontend resources
│   ├── 📁 css/
│   │   └── style.css            # All styles
│   └── 📁 js/
│       └── script.js            # Frontend logic
│
├── 📄 index.html                # Main landing page
├── 📄 api.php                   # REST API endpoints
├── 📄 database.sql              # Database schema
├── 📄 add_tables.sql            # Additional tables
├── 📄 setup_tables.php          # Auto-setup script
├── 📄 .htaccess                 # Apache configuration
├── 📄 .gitignore                # Git exclusions
└── 📄 README.md                 # This file
```

---

## 🔌 API Documentation

### Authentication Endpoints

#### Register User
```http
POST /api.php?action=register
Content-Type: application/x-www-form-urlencoded

name=John Doe&email=john@example.com&password=secret123
```

**Response:**
```json
{
  "success": true,
  "message": "Registration successful"
}
```

#### Login User
```http
POST /api.php?action=login
Content-Type: application/x-www-form-urlencoded

email=john@example.com&password=secret123
```

**Response:**
```json
{
  "success": true,
  "message": "Login successful",
  "name": "John Doe"
}
```

#### Check Authentication
```http
GET /api.php?action=check_auth
```

**Response:**
```json
{
  "success": true,
  "authenticated": true,
  "name": "John Doe",
  "email": "john@example.com",
  "role": "user"
}
```

### Reservation Endpoints

#### Create Reservation
```http
POST /api.php?action=create_reservation
Content-Type: application/x-www-form-urlencoded

name=John Doe&email=john@example.com&date=2024-12-25&time=19:00&party=4&type=both&notes=Window seat
```

#### Update Reservation (Requires Login)
```http
POST /api.php?action=update_reservation
Content-Type: application/x-www-form-urlencoded

id=1&date=2024-12-26&time=20:00&party=6&type=dining&notes=Updated
```

#### Delete Reservation (Requires Login)
```http
POST /api.php?action=delete_reservation
Content-Type: application/x-www-form-urlencoded

id=1
```

### Menu & Events Endpoints

#### Get Menu by Category
```http
GET /api.php?action=get_menu&category=cafe
```

**Response:**
```json
{
  "success": true,
  "items": {
    "Coffee & Drinks": [
      {
        "id": 1,
        "name": "Lavender Latte",
        "description": "House made syrup, double shot espresso",
        "price": "5.00"
      }
    ]
  }
}
```

#### Get Events
```http
GET /api.php?action=get_events
```

### Order & Event Registration Endpoints

#### Create Order (Requires Login)
```http
POST /api.php?action=create_order
Content-Type: application/x-www-form-urlencoded

menu_item_id=1&quantity=2
```

#### Register for Event (Requires Login)
```http
POST /api.php?action=register_event
Content-Type: application/x-www-form-urlencoded

event_id=1
```

#### Delete Event Registration (Requires Login)
```http
POST /api.php?action=delete_event_registration
Content-Type: application/x-www-form-urlencoded

id=1
```

### Admin Endpoints (Requires Admin Role)

#### Get Statistics
```http
GET /api.php?action=get_stats
```

**Response:**
```json
{
  "success": true,
  "stats": {
    "todayReservations": 24,
    "activeEvents": 12,
    "totalUsers": 156,
    "totalReservations": 342
  }
}
```

#### Get All Reservations
```http
GET /api.php?action=get_reservations
```

---

## 🗄️ Database Schema

### Tables Overview

#### `users`
Stores user accounts and authentication data.

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key |
| email | VARCHAR(255) | Unique email |
| password | VARCHAR(255) | Hashed password |
| name | VARCHAR(255) | Full name |
| role | ENUM | 'user' or 'admin' |
| created_at | TIMESTAMP | Registration date |

#### `reservations`
Stores table and billiards reservations.

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key |
| user_id | INT | Foreign key to users |
| name | VARCHAR(255) | Customer name |
| email | VARCHAR(255) | Contact email |
| date | DATE | Reservation date |
| time | TIME | Reservation time |
| party_size | INT | Number of people |
| type | ENUM | 'dining', 'billiards', 'both' |
| notes | TEXT | Special requests |
| status | ENUM | 'pending', 'confirmed', 'cancelled' |
| created_at | TIMESTAMP | Booking date |

#### `menu_items`
Stores menu items for café and bar.

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key |
| category | ENUM | 'cafe' or 'bar' |
| subcategory | VARCHAR(100) | Item grouping |
| name | VARCHAR(255) | Item name |
| description | TEXT | Item description |
| price | DECIMAL(10,2) | Item price |
| active | BOOLEAN | Visibility status |

#### `events`
Stores events and activities.

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key |
| title | VARCHAR(255) | Event name |
| date | VARCHAR(100) | Event schedule |
| description | TEXT | Event details |
| active | BOOLEAN | Visibility status |

#### `orders`
Stores customer orders.

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key |
| user_id | INT | Foreign key to users |
| menu_item_id | INT | Foreign key to menu_items |
| quantity | INT | Order quantity |
| total_price | DECIMAL(10,2) | Total cost |
| status | ENUM | 'pending', 'completed', 'cancelled' |
| created_at | TIMESTAMP | Order date |

#### `event_registrations`
Stores event registrations.

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key |
| user_id | INT | Foreign key to users |
| event_id | INT | Foreign key to events |
| name | VARCHAR(255) | Registrant name |
| email | VARCHAR(255) | Contact email |
| created_at | TIMESTAMP | Registration date |

### Entity Relationship Diagram

```
users (1) ──────< (N) reservations
users (1) ──────< (N) orders
users (1) ──────< (N) event_registrations

menu_items (1) ──< (N) orders
events (1) ──────< (N) event_registrations
```

---

## 🔒 Security Features

### Authentication & Authorization
- ✅ **Password Hashing**: bcrypt algorithm with salt
- ✅ **Session Management**: Secure PHP sessions
- ✅ **Role-Based Access**: User and admin roles
- ✅ **Login Required**: Protected endpoints
- ✅ **Admin Guards**: Admin-only pages and actions

### Database Security
- ✅ **Prepared Statements**: SQL injection prevention
- ✅ **Parameterized Queries**: No direct SQL concatenation
- ✅ **Foreign Keys**: Data integrity constraints
- ✅ **Input Validation**: Server-side validation

### File Security
- ✅ **Protected Config**: .htaccess blocks config.php access
- ✅ **Hidden Database**: database.sql not accessible via web
- ✅ **No Directory Listing**: Prevents file browsing
- ✅ **Error Handling**: No sensitive data in error messages

### Frontend Security
- ✅ **XSS Prevention**: htmlspecialchars() on all outputs
- ✅ **CSRF Protection**: Session-based validation
- ✅ **Input Sanitization**: Client and server-side
- ✅ **Secure Forms**: POST requests for modifications

---

## 🐛 Troubleshooting

### Common Issues

#### "Connection failed" Error
**Problem**: Cannot connect to database

**Solutions:**
1. Make sure MySQL is running in XAMPP
2. Check database name is `billiard_bar`
3. Verify credentials in `includes/db.php`
4. Ensure database was imported

#### "Table doesn't exist" Error
**Problem**: Missing database tables

**Solution:**
Visit: `http://localhost/billiard-bar/setup_tables.php`

#### Login Not Working
**Problem**: Cannot login with credentials

**Solutions:**
1. Verify database was imported correctly
2. Check if user exists in `users` table
3. Try registering a new account
4. For admin: use `admin@billiardbar.com` / `password`

#### Blank Page After Login
**Problem**: Page doesn't load after authentication

**Solutions:**
1. Check PHP error logs in XAMPP
2. Verify all include files exist
3. Check file permissions
4. Clear browser cache

#### Orders/Events Not Working
**Problem**: Cannot place orders or register for events

**Solution:**
Run: `http://localhost/billiard-bar/setup_tables.php`

#### Admin Panel Not Accessible
**Problem**: Cannot access admin dashboard

**Solutions:**
1. Use correct admin credentials
2. Check if user role is 'admin' in database
3. Clear browser cookies and try again

### Getting Help

If you encounter issues not listed here:

1. **Check PHP Error Logs**:
   - XAMPP: `xampp/apache/logs/error.log`

2. **Check Browser Console**:
   - Press F12 → Console tab

3. **Verify Database**:
   - Open phpMyAdmin
   - Check if all tables exist
   - Verify data is present

4. **Test Connection**:
   - Visit: `http://localhost/billiard-bar/test_connection.php`

---

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

### For Non-Technical Users
- Report bugs or issues
- Suggest new features
- Provide feedback on usability
- Share your experience

### For Developers

1. **Fork the Repository**
2. **Create a Feature Branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```
3. **Commit Your Changes**
   ```bash
   git commit -m 'Add amazing feature'
   ```
4. **Push to Branch**
   ```bash
   git push origin feature/amazing-feature
   ```
5. **Open a Pull Request**

### Development Guidelines
- Follow existing code style
- Comment your code
- Test thoroughly before submitting
- Update documentation if needed

---

## 📄 License

This project is licensed under the MIT License.

```
MIT License

Copyright (c) 2024 Billiards Bar & Café

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## 🎓 Learning Resources

### For Beginners
- [What is XAMPP?](https://www.apachefriends.org/)
- [PHP Basics](https://www.php.net/manual/en/getting-started.php)
- [MySQL Tutorial](https://www.mysqltutorial.org/)
- [HTML & CSS Guide](https://www.w3schools.com/)

### For Developers
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Reference](https://dev.mysql.com/doc/)
- [JavaScript MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [REST API Best Practices](https://restfulapi.net/)

---

## 📞 Support

Need help? Here are your options:

- 📧 **Email**: support@billiardbar.com
- 💬 **Issues**: Open an issue on GitHub
- 📖 **Documentation**: Read this README
- 🎥 **Video Tutorials**: Coming soon

---

## 🙏 Acknowledgments

- Icons and design inspiration from various open-source projects
- Community feedback and contributions
- XAMPP for providing an excellent local development environment

---

## 📊 Project Stats

- **Lines of Code**: ~5,000+
- **Files**: 25+
- **Database Tables**: 6
- **API Endpoints**: 15+
- **Features**: 20+

---

**Made with ❤️ for restaurant and entertainment venue owners**

**Version**: 1.0.0  
**Last Updated**: November 2024  
**Status**: Production Ready ✅
