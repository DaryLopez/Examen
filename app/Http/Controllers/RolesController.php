<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::all();
        return response()->json([
            "roles"=> $roles,
        ]);
    }
    public function assingRole(RoleRequest $request): JsonResponse
    {
        $user = User::where("email", $request->email)->first();
        if(!$user)
        {
            return response()->json([
                "error"=> "email no encontrado"
                ]);
        }
        $role = Role::where("role_name", $request->role)->first();
        if(!$role)
        {
            return response()->json([
                "error"=> "role invalido"
                ]);
        }
        $user->role_id = $role->id;
        $user->save();
        return response()->json([
            "success"=> true,
            "user" => $user,
            ]);

    }
}
