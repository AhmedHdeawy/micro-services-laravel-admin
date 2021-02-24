<?php

namespace App\Http\Controllers\Api;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{

    public function index()
    {
        return Role::all();
    }


    public function store(Request $request)
    {
        Role::create([
            'name'  =>  $request->name
        ]);

        return response(['Creaed'], Response::HTTP_CREATED);
    }

   
    public function show($id)
    {
        return response(Role::findOrFail($id), Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update(['name'   =>  $request->name]);

        return response(['Updated'], Response::HTTP_ACCEPTED);
    }


    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return response(['Deleted'], Response::HTTP_NO_CONTENT);
    }
}
