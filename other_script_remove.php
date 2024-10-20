<script>
    function removeItem(itemId) {
        $.ajax({
            url: 'remove_item.php',
            type: 'POST',
            data: { id: itemId },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    // Remove the row from the table
                    $(`#item-${itemId}`).remove(); // Assuming your row has an id like item-1, item-2, etc.

                 // Show toast notification
                 $('#toast').css({
                        'background-color': '#88C273', // Set background color
                        'color': 'white', // Set background color
                        'text-align': 'center', // Set background color
                        'padding-top': '10px', // Set background color
                        'width': '2000px', // Set width to 200px
                        'height': '50px' // Set width to 200px
                    }).addClass('show'); // Add the show class

                    setTimeout(function() {
                        $('#toast').removeClass('show'); // Remove the show class after 3 seconds
                    }, 3000); // Show for 3 seconds

                    // Update the order summary
                    updateOrderSummary();
                    updateShoppingBagCount(); // Update item count after removal
                } else {
                    alert('Failed to remove item: ' + result.error);
                }
            },
            error: function() {
                alert('Error while removing item.');
            }
        });
    }


    function updateOrderSummary() {
        const prices = [];
        $('#shopping-bag-table tbody tr').each(function () {
            const priceText = $(this).find('td:last-child span').text().replace('$', '');
            const price = parseFloat(priceText);
            if (!isNaN(price)) {
                prices.push(price);
            }
        });

        // Update subtotal and estimated total
        const subtotal = prices.length; // Count of items
        const estimatedTotal = prices.reduce((total, price) => total + price, 0).toFixed(2); // Total price

        // Update the subtotal and estimated total in the order summary
        $('.order-summary-subtotal').text(`${subtotal}`);
        $('.order-summary-total').text(`${estimatedTotal} $`);
    }

    function updateShoppingBagCount() {
        const itemCount = $('#shopping-bag-table tbody tr').length; // Get the number of remaining items
        $('h4:contains("SHOPPING BAG")').text(`SHOPPING BAG (${itemCount})`); // Update the shopping bag count in the header
    }
</script>