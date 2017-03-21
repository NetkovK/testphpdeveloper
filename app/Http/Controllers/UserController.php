<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    const PAGINATION_NUMBER = 10;

    public function index(){
        return view('user.list', ['users'=>User::paginate(self::PAGINATION_NUMBER)]);
    }

    public function show(User $user){
        return view('user.show', ['user'=>$user, 'roles'=>Role::all()]);
    }

    public function store(UserRequest $request, User $user){

        $messages['messages'][] =  !empty($user->id)?'Пользователь успешно обновлен':'Пользователь успешно создан';

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password) $user->password = bcrypt($user->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users')->with($messages);
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users')->with(['messages'=>['Пользователь успешно удален']]);
    }
}
