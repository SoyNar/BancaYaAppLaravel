<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function index() {
        return view("screens.adviser-screen");
    }
}
