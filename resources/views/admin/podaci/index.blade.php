@extends('adminlte::page')
<?php $title = Request::get('pvk') == 1 ? "Podaci Visoke Korupcije" : "Podaci"; ?>
@section('title', 'ADMIN | '.$title)
@section('content_header')
    @if(Request::get('pvk') == 1)
    <div class="d-flex">
        <h1>{{ $title }}</h1>
        <a class="btn btn-dark mr-2 ml-4" href="{{ url('admin/podaci/create?pvk=1') }}">Kreiraj</a>
        <i class="fa-solid fa-plus-large"></i>
    </div>
    @else
        <div class="d-flex">
            <h1>{{ $title }}</h1>
            <a class="btn btn-dark mr-2 ml-4" href="{{ url('admin/podaci/create?pvk=0') }}">Kreiraj</a>
            <i class="fa-solid fa-plus-large"></i>
        </div>
    @endif
@stop
@section('content')
    @include('includes.sessions')
    <div id="my-card" class="card">
        <div class="card-header">
            <h3 class="card-title">{{ Request::get('pvk') == 1 ? "Informacije o Podacima Visoke Korupcije" : "Informacije o podacima" }}</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Tužilaštvo</th>
                    <th>Godina</th>
                    <th class="text-right">Akcije</th>
                </tr>
                </thead>
                <tbody>
                @if($podaci != null)
                    @foreach($podaci as $podatak)
                        <tr>
                            <td>{{ $podatak->tuzilastva ? $podatak->tuzilastva->naziv : "" }}</td>
                            <td>{{ $podatak->godina }}</td>
                            <td class="d-flex justify-content-end">
                                <a class="btn btn-sm btn-dark mr-2" href="{{ route('podaci.edit', $podatak->id) }}">Izmjeni</a>
                                <form class="forma" method="POST" action="{{route('podaci.destroy', $podatak->id)}}">
                                    <button id="delete" class="btn btn-sm btn-danger" data-toggle="modal"
                                            onclick="deleteModal()" data-target="#exampleModal">
                                        Obriši
                                    </button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    {{ method_field('DELETE') }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Brisanje PKK</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Da li želite obrisati {{$title}}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary ne" data-dismiss="modal">Odustani
                                </button>
                                <button class="btn btn-danger da">Obriši</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                "lengthChange": true,
                "oLanguage": {
                    "sUrl": "//cdn.datatables.net/plug-ins/1.12.0/i18n/sr-SP.json"
                },
                "autoWidth": false,
                "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1,]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1,]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1,]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1,]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1,]
                        }
                    },
                    'colvis'
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function deleteModal() {
            $('.forma').submit(function (e) {
                e.preventDefault();
                t = $(this);

                $('.da').click(function () {
                    $.when().then(function () {
                        $(t).off("submit").submit()
                    })
                })
            })
        }

    </script>
@stop
