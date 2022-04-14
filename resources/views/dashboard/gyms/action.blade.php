<div id="buttonaction">
    @can('update-gyms', 'admin')
        <a class="btn btn-sm btn-info " href="{{ route('dashboard.gyms.edit', $id) }}">Edit</a>
    @endcan
    @can('list-gyms', 'admin')
        <a class="btn btn-sm btn-info " href="{{ route('dashboard.gyms.show', $id) }}">show</a>
    @endcan
    @can('destroy-', 'admin')
        <a data-url="{{ route('dashboard.gyms.destroy', $id) }}" class="btn btn-danger btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteRecord" data-id="{{ $id }}">
            Delete
        </a>
    @endcan
</div>
