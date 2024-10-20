<script>
$(document).ready(function() {
    let totalQuantity = 0; // Initialize a total quantity variable

    $('.add-button').on('click', function(e) {
        e.preventDefault(); // Prevent the default link behavior

        var id = $(this).data('id'); // Get the product ID

        $.ajax({
            url: 'add_item.php', // PHP script to handle the request
            type: 'POST',
            data: { id: id },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    // Update the quantity displayed on the page
                    $('#quantity-' + id).text(data.quantity);

                    // Fetch and update the shopping bag count
                    updateShoppingBagCount();

                    // Update the total quantity
                    updateShoppingBagDisplay(data.quantity); // Pass the quantity added

                    // Show toast notification
                    $('#toast').addClass('show');
                    setTimeout(function() {
                        $('#toast').removeClass('show');
                    }, 3000); // Show for 3 seconds
                } else {
                    // Show error toast
                    $('#toast').text('Failed to add item.').css('background-color', '#f44336').addClass('show');
                    setTimeout(function() {
                        $('#toast').removeClass('show');
                    }, 3000); // Show for 3 seconds
                }
            },
            error: function() {
                $('#toast').text('An error occurred. Please try again.').css('background-color', '#f44336').addClass('show');
                setTimeout(function() {
                    $('#toast').removeClass('show');
                }, 3000); // Show for 3 seconds
            }
        });
    });

    function updateShoppingBagCount() {
        $.ajax({
            url: 'get_item_count.php', // PHP script to get the item count
            type: 'GET',
            success: function(response) {
                var data = JSON.parse(response);
                // Update the shopping bag icon with the count
                if ($('.item-count').length) {
                    $('.item-count').text(data.count).show(); // Update existing count and show it
                } else {
                    $('.fa-shopping-bag').append('<span class="item-count">' + data.count + '</span>');
                }
            },
            error: function() {
                console.error('Failed to fetch item count.');
            }
        });
    }

    // Call updateShoppingBagCount on page load to show initial count
    updateShoppingBagCount();

    function updateShoppingBagDisplay(count) {
        // Update total count
        totalQuantity += count; // Add the new quantity to the total

        // Display the total quantity in the item count element
        $('#item-count').text(totalQuantity); // Update the total display
    }
});
</script>
