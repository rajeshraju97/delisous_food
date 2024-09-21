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
                        <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        <?php if (!isset($username) || empty($username)) { ?>
                            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                        <?php } else { ?>
                            <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                        <?php } ?>

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="" data-toggle="modal" data-target="#cartModal">
                                Cart (<span id="cartCount">0</span>)
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
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

                                <p class="card-text"><strong>Price:</strong> ₹<?= $menu['price'] ?></p>
                                <button class="btn btn-success"
                                    onclick="addToCart('<?= esc($menu['name']) ?>', <?= $menu['price'] ?>)">Add to
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul id="cartItems" class="list-group">
                            <!-- Cart items will be injected here -->
                        </ul>
                        <div class="mt-3">
                            <h5>Total: ₹<span id="cartTotal">0.00</span></h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="checkoutButton">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-success text-white text-center py-3">
        <p>&copy; 2024 Delicious Food. All rights reserved.</p>
    </footer>

    <!-- #region -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        let cart = [];

        function addToCart(item, price) {
            // Check if item already exists in cart
            const existingItemIndex = cart.findIndex(cartItem => cartItem.name === item);

            if (existingItemIndex > -1) {
                // Item exists, increment quantity
                cart[existingItemIndex].quantity += 1;
                cart[existingItemIndex].price = price; // Update price if needed
            } else {
                // Item does not exist, add new item
                cart.push({ name: item, price: price, quantity: 1 });
            }

            document.getElementById('cartCount').innerText = cart.length;
            updateCartModal();
        }

        function updateCartModal() {
            const cartItems = document.getElementById('cartItems');
            cartItems.innerHTML = '';
            let total = 0;
            cart.forEach((item, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.innerText = `${item.name} - ₹${item.price.toFixed(2)} x ${item.quantity}`;
                total += item.price * item.quantity;
                const button = document.createElement('button');
                button.className = 'btn btn-danger btn-sm';
                button.innerText = 'Remove';
                button.onclick = () => {
                    cart.splice(index, 1);
                    document.getElementById('cartCount').innerText = cart.length;
                    updateCartModal();
                };
                li.appendChild(button);
                cartItems.appendChild(li);
            });
            document.getElementById('cartTotal').innerText = total.toFixed(2);
        }


        document.getElementById('checkoutButton').addEventListener('click', () => {
            // Send cart data to server
            $.ajax({
                url: '/cart', // Adjust the URL to your server endpoint
                method: 'POST',
                data: JSON.stringify(cart),
                contentType: 'application/json',
                success: function (response) {
                    // Handle success response
                    alert('Order placed successfully!');
                    cart = []; // Clear the cart
                    document.getElementById('cartCount').innerText = cart.length;
                    updateCartModal();
                    $('#cartModal').modal('hide'); // Hide the modal
                    window.location.href = '/cart/checkout'; // Redirect to checkout page
                },
                error: function (error) {
                    // Handle error response
                    alert('Error placing order. Please try again.');
                }
            });
        });
    </script>
</body>

</html>