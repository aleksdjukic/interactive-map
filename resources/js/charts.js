import Chart from "chart.js/auto";
const language = require('./language');
window.$ = window.jQuery = require('jquery');

// ***********************
// ***********************
// MINI CHART - HOVER DATA
// ***********************
// ***********************
let myChart;

let locale = language.getLanguage();
export function miniChart(tuzilastvo_id){
    let chartStatus = Chart.getChart('chart1'); // <canvas> id
    if (chartStatus !== undefined) {
        updateChart(tuzilastvo_id);
    } else {
        initChart(tuzilastvo_id);
    }
}
export function initChart(id) {

    let labels = [];
    let datasets_ = [];
    axios.get('/api/tuzilastvo/'+id+'/chart')  .then(function (response) {

        labels = response.data.godine;

        const podaci = response.data.podaci;
        const entries = Object.entries(podaci);

        const colors = [
            '#6469CE',
            '#77ACCA',
            '#77CA89',
            '#B2DF8A',
            // '#1F78B4'
        ]

        for(let i = 0; i < entries.length; i++){
            datasets_.push(
                {
                    label: window.language_json[locale]['hover_chart'][entries[i][0]],
                    lineTension: 0.3,
                    backgroundColor: colors[i],
                    borderColor: colors[i],
                    data: entries[i][1],
                    // borderWidth: 3
                }
            )
        }

        const data = {
            labels: labels,
            datasets: datasets_
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: false,
                        position: "top",
                        labels: {
                            // color: 'rgb(255, 99, 132)'
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            display: true
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            display: false
                        }
                        // ,stacked: true
                    }

                }
            }
        };

        myChart = new Chart(
            document.getElementById('chart1'),
            config
        );

    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {

        });
}
export function updateChart(id) {

    axios.get('/api/tuzilastvo/'+id+'/chart')  .then(function (response) {
        const podaci = response.data.podaci;
        const entries = Object.entries(podaci);

        for(let i = 0; i < entries.length; i++){
            myChart.data.datasets[i].data = entries[i][1];
            myChart.data.datasets[i].label = window.language_json[locale]['hover_chart'][entries[i][0]];
        }

        myChart.update();
    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {

        });
}

// ***********************
// ***********************
// MINI CHART - HOVER DATA
// ***********************
// ***********************



// ***********************
// ***********************
// COMPARE MULTI CHART
// ***********************
// ***********************
let compareChart;
let compareChartNaslov, compareChartNaslov2;
export function compareMultiChart(tuzilastvo_1, tuzilastvo_2, naslov_1, naslov_2){
    compareChartNaslov = naslov_1;
    compareChartNaslov2 = naslov_2;
    let chartStatus = Chart.getChart('compareMultiChart'); // <canvas> id
    if (chartStatus !== undefined) {
        updateCompareMultiChart(tuzilastvo_1, tuzilastvo_2);
    } else {
        initCompareMultiChart(tuzilastvo_1, tuzilastvo_2);
    }
}
export function initCompareMultiChart(tuzilastvo_1, tuzilastvo_2) {

    let labels = [];
    let datasets_ = [];
    axios.get('/api/tuzilastvo/compare-chart?slug_1='+tuzilastvo_1+'&slug_2='+tuzilastvo_2)  .then(function (response) {

        labels = response.data.godine;
        // let borderDash = borderDash: [10, 10, 10, 10, 10, 10, 10, 5, 5, 5, 5, 5];

        const podaci = response.data.podaci;
        const entries = Object.entries(podaci);
        const colors = [
            '#6469CE',
            '#8453A2',
            '#77ACCA',
            '#77CA89',
            '#B2DF8A',
            '#D4EDBD',

            '#6469CE',
            '#8453A2',
            '#77ACCA',
            '#77CA89',
            '#B2DF8A',
            '#D4EDBD',
        ]

        for(let i = 0; i < entries.length; i++){
            datasets_.push(
                {
                    label: window.language_json[locale]['compare_chart'][entries[i][0]],
                    lineTension: 0.3,
                    backgroundColor: colors[i],
                    borderColor: colors[i],
                    data: entries[i][1],
                    borderDash: [(i > 5 ) ? 7 : 0],
                    hidden: (i==0 || i==2 || i==6 || i==8) ? false : true,
                    // borderWidth: 3
                }
            )
        }

        const data = {
            labels: labels,
            datasets: datasets_
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    htmlLegend: {
                        // ID of the container to put the legend in
                        containerID: 'legend-container',
                    },
                    legend: {
                        display: false,
                        position: "top",
                        labels: {
                            // color: 'rgb(255, 99, 132)'
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            display: true
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            display: true
                        }
                        // ,stacked: true
                    }

                }
            },
            plugins: [htmlLegendPlugin],
        };

        compareChart = new Chart(
            document.getElementById('compareMultiChart'),
            config
        );

    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {

        });


}
export function updateCompareMultiChart(tuzilastvo_1, tuzilastvo_2) {

    axios.get('/api/tuzilastvo/compare-chart?slug_1='+tuzilastvo_1+'&slug_2='+tuzilastvo_2)  .then(function (response) {
        const podaci = response.data.podaci;
        const entries = Object.entries(podaci);

        for(let i = 0; i < entries.length; i++){
            compareChart.data.datasets[i].data = entries[i][1];
            compareChart.data.datasets[i].label = window.language_json[locale]['compare_chart'][entries[i][0]];
        }

        compareChart.update();
    })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {

        });
}
//
// function addComparedData(id) {
//     axios.get('/api/tuzilastvo/'+id+'/chart')  .then(function (response) {
//         const podaci = response.data.podaci;
//         const entries = Object.entries(podaci);
//
//         for(let i = 0; i < entries.length; i++){
//             compareChart.data.datasets.push({
//                 label: entries[i][0],
//                 data: entries[i][1]
//             });
//         }
//
//         compareChart.update();
//     })
//         .catch(function (error) {
//             console.log(error);
//         })
//         .then(function () {
//
//         });
// }





const getOrCreateLegendList = (chart, id) => {
    const legendContainer = document.getElementById(id);
    return legendContainer;
};

let brojac = 0;

const createLegendItem = (item, chart, legend) => {

    if (brojac === 0 ){
        const naslov = document.createElement('div');
        naslov.classList.add('legend_naslov');
        const naslov_text = document.createTextNode(compareChartNaslov);
        naslov.appendChild(naslov_text);
        legend.appendChild(naslov);
    }
    if (brojac === 6 ){
        const naslov = document.createElement('div');
        naslov.classList.add('legend_naslov');
        const naslov_text = document.createTextNode(compareChartNaslov2);
        naslov.appendChild(naslov_text);
        legend.appendChild(naslov);
    }


    const li = document.createElement('div');
    li.classList.add('col-4');
    li.classList.add('text-start');
    li.classList.add('d-flex');
    // li.style.alignItems = 'center';
    // li.style.cursor = 'pointer';
    // li.style.display = 'block';
    // li.style.flexDirection = 'row';
    // li.style.marginLeft = '10px';

    li.onclick = () => {
        const { type } = chart.config;
        if (type === 'pie' || type === 'doughnut') {
            // Pie and doughnut charts only have a single dataset and visibility is per item
            chart.toggleDataVisibility(item.index);
        } else {
            chart.setDatasetVisibility(item.datasetIndex, !chart.isDatasetVisible(item.datasetIndex));
        }
        chart.update();
    };

    // Color box
    const boxSpan = document.createElement('span');
    boxSpan.style.background = item.fillStyle;
    boxSpan.style.borderColor = item.strokeStyle;
    boxSpan.style.borderWidth = item.lineWidth + 'px';
    boxSpan.style.display = 'inline-block';
    boxSpan.style.height = '10px';
    boxSpan.style.marginRight = '10px';
    boxSpan.style.width = '10px';
    boxSpan.style.borderRadius = '20px';
    boxSpan.style.position = 'relative';
    boxSpan.style.top = '6px';
    boxSpan.style.textAlign = 'center';
    boxSpan.style.top = '6px';
    boxSpan.style.top = '6px';
    boxSpan.style.fontSize = '6px';
    boxSpan.style.color = '#ffffff';
    boxSpan.style.fontWeight = '900';

    if (brojac > 5 ) {
        const textL = document.createTextNode("|");
        boxSpan.appendChild(textL);
    }

    // Text
    const textContainer = document.createElement('p');
    textContainer.style.color = item.fontColor;
    textContainer.style.margin = 0;
    textContainer.style.padding = 0;
    textContainer.style.display = 'inline-block';
    textContainer.style.width = 'calc(100% - 20px)';
    textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

    const text = document.createTextNode(item.text);
    textContainer.appendChild(text);

    li.appendChild(boxSpan);
    li.appendChild(textContainer);
    legend.appendChild(li);


    brojac++;
};

const htmlLegendPlugin = {
    id: 'htmlLegend',
    afterUpdate(chart, args, options) {
        brojac = 0;
        const ul = getOrCreateLegendList(chart, options.containerID);

        // Remove old legend items
        while (ul.firstChild) ul.firstChild.remove();

        // Reuse the built-in legendItems generator
        chart.options.plugins.legend.labels.generateLabels(chart)
            .forEach(item => createLegendItem(item, chart, ul));
    }
};

// ***********************
// ***********************
// COMPARE MULTI CHART
// ***********************
// ***********************




// ***********************
// ***********************
// PRAVOSNAZNE SUDSKE 1
// ***********************
// ***********************
let pravosnazne_odluke_chart;
export function pravosnazne_odluke(tuzilastvo){
    if (typeof CanvasJS == 'undefined') {
        $.loadScript('/js/canvasjs.min.js', function(){
            initPravosnazneOdlukeChart(tuzilastvo);
            initPravosnazneOdlukeOsudjujuceChart(tuzilastvo);
        });
    } else {
        initPravosnazneOdlukeChart(tuzilastvo);
        initPravosnazneOdlukeOsudjujuceChart(tuzilastvo);
    }
}
function initPravosnazneOdlukeChart(tuzilastvo) {
    CanvasJS.addColorSet("customColorSet1",
    [//colorSet Array
    "#77CA89",
    "#A6CEE3",
    "#4689C7"
    ]);

    pravosnazne_odluke_chart = new CanvasJS.Chart("pravosnazne_odluke",
        {
            theme: "light2",
            colorSet:  "customColorSet1",
            data: [
                {
                    type: "pie",
                    startAngle:  -220,
                    showInLegend: false,
                    toolTipContent: "{y} - #percent %",
                    // yValueFormatString: "#,##0,,.## Million",
                    legendText: "{indexLabel}",
                    dataPoints: [
                        {  y: tuzilastvo.pravosnazne_ukupno_osudjujuce, indexLabel: window.language_json[locale]['sudske_odluke']['1'], exploded: true },
                        {  y: tuzilastvo.pravosnazne_oslobadjajuce_presude, indexLabel: window.language_json[locale]['sudske_odluke']['2'] },
                        {  y: tuzilastvo.pravosnazne_odbijajuce_presude, indexLabel: window.language_json[locale]['sudske_odluke']['3'] },
                    ]
                }
            ]
        });
    pravosnazne_odluke_chart.render();
}
// ***********************
// ***********************
// PRAVOSNAZNE SUDSKE 2
// ***********************
// ***********************
let pravosnazne_odluke_osudjujuce_chart;
function initPravosnazneOdlukeOsudjujuceChart(tuzilastvo) {

    CanvasJS.addColorSet("customColorSet1",
        [//colorSet Array
            "#77CA89",
            "#A6CEE3",
            "#4689C7"
        ]);

    pravosnazne_odluke_osudjujuce_chart = new CanvasJS.Chart("pravosnazne_odluke_osudjujuce",
        {
            theme: "light2",
            colorSet:  "customColorSet1",
            data: [
                {
                    type: "pie",
                    startAngle:  -220,
                    showInLegend: false,
                    toolTipContent: "{y} - #percent %",
                    // yValueFormatString: "#,##0,,.## Million",
                    legendText: "{indexLabel}",
                    dataPoints: [
                        {  y: tuzilastvo.pravosnazne_zatvorska_kazna, indexLabel: window.language_json[locale]['sudske_odluke']['6'], exploded: true },
                        {  y: tuzilastvo.pravosnazne_uslovna_osuda, indexLabel: window.language_json[locale]['sudske_odluke']['7'] },
                        {  y: tuzilastvo.pravosnazne_novcana_kazna, indexLabel: window.language_json[locale]['sudske_odluke']['8'] },
                    ]
                }
            ]
        });
    pravosnazne_odluke_osudjujuce_chart.render();
}


jQuery.loadScript = function (url, callback) {
    jQuery.ajax({
        url: url,
        dataType: 'script',
        success: callback,
        async: true
    });
}
