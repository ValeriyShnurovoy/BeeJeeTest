<?php

namespace App\Controllers;

/**
 * Home controller
 */
class IndexController extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $this->generate('/social/index');
    }
}