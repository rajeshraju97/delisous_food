<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/yeti/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }

        #sidebar {
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            overflow-y: auto;
            padding-top: 20px;
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
            padding: 20px;
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            #main-content {
                margin-left: 0;
            }
        }

        .table thead th {
            background-color: #17a2b8; /* Bootstrap's info color */
            color: #fff;
            font-weight: bold;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <div id="sidebar" class="col-md-2 d-md-block bg-light sidebar">
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

    <div id="main-content" class="container">
        <h1 class="my-4">Transaction Report</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($transactions) && is_array($transactions)): ?>
                        <?php foreach ($transactions as $transaction): ?>
                            <tr>
                                <td><?= esc($transaction['transaction_id']) ?></td>
                                <td><?= esc($transaction['user_id']) ?></td>
                                <td><?= esc($transaction['name']) ?></td>
                                <td><?= esc($transaction['payment_method']) ?></td>
                                <td><?= esc($transaction['status']) ?></td>
                                <td><?= esc($transaction['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No transactions found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="/admin/dashboard" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/yeti/bootstrap.min.js"></script>
</body>

</html>
