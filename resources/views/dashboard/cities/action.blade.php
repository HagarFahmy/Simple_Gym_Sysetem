<div id="buttonaction">
    @can('update-cities', 'admin')
        <a class="btn btn-sm btn-info" href="{{ route('dashboard.cities.edit', $id) }}">Edit</a>
    @endcan
    @can('delete-cities', 'admin')
    <template >
        <form action="{{ route('dashboard.cities.destroy', $id) }}" method="POST">
            @csrf
            @method('delete')
            <button  class="btn btn-sm btn-danger">Delete</button>
        </form>
    </template>
    @endcan
</div>


@section('scripts')

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

    <script>
        Swal.fire({
            button: '#deleteButton',
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    </script>
@endsection
