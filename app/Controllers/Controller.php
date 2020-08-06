<?php

namespace App\Controllers;

use Core\View;
/**
 * Base controller
 */
class Controller
{
    public function generate(string $viewName, array $param = [])
    {
        View::generate($viewName, $param);
    }
}