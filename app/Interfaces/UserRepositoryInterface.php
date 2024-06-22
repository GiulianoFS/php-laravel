<?php

namespace App\Interfaces;

use App\Entities\UserEntity;

interface UserRepositoryInterface 
{
    public function create(UserEntity $userEntity);
    public function update(UserEntity $userEntity);
    public function delete(int $id);
    public function readAll();
    public function readFiltered(UserEntity $userEntity);
}