const charts = require("./charts");
const language = require('./language');
let locale = language.getLanguage();

export function dataPopup(tuzilastvo, podaci, visoka_korupcija) {
    $('#popup h2 .popup_title').text(tuzilastvo.naziv[locale]);

    // prijave
    $('#popup [nerijesene_prijave_na_dan_0101]').text(podaci.nerijesene_prijave_na_dan_0101);
    $('#popup [zaprimljene_prijave]').text(podaci.zaprimljene_prijave);
    $('#popup [ukupno_u_radu]').text(podaci.ukupno_u_radu);
    $('#popup [ukupno_rijeseno]').text(podaci.ukupno_rijeseno);
    $('#popup [naredbe_o_nepokretanju]').text(podaci.naredbe_o_nepokretanju);
    $('#popup [nerijesene_prijave_na_dan_3112]').text(podaci.nerijesene_prijave_na_dan_3112);

    if(visoka_korupcija !== undefined) {
        $('#popup [nerijesene_prijave_na_dan_0101_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_0101);
        $('#popup [zaprimljene_prijave_visoka_korupcija]').text(visoka_korupcija.zaprimljene_prijave);
        $('#popup [ukupno_u_radu_visoka_korupcija]').text(visoka_korupcija.ukupno_u_radu);
        $('#popup [ukupno_rijeseno_visoka_korupcija]').text(visoka_korupcija.ukupno_rijeseno);
        $('#popup [naredbe_o_nepokretanju_visoka_korupcija]').text(visoka_korupcija.naredbe_o_nepokretanju);
        $('#popup [nerijesene_prijave_na_dan_3112_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_3112);
    }

    //istrage
    $('#popup [nerijesene_prijave_na_dan_0101_istrage]').text(podaci.nerijesene_prijave_na_dan_0101_istrage);
    $('#popup [zaprimljene_prijave_istrage]').text(podaci.zaprimljene_prijave_istrage);
    $('#popup [ukupno_u_radu_istrage]').text(podaci.ukupno_u_radu_istrage);
    $('#popup [ukupno_rijeseno_istrage]').text(podaci.ukupno_rijeseno_istrage);
    $('#popup [naredbe_o_nepokretanju_istrage]').text(podaci.naredbe_o_nepokretanju_istrage);
    $('#popup [nerijesene_prijave_na_dan_3112_istrage]').text(podaci.nerijesene_prijave_na_dan_3112_istrage);

    if(visoka_korupcija !== undefined) {
        $('#popup [nerijesene_prijave_na_dan_0101_istrage_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_0101_istrage);
        $('#popup [zaprimljene_prijave_istrage_visoka_korupcija]').text(visoka_korupcija.zaprimljene_prijave_istrage);
        $('#popup [ukupno_u_radu_istrage_visoka_korupcija]').text(visoka_korupcija.ukupno_u_radu_istrage);
        $('#popup [ukupno_rijeseno_istrage_visoka_korupcija]').text(visoka_korupcija.ukupno_rijeseno_istrage);
        $('#popup [naredbe_o_nepokretanju_istrage_visoka_korupcija]').text(visoka_korupcija.naredbe_o_nepokretanju_istrage);
        $('#popup [nerijesene_prijave_na_dan_3112_istrage_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_3112_istrage);
    }

    //optuznice
    $('#popup [podignute_optuznice]').text(podaci.podignute_optuznice);
    $('#popup [potvrdjene_optuznice]').text(podaci.potvrdjene_optuznice);

    if(visoka_korupcija !== undefined) {
        $('#popup [podignute_optuznice_visoka_korupcija]').text(visoka_korupcija.podignute_optuznice);
        $('#popup [potvrdjene_optuznice_visoka_korupcija]').text(visoka_korupcija.potvrdjene_optuznice);
    }

    //pravosnazne presude
    $('#popup [pravosnazne_odbijajuce_presude]').text(podaci.pravosnazne_odbijajuce_presude);
    $('#popup [pravosnazne_oslobadjajuce_presude]').text(podaci.pravosnazne_oslobadjajuce_presude);
    $('#popup [pravosnazne_ukupno_osudjujuce]').text(podaci.pravosnazne_ukupno_osudjujuce);
    $('#popup [pravosnazne_zatvorska_kazna]').text(podaci.pravosnazne_zatvorska_kazna);
    $('#popup [pravosnazne_uslovna_osuda]').text(podaci.pravosnazne_uslovna_osuda);
    $('#popup [pravosnazne_novcana_kazna]').text(podaci.pravosnazne_novcana_kazna);

    if(visoka_korupcija !== undefined) {
        $('#popup [pravosnazne_odbijajuce_presude_visoka_korupcija]').text(visoka_korupcija.pravosnazne_odbijajuce_presude);
        $('#popup [pravosnazne_oslobadjajuce_presude_visoka_korupcija]').text(visoka_korupcija.pravosnazne_oslobadjajuce_presude);
        $('#popup [pravosnazne_ukupno_osudjujuce_visoka_korupcija]').text(visoka_korupcija.pravosnazne_ukupno_osudjujuce);
        $('#popup [pravosnazne_zatvorska_kazna_visoka_korupcija]').text(visoka_korupcija.pravosnazne_zatvorska_kazna);
        $('#popup [pravosnazne_uslovna_osuda_visoka_korupcija]').text(visoka_korupcija.pravosnazne_uslovna_osuda);
        $('#popup [pravosnazne_novcana_kazna_visoka_korupcija]').text(visoka_korupcija.pravosnazne_novcana_kazna);
    }

    //nepravosnazne presude
    $('#popup [nepravosnazne_odbijajuce_presude]').text(podaci.nepravosnazne_odbijajuce_presude);
    $('#popup [nepravosnazne_oslobadjajuce_presude]').text(podaci.nepravosnazne_oslobadjajuce_presude);
    $('#popup [nepravosnazne_ukupno_osudjujuce]').text(podaci.nepravosnazne_ukupno_osudjujuce);
    $('#popup [nepravosnazne_zatvorska_kazna]').text(podaci.nepravosnazne_zatvorska_kazna);
    $('#popup [nepravosnazne_uslovna_osuda]').text(podaci.nepravosnazne_uslovna_osuda);
    $('#popup [nepravosnazne_novcana_kazna]').text(podaci.nepravosnazne_novcana_kazna);

    if(visoka_korupcija !== undefined) {
        $('#popup [nepravosnazne_odbijajuce_presude_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_odbijajuce_presude);
        $('#popup [nepravosnazne_oslobadjajuce_presude_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_oslobadjajuce_presude);
        $('#popup [nepravosnazne_ukupno_osudjujuce_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_ukupno_osudjujuce);
        $('#popup [nepravosnazne_zatvorska_kazna_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_zatvorska_kazna);
        $('#popup [nepravosnazne_uslovna_osuda_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_uslovna_osuda);
        $('#popup [nepravosnazne_novcana_kazna_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_novcana_kazna);
    }
    charts.pravosnazne_odluke(podaci);
    if (podaci.godina < 2019) {
        $('.data_nepravosnazne').addClass('d-none');
        $('.data_pravosnazne').removeClass('d-none');
    } else {
        $('.data_nepravosnazne').removeClass('d-none');
        $('.data_pravosnazne').addClass('d-none');
    }
}

export function hoverData(id) {
    $('#hoverDataContainer').removeClass('d-none');

    // hover data
    $('#hoverDataContainer h3').text(window.svaTuzilastva[id]['Naziv']);
    $('#hoverDataContainer [data-godina]').text(window.svaTuzilastva[id]['Godina']);
    $('#hoverDataContainer [data-prijava]').text(window.svaTuzilastva[id]['Ukupno u radu ( Prijava )']);
    $('#hoverDataContainer [data-istraga]').text(window.svaTuzilastva[id]['Ukupno u radu ( Istraga )']);
    $('#hoverDataContainer [data-optuznice]').text(window.svaTuzilastva[id]['Potvrđene optužnice']);
    $('#hoverDataContainer [data-presude]').text(window.svaTuzilastva[id]['Ukupno osuđujućih presuda ( Pravosnažnih )']);
    $('#hoverDataContainer [data-nepresude]').text(window.svaTuzilastva[id]['Ukupno osuđujućih presuda ( Nepravosnažnih )']);
}

export function yearsDropdown(element, id, oldId = null, fun_call = null, selectedyear = null) {

    if (oldId !== id) {
        axios.get('/api/tuzilastvo/'+id+'/godine')
            .then(function (response) {
                let godine = response.data;

                $(element).html('');
                // $(element).append('<option value="">Molimo izaberite</option>');
                for (let i=0; i<godine.length; i++) {
                    if (selectedyear !== null) {
                        if (parseInt(godine[i]) === parseInt(selectedyear)) {
                            $(element).append('<option value="'+godine[i]+'" selected="selected">'+godine[i]+'. '+window.language_json[locale]['compare']['1']+'</option>');
                        } else {
                            $(element).append('<option value="'+godine[i]+'">'+godine[i]+'. '+window.language_json[locale]['compare']['1']+'</option>');
                        }
                    } else {
                        $(element).append('<option value="'+godine[i]+'">'+godine[i]+'. '+window.language_json[locale]['compare']['1']+'</option>');
                    }
                }

                fun_call;
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

export function compare1(podatak) {
    // prijave
    $('#popupCompare [nerijesene_prijave_na_dan_0101]').text(podatak.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [zaprimljene_prijave]').text(podatak.zaprimljene_prijave);
    $('#popupCompare [zaprimljene_prijave_chart]').attr('data-size', podatak.zaprimljene_prijave);
    $('#popupCompare [ukupno_u_radu]').text(podatak.ukupno_u_radu);
    $('#popupCompare [ukupno_u_radu_chart]').attr('data-size', podatak.ukupno_u_radu);
    $('#popupCompare [ukupno_rijeseno]').text(podatak.ukupno_rijeseno);
    $('#popupCompare [ukupno_rijeseno_chart]').attr('data-size', podatak.ukupno_rijeseno);
    $('#popupCompare [naredbe_o_nepokretanju]').text(podatak.naredbe_o_nepokretanju);
    $('#popupCompare [naredbe_o_nepokretanju_chart]').attr('data-size', podatak.naredbe_o_nepokretanju);
    $('#popupCompare [nerijesene_prijave_na_dan_3112]').text(podatak.nerijesene_prijave_na_dan_3112);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_3112);
    // istrage
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage]').text(podatak.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage]').text(podatak.zaprimljene_prijave_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage_chart]').attr('data-size', podatak.zaprimljene_prijave_istrage);
    $('#popupCompare [ukupno_u_radu_istrage]').text(podatak.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_u_radu_istrage_chart]').attr('data-size', podatak.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage]').text(podatak.ukupno_rijeseno_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage_chart]').attr('data-size', podatak.ukupno_rijeseno_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage]').text(podatak.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage_chart]').attr('data-size', podatak.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage]').text(podatak.nerijesene_prijave_na_dan_3112_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_3112_istrage);
    // optuznice
    $('#popupCompare [podignute_optuznice]').text(podatak.podignute_optuznice);
    $('#popupCompare [podignute_optuznice_chart]').attr('data-size', podatak.podignute_optuznice);
    $('#popupCompare [potvrdjene_optuznice]').text(podatak.potvrdjene_optuznice);
    $('#popupCompare [potvrdjene_optuznice_chart]').attr('data-size', podatak.potvrdjene_optuznice);
    // pravosnazne
    $('#popupCompare [pravosnazne_odbijajuce_presude]').text(podatak.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_odbijajuce_presude_chart]').attr('data-size', podatak.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude]').text(podatak.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude_chart]').attr('data-size', podatak.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce]').text(podatak.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce_chart]').attr('data-size', podatak.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_zatvorska_kazna]').text(podatak.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_zatvorska_kazna_chart]').attr('data-size', podatak.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_uslovna_osuda]').text(podatak.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_uslovna_osuda_chart]').attr('data-size', podatak.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_novcana_kazna]').text(podatak.pravosnazne_novcana_kazna);
    $('#popupCompare [pravosnazne_novcana_kazna_chart]').attr('data-size', podatak.pravosnazne_novcana_kazna);
    // nepravosnazne
    $('#popupCompare [nepravosnazne_odbijajuce_presude]').text(podatak.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_odbijajuce_presude_chart]').attr('data-size', podatak.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude]').text(podatak.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude_chart]').attr('data-size', podatak.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce]').text(podatak.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce_chart]').attr('data-size', podatak.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_zatvorska_kazna]').text(podatak.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_zatvorska_kazna_chart]').attr('data-size', podatak.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_uslovna_osuda]').text(podatak.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_uslovna_osuda_chart]').attr('data-size', podatak.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_novcana_kazna]').text(podatak.nepravosnazne_novcana_kazna);
    $('#popupCompare [nepravosnazne_novcana_kazna_chart]').attr('data-size', podatak.nepravosnazne_novcana_kazna);
}

export function compare1VisokaKorupcija(visoka_korupcija) {
    // prijave
    $('#popupCompare [nerijesene_prijave_na_dan_0101_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [zaprimljene_prijave_visoka_korupcija]').text(visoka_korupcija.zaprimljene_prijave);
    $('#popupCompare [zaprimljene_prijave_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.zaprimljene_prijave);
    $('#popupCompare [ukupno_u_radu_visoka_korupcija]').text(visoka_korupcija.ukupno_u_radu);
    $('#popupCompare [ukupno_u_radu_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.ukupno_u_radu);
    $('#popupCompare [ukupno_rijeseno_visoka_korupcija]').text(visoka_korupcija.ukupno_rijeseno);
    $('#popupCompare [ukupno_rijeseno_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.ukupno_rijeseno);
    $('#popupCompare [naredbe_o_nepokretanju_visoka_korupcija]').text(visoka_korupcija.naredbe_o_nepokretanju);
    $('#popupCompare [naredbe_o_nepokretanju_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.naredbe_o_nepokretanju);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_3112);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_3112);
    // istrage
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage_visoka_korupcija]').text(visoka_korupcija.zaprimljene_prijave_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.zaprimljene_prijave_istrage);
    $('#popupCompare [ukupno_u_radu_istrage_visoka_korupcija]').text(visoka_korupcija.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_u_radu_istrage_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage_visoka_korupcija]').text(visoka_korupcija.ukupno_rijeseno_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.ukupno_rijeseno_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage_visoka_korupcija]').text(visoka_korupcija.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage_visoka_korupcija]').text(visoka_korupcija.nerijesene_prijave_na_dan_3112_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_3112_istrage);
    // optuznice
    $('#popupCompare [podignute_optuznice_visoka_korupcija]').text(visoka_korupcija.podignute_optuznice);
    $('#popupCompare [podignute_optuznice_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.podignute_optuznice);
    $('#popupCompare [potvrdjene_optuznice_visoka_korupcija]').text(visoka_korupcija.potvrdjene_optuznice);
    $('#popupCompare [potvrdjene_optuznice_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.potvrdjene_optuznice);
    // pravosnazne
    $('#popupCompare [pravosnazne_odbijajuce_presude_visoka_korupcija]').text(visoka_korupcija.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_odbijajuce_presude_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude_visoka_korupcija]').text(visoka_korupcija.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce_visoka_korupcija]').text(visoka_korupcija.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_zatvorska_kazna_visoka_korupcija]').text(visoka_korupcija.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_zatvorska_kazna_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_uslovna_osuda_visoka_korupcija]').text(visoka_korupcija.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_uslovna_osuda_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_novcana_kazna_visoka_korupcija]').text(visoka_korupcija.pravosnazne_novcana_kazna);
    $('#popupCompare [pravosnazne_novcana_kazna_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.pravosnazne_novcana_kazna);
    // nepravosnazne
    $('#popupCompare [nepravosnazne_odbijajuce_presude_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_odbijajuce_presude_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_zatvorska_kazna_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_zatvorska_kazna_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_uslovna_osuda_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_uslovna_osuda_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_novcana_kazna_visoka_korupcija]').text(visoka_korupcija.nepravosnazne_novcana_kazna);
    $('#popupCompare [nepravosnazne_novcana_kazna_visoka_korupcija_chart]').attr('data-size', visoka_korupcija.nepravosnazne_novcana_kazna);
}

export function compare2(podatak) {
    // prijave
    $('#popupCompare [nerijesene_prijave_na_dan_0101_2]').text(podatak.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_2_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [zaprimljene_prijave_2]').text(podatak.zaprimljene_prijave);
    $('#popupCompare [zaprimljene_prijave_2_chart]').attr('data-size', podatak.zaprimljene_prijave);
    $('#popupCompare [ukupno_u_radu_2]').text(podatak.ukupno_u_radu);
    $('#popupCompare [ukupno_u_radu_2_chart]').attr('data-size', podatak.ukupno_u_radu);
    $('#popupCompare [ukupno_rijeseno_2]').text(podatak.ukupno_rijeseno);
    $('#popupCompare [ukupno_rijeseno_2_chart]').attr('data-size', podatak.ukupno_rijeseno);
    $('#popupCompare [naredbe_o_nepokretanju_2]').text(podatak.naredbe_o_nepokretanju);
    $('#popupCompare [naredbe_o_nepokretanju_2_chart]').attr('data-size', podatak.naredbe_o_nepokretanju);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_2]').text(podatak.nerijesene_prijave_na_dan_3112);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_2_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_3112);
    // istrage
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage_2]').text(podatak.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage_2_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage_2]').text(podatak.zaprimljene_prijave_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage_2_chart]').attr('data-size', podatak.zaprimljene_prijave_istrage);
    $('#popupCompare [ukupno_u_radu_istrage_2]').text(podatak.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_u_radu_istrage_2_chart]').attr('data-size', podatak.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage_2]').text(podatak.ukupno_rijeseno_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage_2_chart]').attr('data-size', podatak.ukupno_rijeseno_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage_2]').text(podatak.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage_2_chart]').attr('data-size', podatak.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage_2]').text(podatak.nerijesene_prijave_na_dan_3112_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage_2_chart]').attr('data-size', podatak.nerijesene_prijave_na_dan_3112_istrage);
    // optuznice
    $('#popupCompare [podignute_optuznice_2]').text(podatak.podignute_optuznice);
    $('#popupCompare [podignute_optuznice_2_chart]').attr('data-size', podatak.podignute_optuznice);
    $('#popupCompare [potvrdjene_optuznice_2]').text(podatak.potvrdjene_optuznice);
    $('#popupCompare [potvrdjene_optuznice_2_chart]').attr('data-size', podatak.potvrdjene_optuznice);
    // pravosnazne
    $('#popupCompare [pravosnazne_odbijajuce_presude_2]').text(podatak.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_odbijajuce_presude_2_chart]').attr('data-size', podatak.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude_2]').text(podatak.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude_2_chart]').attr('data-size', podatak.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce_2]').text(podatak.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce_2_chart]').attr('data-size', podatak.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_zatvorska_kazna_2]').text(podatak.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_zatvorska_kazna_2_chart]').attr('data-size', podatak.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_uslovna_osuda_2]').text(podatak.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_uslovna_osuda_2_chart]').attr('data-size', podatak.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_novcana_kazna_2]').text(podatak.pravosnazne_novcana_kazna);
    $('#popupCompare [pravosnazne_novcana_kazna_2_chart]').attr('data-size', podatak.pravosnazne_novcana_kazna);
    // nepravosnazne
    $('#popupCompare [nepravosnazne_odbijajuce_presude_2]').text(podatak.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_odbijajuce_presude_2_chart]').attr('data-size', podatak.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude_2]').text(podatak.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude_2_chart]').attr('data-size', podatak.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce_2]').text(podatak.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce_2_chart]').attr('data-size', podatak.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_zatvorska_kazna_2]').text(podatak.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_zatvorska_kazna_2_chart]').attr('data-size', podatak.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_uslovna_osuda_2]').text(podatak.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_uslovna_osuda_2_chart]').attr('data-size', podatak.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_novcana_kazna_2]').text(podatak.nepravosnazne_novcana_kazna);
    $('#popupCompare [nepravosnazne_novcana_kazna_2_chart]').attr('data-size', podatak.nepravosnazne_novcana_kazna);
}

export function compare2VisokaKorupcija(visoka_korupcija) {
    // prijave
    $('#popupCompare [nerijesene_prijave_na_dan_0101_visoka_korupcija_2]').text(visoka_korupcija.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_0101);
    $('#popupCompare [zaprimljene_prijave_visoka_korupcija_2]').text(visoka_korupcija.zaprimljene_prijave);
    $('#popupCompare [zaprimljene_prijave_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.zaprimljene_prijave);
    $('#popupCompare [ukupno_u_radu_visoka_korupcija_2]').text(visoka_korupcija.ukupno_u_radu);
    $('#popupCompare [ukupno_u_radu_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.ukupno_u_radu);
    $('#popupCompare [ukupno_rijeseno_visoka_korupcija_2]').text(visoka_korupcija.ukupno_rijeseno);
    $('#popupCompare [ukupno_rijeseno_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.ukupno_rijeseno);
    $('#popupCompare [naredbe_o_nepokretanju_visoka_korupcija_2]').text(visoka_korupcija.naredbe_o_nepokretanju);
    $('#popupCompare [naredbe_o_nepokretanju_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.naredbe_o_nepokretanju);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_visoka_korupcija_2]').text(visoka_korupcija.nerijesene_prijave_na_dan_3112);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_3112);
    // istrage
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage_visoka_korupcija_2]').text(visoka_korupcija.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_0101_istrage_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_0101_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage_visoka_korupcija_2]').text(visoka_korupcija.zaprimljene_prijave_istrage);
    $('#popupCompare [zaprimljene_prijave_istrage_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.zaprimljene_prijave_istrage);
    $('#popupCompare [ukupno_u_radu_istrage_visoka_korupcija_2]').text(visoka_korupcija.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_u_radu_istrage_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.ukupno_u_radu_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage_visoka_korupcija_2]').text(visoka_korupcija.ukupno_rijeseno_istrage);
    $('#popupCompare [ukupno_rijeseno_istrage_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.ukupno_rijeseno_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage_visoka_korupcija_2]').text(visoka_korupcija.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [naredbe_o_nepokretanju_istrage_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.naredbe_o_nepokretanju_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage_visoka_korupcija_2]').text(visoka_korupcija.nerijesene_prijave_na_dan_3112_istrage);
    $('#popupCompare [nerijesene_prijave_na_dan_3112_istrage_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nerijesene_prijave_na_dan_3112_istrage);
    // optuznice
    $('#popupCompare [podignute_optuznice_visoka_korupcija_2]').text(visoka_korupcija.podignute_optuznice);
    $('#popupCompare [podignute_optuznice_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.podignute_optuznice);
    $('#popupCompare [potvrdjene_optuznice_visoka_korupcija_2]').text(visoka_korupcija.potvrdjene_optuznice);
    $('#popupCompare [potvrdjene_optuznice_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.potvrdjene_optuznice);
    // pravosnazne
    $('#popupCompare [pravosnazne_odbijajuce_presude_visoka_korupcija_2]').text(visoka_korupcija.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_odbijajuce_presude_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.pravosnazne_odbijajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude_visoka_korupcija_2]').text(visoka_korupcija.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_oslobadjajuce_presude_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.pravosnazne_oslobadjajuce_presude);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce_visoka_korupcija_2]').text(visoka_korupcija.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_ukupno_osudjujuce_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.pravosnazne_ukupno_osudjujuce);
    $('#popupCompare [pravosnazne_zatvorska_kazna_visoka_korupcija_2]').text(visoka_korupcija.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_zatvorska_kazna_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.pravosnazne_zatvorska_kazna);
    $('#popupCompare [pravosnazne_uslovna_osuda_visoka_korupcija_2]').text(visoka_korupcija.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_uslovna_osuda_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.pravosnazne_uslovna_osuda);
    $('#popupCompare [pravosnazne_novcana_kazna_visoka_korupcija_2]').text(visoka_korupcija.pravosnazne_novcana_kazna);
    $('#popupCompare [pravosnazne_novcana_kazna_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.pravosnazne_novcana_kazna);
    // nepravosnazne
    $('#popupCompare [nepravosnazne_odbijajuce_presude_visoka_korupcija_2]').text(visoka_korupcija.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_odbijajuce_presude_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nepravosnazne_odbijajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude_visoka_korupcija_2]').text(visoka_korupcija.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_oslobadjajuce_presude_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nepravosnazne_oslobadjajuce_presude);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce_visoka_korupcija_2]').text(visoka_korupcija.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_ukupno_osudjujuce_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nepravosnazne_ukupno_osudjujuce);
    $('#popupCompare [nepravosnazne_zatvorska_kazna_visoka_korupcija_2]').text(visoka_korupcija.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_zatvorska_kazna_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nepravosnazne_zatvorska_kazna);
    $('#popupCompare [nepravosnazne_uslovna_osuda_visoka_korupcija_2]').text(visoka_korupcija.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_uslovna_osuda_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nepravosnazne_uslovna_osuda);
    $('#popupCompare [nepravosnazne_novcana_kazna_visoka_korupcija_2]').text(visoka_korupcija.nepravosnazne_novcana_kazna);
    $('#popupCompare [nepravosnazne_novcana_kazna_visoka_korupcija_2_chart]').attr('data-size', visoka_korupcija.nepravosnazne_novcana_kazna);
}

export function praceniPostupci(data) {
    $('#popup h2 .popup_title').text(data.naziv[locale]);
    $('#tuzilastvo_podaci_visoka_korupcija').html('');

    for (let i=0; i < data.ppk.length; i++) {

        let template =
            "<div class=\"card card-custom mb-3\">\n" +
            "<div class=\"card-header bg-white\">\n" +
            "    <h5 class=\"float-start\">"+data.ppk[i].neformalni_naziv_predmeta[locale]+"</h5>\n" +
            "    <span class=\"float-end card-date\"><span><span data-i18n=\"ppk.vrijeme_izvrsenja_djela\"></span>"+data.ppk[i].vrijeme_izvrsenja_djela[locale]+"</span></span>\n" +
            "</div>\n" +
            "<div class=\"card-body\">" +
            "   <p class=\"card-text mb-0\">\n" +
            "       <span data-i18n=\"ppk.naziv_krivicnog_djela\"></span>\n" +
            "       <span class=\"fw-bold\">"+data.ppk[i].naziv_krivicnog_djela[locale]+"</span>\n" +
            "   </p>" +
            "   <p class=\"card-text mb-0\">\n" +
            "       <span data-i18n=\"ppk.broj_optuzenih_u_predmetu\"></span>\n" +
            "       <span class=\"fw-bold\">"+data.ppk[i].broj_optuzenih_u_predmetu+"</span>\n" +
            "   </p>" +
            "   <p class=\"card-text mb-0\">\n" +
            "       <span data-i18n=\"ppk.sud_pred_kojim_se_vodi_postupak\"></span>\n" +
            "       <span class=\"fw-bold\">"+data.ppk[i].sud_pred_kojim_se_vodi_postupak[locale]+"</span>\n" +
            "   </p>" +
            "   <p class=\"card-text mb-0\">\n" +
            "       <span data-i18n=\"ppk.postupajuce_tuzilastvo\"></span>\n" +
            "       <span class=\"fw-bold\">"+data.ppk[i].postupajuce_tuzilastvo[locale]+"</span>\n" +
            "   </p>" +
            "   <div class=\"collapse pt-3\" id=\"collapse-"+i+"\">" +
            "       <p class=\"card-text mb-0\">\n" +
            "           <span data-i18n=\"ppk.datum_podnosenja_krivicne_prijave\"></span>\n" +
            "           <span class=\"fw-bold\">"+data.ppk[i].datum_podnosenja_krivicne_prijave[locale]+"</span>\n" +
            "</p>" +
            "       <p class=\"card-text mb-0\">\n" +
            "           <span data-i18n=\"ppk.datum_donosenja_naredbe_o_sprovodjenju_istrage\"></span>\n" +
            "           <span class=\"fw-bold\">"+data.ppk[i].datum_donosenja_naredbe_o_sprovodjenju_istrage[locale]+"</span>\n" +
            "       </p>" +
            "       <p class=\"card-text mb-0\">\n" +
            "           <span data-i18n=\"ppk.preduzimanje_posebnih_istraznih_radnji\"></span>\n" +
            "           <span class=\"fw-bold\">"+data.ppk[i].preduzimanje_posebnih_istraznih_radnji[locale]+"</span>\n" +
            "       </p>" +
            "       <p class=\"card-text mb-0\">\n" +
            "           <span data-i18n=\"ppk.datum_podizanja_optuznice\"></span>\n" +
            "           <span class=\"fw-bold\">"+data.ppk[i].datum_podizanja_optuznice[locale]+"</span>\n" +
            "       </p>" +
            "       <p class=\"card-text mb-0\">\n" +
            "           <span data-i18n=\"ppk.datum_potvrdjivanja_optuznice\"></span>\n" +
            "           <span class=\"fw-bold\">"+data.ppk[i].datum_potvrdjivanja_optuznice[locale]+"</span>\n" +
            "       </p>" +
            "       <p class=\"card-text mb-0\">\n" +
            "           <span data-i18n=\"ppk.datum_donosenja_prvostepene_presude\"></span>\n" +
            "           <span class=\"fw-bold\">"+data.ppk[i].datum_donosenja_prvostepene_presude[locale]+"</span>\n" +
            "       </p>" +
            "       <p class=\"card-text mb-0\">\n" +
            "           <span data-i18n=\"ppk.optuzeni\"></span>\n" +
            "           <span class=\"fw-bold\">"+data.ppk[i].optuzeni[locale]+"</span>\n" +
            "       </p>" ;
            // "       <p class=\"card-text mb-0\">\n" +
            // "           <span data-i18n=\"ppk.postupajuci_sud\"></span>\n" +
            // "           <span class=\"fw-bold\">"+data.ppk[i].postupajuci_sud[locale]+"</span>\n" +
            // "       </p>" +
            // "       <p class=\"card-text mb-0\">\n" +
            // "           <span data-i18n=\"ppk.postupajuce_tuzilastvo\"></span>\n" +
            // "           <span class=\"fw-bold\">"+data.ppk[i].postupajuce_tuzilastvo[locale]+"</span>\n" +
            // "       </p>" +
            // "       <p class=\"card-text mb-0\">\n" +
            // "           <span data-i18n=\"ppk.naziv_krivicnog_djela_izrecenim\"></span>\n" +
            // "           <span class=\"fw-bold\">"+data.ppk[i].naziv_krivicnog_djela_izrecenim[locale]+"</span>\n" +
            // "       </p>" +
        if (data.ppk[i].zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz[locale] !== undefined) {
            template +=
                "       <p class=\"card-text mb-0\">\n" +
                "           <span data-i18n=\"ppk.zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz\"></span>\n" +
                "           <span class=\"fw-bold\">"+data.ppk[i].zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz[locale]+"</span>\n" +
                "       </p>";
        }
        if (data.ppk[i].vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm[locale] !== undefined) {
            template +=
                "       <p class=\"card-text mb-0\">\n" +
                "           <span data-i18n=\"ppk.vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm\"></span>\n" +
                "           <span class=\"fw-bold\">"+data.ppk[i].vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm[locale]+"</span>\n" +
                "       </p>";
        }
        if (data.ppk[i].da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif[locale] !== undefined) {
            template +=
                "       <p class=\"card-text mb-0\">\n" +
                "           <span data-i18n=\"ppk.da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif\"></span>\n" +
                "           <span class=\"fw-bold\">"+data.ppk[i].da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif[locale]+"</span>\n" +
                "       </p>";
        }
        if (data.ppk[i].da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd[locale] !== undefined) {
            template +=
                "       <p class=\"card-text mb-0\">\n" +
                "           <span data-i18n=\"ppk.da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd\"></span>\n" +
                "           <span class=\"fw-bold\">"+data.ppk[i].da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd[locale]+"</span>\n" +
                "       </p>";
        }
        if (data.ppk[i].da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu[locale] !== undefined) {
            template +=
                "       <p class=\"card-text mb-0\">\n" +
                "           <span data-i18n=\"ppk.da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu\"></span>\n" +
                "           <span class=\"fw-bold\">"+data.ppk[i].da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu[locale]+"</span>\n" +
                "       </p>";
        }
        template +=
            "   </div>\n" +
            "   <a data-bs-toggle=\"collapse\" href=\"#collapse-"+i+"\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapse-"+i+"\"\n" +
            "       class=\"btn btn-default btn-sm ps-0 card-more mt-2\">\n" +
            "        <img src=\"/images/more.svg\" alt=\"more_icon\">\n" +
            "        <span>Više detalja</span>\n" +
            "    </a>\n" +
            "</div>\n" +
            "</div>";

        $('#tuzilastvo_podaci_visoka_korupcija').append(
            template

            // "<div class=\"row mb-4\">"+
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.naziv_krivicnog_djela\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].naziv_krivicnog_djela[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.neformalni_naziv_predmeta\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].neformalni_naziv_predmeta[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.broj_optuzenih_u_predmetu\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].broj_optuzenih_u_predmetu+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.sud_pred_kojim_se_vodi_postupak\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].sud_pred_kojim_se_vodi_postupak[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.vrijeme_izvrsenja_djela\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].vrijeme_izvrsenja_djela[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.datum_podnosenja_krivicne_prijave\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].datum_podnosenja_krivicne_prijave[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.datum_donosenja_naredbe_o_sprovodjenju_istrage\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].datum_donosenja_naredbe_o_sprovodjenju_istrage[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.preduzimanje_posebnih_istraznih_radnji\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].preduzimanje_posebnih_istraznih_radnji[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.datum_podizanja_optuznice\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].datum_podizanja_optuznice[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.datum_potvrdjivanja_optuznice\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].datum_potvrdjivanja_optuznice[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.datum_donosenja_prvostepene_presude\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].datum_donosenja_prvostepene_presude[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.optuzeni\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].optuzeni[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.postupajuci_sud\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].postupajuci_sud[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.postupajuce_tuzilastvo\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].postupajuce_tuzilastvo[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.naziv_krivicnog_djela_izrecenim\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].naziv_krivicnog_djela_izrecenim[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].zaprijecena_sankcija_za_predmetno_krivicno_djelo_shodno_kz[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].vrsta_i_visina_izrecene_sankcije_da_li_je_sankcija_ublazena_izm[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].da_li_je_presudom_izrecena_sigurnosna_mjera_zabrane_vrsenja_paif[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].da_li_je_izrecena_mjera_oduzimanje_imovinske_koristi_pkd[locale]+"</div>" +
            // "<div class=\"col-12 fw-bold text-primary\" data-i18n=\"ppk.da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu\">&nbsp;</div>" +
            // "<div class=\"col-12\">"+data.ppk[i].da_li_je_tuzilastvo_izjavilo_zalbu_na_prvostepenu_presudu[locale]+"</div>" +
            // "</div>"

        );
    }

    $(".collapse").on('show.bs.collapse', function(e) {
        console.log($(this))
        $(this).parent().find('.card-more img').attr('src', '/images/less.svg');
        $(this).parent().find('.card-more span').text(window.language_json[locale]['ppk']['less']);
    })
    $(".collapse").on('hidden.bs.collapse', function(e) {
        console.log($(this))
        $(this).parent().find('.card-more img').attr('src', '/images/more.svg');
        $(this).parent().find('.card-more span').text(window.language_json[locale]['ppk']['more']);
    })
    window.translator.translatePageTo(locale);
}
