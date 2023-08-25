@extends('layouts.app')

@section('container')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="d-flex justify-content-end">
    <div class="card m-4 w-25 float-right">
        <div class="input-group">
            <select name="tahun" id="tahun" class="form-select form-select-sm" onchange="selectedYear()">
                <option value="">Pilih Tahun</option>
                @for ($year = date('Y'); $year >= 2000; $year--)
                    <option value="{{ $year }}"{{ ($tahun ?? '') == $year ? ' selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>
</div>
<div class="values">
    <div class="val-box">
        <i class="fas fa-user"></i>
        <div>
            <h3>Penduduk</h3>
            <span id="penduduk"></span>
        </div>
    </div>
    <div class="val-box">
        <i class="fas fa-user"></i>
        <div>
            <h3>Keluarga</h3>
            <span id="keluarga"></span>
        </div>
    </div>
    <div class="val-box">
        <i class="fas fa-user"></i>
        <div>
            <h3>Laki-laki</h3>
            <span id="laki"></span>
        </div>
    </div>
    <div class="val-box">
        <i class="fas fa-user"></i>
        <div>
            <h3>Perempuan</h3>
            <span id="perempuan"></span>
        </div>
    </div>
    <div class="val-box">
        <i class="fas fa-user"></i>
        <div>
            <h3>Pindah</h3>
            <span id="pindah"></span>
        </div>
    </div>
    <div class="val-box">
        <i class="fas fa-user"></i>
        <div>
            <h3>Meninggal</h3>
            <span id="meninggal"></span>
        </div>
    </div>

</div>
<div class="main_content_iner">
    <div class="row">
        <div class="col">
            <div class="white_box mb_30">
                <div id="line"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-7">
                <div class="white_box mb_30">
                    <div id="bar"></div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="white_box mb_30">
                    <div id="pie"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    fetch('/chart')
            .then(response => response.json())
            .then(data => {
                const chartData = data.map(item => ({
                    year: item.year,
                    totalLakiLaki: item.total_laki_laki,
                    totalPerempuan: item.total_perempuan,
                    totalPindahKota: item.total_pindah_kota,
                    totalPindahNegri: item.total_pindah_negri,
                    totalMeninggal: item.total_meninggal,
                    totalKeluarga: item.total_keluarga,
                    totalPenduduk: item.total_penduduk
                }));
                
                // Buat konfigurasi untuk Highcharts
                const chartConfig = {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Data Penduduk dan Keluarga Over Time'
                    },
                    xAxis: {
                        categories: chartData.map(item => item.year)
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    series: [
                        {
                            name: 'Laki-laki',
                            data: chartData.map(item => item.totalLakiLaki)
                        },
                        {
                            name: 'Perempuan',
                            data: chartData.map(item => item.totalPerempuan)
                        },
                        {
                            name: 'Pindah Keluar Kota',
                            data: chartData.map(item => item.totalPindahKota)
                        },
                        {
                            name: 'Pindah Keluar Negri',
                            data: chartData.map(item => item.totalPindahNegri)
                        },
                        {
                            name: 'Meninggal',
                            data: chartData.map(item => item.totalMeninggal)
                        },
                        {
                            name: 'Jumlah Keluarga',
                            data: chartData.map(item => item.totalKeluarga)
                        },
                        {
                            name: 'Jumlah Penduduk',
                            data: chartData.map(item => item.totalPenduduk)
                        }
                    ]
                };

                // Render chart
                Highcharts.chart('line', chartConfig);
            });

    function getData(year) {
        $.ajax({
            url: '/get-data', // Ganti dengan rute backend Anda
            type: 'GET',
            data: { year: year },
            success: function(response) {
                $('#penduduk').text(response.penduduk);
                $('#keluarga').text(response.keluarga);
                $('#pindah').text(response.pindah);
                $('#meninggal').text(response.meninggal);
                $('#perempuan').text(response.perempuan);
                $('#laki').text(response.laki);

                Highcharts.chart('bar', {
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
                                y: (response.keluarga),
                            },
                            {
                                name: "Penduduk",
                                y: (response.penduduk),
                            },
                            {
                                name: "Meninggal",
                                y: (response.meninggal),

                            },
                            {
                                name: "Pindah",
                                y: (response.pindah),

                            },
                        ]
                    }],

                });

                Highcharts.chart('pie', {
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
                            y: (response.perempuan),
                        }, {
                            name: 'Laki-laki',
                            y: (response.laki)
                        }]
                    }]
                });
            }
        });
    }

    function selectedYear() {
        $('#tahun').on('change', function() {
            var selectedYear = $(this).val();
            getData(selectedYear);
        });
    }

    $(document).ready(function() {
        selectedYear();
        getData($('#tahun').val());
    });

</script>


@endsection