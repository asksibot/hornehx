<?php
session_start();

// If user is already logged in, redirect to dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horne Family Heritage - Login</title>
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        /* Additional styles specific to the login page */
        #login {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        #login .logo {
            margin-bottom: 20px;
        }

        #login h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        #login .error {
            color: red;
            margin-top: 10px;
        }

        /* Style the input fields */
        #login input[type="text"],
        #login input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style the submit button */
        #login button {
            background-color: #2980B9;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #login button:hover {
            background-color: #1F618D;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/hhelmet2.png" alt="Viking Helmet Icon" class="icon">
            <h1>Horne Family Heritage</h1>
        </div>
    </header>

    <main>
        <!-- Login Form -->
        <section id="login">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="text" id="username" name="username" placeholder="Username (Phone Number)" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<p class="error">'.$_SESSION['error'].'</p>';
                unset($_SESSION['error']);
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Horne Family Heritage | All rights reserved</p>
    </footer>
</body>
</html>
