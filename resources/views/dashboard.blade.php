@extends('layouts.layout')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <p>Total Pengiriman</p>
                  <p class="font-weight-bold">3 Bulan Terakhir</p>
                  <h3>{{ $countPengiriman }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('pengiriman') }}" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <p>Lokasi Terbanyak</p>
                  <p class="font-weight-bold">{{ $trendLokasi[0]->nama_lokasi }} </p>
                  <h3>{{ $trendLokasi[0]->total }}<sup style="font-size: 20px"></sup></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <p>Total Kurir</p>
                  <p>.</p>
                  <h3>{{ $countKurir }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>Barang Terbanyak</p>
                  <p class="font-weight-bold">{{ $trendBarang[0]->nama_barang }} </p>
                  <h3>{{ $trendBarang[0]->total }}<sup style="font-size: 20px"></sup></h3>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

        <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="pie_chart" style="height:450px;"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="pie_outlet" style="height:450px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('custom-page-script')
    <script src="{{ asset('js/code.highcharts.com_highcharts.js') }}"></script>
    <script src="{{ asset('js/code.highcharts.com_modules_exporting.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Data Barang
            var barang = <?php echo json_encode($listBarang); ?>;
            var options = {
                chart: {
                    renderTo: 'pie_chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },

                title: {
                    text: 'Grafik Barang'
                },
                tooltip: {
                    pointFormat: '{series.nama_barang}<b>{point.percentage:.0f}%</b></b>',
                    percentageDecimals: 2
                },
                series: [{
                    type: 'pie',
                    name: 'Total Persentase'
                }]
            }

            // List Data
            myarray = [];
            $.each(barang, function(index, val) {
                myarray[index] = [val.nama_barang, val.total];
            });

            options.series[0].data = myarray;
            chart = new Highcharts.Chart(options);

            //GET lokasi
            var lokasi = <?php echo json_encode($listLokasi); ?>;
            var options_lokasi = {
                chart: {
                    renderTo: 'pie_outlet',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },

                title: {
                    text: 'Grafik Lokasi'
                },
                tooltip: {
                    pointFormat: '{series.nama_lokasi}<b>{point.percentage:.0f}%</b>',
                    percentageDecimals: 3
                },


                series: [{
                    type: 'pie',
                    name: 'Total Persentase'
                }]
            }

            // List Data
            array_lokasi = [];
            $.each(lokasi, function(index, val) {
                array_lokasi[index] = [val.nama_lokasi, val.total];
            });

            options_lokasi.series[0].data = array_lokasi;
            chart = new Highcharts.Chart(options_lokasi);

        });
    </script>
@endsection