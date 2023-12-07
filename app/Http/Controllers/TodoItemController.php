<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Http\Requests\StoreTodoItemRequest;
use App\Http\Requests\UpdateTodoItemRequest;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TodoItem::paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoItemRequest $request)
    {
        $data = $request->validated();

        $todoItem = TodoItem::create($data);

        return $todoItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoItem $todoItem)
    {
        return $todoItem;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoItemRequest $request, TodoItem $todoItem)
    {
        $data = $request->validated();

        $todoItem->update($data);

        return $todoItem;
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
