<?php

class Users extends Controller
{
  protected $userModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
      ];
      // Name validation
      if (empty($data['name'])) {
        $data['name_err'] = "Please enter your name!";
      }
      // Email validation
      if (empty($data['email'])) {
        $data['email_err'] = "Eneter your email!";
      } else {
        if($this->userModel->findUserByEmail($data['email'])){
          $data['email_err'] = 'Email taken!';
        }
      }
      // Password Validation
      if (empty($data['password'])) {
        $data['password_err'] = "Please enter password!";
      } elseif (strlen($data['password']) < 8) {
        $data['password_err'] = "Password must contain at least 8 characters!";
      }

      // Confirm password validation
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = "Cant leave this field empty!";
      } else {
        if ($data['confirm_password'] != $data['password']) {
          $data['confirm_password_err'] = "Password do not match!";
        }
      }

      if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        // REGISTER USER
        if($this->userModel->register($data)){

          flash('register_success', 'You are registered and can log in');    
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('users/register', $data);
      }
    } else {
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
      ];
      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      if(empty($_POST['email'])) {
        $data['email_err'] = "Field cant be empty!";
      }

      if(empty($_POST['password'])){
        $data['password_err'] = "You must provide password!";
      }

      if(empty($data['email_err']) && empty($data['password_err'])){
        die("SUCCESS");
      } else {
        $this->view("users/login", $data);
      }

    } else {
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      $this->view('users/login', $data);
    }
  }
}
