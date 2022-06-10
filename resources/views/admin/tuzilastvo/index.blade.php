@extends('adminlte::page')
@section('title', 'ADMIN | Tužilaštva')
@section('content_header')
    <h1>Tužilaštva</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informacije o tužilaštvima</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Tužilaštvo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tuzilastvo as $t)
                    <tr>
                        <td>{{ $t->naziv }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "oLanguage": {
                    "sUrl": "//cdn.datatables.net/plug-ins/1.12.0/i18n/sr-SP.json"
                },
                "lengthMenu": [[10, 25], [10, 25]],
                "autoWidth": false,
                "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [ 0, ]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [ 0, ]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [ 0, ]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, ]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [ 0, ]
                        }
                    },
                    'colvis'
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
