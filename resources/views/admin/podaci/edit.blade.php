@extends('adminlte::page')
<?php $title = "Podaci"; ?>
@section('title', 'ADMIN | '.$title)
@section('content_header')
    <h1>{{ $podaci->pvk == 1 ? "Podaci Visoke Korupcije" : "Podaci" }}</h1>
@stop
@section('content')
    @include('includes.sessions')
    <div id="my-card" class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $podaci->pvk == 1 ? "Izmjeni Podatak Visoke Korupcije" : "Izmjeni podatak" }}</h3>
        </div>
        <div class="card-body">
            <form id="form" action="{{ route('podaci.update', $podaci->id) }}" method="POST"
                  enctype="multipart/form-data"
                  class="wizard-big">
                @csrf
                <h1>Prijave/izvještaji</h1>
                <fieldset>
                    <input type="hidden" name="pvk" value="{{ $podaci->pvk }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Godina *</label>
                                <input id="godina" name="godina" type="number" value="{{ $podaci->godina }}"
                                       onkeypress="return isNumberKey(event)"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Neriješene prijave na dan (01.01) *</label>
                                <input id="nerijesene_prijave_na_dan_0101" name="nerijesene_prijave_na_dan_0101"
                                       value="{{ $podaci->nerijesene_prijave_na_dan_0101 }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Zarimljene prijave *</label>
                                <input id="zaprimljene_prijave" name="zaprimljene_prijave"
                                       value="{{ $podaci->zaprimljene_prijave }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Ukupno u radu *</label>
                                <input id="ukupno_u_radu" name="ukupno_u_radu" type="number"
                                       value="{{ $podaci->ukupno_u_radu }}"
                                       onkeypress="return isNumberKey(event)"
                                       class="form-control required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Izaberite tužilaštvo*</label>
                                <select id="tuzilastvo" name="tuzilastvo" type="number"
                                        class="form-control required">
                                    <option value="">Izaberite</option>
                                    @foreach($tuzilastvo as $t)
                                        <option
                                            value="{{ $t->id }}"{{$podaci->tuzilastvo == $t->id ? 'selected' : ''}}>{{ $t->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ukupno riješeno *</label>
                                <input id="ukupno_rijeseno" name="ukupno_rijeseno"
                                       value="{{ $podaci->ukupno_rijeseno }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>


                            <div class="form-group">
                                <label>Naredbe o nepokretanju istrage *</label>
                                <input id="naredbe_o_nepokretanju" name="naredbe_o_nepokretanju"
                                       value="{{ $podaci->naredbe_o_nepokretanju }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Neriješene prijave na dan (31.12) *</label>
                                <input id="nerijesene_prijave_na_dan_3112" name="nerijesene_prijave_na_dan_3112"
                                       value="{{ $podaci->nerijesene_prijave_na_dan_3112 }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                        </div>

                    </div>

                </fieldset>
                <h1> Istrage </h1>
                <fieldset>
                    <h2></h2>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label>Neriješene istrage na dan (01.01) *</label>
                                <input id="nerijesene_prijave_na_dan_0101_istrage"
                                       name="nerijesene_prijave_na_dan_0101_istrage"
                                       value="{{ $podaci->nerijesene_prijave_na_dan_0101_istrage }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Naredjene istrage *</label>
                                <input id="zaprimljene_prijave_istrage" name="zaprimljene_prijave_istrage"
                                       value="{{ $podaci->zaprimljene_prijave_istrage }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Ukupno u radu *</label>
                                <input id="ukupno_u_radu_istrage" name="ukupno_u_radu_istrage" type="number"
                                       value="{{ $podaci->ukupno_u_radu_istrage }}"
                                       onkeypress="return isNumberKey(event)"
                                       class="form-control required">
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label>Ukupno riješeno *</label>
                                <input id="ukupno_rijeseno_istrage" name="ukupno_rijeseno_istrage"
                                       value="{{ $podaci->ukupno_rijeseno_istrage }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>


                            <div class="form-group">
                                <label>Naredbe o obustavi istrage *</label>
                                <input id="naredbe_o_nepokretanju_istrage" name="naredbe_o_nepokretanju_istrage"
                                       value="{{ $podaci->naredbe_o_nepokretanju_istrage }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Neriješene istrage na dan (31.12) *</label>
                                <input id="nerijesene_prijave_na_dan_3112_istrage"
                                       name="nerijesene_prijave_na_dan_3112_istrage"
                                       value="{{ $podaci->nerijesene_prijave_na_dan_3112_istrage }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                        </div>

                    </div>
                </fieldset>

                <h1>Optužnice podignute i potvrđene </h1>
                <fieldset>
                    <h2></h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Podignute optužnice *</label>
                                <input id="podignute_optuznice" name="podignute_optuznice"
                                       value="{{ $podaci->podignute_optuznice }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Potvrdjene optužnice *</label>
                                <input id="potvrdjene_optuznice" name="potvrdjene_optuznice"
                                       value="{{ $podaci->potvrdjene_optuznice }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                        </div>
                    </div>
                </fieldset>

                <h1>Pravosnažne Sudske odluke</h1>
                <fieldset>
                    <h2></h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Pravosnažne Odbijajuće presude *</label>
                                <input id="pravosnazne_odbijajuce_presude" name="pravosnazne_odbijajuce_presude"
                                       value="{{ $podaci->pravosnazne_odbijajuce_presude }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Pravosnažne Oslobađajuće presude *</label>
                                <input id="pravosnazne_oslobadjajuce_presude" name="pravosnazne_oslobadjajuce_presude"
                                       value="{{ $podaci->pravosnazne_oslobadjajuce_presude }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Pravosnažne Ukupno Osuđujuće *</label>
                                <input id="pravosnazne_ukupno_osudjujuce" name="pravosnazne_ukupno_osudjujuce"
                                       value="{{ $podaci->pravosnazne_ukupno_osudjujuce }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Pravnosnažna Uslovna osuda *</label>
                                <input id="pravosnazne_uslovna_osuda" name="pravosnazne_uslovna_osuda"
                                       value="{{ $podaci->pravosnazne_uslovna_osuda }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Pravnosnažna Zatvorska kazna *</label>
                                <input id="pravosnazne_zatvorska_kazna" name="pravosnazne_zatvorska_kazna"
                                       value="{{ $podaci->pravosnazne_zatvorska_kazna }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Pravnosnažna Novčana kazna *</label>
                                <input id="pravosnazne_novcana_kazna" name="pravosnazne_novcana_kazna"
                                       value="{{ $podaci->pravosnazne_novcana_kazna }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                        </div>

                    </div>
                </fieldset>
                <h1>Nepravosnažne Sudske odluke</h1>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nepravnosnažne odbijajuće presude *</label>
                                <input id="nepravosnazne_odbijajuce_presude" name="nepravosnazne_odbijajuce_presude"
                                       value="{{ $podaci->nepravosnazne_odbijajuce_presude }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Nepravnosnažne oslobađajuća presuda *</label>
                                <input id="nepravosnazne_oslobadjajuce_presude"
                                       value="{{ $podaci->nepravosnazne_oslobadjajuce_presude }}"
                                       name="nepravosnazne_oslobadjajuce_presude"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Nepravnosnažne Ukupno osuđujuća presuda *</label>
                                <input id="nepravosnazne_ukupno_osudjujuce" name="nepravosnazne_ukupno_osudjujuce"
                                       value="{{ $podaci->nepravosnazne_ukupno_osudjujuce }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nepravnosnažne Zatvorska kazna *</label>
                                <input id="nepravosnazne_zatvorska_kazna" name="nepravosnazne_zatvorska_kazna"
                                       value="{{ $podaci->nepravosnazne_zatvorska_kazna }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Nepravnosnažne Uslovna Osuda *</label>
                                <input id="nepravosnazne_uslovna_osuda" name="nepravosnazne_uslovna_osuda"
                                       value="{{ $podaci->nepravosnazne_uslovna_osuda }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>

                            <div class="form-group">
                                <label>Nepravnosnažne Novčana Kazna *</label>
                                <input id="nepravosnazne_novcana_kazna" name="nepravosnazne_novcana_kazna"
                                       value="{{ $podaci->nepravosnazne_novcana_kazna }}"
                                       onkeypress="return isNumberKey(event)" type="number"
                                       class="form-control required">
                            </div>
                        </div>
                    </div>
                </fieldset>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input id="snimif" name="snimif" style="display:none;" type="text">
            </form>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/css/iCheck/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/steps/jquery.steps.css') }}">
@stop

@section('js')
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
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

