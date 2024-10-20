<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Bag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Added jQuery -->
</head>
<body>

<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col">
          <h4>SHOPPING BAG </h4>
        </div>
        <div class="col text-end">
            <h6>Need help? +1-562-926-5672</h6>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col">
            <h6><a style="text-decoration: underline;">Sign in</a> to sync your bag across your devices.</h6> 
        </div>
        <div class="col text-end">
            <h6><i class="fa fa-message"></i>&nbsp;<a>let's chat</a></h6>
        </div>
    </div>
<!-- Toast Container -->
<div class="toast" id="toast">Item has been successfully removed!</div>

    <!-- Table for Shopping Bag Items -->
    <div class="mt-4">
        <div class="row">
            <div class="col-md-8">
            <table id="shopping-bag-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './db_connection/conn.php';

                        // Fetching active items with quantity greater than 1
                        $stmt = $pdo->query("SELECT * FROM tbl_shopping WHERE is_active='1' and quantity > 0");
                        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        // Loop through items and display them in the table
                        foreach ($items as $item): ?>
                            <tr id="item-<?= $item['id'] ?>"> <!-- Unique ID for each row -->
                                <td>
                                    <div class="d-flex align-items-start">
                                        <img src="./images/<?= htmlspecialchars($item['product_name']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" width="150" height="180" class="me-3">
                                        <div>
                                            <strong><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;<?= htmlspecialchars($item['remarks']) ?></strong><br><br>
                                            <strong><?= htmlspecialchars($item['description']) ?></strong>
                                            <p><strong>Size:</strong> <?= htmlspecialchars($item['size']) ?>&nbsp;<strong>Color:</strong> <?= htmlspecialchars($item['color']) ?>&nbsp;<strong>Quantity:</strong> <?= htmlspecialchars($item['quantity']) ?></p>
                                            <p><strong>Style Number:</strong> <?= htmlspecialchars($item['style']) ?></p>
                                            <div>
                                                <button class="btn btn-secondary btn-sm" onclick="saveForLater(<?= $item['id'] ?>)">Save for Later</button>
                                                <button class="btn btn-warning btn-sm" onclick="moveToFavorites(<?= $item['id'] ?>)">Move to Favorites</button>
                                                <button class="btn btn-danger btn-sm" onclick="removeItem(<?= $item['id'] ?>)">Remove</button>
                                                <button class="btn btn-primary btn-sm" onclick="editItem(<?= $item['id'] ?>)">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>$<?= number_format($item['price'], 2) ?></span>  
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Summary</h5>
                    </div>
                    <div class="card-body">
    <div class="d-flex justify-content-between">
        <p class="mb-0"><strong>Subtotal:</strong> <span class="order-summary-subtotal"><?= count($items) ?></span></p>
        <p class="mb-0"><span class="order-summary-total"><?= number_format(array_sum(array_column($items, 'price')), 2) ?>&nbsp;$</span></p>
    </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><strong>Free shipping!</strong> <a style="text-decoration:underline;">details</a></p>
                            <p class="mb-0">0&nbsp;$</p>
                        </div>
                        <br>
                        <!-- Divider -->
                        <hr>
                        <div class="d-flex justify-content-between">
        <p class="mb-0"><strong>Estimated Total</strong></p>
        <p class="mb-0"><span class="order-summary-total"><?= number_format(array_sum(array_column($items, 'price')), 2) ?>&nbsp;$</span></p>
    </div>
    <center><div style="color: #FF77B7">Vat Included!</div></center>
</div>
                    <div class="card-body">
                        <div>
                            <button class="btn btn-dark  w-100">CHECKOUT AS GUEST</button>
                        </div><br>
                        <div>
                            <button class="btn btn-dark  w-100">SIGN IN FOR FASTER CHECKOUT</button>
                        </div><br>
                        <div>
                            <button class="btn btn-outline-secondary w-100" style="background-color: transparent; border-color: black;">
                                <img src="./images/paypal.png" alt="PayPal" width="60" height="30"> &nbsp; <b>CHECKOUT</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div>
                    <p>Free Shipping on orders of US$ 100 or more<br>30 day price match guarantee</p>
                </div>
                <div>
                    <img src="./images/visa.png" alt="Visa" width="50" height="30" class="me-2">
                    <img src="./images/mastercard.png" alt="MasterCard" width="50" height="30" class="me-2">
                    <img src="./images/americanexpress.png" alt="American Express" width="50" height="30" class="me-2">
                    <img src="./images/paypal.png" alt="PayPal" width="60" height="30">
                </div>
            </div>
        </div>
    </div>

    <div id="added-item-message" class="alert alert-success" style="display:none;"></div> <!-- Alert message div -->

    <?php include('other_script_remove.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
