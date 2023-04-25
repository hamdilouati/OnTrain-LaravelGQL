<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class NanoCrmController extends Controller
{
    public function fullname(String $firstname, String $lastname = ''): Response {
        $fullname = $firstname.' '.$lastname;
        return New Response($fullname, 200);
    }
}

