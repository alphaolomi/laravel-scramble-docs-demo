<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Http\Requests\StoreTodoItemRequest;
use App\Http\Requests\UpdateTodoItemRequest;
use App\Http\Resources\TodoItemResource;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todoItems = TodoItem::paginate(10);

        return TodoItemResource::collection($todoItems);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoItemRequest $request)
    {
        $data = $request->validated();

        $todoItem = TodoItem::create($data);

        return new TodoItemResource($todoItem);
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoItem $todoItem)
    {
        return new TodoItemResource($todoItem);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoItemRequest $request, TodoItem $todoItem)
    {
        $data = $request->validated();

        $todoItem->update($data);

        return new TodoItemResource($todoItem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();

        return response()->noContent();
    }
}
