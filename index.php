<?php

require_once('conn.php');

if ($_SESSION['login'] == true) {
   echo "<script>alert('Masih ada session. Otomatis pindah ke dashboard'); window.location.href = 'dashboard';</script>";
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
   <ul class="background">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
   </ul>
   <div class="card">
      <h2>Login Page</h2>
      <div class="space"></div>
      <form action="proses_login.php" method="post">
         <label for="username">Username</label>
         <input type="text" value="" required autocomplete="off" name="username" id="username" placeholder="Username nya apa?">
         <div class="space"></div>
         <label for="password">Password</label>
         <input type="password" name="password" value="" required autocomplete="off" id="password" placeholder="Password antum...">

         <button type="submit" name="send">Login</button>
      </form>
   </div>
</body>

</html>