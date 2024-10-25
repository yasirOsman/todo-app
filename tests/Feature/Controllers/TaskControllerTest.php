<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_is_created(): void
    {
        // Arrange: Prepare the task data
        $taskData = ['task_name' => 'New Task'];

        // Act: Send a POST request to the task creation endpoint
        $response = $this->postJson('/tasks', $taskData);

        // Assert: Check if the response is successful
        $response->assertStatus(200)
                 ->assertJson(['message' => 'Task created successfully.']);

        // Assert: Check if the task was actually created in the database
        $this->assertDatabaseHas('tasks', [
            'task_name' => 'New Task',
            'is_done' => false,
        ]);
    }

    public function test_task_name_is_validated(): void
    {

        $taskData = ['task_name' => 123];

        $response = $this->postJson('/tasks', $taskData);

        $response->assertStatus(422);
    }

    public function  test_task_can_be_deleted(): void
    {

        $task = Task::factory()->create();
        // Assert: Check if the task was actually created in the database
        $this->assertDatabaseHas('tasks', [
            'task_name' => $task->task_name,
            'is_done' => $task->is_done,
        ]);

        $response = $this->deleteJson('/tasks/' . $task->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Task deleted successfully.']);
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
            'task_name' => $task->task_name,
            'is_done' => $task->task_name,
        ]);
    }

    public function  test_delete_non_existent_task(): void
    {

        $response = $this->deleteJson('/tasks/1');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'Task not found']);
    }

}
