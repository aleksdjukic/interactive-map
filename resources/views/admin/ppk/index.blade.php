@extends('adminlte::page')
@section('title', 'ADMIN | Praćeni Predmeti Korupcije')
@section('content_header')
    <div class="d-flex">
        <h1>Praćeni Predmeti Korupcije</h1>
        <a class="btn btn-dark mr-2 ml-4" href="{{ route('praceni-predmeti-korupcije.create')  }}">Kreiraj</a>
    </div>
@stop
@section('content')
    @include('includes.sessions')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informacije o praćenim predmetima korupcije</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Optuženi / Neformalni naziv predmeta</th>
                    <th class="text-right">Akcije</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pkk as $pk)
                    <tr>
                        <td>{{ $pk->neformalni_naziv_predmeta }}</td>
                        <td class="d-flex justify-content-end">
                            <a class="btn btn-sm btn-dark mr-2"
                               href="{{ url('/admin/praceni-predmeti-korupcije/'.$pk->id.'/edit?language=en') }}">Izmjeni
                                EN</a>
                            <a class="btn btn-sm btn-dark mr-2"
                               href="{{ url('/admin/praceni-predmeti-korupcije/'.$pk->id.'/edit?language=bs') }}">Izmjeni
                                BS</a>
                            <form class="forma" method="POST"
                                  action="{{route('praceni-predmeti-korupcije.destroy', $pk->id)}}">
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
                                Da li želite obrisati Praćeni predmet korupcije?
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

        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "oLanguage": {
                    "sUrl": "//cdn.datatables.net/plug-ins/1.12.0/i18n/sr-SP.json"
                },
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
    </script>
@stop
