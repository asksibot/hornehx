<?php
// Enable error reporting (for debugging purposes only; disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Include the database configuration file
require 'config.php'; // Ensure 'config.php' is in the same directory

// Fetch user information if needed
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$name = $_SESSION['name'];

// Optionally, fetch completed questionnaires
$stmt = $conn->prepare("SELECT id, status, updated_at FROM questionnaires WHERE user_id = ?");
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($q_id, $status, $updated_at);

    $has_questionnaire = $stmt->num_rows > 0;
    $questionnaire_status = '';
    $questionnaire_updated = '';
    if ($stmt->fetch()) {
        $questionnaire_status = $status;
        $questionnaire_updated = $updated_at;
    }
    $stmt->close();
} else {
    // Handle SQL preparation error
    $has_questionnaire = false;
    $questionnaire_status = '';
    $questionnaire_updated = '';
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Horne Family Heritage</title>
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        /* Additional styles for the dashboard */
        .dashboard {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        .dashboard h2 {
            margin-bottom: 20px;
        }

        .dashboard a.btn {
            display: inline-block;
            margin: 10px;
            padding: 12px 25px;
            background-color: #2980B9;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard a.btn:hover {
            background-color: #1F618D;
        }

        .dashboard p.status {
            margin-top: 20px;
            font-size: 1em;
            color: #2c3e50;
        }

        .dashboard p.status.submitted {
            color: #27AE60;
        }

        .dashboard p.status.draft {
            color: #E67E22;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/hhelmet2.png" alt="Viking Helmet Icon" class="icon">
            <h1>Horne Family Heritage</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#timeline">Timeline</a></li>
                <li><a href="#photos">Photo Gallery</a></li>
                <li><a href="#stories">Family Stories</a></li>
                <li><a href="#family-members">Family Members</a></li>
                <li><a href="#contribute">Contribute</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <!-- Hamburger menu for mobile -->
            <div class="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <main>
        <div class="dashboard">
            <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
            <p>Manage your family heritage by filling out the questionnaire below.</p>
            <a href="questionnaires/christopher.php" class="btn">Fill Out Questionnaire</a>

            <?php if ($has_questionnaire): ?>
                <p class="status <?php echo htmlspecialchars($questionnaire_status); ?>">
                    <?php 
                        echo ucfirst($questionnaire_status) . " on " . date("F j, Y, g:i a", strtotime($questionnaire_updated));
                    ?>
                </p>
            <?php else: ?>
                <p class="status draft">No questionnaire found. Please fill out the questionnaire.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Horne Family Heritage | All rights reserved</p>
    </footer>
</body>
</html>
