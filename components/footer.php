
  
    <!-- Bootstrap JS -->
    <script src="http://localhost/mata_tech/cdn/bootstrap.bundle.min.js"></script>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="http://localhost/mata_tech/cdn/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/mata_tech/cdn/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <?php include('other_script.php'); ?>
    

    <script>
        function redirectToCartWithSession() {
        sessionStorage.setItem('itemMessage', 'Added item to the shopping bag'); // Store the message
        window.location.href = "cart.php"; // Redirect to cart.php
    }

</script>
</body>
</html>
