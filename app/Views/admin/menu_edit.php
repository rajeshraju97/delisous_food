<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/yeti/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the form container */
        .container {
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Menu Item</h2>
        <form action="<?= site_url('admin/menu/update/' . esc($menu['id'])); ?>" method="post"
            enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= esc($menu['name']); ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    required><?= esc($menu['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"
                    value="<?= esc($menu['price']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <?php if (!empty($menu['image'])): ?>
                    <img src="<?= base_url('assets/images/' . esc($menu['image'])); ?>" alt="<?= esc($menu['name']); ?>"
                        width="100">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('/admin/menu'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>