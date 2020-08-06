<?php

namespace App\Controllers;

/**
 * Admin controller
 */
class AdminController extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $this->generate('/admin/index');
    }

    public function loginAction()
    {
        $this->generate('/admin/login');
    }
}