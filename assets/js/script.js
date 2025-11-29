document.addEventListener('DOMContentLoaded', function() {
    createBilliardsBackground();
    loadMenu('cafe');
    loadEvents();
    checkAuth();
    
    // Navigation
    const navLinks = document.querySelectorAll('.nav-link');
    const pageSections = document.querySelectorAll('.page-section');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            navLinks.forEach(l => l.classList.remove('active'));
            pageSections.forEach(s => s.classList.remove('active'));
            this.classList.add('active');
            const targetSection = document.getElementById(this.dataset.target);
            if (targetSection) targetSection.classList.add('active');
        });
    });

    // Menu tabs
    const categoryTabs = document.querySelectorAll('.category-tab');
    const menuCategories = document.querySelectorAll('.menu-category');

    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            categoryTabs.forEach(t => t.classList.remove('active'));
            menuCategories.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            const category = this.dataset.category;
            const targetCategory = document.getElementById(category + '-menu');
            if (targetCategory) targetCategory.classList.add('active');
            loadMenu(category);
        });
    });

    // Login modal
    const loginLink = document.getElementById('login-link');
    const loginModal = document.getElementById('login-modal');
    const closeLogin = document.getElementById('close-login');
    const loginForm = document.getElementById('login-form');

    loginLink.addEventListener('click', function(e) {
        e.preventDefault();
        loginModal.classList.add('active');
    });

    closeLogin.addEventListener('click', () => loginModal.classList.remove('active'));

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('action', 'login');
        formData.append('email', document.getElementById('login-email').value);
        formData.append('password', document.getElementById('login-password').value);

        fetch('api.php', { method: 'POST', body: formData })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    window.location.href = 'user/profile.php';
                } else {
                    showNotification(data.message, 'error');
                }
            });
    });

    // Register modal
    const registerLink = document.getElementById('register-link');
    const registerModal = document.getElementById('register-modal');
    const closeRegister = document.getElementById('close-register');
    const registerForm = document.getElementById('register-form');

    registerLink.addEventListener('click', function(e) {
        e.preventDefault();
        registerModal.classList.add('active');
    });

    closeRegister.addEventListener('click', () => registerModal.classList.remove('active'));

    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('action', 'register');
        formData.append('name', document.getElementById('register-name').value);
        formData.append('email', document.getElementById('register-email').value);
        formData.append('password', document.getElementById('register-password').value);

        fetch('api.php', { method: 'POST', body: formData })
            .then(res => res.json())
            .then(data => {
                showNotification(data.message, data.success ? 'success' : 'error');
                if(data.success) {
                    registerModal.classList.remove('active');
                    registerForm.reset();
                }
            });
    });

    // Admin login
    const adminLoginLink = document.getElementById('admin-login-link');
    const adminLoginModal = document.getElementById('admin-login-modal');
    const closeAdminLogin = document.getElementById('close-admin-login');
    const adminLoginForm = document.getElementById('admin-login-form');
    const adminPanel = document.getElementById('admin-panel');
    const logoutAdmin = document.getElementById('logout-admin');

    adminLoginLink.addEventListener('click', function(e) {
        e.preventDefault();
        adminLoginModal.classList.add('active');
    });

    closeAdminLogin.addEventListener('click', () => adminLoginModal.classList.remove('active'));

    adminLoginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('action', 'admin_login');
        formData.append('username', document.getElementById('admin-username').value);
        formData.append('password', document.getElementById('admin-password').value);

        fetch('api.php', { method: 'POST', body: formData })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    window.location.href = 'admin/dashboard.php';
                } else {
                    showNotification(data.message, 'error');
                }
            });
    });

    logoutAdmin.addEventListener('click', () => {
        adminPanel.classList.remove('active');
        showNotification('Admin logout successful!', 'success');
    });

    // Reservation form
    const submitButton = document.getElementById('submit-reservation');
    if (submitButton) {
        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('action', 'create_reservation');
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('time', document.getElementById('time').value);
            formData.append('party', document.getElementById('party').value);
            formData.append('type', document.getElementById('type').value);
            formData.append('notes', document.getElementById('notes').value);

            fetch('api.php', { method: 'POST', body: formData })
                .then(res => res.json())
                .then(data => {
                    showNotification(data.message, data.success ? 'success' : 'error');
                    if(data.success) document.querySelector('.reservation-form').reset();
                });
        });
    }

    // Event cards
    document.querySelectorAll('.event-card').forEach(card => {
        card.addEventListener('click', () => showNotification('Event registration would open here!', 'success'));
    });

    // Modal close on outside click
    window.addEventListener('click', function(e) {
        if (e.target === loginModal) loginModal.classList.remove('active');
        if (e.target === registerModal) registerModal.classList.remove('active');
        if (e.target === adminLoginModal) adminLoginModal.classList.remove('active');
    });

    function loadAdminData() {
        fetch('api.php?action=get_stats')
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    document.querySelector('.stat-item:nth-child(1) .stat-value').textContent = data.stats.todayReservations;
                    document.querySelector('.stat-item:nth-child(4) .stat-value').textContent = data.stats.activeEvents;
                }
            });
    }

    function showNotification(message, type) {
        const notification = document.getElementById('notification');
        notification.textContent = message;
        notification.className = 'notification ' + type;
        notification.classList.add('show');
        setTimeout(() => notification.classList.remove('show'), 5000);
    }

    function createBilliardsBackground() {
        const bg = document.getElementById('billiards-bg');
        const colors = ['#d4af37', '#8b0000', '#1a3d1a', '#ffffff', '#0a0f0a'];
        
        for (let i = 0; i < 12; i++) {
            const ball = document.createElement('div');
            ball.className = 'billiard-ball';
            const size = Math.floor(Math.random() * 40) + 20;
            ball.style.width = size + 'px';
            ball.style.height = size + 'px';
            ball.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            ball.style.left = Math.floor(Math.random() * 90) + 'vw';
            ball.style.top = Math.floor(Math.random() * 90) + 'vh';
            ball.style.animationDuration = (Math.floor(Math.random() * 20) + 10) + 's';
            ball.style.animationDelay = Math.floor(Math.random() * 10) + 's';
            bg.appendChild(ball);
        }
    }

    function loadMenu(category) {
        fetch(`api.php?action=get_menu&category=${category}`)
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    const menuContainer = document.querySelector(`#${category}-menu .menu-container`);
                    menuContainer.innerHTML = '';
                    
                    for(const [subcategory, items] of Object.entries(data.items)) {
                        const column = document.createElement('div');
                        column.className = 'menu-column';
                        column.innerHTML = `<h3>${subcategory}</h3>`;
                        
                        items.forEach(item => {
                            const menuItem = document.createElement('div');
                            menuItem.className = 'menu-item';
                            menuItem.innerHTML = `
                                <div class="item-header">
                                    <span class="item-name">${item.name}</span>
                                    <span class="item-price">$${item.price}</span>
                                </div>
                                <p class="item-description">${item.description}</p>
                                <button class="cta-button order-btn" data-id="${item.id}" data-name="${item.name}" data-price="${item.price}" style="padding: 5px 15px; font-size: 0.8rem; margin-top: 8px;">Order</button>
                            `;
                            column.appendChild(menuItem);
                        });
                        
                        menuContainer.appendChild(column);
                    }
                    
                    // Add order button listeners
                    document.querySelectorAll('.order-btn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            fetch('api.php?action=check_auth')
                                .then(res => res.json())
                                .then(authData => {
                                    if(!authData.authenticated) {
                                        showNotification('Please login to place orders', 'error');
                                        return;
                                    }
                                    
                                    const quantity = prompt(`How many ${this.dataset.name}?`, '1');
                                    if(quantity && quantity > 0) {
                                        const formData = new FormData();
                                        formData.append('action', 'create_order');
                                        formData.append('menu_item_id', this.dataset.id);
                                        formData.append('quantity', quantity);
                                        
                                        fetch('api.php', { method: 'POST', body: formData })
                                            .then(res => res.json())
                                            .then(data => showNotification(data.message, data.success ? 'success' : 'error'));
                                    }
                                });
                        });
                    });
                }
            });
    }

    function loadEvents() {
        fetch('api.php?action=get_events')
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    const eventsGrid = document.querySelector('.events-grid');
                    eventsGrid.innerHTML = '';
                    
                    data.events.forEach(event => {
                        const eventCard = document.createElement('div');
                        eventCard.className = 'event-card';
                        eventCard.innerHTML = `
                            <div class="event-date">${event.date}</div>
                            <div class="event-title">${event.title}</div>
                            <div class="event-description">${event.description}</div>
                            <button class="cta-button register-event-btn" data-id="${event.id}" style="width: 100%; margin-top: 15px;">Register</button>
                        `;
                        eventsGrid.appendChild(eventCard);
                    });
                    
                    // Add event registration listeners
                    document.querySelectorAll('.register-event-btn').forEach(btn => {
                        btn.addEventListener('click', function(e) {
                            e.stopPropagation();
                            
                            fetch('api.php?action=check_auth')
                                .then(res => res.json())
                                .then(authData => {
                                    if(!authData.authenticated) {
                                        showNotification('Please login to register for events', 'error');
                                        return;
                                    }
                                    
                                    if(confirm('Register for this event?')) {
                                        const formData = new FormData();
                                        formData.append('action', 'register_event');
                                        formData.append('event_id', this.dataset.id);
                                        
                                        fetch('api.php', { method: 'POST', body: formData })
                                            .then(res => res.json())
                                            .then(data => showNotification(data.message, data.success ? 'success' : 'error'));
                                    }
                                });
                        });
                    });
                }
            });
    }

    function checkAuth() {
        fetch('api.php?action=check_auth')
            .then(res => res.json())
            .then(data => {
                if(data.success && data.authenticated) {
                    // Hide login/register/admin login
                    document.getElementById('login-link').style.display = 'none';
                    document.getElementById('register-link').style.display = 'none';
                    document.getElementById('admin-login-link').style.display = 'none';
                    
                    // Show user greeting and profile/logout
                    document.getElementById('user-greeting').textContent = `Welcome, ${data.name}`;
                    document.getElementById('user-greeting').style.display = 'inline';
                    document.getElementById('profile-link').style.display = 'inline';
                    document.getElementById('logout-link').style.display = 'inline';
                    
                    // Auto-fill reservation form
                    const nameField = document.getElementById('name');
                    const emailField = document.getElementById('email');
                    if(nameField && emailField) {
                        nameField.value = data.name;
                        emailField.value = data.email;
                        nameField.readOnly = true;
                        emailField.readOnly = true;
                        nameField.style.backgroundColor = 'rgba(212, 175, 55, 0.1)';
                        emailField.style.backgroundColor = 'rgba(212, 175, 55, 0.1)';
                    }
                }
            });
    }
});
