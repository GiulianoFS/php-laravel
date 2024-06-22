<?php

namespace App\Repositories;

use App\Models\User;
use App\Entities\UserEntity;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function create(UserEntity $userEntity)
    {
        $user = new User();
        $user->name = $userEntity->name;
        $user->email = $userEntity->email;
        $user->password = bcrypt($userEntity->password); // You may need to hash the password

        $user->save();

        return $user;
    }

    public function update(UserEntity $userEntity)
    {
        if ($userEntity->id) {
            $user = User::find($userEntity->id);

            if ($user) {
                $user->name = $userEntity->name ?? $user->name;
                $user->email = $userEntity->email ?? $user->email;
                // You may handle password update differently based on your requirements

                $user->save();

                return $user;
            }
        }

        return null; // Or handle error as needed
    }

    public function delete(int $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return true;
        }

        return false; // Or handle error as needed
    }

    public function readAll()
    {
        return User::all();
    }

    public function readFiltered(UserEntity $userEntity)
    {
        $user = new User();
        $query = $user->newQuery();

        if (isset($userEntity->name)) {
            $query->where('name', 'like', '%' . $userEntity->name . '%');
        }

        if (isset($userEntity->email)) {
            $query->where('email', 'like', '%' . $userEntity->email . '%');
        }

        return $query->get();
    }
}