<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Interfaces\UserRepositoryInterface;
use App\Entities\UserEntity;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @OA\Post(
     *     path="/api/users/create",
     *     summary="Create a new user",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="User data",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function create(Request $request) : JsonResponse 
    { 
        $userEntity = new UserEntity($request->all());
        $ret = $this->userRepository->create($userEntity);
        return response()->json($ret);
    }

    /**
     * @OA\Put(
     *     path="/api/users/update",
     *     summary="Update a user",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="User data",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function update(Request $request) : JsonResponse 
    { 
        $userEntity = new UserEntity($request->all());
        $ret = $this->userRepository->update($userEntity);
        return response()->json($ret);
    }

    /**
     * @OA\Delete(
     *     path="/api/users/delete/{id}",
     *     summary="Delete a user",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the user to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User deleted successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function delete(int $id) : JsonResponse 
    {
        $ret = $this->userRepository->delete($id);
        return response()->json($ret);
    }

    /**
     * @OA\Get(
     *     path="/api/users/readAll",
     *     summary="Get all users data",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Get successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function readAll() : JsonResponse 
    {
        $ret = $this->userRepository->readAll();
        return response()->json($ret);
    }

    /**
     * @OA\Post(
     *     path="/api/users/readFiltered",
     *     summary="Get all users data filtering by UserEntity",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="User data",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Get successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserEntity")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function readFiltered(Request $request) : JsonResponse 
    { 
        $userEntity = new UserEntity($request->all());
        $ret = $this->userRepository->readFiltered($userEntity);
        return response()->json($ret);
    }
}
