<?php

/**
 * Class registration
 * handles the user registration
 */
class Registration
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct()
    {
        if (isset($_POST["validate"])) {
          $this->validateFields();
        }
        elseif (isset($_POST["register"])) {
          $this->registerNewUser();
        }
        // if (isset($_POST["register"]) && $_POST["register"] == true) {
        //   $this->errors[] = $this->validateFields();
        //   if (!empty($this->errors)) {
        //     $this->registerNewUser();
        //     $this->messages[] = "Success";
        //   }
        // }
        // elseif (isset($_POST["register"]) && $_POST["register"] == false) {
        //   $this->errors[] = $this->validateFields();
        // }
    }

    private function validateFields() {
      if (empty($_POST['user_fullname'])) {
          $this->errors[] = "Empty Fullname";
      } elseif (empty($_POST['user_name'])) {
          $this->errors[] = "Empty Username";
      } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
          $this->errors[] = "Empty Password";
      } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
          $this->errors[] = "Password and password repeat are not the same";
      } elseif (strlen($_POST['user_password_new']) < 6) {
          $this->errors[] = "Password has a minimum length of 6 characters";
      } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 3) {
          $this->errors[] = "Username cannot be shorter than 3 or longer than 64 characters";
      } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
          $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 3 to 64 characters";
      } elseif (strlen($_POST['user_email']) > 64) {
          $this->errors[] = "Email cannot be longer than 64 characters";
      } elseif (strlen($_POST['user_phone']) > 20) {
          $this->errors[] = "Phone number cannot be longer than 20 characters";
      } elseif (!empty($_POST['user_email']) && !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
          $this->errors[] = "Your email address is not in a valid email format";
      } elseif (!empty($_POST['user_name'])
          && strlen($_POST['user_fullname']) <= 255
          && strlen($_POST['user_fullname']) >= 3
          && strlen($_POST['user_name']) <= 64
          && strlen($_POST['user_name']) >= 3
          && preg_match('/^[a-z\d]{3,64}$/i', $_POST['user_name'])
          && strlen($_POST['user_email']) <= 64
          && strlen($_POST['user_phone']) <= 20
          && (empty($_POST['user_email']) || filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL))
          && !empty($_POST['user_password_new'])
          && !empty($_POST['user_password_repeat'])
          && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
      ) {
        //$this->errors[] = array();
        $dummie = 0;
      }
      else {
        $this->errors[] = "Sorry, an unknown error occurred.";
      }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser()
    {
        $this->validateFields();
        if ( empty($this->errors) ) {
          // create a database connection
          $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

          // change character set to utf8 and check it
          if (!$this->db_connection->set_charset("utf8")) {
              $this->errors[] = $this->db_connection->error;
          }

          // if no connection errors (= working database connection)
          if (!$this->db_connection->connect_errno) {

              // escaping, additionally removing everything that could be (html/javascript-) code
              $user_fullname = $this->db_connection->real_escape_string(strip_tags($_POST['user_fullname'], ENT_QUOTES));
              $user_name = $this->db_connection->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
              $user_email = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));
              $user_phone = $this->db_connection->real_escape_string(strip_tags($_POST['user_phone'], ENT_QUOTES));

              $user_password = $_POST['user_password_new'];

              // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
              // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
              // PHP 5.3/5.4, by the password hashing compatibility library
              $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

              // check if user or email address already exists
              $sql = "SELECT * FROM users WHERE user_name = '" . $user_name . "';";
              $query_check_user_name = $this->db_connection->query($sql);

              if ($query_check_user_name->num_rows != 0) {
                  $this->errors[] = "Sorry, that username is already taken.";
              } else {
                  // write new user's data into database
                  $sql = "INSERT INTO users (user_fullname, user_name, user_password_hash, user_email, user_phone)
                          VALUES('" . $user_fullname . "', '" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "', '" . $user_phone . "');";
                  $query_new_user_insert = $this->db_connection->query($sql);

                  // if user has been added successfully
                  if ($query_new_user_insert) {
                      $this->messages[] = "Your account has been created successfully. You can now log in.";
                  } else {
                      $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
                  }
              }
          } else {
              $this->errors[] = "Sorry, no database connection.";
          }
        }
    }
}
