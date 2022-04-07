@can('update-', 'admin')
    <a class="btn btn-sm btn-info" href="{{ route('dashboard.city-manager.edit', $id) }}">Edit</a>
@endcan
@can('destroy-', 'admin')
    <form action="{{ route('dashboard.city-manager.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-sm btn-danger">Delete</button>
    </form>
@endcan
