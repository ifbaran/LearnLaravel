<?php

namespace App\Http\Controllers;


class SendParameterController extends Controller
{
    public function index()
    {
        $name = "İbrahim Furkan";
        $surname = "Baran";
        return view('admin.sendParameter', ['name' => $name, 'surname' => $surname]);
    }
}
