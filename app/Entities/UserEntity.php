<?php

namespace App\Entities;

/**
 * @OA\Schema(
 *     schema="UserEntity",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="email", type="string"),
 *     @OA\Property(property="password", type="string")
 * )
 */
class UserEntity
{
    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->password = $data['password'] ?? null;
    }

    public ?int $id;
    public ?string $name;
    public ?string $email;
    public ?string $password;
}