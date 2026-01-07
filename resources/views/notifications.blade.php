<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - RabitFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            margin: 0; 
            padding: 0; 
            background-color: #f5f5f5; 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        header { 
            background-color: white; 
            padding: 15px 0; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            position: relative;
            z-index: 1000;
        }
        .navbar-brand { color: #228B22 !important; font-weight: bold; font-size: 24px; }
        .nav-link { color: #333 !important; margin: 0 15px; }
        .nav-link:hover { color: #228B22 !important; }
        .dropdown-menu { border: 1px solid #ddd; }
        .btn-green {
            background-color: #32CD32;
            border-color: #32CD32;
            color: white;
        }
        .btn-green:hover {
            background-color: #228B22;
            border-color: #228B22;
        }
        
        /* Notifications Styles */
        .notifications-container {
            padding: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .notifications-header {
            background: white;
            padding: 20px 25px;
            border-radius: 8px 8px 0 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .notifications-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin: 0;
        }
        
        .filter-bar {
            background: white;
            padding: 15px 25px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .filter-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .filter-label {
            font-size: 13px;
            color: #666;
            font-weight: 500;
        }
        
        .filter-select {
            padding: 6px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 13px;
            background: white;
            cursor: pointer;
            min-width: 120px;
        }
        
        .filter-select:focus {
            outline: none;
            border-color: #228B22;
        }
        
        .search-box {
            margin-left: auto;
            position: relative;
        }
        
        .search-input {
            padding: 6px 35px 6px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 13px;
            width: 250px;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #228B22;
        }
        
        .search-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 14px;
        }
        
        .notifications-table {
            background: white;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
        }
        
        .table {
            margin: 0;
        }
        
        .table thead {
            background: #fafafa;
        }
        
        .table thead th {
            border: none;
            padding: 15px 20px;
            font-size: 11px;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .table tbody td {
            padding: 18px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f5f5f5;
            font-size: 13px;
        }
        
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .table tbody tr:hover {
            background: #fafafa;
        }
        
        .entity-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .entity-icon {
            width: 36px;
            height: 36px;
            background: #37474f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            flex-shrink: 0;
        }
        
        .entity-name {
            color: #1976d2;
            font-weight: 500;
            text-decoration: none;
            font-size: 13px;
        }
        
        .entity-name:hover {
            text-decoration: underline;
        }
        
        .alert-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-icon {
            font-size: 16px;
            flex-shrink: 0;
        }
        
        .alert-icon.warning {
            color: #ff9800;
        }
        
        .alert-icon.info {
            color: #2196f3;
        }
        
        .alert-text {
            color: #555;
            font-size: 13px;
        }
        
        .time-cell {
            color: #666;
            font-size: 13px;
        }
        
        .more-info-cell {
            color: #666;
            font-size: 13px;
        }
        
        .actions-cell {
            white-space: nowrap;
        }
        
        .btn-action {
            padding: 5px 14px;
            font-size: 12px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 6px;
            transition: all 0.2s;
        }
        
        .btn-details {
            background: transparent;
            color: #1976d2;
            font-weight: 500;
        }
        
        .btn-details:hover {
            background: #e3f2fd;
        }
        
        .btn-hide {
            background: transparent;
            color: #666;
        }
        
        .btn-hide:hover {
            background: #f5f5f5;
            color: #333;
        }
        
        .dropdown-toggle::after {
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <span style="color: #228B22;">🐰 RABIT FARM</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="/services">Layanan Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="/forum">Forum Komunitas</a></li>
                        <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    Dashboard
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard Monitoring</a></li>
                                    <li><a class="dropdown-item" href="/recording">Pencatatan Digital</a></li>
                                    <li><a class="dropdown-item" href="/database-ternak">Database Ternak</a></li>
                                    <li><a class="dropdown-item" href="/notifications">Notifikasi</a></li>
                                    <li><a class="dropdown-item" href="/forum">Forum Komunitas</a></li>
                                    <li><a class="dropdown-item" href="/reports">Laporan Keuangan</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" style="margin-left: 15px;">
                                    <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-green" href="{{ route('login') }}" style="padding: 8px 20px; border-radius: 20px; margin-left: 15px;">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="notifications-container">
        <div class="notifications-header">
            <h1 class="notifications-title">NOTIFICATIONS</h1>
        </div>

        <div class="filter-bar">
            <div class="filter-item">
                <span class="filter-label">Show</span>
                <select class="filter-select" id="showFilter">
                    <option value="all">All</option>
                    <option value="unread">Unread</option>
                    <option value="read">Read</option>
                </select>
            </div>

            <div class="filter-item">
                <span class="filter-label">All Entities</span>
                <select class="filter-select" id="entityFilter">
                    <option value="all">All Entities</option>
                    <option value="kelinci">Kelinci</option>
                    <option value="kandang">Kandang</option>
                    <option value="pakan">Pakan</option>
                </select>
            </div>

            <div class="filter-item">
                <span class="filter-label">Minimum Severity</span>
                <select class="filter-select" id="severityFilter">
                    <option value="all">All Levels</option>
                    <option value="info">Info</option>
                    <option value="warning">Warning</option>
                    <option value="error">Error</option>
                </select>
            </div>

            <div class="filter-item">
                <span class="filter-label">Info</span>
                <select class="filter-select" id="infoFilter">
                    <option value="all">All</option>
                    <option value="health">Health</option>
                    <option value="feeding">Feeding</option>
                    <option value="breeding">Breeding</option>
                </select>
            </div>

            <div class="filter-item">
                <span class="filter-label">View</span>
                <select class="filter-select" id="viewFilter">
                    <option value="table">Table</option>
                    <option value="list">List</option>
                </select>
            </div>

            <div class="filter-item">
                <span class="filter-label">Active</span>
                <select class="filter-select" id="activeFilter">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="all">All</option>
                </select>
            </div>

            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search" id="searchInput">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

        <div class="notifications-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>ENTITY</th>
                        <th>ALERT</th>
                        <th>TIME</th>
                        <th>MORE INFO</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="entity-cell">
                                <div class="entity-icon">
                                    <i class="fas fa-database"></i>
                                </div>
                                <a href="#" class="entity-name">DESKTOP-R0...</a>
                            </div>
                        </td>
                        <td>
                            <div class="alert-cell">
                                <i class="fas fa-exclamation-triangle alert-icon warning"></i>
                                <span class="alert-text">Device is not connected for extended time</span>
                            </div>
                        </td>
                        <td class="time-cell">Jan 9, 2023 12:46 AM</td>
                        <td class="more-info-cell">-</td>
                        <td class="actions-cell">
                            <button class="btn-action btn-details">Details</button>
                            <button class="btn-action btn-hide">Hide</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="entity-cell">
                                <div class="entity-icon">
                                    <i class="fas fa-server"></i>
                                </div>
                                <a href="#" class="entity-name">Gateway-x576</a>
                            </div>
                        </td>
                        <td>
                            <div class="alert-cell">
                                <i class="fas fa-exclamation-triangle alert-icon warning"></i>
                                <span class="alert-text">Device is not connected for extended time</span>
                            </div>
                        </td>
                        <td class="time-cell">Jan 9, 2023 12:44 AM</td>
                        <td class="more-info-cell">-</td>
                        <td class="actions-cell">
                            <button class="btn-action btn-details">Details</button>
                            <button class="btn-action btn-hide">Hide</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="entity-cell">
                                <div class="entity-icon">
                                    <i class="fas fa-cube"></i>
                                </div>
                                <a href="#" class="entity-name">Gateway-Nlib</a>
                            </div>
                        </td>
                        <td>
                            <div class="alert-cell">
                                <i class="fas fa-exclamation-triangle alert-icon warning"></i>
                                <span class="alert-text">Device is not connected for extended time</span>
                            </div>
                        </td>
                        <td class="time-cell">Today 12:44 AM</td>
                        <td class="more-info-cell">-</td>
                        <td class="actions-cell">
                            <button class="btn-action btn-details">Details</button>
                            <button class="btn-action btn-hide">Hide</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="entity-cell">
                                <div class="entity-icon">
                                    <i class="fas fa-hdd"></i>
                                </div>
                                <a href="#" class="entity-name">DESKTOP-RO...</a>
                            </div>
                        </td>
                        <td>
                            <div class="alert-cell">
                                <i class="fas fa-info-circle alert-icon info"></i>
                                <span class="alert-text">Device never backed up</span>
                            </div>
                        </td>
                        <td class="time-cell">Dec 31, 2022 12:44 AM</td>
                        <td class="more-info-cell">-</td>
                        <td class="actions-cell">
                            <button class="btn-action btn-details">Details</button>
                            <button class="btn-action btn-hide">Hide</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="entity-cell">
                                <div class="entity-icon">
                                    <i class="fas fa-server"></i>
                                </div>
                                <a href="#" class="entity-name">Gateway-x090</a>
                            </div>
                        </td>
                        <td>
                            <div class="alert-cell">
                                <i class="fas fa-info-circle alert-icon info"></i>
                                <span class="alert-text">Device never backed up</span>
                            </div>
                        </td>
                        <td class="time-cell">Jan 9, 2023 12:44 AM</td>
                        <td class="more-info-cell">-</td>
                        <td class="actions-cell">
                            <button class="btn-action btn-details">Details</button>
                            <button class="btn-action btn-hide">Hide</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="entity-cell">
                                <div class="entity-icon">
                                    <i class="fas fa-cube"></i>
                                </div>
                                <a href="#" class="entity-name">Gateway-NLIb</a>
                            </div>
                        </td>
                        <td>
                            <div class="alert-cell">
                                <i class="fas fa-info-circle alert-icon info"></i>
                                <span class="alert-text">Device never backed up</span>
                            </div>
                        </td>
                        <td class="time-cell">Yesterday, 12:34 AM</td>
                        <td class="more-info-cell">-</td>
                        <td class="actions-cell">
                            <button class="btn-action btn-details">Details</button>
                            <button class="btn-action btn-hide">Hide</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.notifications-table tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Filter dropdowns
        const filters = ['showFilter', 'entityFilter', 'severityFilter', 'infoFilter', 'viewFilter', 'activeFilter'];
        filters.forEach(filterId => {
            document.getElementById(filterId).addEventListener('change', function() {
                console.log(`Filter ${filterId} changed to:`, this.value);
                // Add your filter logic here
            });
        });

        // Details button
        document.querySelectorAll('.btn-details').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Details functionality coming soon!');
            });
        });

        // Hide button
        document.querySelectorAll('.btn-hide').forEach(btn => {
            btn.addEventListener('click', function() {
                const row = this.closest('tr');
                row.style.opacity = '0.5';
                setTimeout(() => {
                    row.style.display = 'none';
                }, 300);
            });
        });
    </script>
</body>
</html>
