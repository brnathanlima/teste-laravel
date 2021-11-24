<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $search = request('search.value');
            $users = User::orWhere(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")->whereNotNull('category_id');
            })->with('category')->latest()->take(request('length') == -1 ? PHP_INT_MAX : request('length'))->skip(request('start'))->get();

            return new JsonResponse([
                'draw' => request('draw'),
                'data' => $users,
                'total' => User::orWhere(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })->count()
            ], 200);
        }

        return view('users.index')->with(['activePage' => 'Usuários']);
    }
}
