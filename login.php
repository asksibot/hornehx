<?php
// Enable error reporting (for debugging purposes only; disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

// Include the database configuration file
<?php
// Debugging: Display current directory and files
echo 'Current Directory: ' . __DIR__ . '<br>';
echo 'Files in Directory: ';
print_r(scandir(__DIR__));
echo '<br>';
?>

require 'config.php'; // Ensure 'config.php' is in the same directory

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize user input
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Please enter both username and password.";
        header('Location: index.php');
        exit();
    }

    // Prepare the SQL statement to prevent SQL injection
    if ($stmt = $conn->prepare("SELECT id, password_hash, name FROM users WHERE username = ?")) {
        $stmt->bind_param("s", $username);

        // Execute the prepared statement
        $stmt->execute();
        $stmt->store_result();

        // Check if user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password_hash, $name);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $password_hash)) {
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);

                // Set session variables
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;

                // Redirect to dashboard
                header('Location: dashboard.php');
                exit();
            } else {
                // Invalid password
                $_SESSION['error'] = "Invalid username or password.";
                header('Location: index.php');
                exit();
            }
        } else {
            // User does not exist
            $_SESSION['error'] = "Invalid username or password.";
            header('Location: index.php');
            exit();
        }

        $stmt->close();
    } else {
        // SQL statement preparation failed
        $_SESSION['error'] = "An error occurred. Please try again.";
        header('Location: index.php');
        exit();
    }

    $conn->close();
} else {
    // If not a POST request, redirect to login page
    header('Location: index.php');
    exit();
}
?>
