<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\CreateTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todos = Todo::get();
        return $todos;
    }

    public function getAll(Request $request): JsonResponse {
        $todos = Todo::all();

        return response()->json([
            "todos" => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTodoRequest $request): JsonResponse
    {   
        $newTodo = Todo::create($request->all());
        
        return response()->json([
            "message" => "Successfully created new todo item!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $todo = Todo::where("id", $id)->first();
        return response()->json([
            "todo" => $todo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, string $id): JsonResponse
    {
        Todo::where("id", $id)->update($request->all());

        return response()->json([
            "message" => "Item successfully updated!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Todo::where("id", $id)->delete();
        return response()->json([
            "message" => "Deleted item successfully!"
        ]);
    }

    /**
     * Change todo state to completed
     */
    public function completedTodo(string $id): JsonResponse {
        Todo::where("id", $id)->update(["completed" => true]);
        return response()->json([
            "message"=> "Completed successfully!"
        ]);
    }
}
