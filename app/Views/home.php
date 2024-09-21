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
                <a class="navbar-brand" href="#">Delicious</a>
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
        <section id="menu">
            <h2 class="text-center my-4">Menu</h2>
            <div id="menuCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#menuCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#menuCarousel" data-slide-to="1"></li>
                    <li data-target="#menuCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/item1.jpg" class="d-block w-100" alt="Menu Item 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Margherita Pizza</h5>
                            <p>Our Margherita Pizza features a thin, crispy crust topped with fresh tomato sauce, creamy
                                mozzarella cheese, and fragrant basil leaves. Finished with a drizzle of extra virgin
                                olive oil.</p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/item2.jpg" class="d-block w-100" alt="Menu Item 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Classic Cheeseburger</h5>
                            <p>Our Classic Cheeseburger features a juicy, grilled beef patty topped with melted cheddar
                                cheese, crisp lettuce, ripe tomatoes, tangy pickles, and our signature burger sauce, all
                                sandwiched between a toasted sesame seed bun.</p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/item3.jpg" class="d-block w-100" alt="Menu Item 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Creamy Alfredo Pasta</h5>
                            <p>Indulge in our Creamy Alfredo Pasta, a rich and comforting dish made with tender
                                fettuccine noodles smothered in a velvety Alfredo sauce, garnished with a sprinkle of
                                fresh parsley.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#menuCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#menuCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <main class="container my-5">
            <section id="menu">
                <h2 class="text-center my-4">Our Menu</h2>
                <div class="row">
                    <?php foreach ($menus as $menu): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">

                                    <img src="<?= base_url('assets/images/' . $menu['image']) ?>" class="card-img-top"
                                        alt="<?= $menu['name'] ?>">
                            
                                <div class="card-body">
                                        <h5 class="card-title"><?= $menu['name'] ?></h5>
                                    <p class="card-text"><?= $menu['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
        <main class="container my-5">
            <section id="about">
                <h2 class="text-center my-4">About Us</h2>
                <p class="text-center">At Delicious Food, we are passionate about delivering the finest culinary
                    experiences. Our chefs use the freshest ingredients to create mouth-watering dishes that will
                    satisfy
                    your cravings. Whether you're in the mood for a classic burger, a gourmet pizza, or a delectable
                    pasta
                    dish, we have something for everyone.</p>
                <p class="text-center">Founded in 2024, Delicious Food has quickly become a favorite among food
                    enthusiasts.
                    We believe in quality, taste, and exceptional service. Come and enjoy a delightful meal with us!</p>
            </section>
        </main>
    </main>
    <main class="container my-5">
        <section id="contact" class="my-5">
            <h2 class="text-center my-4">Contact Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="3"
                                placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h5>Our Address</h5>
                    <p>123 Food Street, Flavor Town, USA</p>
                    <h5>Email Us</h5>
                    <p>contact@deliciousfood.com</p>
                    <h5>Call Us</h5>
                    <p>+1 (234) 567-8901</p>
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