<?php

use App\Models\Post;

test('welcome page is being displayed', function () {
    // Act
    $response = $this->get('/');

    // Assert
    $response->assertStatus(200);
});

