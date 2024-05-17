<?php

session_start();

if (isset($_POST["auth"])) {
  header("Location: ../me");
}

if (isset($_SESSION["registered"])) {
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
    <title>Universe One | Login</title>
  </head>
  <body>
    <nav id="nav">
      <div class="container">
        <div class="wrapper">
          <div class="logo">
            <h1>Universe One</h1>
          </div>
          <div id="nav-links" class="links">
            <a href="../#mission">Mission</a>
            <a href="../#exploration">Exploration</a>
            <a href="../#about">About</a>
            <a href="../login">Login</a>
            <a href="../register">Register</a>
          </div>
          <div class="burger">
            <i id="toggle-nav-links" class="fas fa-bars"></i>
          </div>
        </div>
      </div>
    </nav>

    <div id="auth">
      <div class="container">
        <div class="wrapper">
          <div class="auth-box">
            <div class="left">
              <img src="../images/exploration/mysteries.png" alt="universe" />
            </div>
            <form id="register-form" class="right" onsubmit="return false;">
              <h1>Universe One Register</h1>
              <div class="input">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" />
              </div>
              <div class="input">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" />
              </div>
              <div class="input">
                <label for="confirm-password">Confirm Password</label>
                <input 
                  id="confirm-password" 
                  name="confirm-password" 
                  type="password" />
              </div>
              <div class="input">
                <label for="first-name">First Name</label>
                <input id="first-name" name="first-name" type="text" />
              </div>
              <div class="input">
                <label for="last-name">Last Name</label>
                <input id="last-name" name="last-name" type="text" />
              </div>
              <div class="input">
                <label for="birthday">Birthday</label>
                <input id="birthday" name="birthday" type="date" />
              </div>
              <div class="input">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" type="text">
                  <option value="">Select your gender.</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                  <option value="3">Others</option>
                </select>
              </div>
              <div class="input">
                <label for="contact">Contact</label>
                <input id="contact" name="contact" type="text" />
              </div>
              <div class="input">
                <label for="country-of-residency">Country of Residency</label>
                <select id="country-of-residency" name="country" type="text">
                  <option value="">Select a country.</option>
                </select>
              </div>
              <div class="input">
                <label for="bio">Short Bio</label>
                <textarea id="bio" name="short-bio"></textarea>
              </div>
              <div id="response-container"></div>
              <button id="register-btn" class="button">Register</button>
              <hr />
              <a href="../login" class="button">Login</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="../js/navbar.js"></script>
<script src="../js/countries.js"></script>
<script src="./index.js"></script>
