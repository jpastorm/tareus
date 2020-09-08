<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoluserRequest;
use App\Roluser;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class RolusersController extends Controller
{

    public function index(Request $request)
    {
        try {
            if ($request->has('description')){
                $rolusers=Roluser::where('description','like','%'.$request->description .'%')->get();
            }else{
                $rolusers = Roluser::all();
            }

            return response()->json([
                'success' => true,
                'status' => 200,
                'data' => $rolusers
            ],200);

        }catch (Exception $e){
            return response()->json([
                'success' => true,
                'status' => 500,
                'message' => 'error en el servidor'
            ],500);
        }

    }


    public function create()
    {
        //
    }


    public function store(CreateRoluserRequest $request)
    {
        $rolusers = Roluser::create($request->all());
        if ($rolusers){
            return response()->json([
                'success' => true,
                'status' => 201,
                'messsage' => 'Roluser created success',
                'data' => $rolusers
            ],201);
        }else{
            return response()->json([
                'success' => false,
                'status' => 500,
                'messsage' => 'failed'
            ],500);
        }

    }


    public function show($id)
    {
        $rolusers = Roluser::find($id);
        return $rolusers;
    }


    public function edit(Roluser $rolusers)
    {
        //
    }


    public function update(Request $request, Roluser $rolusers)
    {
        //
    }


    public function destroy($id)
    {
        $rolusers = Roluser::destroy($id);
        return response()->json([
            "id" => $id,
            "message" => "Fue eliminado con exito",
    ]);
    }
}
