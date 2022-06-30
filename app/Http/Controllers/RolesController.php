<?php

namespace App\Http\Controllers;


use App\Models\Permission;
use App\Models\Role;
use Inertia\Inertia;

class RolesController extends Controller
{
    public function index() {
        return Inertia::render( 'Roles/Index',[
            'roles' => Role::query()
                ->with('permissions')
                ->withCount('users')
                ->paginate(20)
                ->withQueryString(),
        ]);
    }

    public function edit(Role $role) : \Inertia\Response
    {
        return Inertia::render('Roles/Edit', [
            'role' => [
                'id' => $role->getAttribute('id'),
                'name' => $role->getAttribute('name'),
                'permissions' => $role->permissions()->get()->toArray(),
            ],
        ]);
    }

    public function create() : \Inertia\Response
    {
        return Inertia::render('Roles/Create', [
            'permissions' => Permission::all()->sortBy('category')->groupBy('category'),
        ]);
    }
}
