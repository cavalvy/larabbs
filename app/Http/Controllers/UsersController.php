<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

    public function update(UserRequest $require,User $user)
    {
        $user->update($require->all());
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功！');
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
}
