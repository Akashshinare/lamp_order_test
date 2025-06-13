// For initial order form submission
$(document).ready(function () {
    $('#orderForm').on('submit', function (event) {
        event.preventDefault();

        let fullName = $('#full_name').val().trim();
        let email = $('#email').val().trim();
        let phone = $('#phone').val().trim();
        let address = $('#address').val().trim();
        let city = $('#city').val().trim();
        let state = $('#state').val().trim();
        let zip = $('#zip_code').val().trim();

        if (!fullName || !email || !address) {
            alert('Please fill in all required fields.');
            return;
        }

        $.ajax({
            url: 'ajax/save_order.php',
            type: 'POST',
            dataType: 'json',
            data: {
                full_name: fullName,
                email: email,
                phone: phone,
                address: address,
                city: city,
                state: state,
                zip_code: zip
            },
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = 'upsell1.php';
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr) {
                alert('Request failed. Check console.');
                console.log(xhr.responseText);
            }
        });
    });

    // For Upsell 1
    $('#addToUpsell1Btn').click(function () {
        $.ajax({
            url: 'ajax/add_upsell1.php',
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = 'upsell2.php';
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Something went wrong!');
            }
        });
    });

    // For Upsell 2
    $('#addToUpsell2Btn').click(function () {
        $.ajax({
            url: 'ajax/add_upsell2.php',
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = 'thankyou.php';
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Something went wrong!');
            }
        });
    });
});
