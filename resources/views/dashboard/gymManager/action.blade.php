<div id="buttonaction">
@can('update-gymManagers', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.gym-managers.edit', $id) }}">Edit</a>
@endcan
@can('list-gymManagers', 'admin')
    <a class="btn btn-sm btn-info " href="{{ route('dashboard.gym-managers.show', $id) }}">show</a>
@endcan
@can('delete-gymManagers', 'admin')
<a data-url="{{ route('dashboard.gym-managers.destroy', $id) }}" class="btn btn-danger btn-outline-danger py-0"
    style="font-size: 0.8em;" id="deleteRecord" data-id="{{ $id }}">
    Delete
</a>
@endcan


<form action="{{ route('dashboard.gym-managers.ban', $id) }}" method="POST">
    @csrf
    @if($status == 1)
    <button type="submit" class="btn btn-sm btn-warning " >Ban</button>
    @else
    <button  type="submit" class="btn btn-sm btn-success">UnBan</button>
    @endif
</form>

{{-- <a class="btn btn-sm btn-warning " data-url="{{ route('dashboard.gym-managers.ban', $id) }}" data-id="{{ $id }}" >Ban</a> --}}
{{-- <a class="btn btn-sm btn-success " data-url="{{ route('dashboard.gym-managers.ban', $id) }}" data-id="{{ $id }}" >UnBan</a> --}}
</div>
