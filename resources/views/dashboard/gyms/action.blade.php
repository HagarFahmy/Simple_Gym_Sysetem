<div id="buttonaction">
@can('update-gyms', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.gyms.edit', $id) }}">Edit</a>
@endcan
@can('list-gyms',  'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.gyms.show', $id) }}">show</a>
@endcan

@can('delete-gyms','admin')
    <form action="{{ route('dashboard.gyms.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-sm btn-danger ">Delete</button>
    </form>
@endcan
</div>
