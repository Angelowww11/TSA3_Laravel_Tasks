<section class="table-panel" aria-label="Task records">
    <div class="table-heading"><h2>{{ $listTitle }}</h2><span class="table-note">{{ $tasks->count() }} {{ $tasks->count() === 1 ? 'task' : 'tasks' }}</span></div>
    <div class="table-scroll"><table>
        <thead><tr><th scope="col">No.</th><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Date</th></tr></thead>
        <tbody>
        @forelse ($tasks as $task)
            <tr data-task-date="{{ $task->task_date->toDateString() }}">
                <td class="task-id">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                <td><strong>{{ $task->title }}</strong></td>
                <td><span class="task-status {{ $task->status }}">{{ ucfirst(str_replace('_', ' ', $task->status)) }}</span></td>
                <td>{{ $task->task_date->format('M j, Y') }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="empty-tasks">No tasks scheduled{{ request()->routeIs('home') ? ' for today' : '' }}.</td></tr>
        @endforelse
        </tbody>
    </table></div>
    <div class="table-footer"><span>All dates follow Philippine time</span><span>{{ config('app.timezone') }}</span></div>
</section>
