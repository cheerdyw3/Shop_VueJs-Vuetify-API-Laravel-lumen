<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;


class UnitController extends BaseController
{

    public function index()
    {
        //
        return response()->json(['data' =>  Unit::all()], 200);
    }

    public function create(Request $request)
    {
        //
        //validate incoming request  
        try {

            $data =  Unit::create($request->input());  
            //return successful response
            return response()->json(['data' => $data, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Unit $Unit)
    {
        //
    }

    public function edit(Request $request,$id)
    {
        $data = Unit::findOrFail($id); 
        if($data->fill($request->input())->save())
        { 
          return response()->json(['data' => $data, 'message' => 'Update success'], 201);
        }else {
          return response()->json(['Error' => 'Update Error'], 500);
        }
    }

    public function update(Request $request, Unit $Unit)
    {
        //
    }

    public function destroy($id)
    {
        //
         // 
         if( Unit::destroy($id))
         { 
           return response()->json(['message' => 'Delete success'], 201);
         }else {
           return response()->json(['Error' => 'Update Error'], 500);
         }
    }
}
