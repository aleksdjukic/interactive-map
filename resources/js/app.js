import {hoverData} from "./populate";

require('./bootstrap');

import "placeholder-loading/src/scss/placeholder-loading.scss";

import html2pdf from 'html2pdf.js';

const charts = require('./charts');
const populate = require('./populate');
const language = require('./language');
require('lc-switch/lc_switch.min');
const QRCode = require('qrcode');
const ClipboardJS = require('clipboard/dist/clipboard.min');

const Navigo = require("navigo");
let router;
let locale;
let last_visited_page;

window.addEventListener("load", () => {

    locale = language.getLanguage();

    router = new Navigo('/');

    router
        .on('/', index)
        .on('/:language', ({ data }) => {
            indexLanguage(data);
        })
        .on('/:language/tuzilastvo/:id', ({ data, params, queryString }) => {
            tuzilastvo(data, params, queryString);
        })
        .on('/:language/tuzilastvo/:id/praceni-predmeti-korupcije', ({ data, params, queryString }) => {
            PPK(data, params, queryString);
        })
        .on('/:language/tuzilastvo/:id/compare', ({ data, params, queryString }) => {
            compare(data, params, queryString);
        })
        .on('/:language/tuzilastvo-group/:id', ({ data, params, queryString }) => {
            tuzilastvoGroup(data, params, queryString);
        })
        .resolve();

    initMapHandler();
    initCompareData();
    initDarkMode();
    initShare();

    // preloader
    $('.preloader').addClass('d-none');
    $('body').css('overflow-y', 'auto');


    $('#tuzilastvo_godina').on('change', function (){
        let godina = $('#tuzilastvo_godina option:selected').val();
        router.navigate('/'+locale+'/tuzilastvo/'+window.markedHoverData+'?godina='+godina);
    });

    $('#tuzilastvo_godina_group').on('change', function (){
        let godina = $('#tuzilastvo_godina_group option:selected').val();
        router.navigate('/'+locale+'/tuzilastvo-group/'+window.tuzilastvoGroup+'?godina='+godina);
    });

    $('.prepend_year').each(function (){
        let old_href = $(this).attr('href');
        $(this).attr('href', old_href+'?godina='+(parseInt(new Date().getFullYear())-1))
    })
});

function index () {
    last_visited_page = router.getCurrentLocation().url;
    language.setLanguage('bs');
    hidePopup();
    hidePopupCompare();
    clearMarkerOnMap();
    window.selectedAreaOnMap = []
    // hide html element
    $('#hoverDataContainer').addClass('d-none');
}

function indexLanguage (data) {
    last_visited_page = router.getCurrentLocation().url;
    language.setLanguage(data.language);
    hidePopup();
    hidePopupCompare();
    clearMarkerOnMap();
    window.selectedAreaOnMap = []
    // hide html element
    $('#hoverDataContainer').addClass('d-none');
}

function tuzilastvo(data, params, queryString) {
    last_visited_page = router.getCurrentLocation().url;
    hidePopupCompare();

    updateLinks(data.id, queryString);

    $('#compare_btn, #compare_icon').removeClass('d-none');
    $('.share_save_pdf').removeClass('d-none');
    $('.share_save_pdf_compare').addClass('d-none');


    // get data from API
    if (params !== null) {
        if (params['godina'] !== null) {
            populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData, null, params['godina']);
        } else {
            populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData);
        }
    } else {
        populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData);
    }

    language.setLanguage(data.language);
    clearMarkerOnMap();
    window.markedHoverData = data.id;
    resetContent();

    if (data.id === 'tuzilastvo-bih') {
        window.selectedAreaOnMap = [
            'tuzilastvo-unsko-sanskog-kantona',
            'kantonalno-tuziteljstvo-kantona-10-livno',
            'tuziteljstvo-zapadnohercegovacke-zupanije',
            'tuziteljstvo-hercegovacko-neretvanskog-kantona',
            'kantonalno-tuzilastvo-sarajevo',
            'tuzilastvo-kantona-gorazde',
            'tuzilastvo-zenicko-dobojskog-kantona',
            'tuziteljstvo-srednjobosanskog-kantona',
            'tuzilastvo-tuzlanskog-kantona',
            'kantonalno-tuziteljstvo-posavskog-kantona-orasje',
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ];
        window.selectedColorClass = 'dot-color-2';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    } else if (data.id === 'posebno-odjeljenje-ojt-banja-luka') {
        window.selectedAreaOnMap = [
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ];
        window.selectedColorClass = 'dot-color-5';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    } else if (data.id === 'posebno-odjeljenje-republicko-tuzilastvo-rs') {
        window.selectedAreaOnMap = [
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ];
        window.selectedColorClass = 'dot-color-6';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    }
    else {
        // mark on map
        window.selectedAreaOnMap = [data.id];
        window.selectedColorClass = 'active';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    }

    charts.miniChart(data.id);

    axios.get('/api/tuzilastvo/'+data.id+'?'+queryString)  .then(function (response) {
        showPopup();
        populate.dataPopup(response.data, response.data.podatak[0], response.data.visoka_korupcija[0]);

        setTimeout(function (){
            hoverData(data.id);
        }, 300)
    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {

            $('#popupLoader, #tuzilastvo_godina_group').addClass('d-none');
            // show html element
            $('#hoverDataContainer, #myTab, #tuzilastvo_godina').removeClass('d-none');

            // select tab and set hrefs on btns
            selectTab(data.id);
        });
}

// mark on map hack
window.selectedAreaOnMap = [];
function tuzilastvoGroup(data, params, queryString) {

    last_visited_page = router.getCurrentLocation().url;
    hidePopupCompare();

    updateLinks(data.id, queryString);


    language.setLanguage(data.language);
    clearMarkerOnMap();
    resetContent();

    $('#compare_btn, #compare_icon').addClass('d-none');
    $('.share_save_pdf').removeClass('d-none');
    $('.share_save_pdf_compare').addClass('d-none');

    let url_godina
    // get data from API
    populate.yearsDropdown('#tuzilastvo_godina_group', 'okruzno-javno-tuzilastvo-u-banjoj-luci', null, null, params['godina']);
    url_godina = '&godina='+params['godina'];
    window.tuzilastvoGroup = data.id;
    let naziv = JSON.parse('{"bs":"..."}');

    if (data.id === '1') {
        window.selectedAreaOnMap = [
            'tuzilastvo-unsko-sanskog-kantona',
            'kantonalno-tuziteljstvo-kantona-10-livno',
            'tuziteljstvo-zapadnohercegovacke-zupanije',
            'tuziteljstvo-hercegovacko-neretvanskog-kantona',
            'kantonalno-tuzilastvo-sarajevo',
            'tuzilastvo-kantona-gorazde',
            'tuzilastvo-zenicko-dobojskog-kantona',
            'tuziteljstvo-srednjobosanskog-kantona',
            'tuzilastvo-tuzlanskog-kantona',
            'kantonalno-tuziteljstvo-posavskog-kantona-orasje',
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju',
            'posebno-odjeljenje-republicko-tuzilastvo-rs',
            'posebno-odjeljenje-ojt-banja-luka',
            'tuzilastvo-bih'
        ];
        naziv = JSON.parse('{' +
            '"bs":"Ukupno tužilaštva u BIH",' +
            '"en":"Total prosecutor\'s offices in BiH"' +
            '}');
        window.selectedColorClass = 'dot-color-1';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    } else if (data.id === '3') {
        window.selectedAreaOnMap = [
            'tuzilastvo-unsko-sanskog-kantona',
            'kantonalno-tuziteljstvo-kantona-10-livno',
            'tuziteljstvo-zapadnohercegovacke-zupanije',
            'tuziteljstvo-hercegovacko-neretvanskog-kantona',
            'kantonalno-tuzilastvo-sarajevo',
            'tuzilastvo-kantona-gorazde',
            'tuzilastvo-zenicko-dobojskog-kantona',
            'tuziteljstvo-srednjobosanskog-kantona',
            'tuzilastvo-tuzlanskog-kantona',
            'kantonalno-tuziteljstvo-posavskog-kantona-orasje'
        ];
        naziv = JSON.parse('{' +
            '"bs":"Tužilački sistem FBIH",' +
            '"en":"FBIH Prosecutorial System"' +
            '}');
        window.selectedColorClass = 'dot-color-3';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    } else if (data.id === '4') {
        window.selectedAreaOnMap = [
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju',
            'posebno-odjeljenje-republicko-tuzilastvo-rs',
            'posebno-odjeljenje-ojt-banja-luka'
        ];
        naziv = JSON.parse('{' +
            '"bs":"Tužilački sistem RS",' +
            '"en":"RS Prosecutorial System"' +
            '}');
        window.selectedColorClass = 'dot-color-4';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    }

    axios.get('/api/tuzilastvo-group?slugs='+window.selectedAreaOnMap.join()+url_godina)  .then(function (response) {
        showPopup();
        response.data['naziv'] = naziv;
        populate.dataPopup(response.data, response.data.podatak[0], response.data.visoka_korupcija[0]);
    }).catch(function (error) {
        console.log(error);
    })
        .then(function () {
            $('#popupLoader, #hoverDataContainer, #myTab, #tuzilastvo_godina').addClass('d-none');
            $('#tuzilastvo_godina_group').removeClass('d-none');
            // select tab and set hrefs on btns
            selectTab(data.id);
        });
}

function compare(data, params, queryString) {
    last_visited_page = router.getCurrentLocation().url;

    updateLinks(data.id, queryString);

    if (params !== null) {
        if (params['godina'] !== undefined) {
            populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData, null, params['godina']);
        } else {
            populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData);
        }

        if (params['tuzilastvo'] !== undefined) {
            loadCompareData(data.id, params['godina'], params['tuzilastvo'], params['godina_2']);
        }
    }

    language.setLanguage(data.language);
    clearMarkerOnMap();
    window.markedHoverData = data.id;

    resetContent();
    // resetCustomChart();


    // mark on map
    window.selectedAreaOnMap = [data.id];
    window.selectedColorClass = 'active';
    markOnMap(window.selectedAreaOnMap, window.selectedColorClass);

    $('.compare_data_holder').addClass('d-none');
    $('.share_save_pdf_compare').removeClass('d-none');
    $('.share_save_pdf').addClass('d-none');

    charts.miniChart(data.id);

    axios.get('/api/tuzilastvo/'+data.id+'?'+queryString)  .then(function (response) {
        showPopupCompare();

        setTimeout(function (){
            hoverData(data.id);
        }, 300)


        waitForData();
    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {

            $('#popupLoader').addClass('d-none');
            // show html element
            $('#hoverDataContainer').removeClass('d-none');

            // select tab and set hrefs on btns
            selectTab(data.id);
        });

}

function PPK(data, params, queryString) {
    last_visited_page = router.getCurrentLocation().url;
    hidePopupCompare();

    updateLinks(data.id, queryString);

    $('#compare_btn, #compare_icon').removeClass('d-none');
    $('.share_save_pdf').removeClass('d-none');
    $('.share_save_pdf_compare').addClass('d-none');


    // get data from API
    if (params !== null) {
        if (params['godina'] !== null) {
            populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData, null, params['godina']);
        } else {
            populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData);
        }
    } else {
        populate.yearsDropdown('#tuzilastvo_godina', data.id, window.markedHoverData);
    }

    language.setLanguage(data.language);
    clearMarkerOnMap();
    window.markedHoverData = data.id;

    if (data.id === 'tuzilastvo-bih') {
        window.selectedAreaOnMap = [
            'tuzilastvo-unsko-sanskog-kantona',
            'kantonalno-tuziteljstvo-kantona-10-livno',
            'tuziteljstvo-zapadnohercegovacke-zupanije',
            'tuziteljstvo-hercegovacko-neretvanskog-kantona',
            'kantonalno-tuzilastvo-sarajevo',
            'tuzilastvo-kantona-gorazde',
            'tuzilastvo-zenicko-dobojskog-kantona',
            'tuziteljstvo-srednjobosanskog-kantona',
            'tuzilastvo-tuzlanskog-kantona',
            'kantonalno-tuziteljstvo-posavskog-kantona-orasje',
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ];
        window.selectedColorClass = 'dot-color-2';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    } else if (data.id === 'posebno-odjeljenje-ojt-banja-luka') {
        window.selectedAreaOnMap = [
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ];
        window.selectedColorClass = 'dot-color-5';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    } else if (data.id === 'posebno-odjeljenje-republicko-tuzilastvo-rs') {
        window.selectedAreaOnMap = [
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ];
        window.selectedColorClass = 'dot-color-6';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    }
    else {
        // mark on map
        window.selectedAreaOnMap = [data.id];
        window.selectedColorClass = 'active';
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    }


    charts.miniChart(data.id);
    axios.get('/api/tuzilastvo/'+data.id+'/praceni-predmeti-korupcije?'+queryString)  .then(function (response) {
        showPopup();
        populate.praceniPostupci(response.data);
    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {

            $('#popupLoader').addClass('d-none');
            // show html element
            $('#myTab').removeClass('d-none');

            // select tab and set hrefs on btns
            selectTab(data.id);
        });
}











function clearMarkerOnMap() {
    $('.map_region').removeClass('active dot-color-1 dot-color-2 dot-color-3 dot-color-4 dot-color-5 dot-color-6');
}

function markOnMap(array, css_class = 'active') {
    for(let i = 0; i < array.length; i++){
        $('g[tuzilastvo='+array[i]+']').addClass(css_class);
    }
}

function markHoverOnMap(array, css_class = 'hover') {
    for(let i = 0; i < array.length; i++){
        $('g[tuzilastvo='+array[i]+']').addClass(css_class);
    }
}

function showPopup() {
    let popup = document.getElementById('popup');
    popup.classList.add("show");

    if ($(window).width() < 951) {
        $('html,body').scrollTop(0);
        $("body").css("overflow", "hidden");
    }
}

function hidePopup() {
    let popup = document.getElementById('popup');
    popup.classList.remove("show");

    if ($(window).width() < 951) {
        $("body").css("overflow", "auto");
    }

}


function showPopupCompare(){
    $('#popupCompare').addClass("show");

    if ($(window).width() < 951) {
        $('html,body').scrollTop(0);
        $("body").css("overflow", "hidden");
    }
}
function hidePopupCompare() {
    $('#popupCompare').removeClass('show');

    if ($(window).width() < 951) {
        $("body").css("overflow", "auto");
    }

}

function initMapHandler() {
    $('.map_region').mouseenter(function (){
        $('.map_region').removeClass('hover');
        let tuzilastvo_id = $(this).attr('tuzilastvo');
        // play audio
        $("#beep-two3")[0].play();

        markHoverOnMap([tuzilastvo_id]);
        populate.hoverData(tuzilastvo_id);
    })
    $('.map_region').mouseleave(function (){
        $('.map_region').removeClass('hover');
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);

        if (window.markedHoverData !== undefined) {
            populate.hoverData(window.markedHoverData);
        }
    })
    $('.map_region').click(function (){
        let tuzilastvo_id = $(this).attr('tuzilastvo');
        window.selectedAreaOnMap = [tuzilastvo_id];
        router.navigate('/'+locale+'/tuzilastvo/'+tuzilastvo_id);

        // play audio
        $("#beep-two2")[0].play();
    })

    // sva tuzilastva
    $('#t-all').mouseenter(function (){
        $('.map_region').removeClass('hover');
        clearMarkerOnMap();
        markHoverOnMap([
            'tuzilastvo-unsko-sanskog-kantona',
            'kantonalno-tuziteljstvo-kantona-10-livno',
            'tuziteljstvo-zapadnohercegovacke-zupanije',
            'tuziteljstvo-hercegovacko-neretvanskog-kantona',
            'kantonalno-tuzilastvo-sarajevo',
            'tuzilastvo-kantona-gorazde',
            'tuzilastvo-zenicko-dobojskog-kantona',
            'tuziteljstvo-srednjobosanskog-kantona',
            'tuzilastvo-tuzlanskog-kantona',
            'kantonalno-tuziteljstvo-posavskog-kantona-orasje',
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ], 'dot-color-1');
        // play audio
        $("#beep-two3")[0].play();

        let tuzilastvo_id = $(this).attr('tuzilastvo');
    })
    $('#t-all').mouseleave(function (){
        $('.map_region').removeClass('dot-color-1');
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    })

    // tuzilastvo BIH
    $('#t-bih').mouseenter(function (){
        $('.map_region').removeClass('hover');
        clearMarkerOnMap();
        markHoverOnMap([
            'tuzilastvo-unsko-sanskog-kantona',
            'kantonalno-tuziteljstvo-kantona-10-livno',
            'tuziteljstvo-zapadnohercegovacke-zupanije',
            'tuziteljstvo-hercegovacko-neretvanskog-kantona',
            'kantonalno-tuzilastvo-sarajevo',
            'tuzilastvo-kantona-gorazde',
            'tuzilastvo-zenicko-dobojskog-kantona',
            'tuziteljstvo-srednjobosanskog-kantona',
            'tuzilastvo-tuzlanskog-kantona',
            'kantonalno-tuziteljstvo-posavskog-kantona-orasje',
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ], 'dot-color-2');
        // play audio
        $("#beep-two3")[0].play();

        let tuzilastvo_id = $(this).attr('tuzilastvo');
    })
    $('#t-bih').mouseleave(function (){
        $('.map_region').removeClass('dot-color-2');
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    })

    // tuzilastvo FBIH
    $('#t-fbih').mouseenter(function (){
        $('.map_region').removeClass('hover');
        clearMarkerOnMap();
        markHoverOnMap([
            'tuzilastvo-unsko-sanskog-kantona',
            'kantonalno-tuziteljstvo-kantona-10-livno',
            'tuziteljstvo-zapadnohercegovacke-zupanije',
            'tuziteljstvo-hercegovacko-neretvanskog-kantona',
            'kantonalno-tuzilastvo-sarajevo',
            'tuzilastvo-kantona-gorazde',
            'tuzilastvo-zenicko-dobojskog-kantona',
            'tuziteljstvo-srednjobosanskog-kantona',
            'tuzilastvo-tuzlanskog-kantona',
            'kantonalno-tuziteljstvo-posavskog-kantona-orasje'
        ], 'dot-color-3');
        // play audio
        $("#beep-two3")[0].play();


        let tuzilastvo_id = $(this).attr('tuzilastvo');
    })
    $('#t-fbih').mouseleave(function (){
        $('.map_region').removeClass('dot-color-3');
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    })

    // tuzilastvo RS
    $('#t-rs').mouseenter(function (){
        $('.map_region').removeClass('hover');
        clearMarkerOnMap();
        markHoverOnMap([
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ], 'dot-color-4');
        // play audio
        $("#beep-two3")[0].play();

        let tuzilastvo_id = $(this).attr('tuzilastvo');
    })
    $('#t-rs').mouseleave(function (){
        $('.map_region').removeClass('dot-color-4');
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    })

    // tuzilastvo OJT
    $('#t-ojt').mouseenter(function (){
        $('.map_region').removeClass('hover');
        clearMarkerOnMap();
        markHoverOnMap([
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ], 'dot-color-5');
        // play audio
        $("#beep-two3")[0].play();

        let tuzilastvo_id = $(this).attr('tuzilastvo');
    })
    $('#t-ojt').mouseleave(function (){
        $('.map_region').removeClass('dot-color-5');
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    })

    // tuzilastvo republicko
    $('#t-rt').mouseenter(function (){
        $('.map_region').removeClass('hover');
        clearMarkerOnMap();
        markHoverOnMap([
            'okruzno-javno-tuzilastvo-u-prijedoru',
            'okruzno-javno-tuzilastvo-u-banjoj-luci',
            'okruzno-javno-tuzilastvo-u-doboju',
            'tuzilastvo-brcko-distrikta-bih',
            'okruzno-javno-tuzilastvo-u-bijeljini',
            'okruzno-javno-tuzilastvo-u-istocnom-sarajevu',
            'okruzno-javno-tuzilastvo-u-trebinju'
        ], 'dot-color-6');
        // play audio
        $("#beep-two3")[0].play();

        let tuzilastvo_id = $(this).attr('tuzilastvo');
    })
    $('#t-rt').mouseleave(function (){
        $('.map_region').removeClass('dot-color-6');
        markOnMap(window.selectedAreaOnMap, window.selectedColorClass);
    })


    //
    // prepare hover data
    //
    axios.get('/api/tuzilastvo?language='+locale)
        .then(function (response) {
            window.svaTuzilastva = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function selectTab(id) {
    const pathArray = window.location.pathname.split("/");
    if (pathArray[4] === 'praceni-predmeti-korupcije') {
        var triggerEl = document.querySelector('#tuzilastvo_podaci_visoka_korupcija-tab')
        window.bootstrap.Tab.getOrCreateInstance(triggerEl).show();
        window.bootstrap.Tab.getOrCreateInstance(triggerEl).show();
    } else {
        var triggerEl = document.querySelector('#tuzilastvo_podaci-tab')
        window.bootstrap.Tab.getOrCreateInstance(triggerEl).show();
    }
}

function updateLinks(id, queryString) {
    setTimeout(function (){
        let godina = $('#tuzilastvo_godina option:selected').val();
        // podaci tab
        $('#tuzilastvo_podaci-tab').attr('href', '/'+locale+'/tuzilastvo/'+id+'?'+queryString);
        $('#compare_btn, #compare_icon').attr('href', '/'+locale+'/tuzilastvo/'+id+'/compare?godina='+$('#tuzilastvo_godina option:selected').val());

        const pathArray = window.location.pathname.split("/");
        if (pathArray[4] === 'praceni-predmeti-korupcije') {
            $('#tuzilastvo_podaci_visoka_korupcija-tab, #export_btn, #share_icon, #share_icon_2').attr('href', '/'+locale+'/tuzilastvo/'+id+'/praceni-predmeti-korupcije?'+queryString);
        } else if (pathArray[4] === 'compare') {
            $('#export_btn, #share_icon, #share_icon_2').attr('href', '/'+locale+'/tuzilastvo/'+id+'/compare?'+queryString);
        } else {
            $('#export_btn, #share_icon, #share_icon_2').attr('href', '/'+locale+'/tuzilastvo/'+id+'?'+queryString);
            $('#tuzilastvo_podaci_visoka_korupcija-tab').attr('href', '/'+locale+'/tuzilastvo/'+id+'/praceni-predmeti-korupcije?'+queryString);
        }
    }, 150)
}

function initCompareData(){
    $('#close-popupCompare').on('click', function (){
        last_visited_page = locale+'/tuzilastvo/'+$('#compare_tuzilastvo_1 option:selected').val()+'?godina='+$('#compare_tuzilastvo_1_year option:selected').val();
        router.navigate('/'+last_visited_page);
    })
}
function waitForData(){

    $('#compare_tuzilastvo_1_holder, ' +
        '#compare_tuzilastvo_2_holder, ' +
        '#compare_tuzilastvo_1_year_holder, ' +
        '#compare_tuzilastvo_2_year_holder').html('');

    $('#compare_tuzilastvo_1_holder').append('<select id="compare_tuzilastvo_1" class="form-select"></select>');
    $('#compare_tuzilastvo_2_holder').append('<select id="compare_tuzilastvo_2" class="form-select"></select>');
    $('#compare_tuzilastvo_1_year_holder').append('<select id="compare_tuzilastvo_1_year" class="form-select"></select>');
    $('#compare_tuzilastvo_2_year_holder').append('<select id="compare_tuzilastvo_2_year" class="form-select"></select>');


    if(typeof window.svaTuzilastva !== "undefined" && typeof window.markedHoverData !== "undefined"){

        $('#compare_tuzilastvo_1').append($('<option>', {
            value: "",
            text : window.language_json[locale]['compare']['2']
        }));
        $('#compare_tuzilastvo_2').append($('<option>', {
            value: "",
            text : window.language_json[locale]['compare']['2']
        }));

        $.each(window.svaTuzilastva, function (i, value) {
            $('#compare_tuzilastvo_1').append($('<option>', {
                value: i,
                text : value['Naziv']
            }));
            $('#compare_tuzilastvo_2').append($('<option>', {
                value: i,
                text : value['Naziv']
            }));
        });

        $('#compare_tuzilastvo_1').val(window.markedHoverData).change();
        populate.yearsDropdown('#compare_tuzilastvo_1_year', window.markedHoverData, null, null, $('#tuzilastvo_godina option:selected').val());

        if (router.getCurrentLocation().params !== undefined) {
            if (router.getCurrentLocation().params.tuzilastvo !== undefined) {
                $('#compare_tuzilastvo_2').val(router.getCurrentLocation().params.tuzilastvo).change();
            }
            if (router.getCurrentLocation().params.godina_2 !== undefined) {
                populate.yearsDropdown('#compare_tuzilastvo_2_year', router.getCurrentLocation().params.tuzilastvo, null, null, router.getCurrentLocation().params.godina_2);
            }
        }


        $('#compare_tuzilastvo_1').on('change', function (){
            let tuzilastvo_slug = $(this).val();
            populate.yearsDropdown('#compare_tuzilastvo_1_year', tuzilastvo_slug, null, null, router.getCurrentLocation().params.godina);
        })

        $('#compare_tuzilastvo_2').on('change', function (){
            let tuzilastvo_slug = $(this).val();
            populate.yearsDropdown('#compare_tuzilastvo_2_year', tuzilastvo_slug, null, null, router.getCurrentLocation().params.godina_2);
        })

        $('#compare_tuzilastvo_1, #compare_tuzilastvo_2, #compare_tuzilastvo_1_year, #compare_tuzilastvo_2_year').on('change', function (){
            setTimeout(function (){
                let tuzilastvo_1 = $('#compare_tuzilastvo_1 option:selected').val();
                let tuzilastvo_2 = $('#compare_tuzilastvo_2 option:selected').val();
                let godina_1 = $('#compare_tuzilastvo_1_year option:selected').val();
                let godina_2 = $('#compare_tuzilastvo_2_year option:selected').val();
                if (
                    tuzilastvo_1 !== '' &&
                    tuzilastvo_2 !== '' &&
                    godina_1 !== '' &&
                    godina_2 !== ''
                ) {
                    window.history.replaceState('', '', '/'+locale+'/tuzilastvo/'+tuzilastvo_1+'/compare?godina='+godina_1+'&tuzilastvo='+tuzilastvo_2+'&godina_2='+$('#compare_tuzilastvo_2_year option:selected').val());
                    loadCompareData(tuzilastvo_1, godina_1, tuzilastvo_2, godina_2);
                }
            }, 300)
        })



    }
    else{
        setTimeout(waitForData, 250);
    }
}

function loadCompareData(tuzilastvo_1, godina_1, tuzilastvo_2, godina_2) {
    axios.get('/api/tuzilastvo/'+tuzilastvo_1+'?godina='+godina_1)  .then(function (response) {

        let naslov_1 = response.data.naziv[locale];


        axios.get('/api/tuzilastvo/'+tuzilastvo_2+'?godina='+godina_2)  .then(function (response2) {

            resetContent();
            resetCustomChart();


            if (typeof response.data.podatak !== undefined
                && response.data.podatak.length > 0)
            {
                populate.compare1(response.data.podatak[0]);
            }

            if (typeof response.data.visoka_korupcija !== undefined
                && response.data.visoka_korupcija.length > 0)
            {
                populate.compare1VisokaKorupcija(response.data.visoka_korupcija[0]);
            }


            let naslov_2 = response2.data.naziv[locale];

            if (typeof response2.data.podatak !== undefined
                && response2.data.podatak.length > 0)
            {
                populate.compare2(response2.data.podatak[0]);
                setTimeout(function (){
                    loadCompareChart()
                    charts.compareMultiChart(tuzilastvo_1, tuzilastvo_2, naslov_1, naslov_2);
                }, 100)
            }
            if (typeof response2.data.visoka_korupcija !== undefined
                && response2.data.visoka_korupcija.length > 0)
            {
                populate.compare2VisokaKorupcija(response2.data.visoka_korupcija[0]);
                setTimeout(function (){
                    loadCompareChart()
                    charts.compareMultiChart(tuzilastvo_1, tuzilastvo_2, naslov_1, naslov_2);
                }, 100)
            }

            $('.compare_data_holder').removeClass('d-none');
        })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {

            });
    })
        .catch(function (error) {
            console.log(error);
        });
}

function loadCompareChart() {
    $('.custom_chart_holder').each(function(){
        let largest = 0;
        $(this).find('.custom-bar-chart').each(function (i, value){
            let number = parseInt($(value).attr('data-size'));
            if (number > largest) {
                largest = number;
            }
        });


        $(this).find('.custom-bar-chart').each(function (i, value){
            let number = parseInt($(value).attr('data-size'));

            let proracun = (100*number)/largest;
            if (isNaN(proracun)) {
                $(value).css('width', "0%");
            } else {
                $(value).css('width', proracun+"%");
            }
        });
    })
}

function resetContent() {
    $('[reset_content]').html('&nbsp;');
}
function resetCustomChart() {
    $('.custom-bar-chart').attr('data-size', 0);
    loadCompareChart()
}

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function initDarkMode() {
    const inputs = document.querySelectorAll('input[type=checkbox]');
    lc_switch(inputs, {

        // (string) "checked" status label text
        on_txt      : '',

        // (string) "not checked" status label text
        off_txt     : '&#9687;',

        // (string) custom "on" color. Supports also gradients
        on_color    : "#ff8f33",

        // (bool) whether to enable compact mode
        compact_mode: true
    });

    if(getCookie('dark_mode') !== null) {
        if (getCookie('dark_mode') === '1' ) {
            $('html').addClass('dark_mode');
            lcs_on(inputs);
        } else {
            $('html').removeClass('dark_mode');
            lcs_off(inputs);
        }
    }
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        if(getCookie('dark_mode') === null) {
            $('html').addClass('dark_mode');
            lcs_on(inputs);
        } else {
            if (getCookie('dark_mode') === '1' ) {
                $('html').addClass('dark_mode');
                lcs_on(inputs);
            } else {
                $('html').removeClass('dark_mode');
                lcs_off(inputs);
            }
        }
    }


    document.querySelectorAll('input[type=checkbox]').forEach(function(el) {

        // triggered each time input is checked
        el.addEventListener('lcs-on', function (){
            // $('html').css({'transform': 'inherit', 'filter': 'invert(92%) hue-rotate(189deg)'})
            $('html').addClass('dark_mode');

            setCookie('dark_mode', 1, 365);
        });

        // triggered each time input is uncheked
        el.addEventListener('lcs-off', function (){
            $('html').removeClass('dark_mode');
            setCookie('dark_mode', 0, 365);
        });

    });
}

function initShare() {
    let shareModal;
    let shareModalEl = document.getElementById('shareModal');
    let clipboard = new ClipboardJS('#clipboard_url', {
        text: function (trigger) {
            return trigger.getAttribute('aria-label');
        },
        container: document.getElementById("shareModal")
    });
    let clipboard2 = new ClipboardJS('#clipboard_embed', {
        text: function (trigger) {
            return trigger.getAttribute('aria-label');
        },
        container: document.getElementById("shareModal")
    });

    $('.export_btn').click(function (){

        if (navigator.share) {
            navigator.share({
                title: 'Interaktivna mapa procesuiranja korupcije u Bosni i Hercegovini',
                url: window.location.href
            }).then(() => {
                console.log('Thanks for sharing!');
            })
                .catch(console.error);
        } else {
            shareModal = window.bootstrap.Modal.getOrCreateInstance(shareModalEl).show();
        }
    });

    $('#export_btn').on('click', function (){
        shareModal = window.bootstrap.Modal.getOrCreateInstance(shareModalEl).show();
    });

    shareModalEl.addEventListener('show.bs.modal', function (event) {
        let canvas = document.getElementById('qr_caavs');
        QRCode.toCanvas(canvas, window.location.href, function (error) {
            if (error) console.error(error)
            // console.log('success!');
        })

        $('#clipboard_url').attr('aria-label', window.location.href);

        $('#clipboard_embed').attr('aria-label', '<iframe src="'+window.location.href+'" title="Transparency International BiH"></iframe>');
    })

    $('.share_save_pdf').on('click', function (){
        var opt = {
            margin:       [0.3, 0.4, 0.3, 0.4],
            filename:     'Interaktivna mapa procesuiranja korupcije u Bosni i Hercegovini.pdf',
            image:        { type: 'png', quality: 0.9 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' },
            pagebreak:    { mode: ['css'], before: ['.pravosnazne_odluke_osudjujuce']}
        };
        window.dex = html2pdf().set(opt).from(document.getElementById('podaci')).save();
    });

    $('.share_save_pdf_compare').on('click', function (){
        var opt = {
            margin:       [0.3, 0.4, 0.3, 0.4],
            filename:     'Interaktivna mapa procesuiranja korupcije u Bosni i Hercegovini.pdf',
            image:        { type: 'png', quality: 0.9 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' },
            pagebreak:    { mode: ['css'], before: ['.pravosnazne_odluke_osudjujuce']}
        };
        window.dex2 = html2pdf().set(opt).from(document.getElementById('compare_content')).save();
    });

    clipboard.on('success', function(e) {

        var exampleEl = document.getElementById('clipboard_url')
        let tooltip = new bootstrap.Tooltip(exampleEl, {
            boundary: document.body // or document.querySelector('#boundary')
        })

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });

    clipboard2.on('success', function(e) {

        var exampleEl = document.getElementById('clipboard_embed')
        let tooltip = new bootstrap.Tooltip(exampleEl, {
            boundary: document.body // or document.querySelector('#boundary')
        })

        e.clearSelection();
    });

    clipboard2.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
}
