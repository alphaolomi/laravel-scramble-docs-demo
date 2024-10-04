<?php

use App\Models\Todo;

it('can list all todos', function () {
    // Arrange: Create a few Todo items
    $todos = Todo::factory()->count(3)->create();

    // Act: Make a GET request to the index route
    $response = $this->getJson(route('todos.index'));

    // Assert: Ensure the HTTP response is correct
    $response->assertOk()
        ->assertJsonCount(3)
        ->assertJson($todos->toArray());

    // Assert: Ensure the data in the database matches the response
    $this->assertDatabaseCount('todos', 3);
});



it('can store a todo', function () {
    // Arrange: Prepare a valid payload
    $payload = [
        'title' => 'Buy groceries',
        'content' => 'Milk, Eggs, Bread',
        'completed' => false
    ];

    // Act: Make a POST request to store the Todo
    $response = $this->postJson(route('todos.store'), $payload);

    // Assert: Check the HTTP response status and structure
    $response->assertStatus(201)
        ->assertJsonFragment(['title' => 'Buy groceries']);

    // Assert: Ensure the database contains the new todo
    $this->assertDatabaseHas('todos', [
        'title' => 'Buy groceries',
    ]);
});



it('can show a todo', function () {
    // Arrange: Create a Todo item
    $todo = Todo::factory()->create();

    // Act: Make a GET request to show the Todo
    $response = $this->getJson(route('todos.show', $todo->id));

    // Assert: Ensure the response contains the correct Todo data
    $response->assertOk()
        ->assertJson($todo->toArray());
});


it('can update a todo', function () {
    // Arrange: Create a Todo item
    $todo = Todo::factory()->create();

    // Arrange: Prepare an updated payload
    $updatedPayload = [
        'title' => 'Buy more groceries',
        'content' => 'Milk, Eggs, Bread, Cheese',
        'completed' => true
    ];

    // Act: Make a PUT request to update the Todo
    $response = $this->putJson(route('todos.update', $todo->id), $updatedPayload);

    // Assert: Ensure the HTTP response is correct
    $response->assertOk()
        ->assertJsonFragment(['title' => 'Buy more groceries']);

    // Assert: Ensure the database has the updated values
    $this->assertDatabaseHas('todos', [
        'id' => $todo->id,
        'title' => 'Buy more groceries',
        // 'content' => 'Milk, Eggs, Bread, Cheese',
        // 'completed' => true,
    ]);
});



it('can delete a todo', function () {
    // Arrange: Create a Todo item
    $todo = Todo::factory()->create();

    // Act: Make a DELETE request to remove the Todo
    $response = $this->deleteJson(route('todos.destroy', $todo->id));

    // Assert: Ensure the HTTP response status is correct
    $response->assertNoContent();

    // Assert: Ensure the database no longer contains the Todo
    $this->assertDatabaseMissing('todos', [
        'id' => $todo->id,
    ]);
});
