<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Initial Order Form</title>
    <link rel="stylesheet" href="assest/CSS/style.css">

</head>

<body>
    <div class="form-container">
        <form id="orderForm" method="POST">
            <i class="fas fa-shopping-cart"></i>
            <h1>Initial Order Form</h1>
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone"><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city"><br><br>

            <label for="state">State:</label>
            <input type="text" id="state" name="state"><br><br>

            <label for="zip_code">Zip Code:</label>
            <input type="text" id="zip_code" name="zip_code"><br><br>

            <button type="submit">Submit Order</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assest/JS/script.js"></script>
</body>

</html>