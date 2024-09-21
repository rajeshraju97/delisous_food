<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu List</title>
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
            padding-top: 20px;
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            #main-content {
                margin-left: 0;
            }
        }

        .table img {
            max-width: 100px;
            /* Adjust image size */
            height: auto;
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
        <div class="container mt-5">
            <h2>Menu List</h2>
            <a href="/admin/menu/add" class="btn btn-primary mb-3">Add New Menu Item</a>
            <table class="table table-striped">
                <thead class="bg-info text-dark font-weight-bold">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($menus) && is_array($menus)): ?>
                        <?php foreach ($menus as $menu): ?>
                            <tr>
                                <td><?= esc($menu['name']); ?></td>
                                <td><?= esc($menu['description']); ?></td>
                                <td>
                                    <?php if (!empty($menu['image'])): ?>
                                        <img src="<?= base_url('assets/images/' . esc($menu['image'])); ?>"
                                            alt="<?= esc($menu['name']); ?>">
                                    <?php else: ?>
                                        No image
                                    <?php endif; ?>
                                </td>
                                <td>₹<?= esc($menu['price']); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/menu/edit/<?= esc($menu['id']); ?>"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/admin/menu/delete/<?= esc($menu['id']); ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No menu items found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="/admin/dashboard" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>