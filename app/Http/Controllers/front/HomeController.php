<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    public function __construct()
    {
        View::share([]);
    }
}
