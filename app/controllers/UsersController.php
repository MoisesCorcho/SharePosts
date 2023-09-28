<?php

class UsersController extends Controller {

    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data.
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Init Data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif( $this->userModel->verifyEmailExists($data['email']) ) {
                $data['email_err'] = 'Email already exists';
            }

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Password
            if (empty($_POST['password'])) {
                $data['password_err'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] !== $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure error variables are empty.
            if ( 
                empty($data['name_err']) && 
                empty($data['email_err']) && 
                empty($data['password_err']) && 
                empty($data['confirm_password_err']) 
            ) {
                
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->registerUser($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('/UsersController/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            // init Data 
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data.
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($_POST['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if (empty($_POST['password'])) {
                $data['password_err'] = 'Please enter password';
            } 

            if ( $this->userModel->verifyEmailExists($_POST['email']) ) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'User do not have an account';
            }

            // Make sure error variables are empty.
            if ( empty($data['email_err']) && empty($data['password_err']) ) {
                
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Incorrect Password';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            // init Data 
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->name;
        redirect('/PostsController/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();

        redirect('/UsersController/login');
    }

}