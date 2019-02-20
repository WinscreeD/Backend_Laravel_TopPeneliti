@extends('layouts.app')

@section('title-page-header', 'Beranda')
{{-- @section('breadcrumb', 'Beranda') --}}

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #3c8dbc; color: white;">
      <div class="inner">
        <h3>{{$peneliti}}</h3>
        <p>Jumlah Total Peneliti</p>
      </div>
      
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #00c0ef; color: white;">
      <div class="inner">
        <h3>{{$penelitian}}</h3>
        <p>Jumlah Total Penelitian</p>
      </div>
      {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #00a65a; color: white;">
      <div class="inner">
        <h3>{{$kerjasama}}</h3>
        <p>Jumlah Total Kerja Sama</p>
      </div>
      {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #f39c12; color: white;">
      <div class="inner">
        <h3>{{$seminarWorkshop}}</h3>

        <p>Jumlah Total Seminar Ilmiah</p>
      </div>
      
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #f56954; color: white;">
      <div class="inner">
        <h3>{{$pengmas}}</h3>

        <p>Jumlah Total Pengmas</p>
      </div>
      
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #605ca8; color: white;">
      <div class="inner">
        <h3>{{$pengmas}}</h3>

        <p>Jumlah Total Publikasi</p>
      </div>
      
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="box box-info">
      <div class="box-header with-border">
        {{-- <a href="{{url("/export_excel")}}"><button class="btn btn-success"><i class="fa fa-download"></i>  Export to Excel</button></a> --}}

        <h4>Rangkuman kegiatan</h4>
      </div>
      <div id="kegiatanPeneliti" style="width:95%; height:400px;"></div>
    </div>
  </div>
</div>
@endsection


@section('script')

<script type="text/javascript">
  $(function () { 
    var myChart = Highcharts.chart('kegiatanPeneliti', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Kegiatan Penelitian Trop BRC Tiga Tahun Terakhir'
        },
        xAxis: {
            categories: ['{{$tigaThnLalu}}', '{{$duaThnLalu}}', '{{$thnLalu}}', '{{$thnIni}}']
        },
        yAxis: {
            title: {
                text: 'Jumlah Kegiatan'
            }
        },
        series: [{
            name: 'Penelitian',
            data: [{{$penelitianTigaThnLalu}}, {{$penelitianDuaThnLalu}}, {{$penelitianThnLalu}}, {{$penelitianThnIni}}]
        },{
            name: 'Kerjasama',
            data: [{{$kerjasamaTigaThnLalu}}, {{$kerjasamaDuaThnLalu}}, {{$kerjasamaThnLalu}},{{$kerjasamaThnIni}}]
        },{
            name: 'Seminar Ilmiah',
            data: [{{$seminarWorkshopTigaThnLalu}}, {{$seminarWorkshopDuaThnLalu}}, {{$seminarWorkshopThnLalu}},{{$seminarWorkshopThnIni}}]
        },{
            name: 'Pengabdian Masyarakat',
            data: [{{$pengmasTigaThnLalu}}, {{$pengmasDuaThnLalu}}, {{$pengmasThnLalu}},{{$pengmasThnIni}}]
        },{
            name: 'Publikasi',
            data: [{{$pubTigaThnlalu}}, {{$pubDuaThnlalu}}, {{$pubThnlalu}},{{$pubThnini}}]
        }]

    });
  });
</script>
@endsection