<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PainelController extends Controller
{

    public function index()
    {
        return View('admin.index');
    }


}
