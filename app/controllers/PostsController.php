<?php

class PostsController extends Controller {

    private $postModel;
    private $userModel;

    public function __construct()
    {
        // If you do not logged in you will not be able to access to this controller
        if ( !isLoggedIn() ) {
            redirect('/UsersController/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        // Get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
    
            // Validate data
            if ( empty($data['title']) ) {
                $data['title_err'] = 'Please enter title.';
            }

            if ( empty($data['body']) ) {
                $data['body_err'] = 'Please enter body';
            }

            // Make sure there are no errors.
            if ( empty($data['title_err']) && empty($data['body_err']) ) {
                if ( $this->postModel->insert($data) ) {
                    flash('post_created', 'Post was created successfully.');
                    redirect('/PostController/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/add', $data);
            }


        } else {
            $data = [
                'title' => '',
                'body' => '',
                'title_err' => '',
                'body_err' => ''
            ];
    
            $this->view('posts/add', $data);
        }

    }

    public function show($id)
    {
        $post = $this->postModel->getPost($id);
        $user = $this->userModel->getUser($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'post_id' => $id,
                'title_err' => '',
                'body_err' => ''
            ];
    
            // Validate data
            if ( empty($data['title']) ) {
                $data['title_err'] = 'Please enter title.';
            }

            if ( empty($data['body']) ) {
                $data['body_err'] = 'Please enter body';
            }

            // Make sure there are no errors.
            if ( empty($data['title_err']) && empty($data['body_err']) ) {
                if ( $this->postModel->update($data) ) {
                    flash('edit_completed', 'Post was updated successfully.');
                    redirect('/PostController/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/edit', $data);
            }


        } else {
            $post = $this->postModel->getPost($id);

            // Check for owner
            if ( $post->user_id != $_SESSION['user_id']) {
                redirect('/PostsController');
            }

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];
    
            $this->view('posts/edit', $data);
        }

    }

    public function delete($id)
    {
        $this->postModel->delete($id);
        flash('post_deleted', 'Post was deleted successfully.');
        redirect('/PostsController/index');
    }


}