<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .form-group textarea {
            height: 150px;
        }

        .form-group button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .success-message {
            color: green;
            font-weight: bold;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Contact Us</h1>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Validate inputs
        if (empty($name) || empty($email) || empty($message)) {
            echo '<p class="error-message">Please fill in all fields.</p>';
        } else {
            $to = 'your-email@example.com';  // Replace with your email address
            $subject = 'New Contact Form Submission';
            $messageBody = "Name: $name\nEmail: $email\n\n$message";
            $headers = "From: $name <$email>";

            // Send email
            if (mail($to, $subject, $messageBody, $headers)) {
                echo '<p class="success-message">Your message has been sent. We will get back to you soon.</p>';
            } else {
                echo '<p class="error-message">Sorry, there was an error sending your message. Please try again later.</p>';
            }
        }
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</body>
</html>
