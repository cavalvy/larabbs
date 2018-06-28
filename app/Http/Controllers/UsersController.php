<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['show']]);
    }

    /**
     * 个人页面
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
         return view('users.show',compact('user'));
    }

    public function update(UserRequest $request,ImageUploadHandler $uploder,User $user)
    {
        $this->authorize('update',$user);

        $data = $request->all();

        if($request->avatar){
            $result = $uploder->save($request->avatar,'avatars',$user->id,362);

            if($result){
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功！');
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }
}
