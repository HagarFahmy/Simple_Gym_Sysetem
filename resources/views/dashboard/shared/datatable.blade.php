@extends('layouts.app')
@section('styles')
    <link rel="stylesheet"
        href="{{ asset('dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    <h1 style="color: white">{{ $permissionGroup }}</h1>

    <div class="box">

        @php
            $disableCreate = ['attendance' , 'revenue'];
        @endphp

        <div class="box-header with-border">
            <div class="box-tools">
                @if (!in_array($module, $disableCreate))
                    @can('create-' . $permissionGroup, 'admin')
                        <a href="{{ route('dashboard.' . $module . '.create') }}" class="btn btn-sm btn-success">Create</a>
                    @endcan
                @endif
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}

    <script>
        $(document).ready(function() {

            $("body").on("click", "#deleteRecord", function(e) {
                Swal.fire({
                    title: 'Are You Sure you want to delete?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: `Delete`,
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.preventDefault();
                        var id = $(this).data("id");
                        var token = $("meta[name='csrf-token']").attr("content");
                        var url = $(this).data("url");
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: token,
                                id: id
                            },
                            success: function(response) {
                                if(response.status == 1) {
                                    Swal.fire('Can\'t delete gym cause it have training session', '', 'error')
                                } else if (response.status == 2){
                                    Swal.fire('Can\'t delete cause there are users attend this seesion', '', 'error')
                                }else{
                                    Swal.fire('Deleted!', '', 'success')
                                }
                                console.log(response.status);
                                $("#success").html(response.message)
                                refreshTable()
                            },
                           
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'error')
                    }
                });
            });


        });

        function refreshTable() {
            $('.dataTable').each(function() {
                dt = $(this).dataTable();
                dt.fnDraw();
            })
        }
    </script>
@endsection
