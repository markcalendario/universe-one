<?php

include_once "../includes/connections.php";
include_once "../includes/utils.php";

class User {
  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $birthday;
  private $gender;
  private $contact;
  private $country;
  private $biography;

  public function __construct($id) {
    $db = connect(); // Assuming you have a function named 'connect' to establish a database connection

    $sql = "SELECT id, first_name, last_name, email, birthday, gender, contact, country, biography FROM users WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result(
      $this->id,
      $this->firstName,
      $this->lastName,
      $this->email,
      $this->birthday,
      $this->gender,
      $this->contact,
      $this->country,
      $this->biography
    );
    $stmt->fetch();
    $db->close();
  }

  // Getter methods
  public function getId() {
    return $this->id;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function getFullName() {
    return $this->firstName . " " . $this->lastName;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getBirthday() {
    $date = DateTime::createFromFormat('Y-m-d', $this->birthday);
    return $date->format('F j, Y');
  }

  public function getHTMLFormatBirthday() {
    return $this->birthday;
  }

  public function getGender() {
    return decodeGender($this->gender);
  }

  public function getEncodedGender() {
    return $this->gender;
  }

  public function getContact() {
    return $this->contact;
  }

  public function getCountry() {
    return $this->country;
  }

  public function getBiography() {
    return $this->biography;
  }

  public function updateInfo($firstName, $lastName, $birthday, $gender, $contact, $country, $biography) {
    $db = connect();
    $sql = "UPDATE users SET first_name = ?, last_name = ?, birthday = ?, gender = ?, contact = ?, country = ?, biography = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssisssi", $firstName, $lastName, $birthday, $gender, $contact, $country, $biography, $this->id);
    $stmt->execute();
    $db->close();

    if ($stmt->affected_rows > 0) {
      return true;
    }

    return false;
  }

  public function updatePassword($newPasswordPlainText) {
    $db = connect();
    $hashedPassword = hashPassword($newPasswordPlainText);
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("si", $hashedPassword, $this->id);
    $stmt->execute();
    $stmt->fetch();
    $db->close();

    return $stmt->affected_rows > 0;
  }
}

?>
