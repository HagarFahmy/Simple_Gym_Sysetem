<div  id="buttonaction">
@can('update-', 'admin')
    <a class="btn btn-sm btn-info col-4 " href="{{ route('dashboard.coaches.edit', $id) }}">Edit</a>
@endcan
@can('list-', 'admin')
    <a class="btn btn-sm btn-info col-4 " href="{{ route('dashboard.coaches.show', $id) }}">show</a>
@endcan
@can('destroy-', 'admin')
    <form class="col-4" action="{{ route('dashboard.coaches.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-sm btn-danger ">Delete</button>
    </form>
@endcan
</div>
