<?php

namespace App\Services;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        try {
            $user = $this->user->query();

            return $user;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);

            $user = $this->user->create($data);

            $user->assignRole($data['role']);
            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function update(UpdateUserRequest $request, User $user): User
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);

            $user->update($data);
            $user->assignRole($data['role']);
            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }


    public function delete(User $user): User
    {
        DB::beginTransaction();
        try {
            $user->delete($user);
            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }
}