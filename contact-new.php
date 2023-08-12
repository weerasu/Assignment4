<?php

$name = $email = $message = $error = '';
$success_message = '';


function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (empty($_POST['name'])) {
        $error = 'Name is required';
    } else {
        $name = sanitize_input($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $error = 'Email is required';
    } elseif (!is_valid_email($_POST['email'])) {
        $error = 'Invalid email format';
    } else {
        $email = sanitize_input($_POST['email']);
    }

    if (empty($_POST['message'])) {
        $error = 'Message is required';
    } else {
        $message = sanitize_input($_POST['message']);
    }

    
    if (empty($error)) {
      
        $sql = "INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
           
            $success_message = 'Thank you for contacting us! We will get back to you shortly.';
        } else {
           
            $error = "Error: " . $conn->error;
        }


        $stmt->close();
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Usdsds</h2>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>"><br>

            <label for="message">Message:</label><br>
            <textarea name="message" id="message" rows="5" cols="40"><?php echo $message; ?></textarea><br>

            <input type="file" id="myfile" name="myfile">
            <input type="submit" value="Submit">
        </form>
    
</body>
</html>
