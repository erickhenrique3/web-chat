<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $userLogged = Auth::user();
        // mostra todos os usu, exceto o usu autenticado
        $users = User::where('id', '!=', $userLogged->id)->get();
        return response()->json([
            'users' => $users
        ],200);
    }
    public function show(User $user)
    {
       return response()->json([
        'User' => $user
       ],200);
    }
}
