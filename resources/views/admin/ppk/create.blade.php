@extends('adminlte::page')
@section('title', 'Kreiranje praćenog predmeta korupcije')
@section('content_header')
    <h1>Praćeni predmeti korupcije</h1>
@stop
@section('content')
    @include('includes.sessions')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kreiraj praćeni predmet korupcije</h3>
        </div>

        <div class="card-body">
            <form id="form" action="{{ route('praceni-predmeti-korupcije.store') }}" method="POST"
                  enctype="multipart/form-data"
                  class="wizard-big">
                @csrf
                <h1>Po stadijumima u postupku</h1>
                <fieldset>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Naziv krivičnog djela *</label>
                                <input id="naziv_krivicnog_djela" name="naziv_krivicnog_djela" type="text"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Neformalni naziv predmeta *</label>
                                <input id="neformalni_naziv_predmeta" name="neformalni_naziv_predmeta"
                                        type="text"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Broj optuženih u predmetu *</label>
                                <input id="broj_optuzenih_u_predmetu" name="broj_optuzenih_u_predmetu"
                                        type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Sud pred kojim se vodi postupak *</label>
                                <input id="sud_pred_kojim_se_vodi_postupak" name="sud_pred_kojim_se_vodi_postupak"
                                       type="text"

                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Izaberite tužilaštvo*</label>
                                <select id="tuzilastvo"
                                        name="tuzilastvo" type="text"
                                        class="form-control required">
                                    <option value="">Izaberite</option>
                                    @foreach($tuzilastvo as $t)
                                        <option value="{{ $t->id }}">{{ $t->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vrijeme izvršenja djela *</label>
                                <input id="vrijeme_izvrsenja_djela" name="vrijeme_izvrsenja_djela"
                                        type="text"
                                       class="form-control required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Datum podnošenja krivične prijave *</label>
                                <input id="datum_podnosenja_krivicne_prijave" name="datum_podnosenja_krivicne_prijave"
                                        type="text"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Datum donošenja naredbe o sprovođenju istrage *</label>
                                <input id="datum_donosenja_naredbe_o_sprovodjenju_istrage"
                                       name="datum_donosenja_naredbe_o_sprovodjenju_istrage"
                                        type="text"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Preduzimanje posebnih istražnih radnji *</label>
                                <input id="preduzimanje_posebnih_istraznih_radnji"
                                       name="preduzimanje_posebnih_istraznih_radnji"
                                        type="text"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Datum podizanja optužnice *</label>
                                <input id="datum_podizanja_optuznice" name="datum_podizanja_optuznice" type="text"

                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Datum potvrđivanja optužnice *</label>
                                <input id="datum_potvrdjivanja_optuznice" name="datum_potvrdjivanja_optuznice"
                                        type="text"
                                       class="form-control required">
                            </div>


                            <div class="form-group">
                                <label>Datum donošenja prvostepene presude *</label>
                                <input id="datum_donosenja_prvostepene_presude"
                                       name="datum_donosenja_prvostepene_presude"
                                        type="text"
                                       class="form-control required">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h1>Po izrečenim krivičnim sankcijama</h1>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Datum donošenja drugostepene presude *</label>
                                <input id="optuzeni" name="optuzeni" type="text"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Postupajući sud *</label>
                                <input id="postupajuci_sud" name="postupajuci_sud"
                                        type="text"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Postupajuće tužilaštvo *</label>
                                <input id="postupajuce_tuzilastvo" name="postupajuce_tuzilastvo"
                                        type="text"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Naziv krivičnog djela izrečenim *</label>
                                <input id="naziv_krivicnog_djela_izrecenim" name="naziv_krivicnog_djela_izrecenim"
                                       type="text"

                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Zaprijećena sankcija za predmetno krivično djelo shodno krivičnom zakonu
                                    </label>
                                <input id="zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz"
                                       name="zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz"
                                       type="text"

                                       class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Vrsta i visina izrečene sankcije/ da li je sankcija ublažena ispod zakonskog
                                    minimuma</label>
                                <input id="vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm"
                                       name="vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm"
                                        type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Da li je presudom izrečena sigurnosna mjera zabrane vršenja poziva, aktivnosti
                                    ili funkcija</label>
                                <input id="da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif"
                                       name="da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif"
                                        type="text"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Da li je izrečena mjera oduzimanje imovinske koristi pribavljene krivičnim djelom</label>
                                <input id="da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd"
                                       name="da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd"
                                        type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Da li je tužilaštvo izjavilo žalbu na prvostepenu presudu</label>
                                <input id="da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu"
                                       name="da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu"
                                        type="text"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </fieldset>
                {{ csrf_field() }}

                <input id="snimif" name="snimif" style="display:none;" type="text">
            </form>
        </div>

    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/css/iCheck/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/steps/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/ppk.css') }}">
@stop
@section('js')
    <script src="{{ asset('admin/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script>
        $(function () {
            jQuery.extend(jQuery.validator.messages, {
                required: "Ovo polje je obavezno.",
            });
            $("#form").steps({
                bodyTag: "fieldset",
                labels: {
                    current: "trenutni korak:",
                    pagination: "Stranice",
                    finish: "Snimi",
                    next: "Sledeća",
                    previous: "Prethodna",
                    loading: "Učitavanje ..."
                },
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            });
            //     .validate({
            //     errorPlacement: function (error, element) {
            //         element.before(error);
            //     },
            //     rules: {
            //         confirm: {
            //             equalTo: "#password"
            //         }
            //     }
            // });
        });
    </script>
@stop

