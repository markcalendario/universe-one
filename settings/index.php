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
    <title>Universe One | Home</title>
  </head>
  <body>
    <nav id="nav">
      <div class="container">
        <div class="wrapper">
          <div class="logo">
            <h1>Universe One | Settings</h1>
          </div>
          <div id="nav-links" class="links">
            <a href="../me">Home</a>
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
          <form id="edit-input-fields" class="box" onsubmit="return false;">
            <h1>Loading...</h1>
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
            <div id="form-response"></div>
            <button id='update-account' class="button">Loading...</button>
          </f>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="../js/navbar.js"></script>
<script src="../js/sign-out.js"></script>
<script src="./index.js"></script>
