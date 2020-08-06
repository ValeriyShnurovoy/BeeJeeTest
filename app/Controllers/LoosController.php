<?php

namespace App\Controllers;

/**
 * 404 controller
 */
class LoosController extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $this->generate('/404');
    }
}