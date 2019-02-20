@extends('layouts.app')
@section('title-page-header', 'Penelitian')
@section('breadcrumb')
<li class="active"><a href="{{ route('penelitian') }}">Penelitian</a></li>
@endsection
@section('content')
<!-- Small boxes (Stat box) -->

{{-- jumlah penelitian berlangsung dan selesai --}}
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-body">
        <div class="col-md-6" style="border-right: 2px solid #eaeaea;">
          <h1 class="text-center"><b>{{$jmlPenelitianBerlangsung}}</b></h1>
          <p class="text-center">penelitian sedang berlangsung</p>
        </div>
        <div class="col-md-6">
          <h1 class="text-center"><b>{{$jmlPenelitianSelesai}}</b></h1>
          <p class="text-center">penelitian telah selesai</p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- grafik kategori penelitian --}}
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
         <h4 class="box-title">Kategori penelitian</h4>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <div id="kategoriPenelitian" style="width:100%; height:400px;"></div>
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
        <h4 class="box-title">Daftar penelitian yang sedang berlangsung</h4>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <table id="penelianBerlangsung" class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th style="width: 50%;">Judul</th>
                      <th style="width: 15%;">Lokasi</th>
                      <th style="width: 15%;">Tanggal mulai</th>
                      <th style="width: 15%;">Kontributor</th>
                  </tr>
              </thead>
              <tbody>
              @php
              $i = 1;
              @endphp
              @foreach ($penelitianBerlangsungs as $penelitianBerlangsung)
                <tr>
                      <td>{{$i++}}</td>
                      <td>{{$penelitianBerlangsung->nama_kegiatan}}</td>
                      <td>{{$penelitianBerlangsung->lokasi}}</td>
                      <td>{{$penelitianBerlangsung->tanggal_awal}}</td>
                      <td>
                        @php
                          $kons = $penelitianBerlangsung->peneliti_semua;
                        
                        @endphp
                        <ul>
                        @foreach($kons as $kon)
                          @if(isset($kon->peneliti_psb))
                            <li>{{$kon->peneliti_psb->pegawai->nama}}</li>
                          @else
                            <li>{{$kon->peneliti_nonpsb->nama_peneliti}}</li>
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
        <h4 class="box-title">Daftar penelitian yang telah selesai</h4>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <table id="penelianSelesai" class="table table-striped">
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
              @foreach ($penelitianSelesais as $penelitianSelesai)
                <tr>
                      <td>{{$j++}}</td>
                      <td>{{$penelitianSelesai->nama_kegiatan}}</td>
                      <td>{{$penelitianSelesai->lokasi}}</td>
                      <td>{{$penelitianSelesai->tanggal_akhir}}</td>
                      <td>
                        @php
                          $kons = $penelitianSelesai->peneliti_semua;
                          
                        @endphp
                        <ul>
                        @foreach($kons as $kon)
                          @if(isset($kon->peneliti_psb))
                            <li>{{$kon->peneliti_psb->pegawai->nama}}</li>
                          @else
                            <li>{{$kon->peneliti_nonpsb->nama_peneliti}}</li>
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
    $('#penelianBerlangsung').DataTable({

    });

} );

$(document).ready( function () {
    $('#penelianSelesai').DataTable({

    });
} );


// Build the chart
  $(function () { 
    var myChart = Highcharts.chart('kategoriPenelitian', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Kategori penelitian yang paling banyak dilakukan'
        },
        subtitle: {
        text: 'Kategori berdasarkan Buku Panduan Penelitian dan Pengabdian kepada Masyarakat edisi XII'
        },
        xAxis: {
            categories: ['']
        },
        yAxis: {
            title: {
                text: 'Jumlah Penelitian'
            }
        },
        tooltip: {
            pointFormat: 'Jumlah Penelitian Jenis {series.name}: <b>{point.y:f} Penelitian</b>'
        },
        series: [
        {
            name: 'PD (Penelitian Dasar)',
            data: [{{$jmlPD}}]
        },{
            name: 'PT (Penelitian Terapan)',
            data: [{{$jmlPT}}]
        },{
            name: 'PP (Penelitian Pengembangan)',
            data: [{{$jmlPP}}]
        },{
            name: 'PDP(Penelitian Dosen Pemula)',
            data: [{{$jmlPDP}}]
        },{
            name: 'PKPT (Penelitian Kerjasama Antar Perguruan Tinggi)',
            data: [{{$jmlPKPT}}]
        },{
            name: 'PPS (Penelitian Pascasarjana)',
            data: [{{$jmlPPS}}]
        },{
            name: 'PDUPT (Penelitian Dasar Unggulan Perguruan Tinggi)',
            data: [{{$jmlPDUPT}}]
        },{
            name: 'PTUPT (Penelitian Terapan Unggulan Perguruan Tinggi)',
            data: [{{$jmlPTUPT}}]
        },{
            name: 'PPUPT (Penelitian Pengembangan Unggulan Perguruan Tinggi)',
            data: [{{$jmlPPUPT}}]
        },{
            name: 'KRU-PT (Konsorsium Riset Unggulan Perguruan Tinggi)',
            data: [{{$jmlKRUPT}}]
        },{
            name: 'KKS (Kebijakan Kajian Strategis)',
            data: [{{$jmlKKS}}]
        }]
    });
  });
</script>
@endsection