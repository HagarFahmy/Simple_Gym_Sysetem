<div id="buttonaction">
@can('update-trainingSession', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-sessions.edit', $id) }}">Edit</a>
@endcan
@can('list-trainingSession', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-sessions.show', $id) }}">show</a>
@endcan 
@can('delete-trainingSession', 'admin')
<a data-url="{{ route('dashboard.training-sessions.destroy', $id) }}" class="btn btn-danger btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteRecord" data-id="{{ $id }}">
    Delete
</a>
@endcan
</div>
