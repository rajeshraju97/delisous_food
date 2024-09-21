<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Delicious Food</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="bg-success text-white text-center py-4">
        <h1>Delicious Food</h1>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
            <a class="navbar-brand" href="/">Delicious</a> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <section id="dashboard">
            <h2 class="text-center my-4">Welcome, <?= $username; ?>!</h2>

            <!-- User Profile -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <h3>Profile Information</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Username</th>
                            <td><?= $profile['username']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $profile['email']; ?></td>
                        </tr>
                        <!-- Add more profile fields as needed -->
                    </table>
                </div>
            </div>

            <!-- Order History -->
            <div class="row">
                <div class="col-md-12">
                    <h3>Order History</h3>
                    <?php if (count($orders) > 0): ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Total Price</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= esc($order['name']); ?></td>
                                        <td><?= esc($order['email']); ?></td>
                                        <td><?= esc($order['payment_method']); ?></td>
                                        <td><?= esc($order['total_price']); ?></td>
                                        <td><?= esc($order['created_at']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p class="text-center">No orders found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-success text-white text-center py-3">
        <p>&copy; 2024 Delicious Food. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
