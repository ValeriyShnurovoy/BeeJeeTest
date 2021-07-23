<?php

namespace App\Controllers;

use App\Model\Issue;

/**
 * Home controller
 */
class RegistrationController extends Controller
{
    protected $rowsPerPage = 3;
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
//        $data = [
//            'rows' => $this->rowsPerPage,
//        ];
//        $issue = new Issue();
        $this->generate('/social/Registration');
    }
}