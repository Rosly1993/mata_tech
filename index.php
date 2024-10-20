<!-- Separate header -->
<?php include('./components/header.php'); ?>
<body>
<!-- Navbar at the Top -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid"> <!-- Changed to container-fluid -->
        <!-- left-aligned Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#"><b>WOMEN</b></a></li>
                <li class="nav-item"><a class="nav-link" href="#">PLUS</a></li>
                <li class="nav-item"><a class="nav-link" href="#">MEN</a></li>
                <li class="nav-item"><a class="nav-link" href="#">ACCESSORIES</a></li>
            </ul>
        </div>

        <!-- Center the Brand -->
        <div class="d-flex justify-content-center w-100">
            <a class="navbar-brand position-absolute start-50 translate-middle" href="#">THREADED</a>
        </div>

        <!-- Navbar Toggler for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- right-aligned Font Awesome Icons -->
        <div class="d-flex align-items-center">
            <ul class="navbar-nav ms-auto">
              <li class="nav-link" href="#"><i class="fas fa-user"></i></li>
              <li class="nav-link position-relative" href="#" onclick="redirectToCartWithSession()">
            <i class="fa fa-shopping-bag"></i>
            <span id="item-count" class="badge badge-danger position-absolute">0</span>
            </li>
              <li class="nav-link" href="#"><i class="fas fa-heart"></i></li>
              <li class="nav-link" href="#"><i class="fas fa-headphones"></i></li>
              <li class="nav-link" href="#"><i class="fas fa-search"></i></li>

              <!-- Currency Dropdown with Circular Wrapper -->
              <li class="nav-item dropdown">
                <div class="currency-circle d-flex align-items-center justify-content-center dropdown-toggle" id="currencyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="./images/us.jpg" alt="US flag" class="me-1" height="18">
                  USD$
                </div>
                <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
                  <li><a class="dropdown-item" href="#">USD$</a></li>
                  <!-- Add more currencies as needed -->
                </ul>
              </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Benefits Section -->
<section class="benefit-section"></section>

<!-- Hero Section -->
<section class="hero-section"></section>

<!-- Site wide deals Section -->
<section class="sitewide-section"></section>

<!-- Site VIP Section -->
<section class="vip-section"></section>

<!-- Site Trending Section -->
<section class="trending-section"></section>

<!-- Site New In Section -->
<section class="new-section"></section><br>
<section>
    <center>
        <div class="recently">RECENTLY BOUGHT</div>
       
   
</div>
    </center>
    <div class="toast" id="toast">Item has been successfully added.</div>
    <div class="product-container">
        <?php
        include './db_connection/conn.php';

        $stmt = $pdo->query("SELECT * FROM tbl_shopping WHERE is_active='1'");
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($items as $item): ?>
            <div class="product-card" id="product-<?= $item['id'] ?>">
                <div class="product-image">
                    <?php if (!empty($item['product_name'])): ?>
                        <img src="./images/<?= htmlspecialchars($item['product_name']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" width="250" height="400">
                    <?php else: ?>
                        <p>No Image</p>
                    <?php endif; ?>
                </div>
                <div class="product-details">
                    <h6><?= htmlspecialchars($item['description']) ?></h6>
                    <p>
                        <?php if (!empty($item['before_price']) && $item['price'] > 0): ?>
                            <span style="color: red;">$<?= number_format($item['price'], 2) ?></span>
                        <?php else: ?>
                            <span>$<?= number_format($item['price'], 2) ?></span>
                        <?php endif; ?>

                        <?php if (!empty($item['before_price'])): ?>
                            &nbsp; <span style="color: red; text-decoration: line-through;">$<?= number_format($item['before_price'], 2) ?></span>
                        <?php endif; ?>
                    </p>
                    <button class="add-button" data-id="<?= $item['id'] ?>">Add Item</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>

<!-- Site insta Section -->
<section class="insta-section"></section>

<!-- Site news Section -->
<section class="news-section"></section>


<!-- Site footer Section -->
<section class="footer-section"></section>


   
  

<!-- Separate footer -->
<?php include('./components/footer.php'); ?>