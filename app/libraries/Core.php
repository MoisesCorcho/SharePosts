<?php

/**
 * App Core Class
 * Creates URL & Loads core controller
 * URL Format - /controller/method/param
 */

class Core {
    protected $currentController = 'PagesController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
   
        $url = $this->getUrl();
        
        /**
        * look in controllers for first value in the array that we get in getUrl() function.
        * we use ucwords() to uppercase the first character of each word in a string, we use it because 
        * the controllers' name should start with a capital letter.
        */
        if ( isset($url) ) {
            if ( file_exists('../app/controllers/'. ucwords($url[0]) .'.php')) {
    
                //If exists, set as the current controller
                $this->currentController = ucwords($url[0]);
    
                //unset the index 0
                unset($url[0]);
            }
        }

        //Require the controller
        require_once '../app/controllers/'.$this->currentController.'.php';

        //Instatiate controller class
        $this->currentController = new $this->currentController;

        //check for second part of url
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];

                //unset index 1
                unset($url[1]);
            }
        }

        //Get params
        $this->params = $url ? array_values($url) : [];

        /**
         * Call a callback with array of params
         * This function takes the controller and the method inside it, and then, called it. 
         * example => $this->currentController->$this->currentMethod( $this->params[0] )
         */
        // 
        //
        call_user_func_array( [$this->currentController, $this->currentMethod], $this->params );
    }

    //Return an array with the URL params
    public function getUrl()
    {
        if ( isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }

}