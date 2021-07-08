<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        $title = $request->title;
        $text_content = $request->text_content;
        $status = $request->status;
        $userID = Auth::id();

        $data = ['user_id' => $userID, 'title' => $title, 'text_content' => $text_content];
        if (!is_null($status))
            $data['status'] = 1;

        Posts::create($data);
        alert()->success('Congrats','Your post is registered')->showConfirmButton('OK','#3085d6');
        return redirect()->route('admin.showAddPost');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        return view('admin.viewProfile', compact('user'));
    }

    public function viewProfileUpdate(UserUpdateRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $userID = Auth::id();

        $duplicateControl = User::where('email','!=',auth()->user()->email)
            ->where('email',$email)
            ->first();

        if ($duplicateControl)
        {
            alert()->error('Warning','The email address already exist.')->showConfirmButton('Okey', '#3085d6');
            return redirect()->route('admin.viewProfile');
        }

        $user = User::find($userID);
        $user->name = $name;
        $user->email = $email;

        if ($password)
        {
            $user->password = bcrypt($password);
        }
        $user->save();
        alert()->success('Congrats','Your informations has been updated.')->showConfirmButton('Okey', '#3085d6');
        return redirect()->route('admin.viewProfile');
    }

}
