<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    public function showAddPost()
    {
        return view("admin.addPost");
    }

    public function addPost(Request $request)
    {
//        dd($request->all());

        $title = $request->title;
        $text_content = $request->text_content;
        $status = $request->status;

        $data = [ 'title' =>$title, 'text_content' => $text_content];
        if (!is_null($status))
            $data['status'] = 1;

        Posts::create($data);

        dd("kayıt geldi");
    }

}
