<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTasksRequest;
use App\Task;

use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function downloadFile(Request $request)
    {
        if ($request->has('file')){
            //$file="2/RZwDhcZvyg16AEIpmHelFQ0wg3ldkYiO6LRhkjZl.png";
            $file=$request->get('file');
            return response()->download(storage_path("app/{$file}"));
        }
    }
    public function index(Request $request)
    {
        try {
            if ($request->has('description')){
                $task=Task::where('description','like','%'.$request->description .'%')
                    ->get();
            }else{
                $task = Task::all();
            }

            return response()->json([
                'success' => true,
                'status' => 200,
                'data' => $task
            ],200);

        }catch (Exception $e){
            return response()->json([
                'success' => true,
                'status' => 500,
                'message' => 'error en el servidor'
            ],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(CreateTasksRequest $request)
    {

        if ($request->has('file')) {

            $username = $request->get('id_users');

            if ($request->hasFile('file')) {

                $file = $request->file('file')->store('public/'.$username);

                if($request->hasFile('img')){
                    $img = $request->file('img')->store('public/'.$username.'/task');
                }else{
                    $img="";
                }

                $task = Task::create([
                    'id_users'=>$request->get('id_users'),
                    'id_courses' => $request->get('id_courses'),
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'file' => $file,
                    'img'=>$img,
                ]);
            }

        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No esta subiendo el archivo',
            ],404);
        }
        return response()->json([
            'status'=>201,
            'message'=> 'success',
            'data'=>$task,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
