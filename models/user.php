<?php
  class User {
    private $id;
    private $username;
    private $birthdate;
    private $gender;
    private $pronouns;
    private $email;
    private $passwd;

    public function __get($attr) {
      return $this->$attr;
    }

    public function __set($attr, $value) {
      $this->$attr = $value;
      return $this;
    }
  }
?>