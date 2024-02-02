<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(): JsonResponse
    {
        $persons = Person::all();
        return response()->json($persons);
    }
    public function store(PersonRequest $request): JsonResponse
    {
        $person = Person::create([
            "name"=> $request->name,
            "last_name" => $request->last_name,
            "age" => $request->age,
            "sex" => $request->sex,
            "email"=> $request->email
            ]);
        return response()->json([
            "success" => true,
            "message"=> "dato guardado",
            "person" => $person
        ]);

    }
    public function edit(string $id)
    {
        //
    }
    public function update(PersonRequest $request, $id): JsonResponse
    {
        $person = Person::find($id);

        $person->update(request()->all());
        return response()->json([
            "success"=> true,
            "message"=> "dato actualizado",
            "person"=> $person
            ]);

    }
    public function destroy($id): JsonResponse
    {
        Person::find($id)->delete();
        return response()->json([
            "success"=> true,
            "message"=> "dato borrado"
            ]);
    }
}
