<?php

use App\Models\Todo;

it('has correct fillable attributes', function () {
    // Arrange: Create a Todo instance with some attributes
    $todo = Todo::create([
        'title' => 'Test Todo',
        'description' => 'Test Description',
        'completed' => true,
        'user_id' => 1,
    ]);

    // Assert: Ensure the attributes are assigned correctly
    expect($todo->title)->toBe('Test Todo');
});
