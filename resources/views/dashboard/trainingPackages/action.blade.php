<div id="buttonaction">
    @can('update-trainingPackages', 'admin')
        <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-packages.edit', $id) }}">Edit</a>
    @endcan
    @can('list-trainingPackages', 'admin')
        <a class="btn btn-sm btn-info " href="{{ route('dashboard.training-packages.show', $id) }}">show</a>
    @endcan
    @can('destroy-trainingPackages', 'admin')
        <a data-url="{{ route('dashboard.training-packages.destroy', $id) }}" class="btn btn-danger btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteRecord" data-id="{{ $id }}">
            Delete
        </a>
    @endcan
</div>
