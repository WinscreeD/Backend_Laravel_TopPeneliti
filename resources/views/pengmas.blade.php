@extends('layouts.app')
@section('title-page-header', 'Pengabdian masyarakat')
@section('breadcrumb')
<li class="active"><a href="{{ route('pengmas') }}">Pengabdian masyarakat</a></li>
@endsection
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-body">
        <div class="col-md-6" style="border-right: 2px solid #eaeaea;">
          <h1 class="text-center"><b>{{$jmlPengmasBerlangsung}}</b></h1>
          <p class="text-center">pengabdian masyarakat sedang berlangsung</p>
        </div>
        <div class="col-md-6">
          <h1 class="text-center"><b>{{$jmlPengmasSelesai}}</b></h1>
          <p class="text-center">pengabdian masyarakat telah selesai</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
         <h4 class="box-title">Kategori pengabdian masyarakat</h4>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <div id="kategoriPengmas" style="width:100%; height:400px;"></div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h4 class="box-title">Pengabdian masyarakat yang sedang berlangsung</h4>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <table id="pengmasBerlangsung" class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th style="width: 50%;">Judul</th>
                      <th style="width: 15%;">Lokasi</th>
                      <th style="width: 15%;">Tanggal selesai</th>
                      <th style="width: 15%;">Kontributor</th>
                  </tr>
              </thead>
              <tbody>
              @php
              $i = 1;
              @endphp
              @foreach ($pengmasBerlangsungs as $pengmasBerlangsung)
                <tr>
                      <td>{{$i++}}</td>
                      <td>{{$pengmasBerlangsung->nama_kegiatan}}</td>
                      <td>{{$pengmasBerlangsung->lokasi}}</td>
                      <td>{{$pengmasBerlangsung->tanggal_awal}}</td>
                      <td>
                        @php
                          $kons = $pengmasBerlangsung->peneliti_semua;
                          $sp = ",";
                        @endphp
                        <ul>
                        @foreach($kons as $kon)
                          @if(isset($kon->peneliti_psb))
                            <li>{{$kon->peneliti_psb->pegawai->nama}}{{$sp}}</li>
                          @else
                            <li>{{$kon->peneliti_nonpsb->nama_peneliti}}{{$sp}}</li>
                          @endif
                        @endforeach
                      </ul>
                      </td>
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

<div class="row">
  <div class="col-md-12">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h4 class="box-title">Pengabdian masyarakat yang telah selesai</h4>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <table id="pengmasSelesai" class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th style="width: 50%;">Judul</th>
                      <th style="width: 15%;">Lokasi</th>
                      <th style="width: 15%;">Tanggal selesai</th>
                      <th style="width: 15%;">Kontributor</th>
                  </tr>
              </thead>
              <tbody>
              @php
                $j = 1;
              @endphp
              @foreach ($pengmasSelesais as $pengmasSelesai)
                <tr>
                      <td>{{$j++}}</td>
                      <td>{{$pengmasSelesai->nama_kegiatan}}</td>
                      <td>{{$pengmasSelesai->lokasi}}</td>
                      <td>{{$pengmasSelesai->tanggal_akhir}}</td>
                      <td>
                        @php
                          $kons = $pengmasSelesai->peneliti_semua;
                          $sp = ", "
                        @endphp
                        <ul>
                        @foreach($kons as $kon)
                          @if(isset($kon->peneliti_psb))
                            <li>{{$kon->peneliti_psb->pegawai->nama}}{{$sp}}</li>
                          @else
                            <li>{{$kon->peneliti_nonpsb->nama_peneliti}}{{$sp}}</li>
                          @endif
                        @endforeach
                      </ul>
                      </td>
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
    $('#pengmasBerlangsung').DataTable({

    });

} );

$(document).ready( function () {
    $('#pengmasSelesai').DataTable({

    });
} );
// Build the chart
  $(function () { 
    var myChart = Highcharts.chart('kategoriPengmas', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Kategori Pengmas yang paling banyak dilakukan'
        },
        subtitle: {
        text: 'Kategori berdasarkan Buku Panduan Penelitian dan Pengabdian kepada Masyarakat edisi XII'
        },
        xAxis: {
            categories: ['']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pengabdian'
            }
        },
        tooltip: {
            pointFormat: 'Jumlah Pengabdian Jenis {series.name}: <b>{point.y:f} Penelitian</b>'
        },
        series: [
        {
            name: 'PKM (Program Kemitraan Masyarakat)',
            data: [{{$jmlPKM}}]
        },{
            name: 'PKMS (Program Kemitraan Masyarakat Stimulus)',
            data: [{{$jmlPKMS}}]
        },{
            name: 'KKN-PPM (Kuliah Kerja Nyata Pembelajaran dan Pemberdayaan Masyarakat)',
            data: [{{$jmlKKNPPM}}]
        },{
            name: 'PPK (Program Pengembangan Kewirausahaan)',
            data: [{{$jmlPPK}}]
        },{
            name: 'PPPUD (Program Pengembangan Produk Unggulan Daerah)',
            data: [{{$jmlPPPUD}}]
        },{
            name: 'PPUPIK (Program Pengembangan Usaha Produk Intelektual Kampus)',
            data: [{{$jmlPPUPIK}}]
        },{
            name: 'PPDM (Program Pengembangan Desa Mitra)',
            data: [{{$jmlPPDM}}]
        },{
            name: 'PKW (Program Kemitraan Wilayah)',
            data: [{{$jmlPKW}}]
        },{
            name: 'PPMUPT (Program Pemberdayaan Masyarakat Unggulan Perguruan Tinggi)',
            data: [{{$jmlPPMUPT}}]
        },{
            name: 'PPIM (Preogram Penerapan Ipteks kepada Masyarakat)',
            data: [{{$jmlPPIM}}]
        }]
    });
  });
</script>
@endsection