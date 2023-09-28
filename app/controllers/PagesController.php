<?php

class PagesController extends Controller {

    protected $postModel;

    public function __construct()
    {
        
    }

    public function index()
    {
        if (isLoggedIn()) {
            redirect('/PostsController/index');
        }
        
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];
        $this->view('pages/about', $data);
    }

}