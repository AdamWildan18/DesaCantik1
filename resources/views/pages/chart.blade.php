<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'center',
            text: 'Grafik Data Kependudukan'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Kependudukan'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                }
            }
        },

        tooltip: {
            pointFormat: '<span style="color:{point.color}">Jumlah {point.name}</span>: <b>{point.y}</b><br/>'
        },

        series: [{
            name: "Penduduk",
            colorByPoint: true,
            data: [{
                    name: "Keluarga",
                    y: {{ $response.keluarga }},
                },
                {
                    name: "Penduduk",
                    y: {{ $pendudukCount }},
                },
                {
                    name: "Meninggal",
                    y: {{ $meninggalCount }},

                },
                {
                    name: "Pindah",
                    y: {{ $pindahCount }},

                },
            ]
        }],

    });

    Highcharts.chart('chart2', {
        chart: {
            plotBackgroundColor: true,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '<span style="color:{point.color}">Jumlah {point.name}</span>: <b>{point.y}</b><br/>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            colorByPoint: true,
            data: [{
                name: 'Perempuan',
                y: {{ $perempuan }},
            }, {
                name: 'Laki-laki',
                y: {{ $lakilaki }}
            }]
        }]
    });

</script>
