<?php

session_start();

if (!isset($_SESSION["auth"])) {
  header("Location: ../login");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../styles/components.css" />
    <link rel="stylesheet" href="../styles/resets.css" />
    <link rel="stylesheet" href="../styles/variables.css" />
    <link rel="stylesheet" href="../styles/icons/css/all.css" />
    <link rel="stylesheet" href="./index.css" />

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <title>Universe One | Password</title>
  </head>
  <body>
    <nav id="nav">
      <div class="container">
        <div class="wrapper">
          <div class="logo">
            <h1>Universe One | Password</h1>
          </div>
          <div id="nav-links" class="links">
            <a href="../me">Home</a>
            <a href="../settings">Settings</a>
            <a id="sign-out" href="#signout">Log Out</a>
          </div>
          <div class="burger">
            <i id="toggle-nav-links" class="fas fa-bars"></i>
          </div>
        </div>
      </div>
    </nav>

    <div id="edit">
      <div class="container">
        <div class="wrapper">
          <form id="edit-password-form" class="box" onsubmit="return false;">
            <h1>Password Settings</h1>
            <div class="input">
              <label for="current-password">Current Password</label>
              <input 
                id="current-password" 
                name="current-password" 
                type="password">
            </div>
            <div class="input">
              <label for="new-password">New Password</label>
              <input 
                id="new-password" 
                name="new-password" 
                type="password">
            </div>
            <div class="input">
              <label for="confirm-new-password">Confirm New Password</label>
              <input 
                id="confirm-new-password" 
                name="confirm-new-password" 
                type="password">
            </div>
            <div id="form-response"></div>
            <button id='update-password' class="button">Update Password</button>
          </f>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="../js/navbar.js"></script>
<script src="../js/sign-out.js"></script>
<script src="./index.js"></script>
