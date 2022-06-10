@extends('adminlte::page')
@section('title', 'Korisnici')
@section('content_header')
    <h1>Korisnici</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informacije o korisnicima</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Korisničko ime</th>
                    <th>Email</th>
                    <th>Uloga</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Administrator</td>
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
                "lengthChange": false,
                "bPaginate": false,
                "oLanguage": {
                    "sUrl": "//cdn.datatables.net/plug-ins/1.12.0/i18n/sr-SP.json"
                },
                "autoWidth": false,
            //     "buttons": [
            //         {
            //             extend: 'copy',
            //             exportOptions: {
            //                 columns: [ 0, 1, 2 ]
            //             }
            //         },
            //         {
            //             extend: 'csv',
            //             exportOptions: {
            //                 columns: [ 0, 1, 2 ]
            //             }
            //         },
            //         {
            //             extend: 'pdf',
            //             exportOptions: {
            //                 columns: [ 0, 1, 2 ]
            //             }
            //         },
            //         {
            //             extend: 'print',
            //             exportOptions: {
            //                 columns: [ 0, 1, 2 ]
            //             }
            //         },
            //         {
            //             extend: 'excel',
            //             exportOptions: {
            //                 columns: [ 0, 1, 2 ]
            //             }
            //         },
            //         'colvis'
            //     ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
