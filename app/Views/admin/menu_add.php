<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/yeti/bootstrap.min.css" rel="stylesheet">
    <style>
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
    </style>
</head>

<body>
    <div id="sidebar" class="col-md-2 d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/menu">
                        <i class="fa fa-box"></i> Menu List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">
                        <i class="fa fa-home"></i> Dashboard
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="main-content" class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="container mt-4">
            <h2>Add Menu Item</h2>
            <form action="/admin/menu/store" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Menu Item</button>
                <a href="/admin/menu" class="btn btn-secondary">Back to Menu List</a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
