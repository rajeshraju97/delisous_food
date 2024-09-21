<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/yeti/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Custom styles -->
    <style>
        /* Custom styles for sidebar and main content */
        #sidebar {
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            overflow-y: auto;
        }

        #sidebar .nav-link {
            color: #333;
        }

        #sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

        #main-content {
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            #main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div id="sidebar" class="col-md-2 d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <h4>Admin Dashboard</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/users">
                        <i class="fa fa-users"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/orders">
                        <i class="fa fa-shopping-cart"></i> Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/menu">
                        <i class="fa fa-box"></i> Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/transaction_report">
                        <i class="fa fa-chart-line"></i> Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div id="main-content" class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
        </nav>

        <main role="main" class="container-fluid">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">Total Users: <?= isset($users) ? count($users) : 0; ?></p>
                            <a href="/admin/users" class="btn btn-primary">View Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text">Total Orders: <?= isset($orders) ? count($orders) : 0; ?></p>
                            <a href="/admin/orders" class="btn btn-primary">View Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Menu Items</h5>
                            <p class="card-text">Total Menu Items: <?= isset($menus) ? count($menus) : 0; ?></p>
                            <a href="/admin/menu" class="btn btn-primary">View Menu</a>
                        </div>
                    </div>
                </div>
                <!-- Transactions Card -->
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Transactions</h5>
                            <p class="card-text">Total Transactions:
                                <?= isset($transactions) ? count($transactions) : 0; ?></p>
                            <a href="/admin/transaction_report" class="btn btn-primary">View Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>