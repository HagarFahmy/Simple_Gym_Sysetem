@can('update-cities', 'admin')
    <a class="btn btn-sm btn-info" href="{{ route('dashboard.cities.edit', $id) }}">Edit</a>
@endcan
@can('destroy-cities', 'admin')
    <form action="{{ route('dashboard.cities.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-sm btn-danger">Delete</button>
    </form>
@endcan
