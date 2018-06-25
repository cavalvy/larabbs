<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * 个人页面
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
         return view('users.show',compact('user'));
    }

    public function update(User $user)
    {

    }

    public function edit(User $user)
    {

    }
}
