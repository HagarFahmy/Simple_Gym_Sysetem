<div id="buttonaction">
    @can('update-', 'admin')
        <a class="btn btn-sm btn-info " href="{{ route('dashboard.city-managers.edit', $id) }}">Edit</a>
    @endcan
    @can('list-', 'admin')
        <a class="btn btn-sm btn-info " href="{{ route('dashboard.city-managers.show', $id) }}">show</a>
    @endcan
    @can('destroy-', 'admin')
        <a data-url="{{ route('dashboard.city-managers.destroy', $id) }}" class="btn btn-danger btn-outline-danger py-0"
            style="font-size: 0.8em;" id="deleteRecord" data-id="{{ $id }}">
            Delete
        </a>
    @endcan

</div>
