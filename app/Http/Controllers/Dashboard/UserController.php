<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public string $userView = 'dashboard.user.';
    public UserService $userService;
    private Role $role;

    public function __construct()
    {
        $this->userService = new UserService;
        $this->role = new Role();
    }

    public function index()
    {
        $userView = $this->userView;
        $users = $this->userService->index()->get();

        return \view($userView . 'index', \compact('users'));
    }

    public function create()
    {
        $userView = $this->userView;
        $roles = $this->role->query()->get();

        return \view($userView . 'create', \compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $userView = $this->userView;
        $user = $this->userService->store($request);

        return \to_route($userView . 'index');
    }

    public function show(User $user)
    {
        $userView = $this->userView;
        $roles = $this->role->query()->get();

        return \view($userView . 'show', \compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $userView = $this->userView;
        $roles = $this->role->query()->get();

        return \view($userView . 'edit', \compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $userView = $this->userView;
        $user = $this->userService->update($request, $user);

        return \to_route($userView . 'index');
    }

    public function destroy(User $user)
    {
        $userView = $this->userView;
        $user = $this->userService->delete($user);

        return \to_route($userView . 'index');
    }
}
