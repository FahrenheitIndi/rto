<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Users/Index', [
//            'can'   => [
//                'create_user' => Auth::user()->hasPermission('create.user'),
//                'update_user' => Auth::user()->hasPermission('update.user'),
//                'delete_user' => Auth::user()->hasPermission('delete.user'),
//            ],
            'users' => User::query()
                ->withCount('posts')
                ->with('role')
                ->paginate(20)
                ->withQueryString(),
        ]);
    }
}
