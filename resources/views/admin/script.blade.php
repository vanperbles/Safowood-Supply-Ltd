 <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.cookie.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/assets/js/misc.js')}}"></script>
    <script src="{{asset('admin/assets/js/settings.js')}}"></script>
    <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquary.min.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->



    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script> $(document).ready(function() {
                $('.mySelect2').select2();
            });
</script>

    <script>
    $(document).ready(function () {
        // Automatically close the alert after 3 seconds
        setTimeout(function () {
            $(".alert").alert('close');
        }, 3000);

        // Close the alert when the close button is clicked
        $(".alert .close").on('click', function () {
            $(this).parent().alert('close');
        });
    });
</script>

<script>
$(document).ready(function() {
    function updateQuantity(quantityInput, newQuantity) {
        // Set the new quantity
        quantityInput.val(newQuantity);

        // Update the total price
        var price = parseFloat(quantityInput.data('price'));
        var totalPriceCell = quantityInput.closest('tr').find('.total-price');
        var total = price * newQuantity;

        // Format the total using number_format or any other formatting function
        var formattedTotal = number_format(total, 2);

        // Update the total price cell
        totalPriceCell.text(formattedTotal);
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        var re = /(-?\d+)(\d{3})/;
        while (re.test(s[0])) {
            s[0] = s[0].replace(re, '$1' + sep + '$2');
        }

        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }

        return s.join(dec);
    }
});

// Updating cart item when user update quantity at the cart page
$(document).ready(function() {
        $('.increase-quantity, .decrease-quantity').click(function() {
            let button = $(this);
            let row = button.closest('tr');
            let productId = button.data('id');
            let qtyInput = row.find('.qty');
            let unitPrice = parseFloat(row.find('.unit-price').text());
            let quantity = parseInt(qtyInput.val());
            let newQuantity;

            if (button.hasClass('increase-quantity')) {
                newQuantity = quantity + 1;
            } else if (button.hasClass('decrease-quantity') && quantity > 1) {
                newQuantity = quantity - 1;
            } else {
                return; // Prevent decreasing below 1
            }

            // Update the input field value
            qtyInput.val(newQuantity);

            // Update the total price for this row
            let totalPrice = (unitPrice * newQuantity).toFixed(2);
            row.find('.total-price').text(totalPrice);

            // Send the updated quantity to the server via AJAX
            $.ajax({
                url: '{{ route("update_cart") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    productId: productId,
                    quantity: newQuantity
                },
                success: function(response) {
                    console.log('Success:', response);
                    $('#total-price').text('Total Price: $' + response.totalPrice);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText);
                }
            });
        });
    });

// calculating for total price 
$(document).ready(function() {
        // Function to update total price
        function updateTotalPrice() {
            var totalPrice = 0;
            $('.qty').each(function() {
                var quantity = parseInt($(this).val());
                var price = parseFloat($(this).closest('tr').find('.unit-price').text());
                var totalItemPrice = quantity * price;
                $(this).closest('tr').find('.total-price').text(totalItemPrice.toFixed(2));
                totalPrice += totalItemPrice;
            });
            $('#total-price').text('Total Price: GHC' + totalPrice.toFixed(2));
        }

        // Initial call to update total price
        updateTotalPrice();

        // Event listener for quantity changes
        $('.qty').on('change', function() {
            updateTotalPrice();
        });
    });

    // Customer detail
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.customer-detail');
        rows.forEach(row => {
            row.addEventListener('click', function () {
                window.location.href = this.dataset.href;
            });
        });
    });

</script>