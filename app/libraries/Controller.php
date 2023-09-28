<?php

// This will be our main controller, all other controllers we make will extend this controller to have access
// to all the methods that will interact with the model and the core (or so I think)

/**
 * Base controller
 * Load the models and views
 */

 class Controller {

    //Load model
    public function model($model)
    {
        //Require model file
        require_once '../app/models/'.$model.'.php';

        //instantiate model
        return new $model();
    }

    //Load view
    public function view($view, $data = [])
    {
        //Check for the view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
 }