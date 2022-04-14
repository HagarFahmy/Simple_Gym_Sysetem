<div id="buttonaction">
    @can('update-cities', 'admin')
        <a class="btn btn-sm btn-info" href="{{ route('dashboard.cities.edit', $id) }}">Edit</a>
    @endcan
    @can('destroy-cities', 'admin')
        <a data-url="{{ route('dashboard.cities.destroy', $id) }}" class="btn btn-danger btn-outline-danger py-0"
            style="font-size: 0.8em;" id="deleteRecord" data-id="{{ $id }}">
            Delete
        </a>
    @endcan
</div>
