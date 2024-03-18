<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        .order-confirmation-body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .order-confirmation-container {
            text-align: center;
        }
        .order-confirmation-icon {
            fill: #4CAF50;
            width: 100px;
            height: 100px;
            filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.3));
        }
        .order-confirmation-message {
            margin-top: 20px;
            font-size: 24px;
            color: #4CAF50;
        }
        .order-confirmation-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 30px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .order-confirmation-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body class="order-confirmation-body">
    <div class="order-confirmation-container">
        <svg class="order-confirmation-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" fill="#ffffff" stroke="#4CAF50" stroke-width="2"/>
            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" fill="#4CAF50"/>
        </svg>
        <div class="order-confirmation-message">Your order has been successfully placed!</div>
        <a href="home.html" class="order-confirmation-button">Back to Home</a>
    </div>
</body>
</html>
