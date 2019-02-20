@extends('layouts.app')
@section('title-page-header', 'Seminar Ilmiah')
@section('breadcrumb')
<li class="active"><a href="{{ route('seminar_workshop') }}">Seminar Ilmiah</a></li>
@endsection

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
         <h4 class="box-title">Regional seminar ilmiah</h4>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <div id="regionalSeminar"></div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
         <h4 class="box-title">Peran seminar ilmiah</h4>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <div id="peranSeminar"></div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h4>Daftar kegiatan seminar ilmiah</h4>
      </div>
      <div class="box-body">
        <div>
          <table id="seminars" class="table table-striped">
              <thead>
                  <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 35%;">Nama Kegiatan</th>
                      <th style="width: 15%;">Lokasi</th>
                      <th style="width: 15%;">Tanggal Dilaksanakan</th>
                      <th style="width: 15%;">Peserta</th> 
                      <th style="width: 15%;">Tingkat</th>
                  </tr>
              </thead>
              <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($seminars as $key1 => $seminar)
                <tr>
                      <td>{{$i++}}</td>
                      <td>{{$seminar->nama_kegiatan}}</td>
                      <td>{{$seminar->lokasi}}</td>
                      <td>{{$seminar->tanggal_akhir}}</td>
                      <td>
                        @php
                          $kons = $seminar->peneliti_semua;
                          $sp = ",";
                        @endphp
                        <ul>
                        @foreach($kons as $key2 => $kon)
                          @if(isset($kon->peneliti_psb))

                            <li>{{$kon->peneliti_psb->pegawai->nama}} <b>({{$peran[$key1][$key2]}})</b></li>
              
                          
                          @else
                            <li> {{$kon->peneliti_nonpsb->nama_peneliti}} <b>({{$peran[$key1][$key2]}})</b></li>
                          @endif
                        @endforeach
                      </ul>
                      </td>
                      <td>{{$seminar->kategori_kegiatan->nama_kategori}}</td>
                </tr>
              @endforeach
              </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

@endsection


@section('script')
<script>
  $(document).ready( function () {
      $('#seminars').DataTable();
  } );

  // Build the chart
  //grafik seminar
Highcharts.chart('regionalSeminar', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<h3>Jumlah Seminar Ilmiah Berdasarkan Regional</h3>'
    },
    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f} kegiatan</b>'
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
        name: 'Regional',
        colorByPoint: true,
        data: [{
            name: 'Tingkat Nasional',
            y: {{$jmlNasional}},
            sliced: true,
            selected: true
        }, {
            name: 'Tingkat Internasional',
            y: {{$jmlInternasional}}
        }]
    }]
});

Highcharts.chart('peranSeminar', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<h3>Jumlah Seminar Ilmiah Berdasarkan Peran</h3>'
    },
    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f} kegiatan</b>'
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
        name: 'Peran',
        colorByPoint: true,
        data: [{
            name: 'Peserta',
            y: {{$sbgPeserta}},
            sliced: true,
            selected: true
        }, {
            name: 'Pemakalah Oral',
            y: {{$sbgOral}}
        }, {
            name: 'Pemakalah Poster',
            y: {{$sbgPoster}}
        }, {
            name: 'Keynote Speaker',
            y: {{$sbgKeynote}}
        }]
    }]
});
</script>
@endsection