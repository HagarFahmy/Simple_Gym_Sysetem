<div id="buttonaction">
    @can('update-', 'admin')
        <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-packages.edit', $id) }}">Edit</a>
    @endcan
    @can('list-', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-packages.show', $id) }}">show</a>
    @endcan
    @can('destroy-', 'admin')
        <form action="{{ route('dashboard.training-packages.destroy', $id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-danger ">Delete</button>
        </form>
    @endcan
</div>
