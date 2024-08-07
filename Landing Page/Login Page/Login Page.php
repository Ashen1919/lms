<?php 
include_once 'dbc.php';

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];

// Prevent SQL injection
$username = $conn->real_escape_string($username);
$email = $conn->real_escape_string($email);


// SQL query to insert data
$sql = "INSERT INTO users (username, email) VALUES ('' ,'$username', '$email')";
mysqli_query($conn, $sql);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--Title-->
  <title>Saegis Library</title>

<!--Favicons-->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  
<!--CSS file link-->
  <link rel="stylesheet" href="style.css">
</head>

<body>
<!--Login Page / Start-->
<img class="library_img" src="img/library.jpg" alt="Library Image">
<div class="center-container">
  <div id="logo_back"></div>
  <img id="lp_logo" src="img\saegis logo.png" alt="Saegis Logo">
</div> 
  <div class="wrapper">
    <form action="Verification Page.php" method="post" class="login-form" onsubmit="return validateForm()">
      <h2>LOGIN </h2>
        <div class="input-field">
        <input type="text" id="username" name="username" required>
        <label>Enter Your Student ID / Lecture ID</label>
      </div>
      <div class="input-field">
        <input type="text" name="email" id="email"  required>
        <label>Enter Your Saegis Email</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember Me</p>
        </label>
      </div>
      
      <button type="submit" id="loginButton" >Login</button>
    </form>
    
  </div>
<!--Login Page / End-->

<script>
  function validateForm() {
      const username = document.getElementById('username').value;
      const password = document.getElementById('email').value;
      if (username === '' || password === '') {
          alert('Please fill in all fields');
          return false;
      }
      // If you want to navigate to another page, you can add a line like:
      window.location.href =loginButton;
      return true;
  }

  // Optional: Disable the login button if fields are empty
  const loginButton = document.getElementById('loginButton');
  const inputs = document.querySelectorAll('.login-form input');
  inputs.forEach(input => {
      input.addEventListener('input', () => {
          loginButton.disabled = Array.from(inputs).some(input => input.value === '');
      });
  });
</script>

</body>
</html>