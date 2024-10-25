$(document).ready(function() {
    const $form = $('#add-task-form');
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add task
    $('#add-task-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/tasks',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response && response.task) {
                    // Append the new task to the task list
                    $('#task-list').append(`
                                <li data-id="${response.task.id}" class="flex items-center justify-between bg-gray-50 p-3 rounded-md shadow">
                                    <div class="flex items-center space-x-3">
                                        <input type="checkbox" class="mark-done">
                                        <span class="task-name">${response.task.task_name}</span>
                                    </div>
                                    <button class="delete-task bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                                </li>
                            `);
                    // Clear the input field
                    $form[0].reset();
                } else {
                    console.error('Invalid response:', response);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    });

    // Delete task
    $(document).on('click', '.delete-task', function() {
        const taskId = $(this).closest('li').data('id');

        $.ajax({
            url: '/tasks/' + taskId,
            type: 'DELETE',
            success: function(response) {
                $('li[data-id="' + taskId + '"]').remove();
                alert(response.message);
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    });

    // Update task and mark as done
    $(document).on('change', '.mark-done', function() {
        const taskId = $(this).closest('li').data('id');
        const isDone = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '/tasks/' + taskId,
            type: 'PUT',
            data: {
                is_done: isDone
            },
            success: function(response) {
                $(this).siblings('.task-name').toggleClass('line-through text-gray-500', isDone);
            }.bind(this),
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    });
});
