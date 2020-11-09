<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
