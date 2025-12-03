<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Bar & Grill | Billiards & Dining</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="billiards-bg"></div>

    <div id="notification" class="notification"></div>

    <header>
        <div class="container">
            <div class="user-actions">
                <span id="user-greeting" style="display: none; color: #d4af37; margin-right: 15px;"></span>
                <a href="user/profile.php" id="profile-link" style="display: none;">My Profile</a>
                <a href="user/logout.php" id="logout-link" style="display: none;">Logout</a>
                <a href="#" id="login-link">Login</a>
                <a href="#" id="register-link">Register</a>
                <a href="#" id="admin-login-link">Admin Login</a>
            </div>
            <div class="logo">
                <h1>BILLIARDS</h1>
                <h2>BAR & CAFÉ</h2>
            </div>
            <div class="hero">
                <h3>THE PERFECT BREAK: CRAFT COCKTAILS, BILLIARDS, & BITES</h3>
                <a href="#reservations" class="cta-button nav-link" data-target="reservations">BOOK A TABLE / TABLE TIME</a>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="nav-container">
                <ul class="nav-menu">
                    <li><a href="#home" class="nav-link active" data-target="home">HOME</a></li>
                    <li><a href="#billiards" class="nav-link" data-target="billiards">BILLIARDS</a></li>
                    <li><a href="#menu" class="nav-link" data-target="menu">MENU</a></li>
                    <li><a href="#reservations" class="nav-link" data-target="reservations">RESERVATIONS</a></li>
                    <li><a href="#events" class="nav-link" data-target="events">EVENTS</a></li>
                    <li><a href="#contact" class="nav-link" data-target="contact">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal" id="login-modal">
        <div class="modal-container">
            <span class="close" id="close-login">&times;</span>
            <div class="modal-header">
                <h2>Login</h2>
                <p>Access your account</p>
            </div>
            <form id="login-form">
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" required>
                </div>
                <button type="submit" class="cta-button" style="width: 100%;">LOGIN</button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal" id="register-modal">
        <div class="modal-container">
            <span class="close" id="close-register">&times;</span>
            <div class="modal-header">
                <h2>Register</h2>
                <p>Create a new account</p>
            </div>
            <form id="register-form">
                <div class="form-group">
                    <label for="register-name">Full Name</label>
                    <input type="text" id="register-name" required>
                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" required>
                </div>
                <button type="submit" class="cta-button" style="width: 100%;">REGISTER</button>
            </form>
        </div>
    </div>

    <!-- Admin Login Modal -->
    <div class="modal" id="admin-login-modal">
        <div class="modal-container">
            <span class="close" id="close-admin-login">&times;</span>
            <div class="modal-header">
                <h2>Admin Login</h2>
                <p>Access the administration panel</p>
            </div>
            <form id="admin-login-form">
                <div class="form-group">
                    <label for="admin-username">Email</label>
                    <input type="email" id="admin-username" required>
                </div>
                <div class="form-group">
                    <label for="admin-password">Password</label>
                    <input type="password" id="admin-password" required>
                </div>
                <button type="submit" class="cta-button" style="width: 100%;">LOGIN</button>
            </form>
        </div>
    </div>

    <!-- Admin Panel -->
    <div class="admin-panel" id="admin-panel">
        <div class="container">
            <div class="admin-header">
                <h2>Admin Dashboard</h2>
                <button class="cta-button" id="logout-admin">Logout</button>
            </div>
            <div class="admin-content">
                <div class="admin-card">
                    <h3>Today's Overview</h3>
                    <div class="admin-stats">
                        <div class="stat-item">
                            <div class="stat-value">24</div>
                            <div class="stat-label">Today's Reservations</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">$2,847</div>
                            <div class="stat-label">Today's Revenue</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">78%</div>
                            <div class="stat-label">Table Occupancy</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">12</div>
                            <div class="stat-label">Active Events</div>
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <h3>Recent Reservations</h3>
                    <div class="reservation-list">
                        <div class="reservation-item">
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>John Smith</strong> - 7:00 PM - Party of 4
                            </div>
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>Sarah Johnson</strong> - 6:30 PM - Party of 2
                            </div>
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>Michael Brown</strong> - 8:15 PM - Party of 6
                            </div>
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>Emily Davis</strong> - 9:00 PM - Party of 3
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <h3>Quick Actions</h3>
                    <div class="admin-actions">
                        <button class="cta-button">View Reports</button>
                        <button class="cta-button">Staff Management</button>
                    </div>
                </div>

                <div class="admin-card">
                    <h3>Popular Items Today</h3>
                    <div class="popular-items">
                        <div class="item-list">
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>Ribeye Steak</strong> - 42 orders today
                            </div>
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>Old Fashioned</strong> - 38 orders today
                            </div>
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>Smoked Salmon Bagel</strong> - 35 orders today
                            </div>
                            <div style="padding: 10px; background: rgba(10,15,10,0.5); border-radius: 5px; border: 1px solid #1a3d1a;">
                                <strong>Espresso Martini</strong> - 29 orders today
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        <section id="home" class="page-section active">
            <div class="container">
                <div class="home-content">
                    <div class="home-image">
                        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Café Bar & Grill Interior" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div class="home-text">
                        <h3>Welcome to Billiards Bar & Café</h3>
                        <p>Experience the perfect blend of upscale dining, craft cocktails, and premium billiards in a sophisticated atmosphere.</p>
                        <p>Whether you're looking for a casual lunch, evening drinks with friends, or a competitive game of pool, we offer an unparalleled experience.</p>
                        <p>Our menu features carefully crafted dishes using locally sourced ingredients, paired with an extensive selection of wines, beers, and signature cocktails.</p>
                        <a href="#menu" class="cta-button nav-link" data-target="menu" style="margin-top: 20px; display: inline-block;">VIEW OUR MENU</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="billiards" class="page-section">
            <div class="container">
                <h2 class="section-title">PREMIUM BILLIARDS EXPERIENCE</h2>
                <div class="billiards-content">
                    <div class="home-image">
                        <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Billiards Table" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div>
                         <p style="margin-bottom: 20px;">Our establishment features championship-quality billiards tables in a dedicated gaming area. Whether you're a seasoned player or new to the game, our tables provide the perfect setting for friendly competition or serious play.</p>
                        <div class="table-info">
                            <h3>Table Reservations</h3>
                            <ul>
                                <li>Championship-quality tables</li>
                                <li>Professional-grade cues available</li>
                                <li>Hourly and daily rates</li>
                                <li>Tournament hosting</li>
                                <li>Private lessons available</li>
                            </ul>
                            <a href="#reservations" class="cta-button nav-link" data-target="reservations">RESERVE A TABLE</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="menu" class="page-section">
            <div class="container">
                <h2 class="section-title">OUR MENU: CRAFTED FOR EVERY MOMENT</h2>
                <div class="menu-categories">
                    <div class="category-tab active" data-category="cafe">CAFE & BITES</div>
                    <div class="category-tab" data-category="bar">BAR & GRILL</div>
                </div>

                <div class="menu-content">
                    <div class="menu-category active" id="cafe-menu">
                        <div class="menu-container">
                            <div class="menu-column">
                                <h3>COFFEE & DRINKS</h3>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=300&h=200&fit=crop" alt="Lavender Latte" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Lavender Latte</span>
                                        <span class="item-price">$5</span>
                                    </div>
                                    <p class="item-description">House made syrup, double shot espresso</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?w=300&h=200&fit=crop" alt="Cold Brew Tonic" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Cold Brew Tonic</span>
                                        <span class="item-price">$6</span>
                                    </div>
                                    <p class="item-description">Refreshing citrus notes with premium tonic</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1515823064-d6e0c04616a7?w=300&h=200&fit=crop" alt="Matcha Green Tea" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Matcha Green Tea</span>
                                        <span class="item-price">$4</span>
                                    </div>
                                    <p class="item-description">Ceremonial grade matcha</p>
                                </div>
                            </div>
                            <div class="menu-column">
                                <h3>MORNING & DAY BITES</h3>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?w=300&h=200&fit=crop" alt="Smoked Salmon Bagel" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Smoked Salmon Bagel</span>
                                        <span class="item-price">$12</span>
                                    </div>
                                    <p class="item-description">Cream cheese, capers, red onion</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1525351484163-7529414344d8?w=300&h=200&fit=crop" alt="Avocado Toast" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Avocado Toast</span>
                                        <span class="item-price">$10</span>
                                    </div>
                                    <p class="item-description">Smashed avocado on artisan bread</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1626700051175-6818013e1d4f?w=300&h=200&fit=crop" alt="Breakfast Burrito" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Breakfast Burrito</span>
                                        <span class="item-price">$11</span>
                                    </div>
                                    <p class="item-description">Scrambled eggs, cheese, and chorizo</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="menu-category" id="bar-menu">
                        <div class="menu-container">
                            <div class="menu-column">
                                <h3>COCKTAILS</h3>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?w=300&h=200&fit=crop" alt="Old Fashioned" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Old Fashioned</span>
                                        <span class="item-price">$12</span>
                                    </div>
                                    <p class="item-description">Bourbon, sugar, bitters</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=300&h=200&fit=crop" alt="Espresso Martini" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Espresso Martini</span>
                                        <span class="item-price">$11</span>
                                    </div>
                                    <p class="item-description">Vodka, coffee liqueur, fresh espresso</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1544145945-f90425340c7e?w=300&h=200&fit=crop" alt="Moscow Mule" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Moscow Mule</span>
                                        <span class="item-price">$10</span>
                                    </div>
                                    <p class="item-description">Vodka, ginger beer, lime</p>
                                </div>
                            </div>
                            <div class="menu-column">
                                <h3>GRILL SPECIALTIES</h3>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=300&h=200&fit=crop" alt="Ribeye Steak" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Ribeye Steak</span>
                                        <span class="item-price">$28</span>
                                    </div>
                                    <p class="item-description">12oz prime ribeye with garlic butter</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=300&h=200&fit=crop" alt="Grilled Salmon" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">Grilled Salmon</span>
                                        <span class="item-price">$22</span>
                                    </div>
                                    <p class="item-description">With lemon herb sauce and seasonal vegetables</p>
                                </div>
                                <div class="menu-item">
                                    <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=300&h=200&fit=crop" alt="BBQ Ribs" loading="lazy">
                                    <div class="item-header">
                                        <span class="item-name">BBQ Ribs</span>
                                        <span class="item-price">$24</span>
                                    </div>
                                    <p class="item-description">Fall-off-the-bone pork ribs with house BBQ sauce</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="reservations" class="page-section">
            <div class="container">
                <h2 class="section-title">MAKE A RESERVATION</h2>
                <div class="reservation-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" id="time" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="party">Party Size</label>
                            <select id="party" required>
                                <option value="">Select party size</option>
                                <option value="1">1 person</option>
                                <option value="2">2 people</option>
                                <option value="3">3 people</option>
                                <option value="4">4 people</option>
                                <option value="5">5 people</option>
                                <option value="6">6 people</option>
                                <option value="7">7+ people</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Reservation Type</label>
                            <select id="type" required>
                                <option value="">Select type</option>
                                <option value="dining">Dining Only</option>
                                <option value="billiards">Billiards Only</option>
                                <option value="both">Dining & Billiards</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notes">Special Requests</label>
                        <textarea id="notes" rows="4"></textarea>
                    </div>
                    <button type="submit" class="cta-button" id="submit-reservation" style="width: 100%;">SUBMIT RESERVATION</button>
                </div>
            </div>
        </section>

        <section id="events" class="page-section">
            <div class="container">
                <h2 class="section-title">UPCOMING EVENTS</h2>
                <div class="events-grid">
                    <div class="event-card">
                        <div class="event-date">Every Monday | 7PM-10PM</div>
                        <div class="event-title">Monday Night Pool Tournament</div>
                        <div class="event-description">Join our weekly pool tournament with cash prizes and drink specials for participants.</div>
                    </div>
                    <div class="event-card">
                        <div class="event-date">Every Thursday | 8PM-11PM</div>
                        <div class="event-title">Live Jazz Night</div>
                        <div class="event-description">Enjoy smooth jazz performances while you dine and play. No cover charge.</div>
                    </div>
                    <div class="event-card">
                        <div class="event-date">June 15 | 6PM-9PM</div>
                        <div class="event-title">Whiskey Tasting Event</div>
                        <div class="event-description">Sample premium whiskeys from around the world with expert guidance. Limited seats.</div>
                    </div>
                    <div class="event-card">
                        <div class="event-date">June 22 | 12PM-4PM</div>
                        <div class="event-title">Sunday Brunch & Billiards</div>
                        <div class="event-description">Special brunch menu with bottomless mimosas and discounted table time.</div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="page-section">
            <div class="container">
                <h2 class="section-title">CONTACT & LOCATION</h2>
                <div class="contact-content">
                    <div class="contact-info">
                        <h3>GET IN TOUCH</h3>
                        <div class="contact-details">
                            <p><i>📍</i> 123 Billiards Avenue, Downtown District</p>
                            <p><i>📞</i> (555) 123-4567</p>
                            <p><i>✉️</i> info@billiardsbarandgrill.com</p>
                        </div>
                        <h3>HOURS OF OPERATION</h3>
                        <div class="contact-details">
                            <p><strong>Monday - Thursday:</strong> 11AM - 11PM</p>
                            <p><strong>Friday - Saturday:</strong> 11AM - 1AM</p>
                            <p><strong>Sunday:</strong> 11AM - 9PM</p>
                        </div>
                    </div>
                    <div class="map-container">
                        <iframe id="live-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.72979317933012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2599d240d8283%3A0x69599540c4365d95!2sBilliards!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p class="footer-text">CAFÉ BAR & GRILL © 2023 | BILLIARDS MEN & GRILL</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
