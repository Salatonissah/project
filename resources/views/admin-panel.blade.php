<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Dashboard</title>
    <link rel="icon" href="{{ asset('assets/images/books-stack-of-three.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-size: cover;
        }

        .dashboard-navbar {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .dashboard-navbar .nav-link,
        .dashboard-navbar .navbar-brand {
            color: #333 !important;
            font-weight: 500;
        }

        .dashboard-navbar .dropdown-menu {
            min-width: 120px;
        }

        .dashboard-content {
            margin-top: 40px;
        }

        .dashboard-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            padding: 24px;
            margin-bottom: 24px;
        }

        .accounts-form-card {
            max-width: 420px;
            margin: 0 auto;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .sidebar-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            padding: 18px;
            margin-bottom: 24px;
        }

        .dashboard-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .nav-profile {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg dashboard-navbar">
        <div class="container-fluid">
            <img src="{{ asset('assets/images/books-stack-of-three.png') }}" alt="Bookshop Logo" style="height:32px; width:auto;">
            <a class="navbar-brand" href="#"></i>DASHBOARD</a>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <!-- Reports Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="reportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reports
                        </a>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                            <li><a class="dropdown-item" onclick="showDashboard()">Total Sales</a></li>
                            <li><a class="dropdown-item" onclick="showDashboard()">Inventory</a></li>
                            <li><a class="dropdown-item" onclick="showDashboard()">Financial Reports</a></li>
                        </ul>
                    </li>
                    <!-- Accounts -->
                    <li class="nav-item">
                        <a class="nav-link" onclick="showAccountsForm()">Accounts</a>
                    </li>
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-profile" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid dashboard-content">
        <div id="dashboardSection">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dashboard-card">
                                <div class="dashboard-section-title">Latest in Sales</div>
                                <canvas id="latestHitsChart" height="120"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-card">
                                <div class="dashboard-section-title">Performance</div>
                                <canvas id="performanceChart" height="120"></canvas>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="dashboard-card">
                                <div class="dashboard-section-title">Calendar</div>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar-card mb-3">
                        <div class="dashboard-section-title">Top Books Sold</div>
                        <ol class="mb-0 ps-3">
                            <li>How to program in C++</li>
                            <li>Coding for beginners</li>
                            <li>Journey to the end of the World</li>
                        </ol>
                    </div>
                    <div class="sidebar-card mb-3">
                        <div class="dashboard-section-title">Upcoming Tasks</div>
                        <ol class="mb-0 ps-3">
                            <li>Read reports</li>
                            <li>Write email</li>
                            <li>Call customers</li>
                            <li>Go to meeting</li>
                            <li>Weekly plan</li>
                            <li>Ask for feedback</li>
                            <li>Meet Supervisor</li>
                        </ol>
                    </div>
                    <div class="sidebar-card">
                        <div class="dashboard-section-title">Storage</div>
                        <canvas id="storageChart" height="120"></canvas>
                        <div class="mt-2 small">
                            <span class="text-primary">Used: 4,600 GB</span> /
                            <span class="text-success">Available: 5,600 GB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Accounts Form Section (hidden by default) -->
        <div id="accountsSection" style="display:none;">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="dashboard-card accounts-form-card">
                        <form>
                            <h5 class="mb-4">Edit Account</h5>
                            <div class="mb-3">
                                <label class="form-label">Account Name</label>
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Account Email</label>
                                <input type="email" class="form-control" placeholder="issa@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="******">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Re-enter Password</label>
                                <input type="password" class="form-control" placeholder="******">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" placeholder="254-030-0440">
                            </div>
                            <div class="d-flex justify-content-between">
                                <a onclick="showDashboard()">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-outline-danger">Delete Account</button>
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="dashboard-card text-center">
                        <img src="{{ asset('assets/images/profile.png') }}" class="profile-img" alt="Profile Image">
                        <form>
                            <label class="form-label">Upload New...</label>
                            <input type="file" class="form-control">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reportModalLabel">Report Ready</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            The file report is ready for viewing
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="printBtn">Print</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script>
        // Toggle dashboard/accounts section
        function showAccountsForm() {
            document.getElementById('dashboardSection').style.display = 'none';
            document.getElementById('accountsSection').style.display = '';
        }

        function showDashboard() {
            document.getElementById('dashboardSection').style.display = '';
            document.getElementById('accountsSection').style.display = 'none';
        }

        // Chart.js - Latest Hits
        new Chart(document.getElementById('latestHitsChart'), {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Latest Hits',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        borderColor: '#4e73df',
                        fill: false
                    },
                    {
                        label: 'Popular Hits',
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: '#1cc88a',
                        fill: false
                    },
                    {
                        label: 'Featured',
                        data: [18, 48, 77, 9, 100, 27, 40],
                        borderColor: '#f6c23e',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });

        // Chart.js - Performance
        new Chart(document.getElementById('performanceChart'), {
            type: 'bar',
            data: {
                labels: ['Coding', 'Philosophy', 'ICT', 'Exams', 'Programming', 'Education'],
                datasets: [{
                    label: 'Hits',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        '#e74a3b', '#4e73df', '#f6c23e', '#1cc88a', '#6f42c1', '#fd7e14'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Chart.js - Storage Pie
        new Chart(document.getElementById('storageChart'), {
            type: 'pie',
            data: {
                labels: ['Used', 'Available'],
                datasets: [{
                    data: [4600, 5600],
                    backgroundColor: ['#4e73df', '#1cc88a']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            }
        });

        // FullCalendar - Calendar
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: 350,
                    events: [{
                            title: '3p Meeting',
                            start: '2018-09-05'
                        },
                        {
                            title: '3p Marketing trip',
                            start: '2018-09-10'
                        }
                    ]
                });
                calendar.render();
            }
        });

        function showDashboard() {
            var reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
            reportModal.show();

            document.getElementById('printBtn').onclick = function() {
                reportModal.hide();
            };
        }
    </script>
</body>

</html>