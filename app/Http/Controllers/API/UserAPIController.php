<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAPIRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;

class UserAPIController extends ApiBaseController
{
    public function index(PaginationAPIRequest $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $users = User::paginate($perPage)->withQueryString();
        return $this->sendResponse($users, "Users Retrieved Successfully.");
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return $this->sendResponse($user, 'User Created Successfully.');
    }

    public function show(int $id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return $this->sendError('User Not Found', [], 404);
        }

        return $this->sendResponse($user, 'User Retrieved Successfully.');
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return $this->sendError('User Not Found', [], 404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|confirmed',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user->update($input);
        $user->syncRoles($request->input('roles'));

        return $this->sendResponse($user, 'User Updated Successfully.');
    }

    public function destroy(int $id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return $this->sendError('User Not Found', [], 404);
        }

        $user->delete();
        return $this->sendResponse(null, 'User Deleted Successfully.');
    }
}
