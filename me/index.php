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
            <h1>Universe One | Home</h1>
          </div>
          <div id="nav-links" class="links">
            <a id="sign-out" href="#signout">Log Out</a>
          </div>
          <div class="burger">
            <i id="toggle-nav-links" class="fas fa-bars"></i>
          </div>
        </div>
      </div>
    </nav>

    <div id="account">
      <div class="container">
        <div class="wrapper">
          <div class="id-card">
            <div class="left">
              <img src="../images/me/astronaut.jpg" alt="astronaut" />
            </div>
            <div class="right">
              <h1>Mark Kenneth Calendario</h1>
              <div class="field">
                <p class="field-name">Email</p>
                <p>markcalendario@gmail.com</p>
              </div>
              <div class="field">
                <p class="field-name">Contact</p>
                <p>+639283580984</p>
              </div>
              <div class="field">
                <p class="field-name">Birthday</p>
                <p>October 19, 2002</p>
              </div>
              <div class="field">
                <p class="field-name">Gender</p>
                <p>Male</p>
              </div>
              <div class="field">
                <p class="field-name">Country</p>
                <p>Philippines</p>
              </div>
              <div class="field">
                <p class="field-name">Biography</p>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum debitis nisi ratione enim. Earum similique quos optio
                  reprehenderit quidem nobis.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script src="../js/navbar.js"></script>
<script src="./index.js"></script>
