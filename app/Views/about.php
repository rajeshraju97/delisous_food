<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delicious Food</title>
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
                        <?php if (!isset($username) || empty($username)) { ?>
                            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                        <?php } else { ?>
                            <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container my-5">
        <section id="home" class="text-center">
            <h2>Welcome to Delicious Food</h2>
            <p>Experience the best food from around the world.</p>
        </section>
        <section id="about">
            <h2 class="text-center my-4">About Us</h2>
            <p class="text-center">At Delicious Food, we are passionate about delivering the finest culinary
                experiences. Our chefs use the freshest ingredients to create mouth-watering dishes that will satisfy
                your cravings. Whether you're in the mood for a classic burger, a gourmet pizza, or a delectable pasta
                dish, we have something for everyone.</p>
            <p class="text-center">Founded in 2024, Delicious Food has quickly become a favorite among food enthusiasts.
                We believe in quality, taste, and exceptional service. Come and enjoy a delightful meal with us!</p>
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