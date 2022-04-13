<div id="buttonaction">
@can('update-trainingSession', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-sessions.edit', $id) }}">Edit</a>
@endcan
@can('list-trainingSession', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-sessions.show', $id) }}">show</a>
@endcan 
@can('delete-trainingSession', 'admin')
    <form action="{{ route('dashboard.training-sessions.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-sm btn-danger ">Delete</button>
    </form>
@endcan
</div>
