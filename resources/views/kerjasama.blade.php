@extends('layouts.app')
@section('title-page-header', 'Kerja Sama')
@section('breadcrumb')
<li class="active"><a href="{{ route('penelitian') }}">Kerja sama</a></li>
@endsection
@section('content')
<!-- Small boxes (Stat box) -->

{{-- jumlah penelitian berlangsung dan selesai --}}
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-body">
        <div class="col-md-6" style="border-right: 2px solid #eaeaea;">
          <h1 class="text-center"><b>{{$jmlkerjasamaBerlangsung}}</b></h1>
          <p class="text-center">kerja sama sedang berlangsung</p>
        </div>
        <div class="col-md-6">
          <h1 class="text-center"><b>{{$jmlkerjasamaSelesai}}</b></h1>
          <p class="text-center">kerja sama telah selesai</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h4 class="box-title">Daftar kerja sama yang sedang berlangsung</h4>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <table id="kerjasamaBerlangsung" class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th style="width: 50%;">Judul</th>
                      <th style="width: 15%;">Instansi</th>
                      <th style="width: 15%;">Tanggal mulai</th>
                      <th style="width: 15%;">Kontributor</th>
                  </tr>
              </thead>
              <tbody>
              @php
              $i = 1;
              @endphp
              @foreach ($kerjasamaBerlangsungs as $kerjasamaBerlangsung)
                <tr>
                      <td>{{$i++}}</td>
                      <td>{{$kerjasamaBerlangsung->nama_kegiatan}}</td>
                      <td>{{$kerjasamaBerlangsung->instansi}}</td>
                      <td>{{$kerjasamaBerlangsung->tanggal_awal}}</td>
                      <td>
                        @php
                          $kons = $kerjasamaBerlangsung->peneliti_semua;
                          $sp = ",";
                        @endphp
                        @foreach($kons as $kon)
                          @if(isset($kon->peneliti_psb))
                            {{$kon->peneliti_psb->pegawai->nama}}{{$sp}}
                          @else
                            {{$kon->peneliti_nonpsb->nama_peneliti}}{{$sp}}
                          @endif
                        @endforeach
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
        <h4 class="box-title">Daftar kerja sama yang telah selesai</h4>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <table id="kerjasamaSelesai" class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th style="width: 50%;">Judul</th>
                      <th style="width: 15%;">Instansi</th>
                      <th style="width: 15%;">Tanggal selesai</th>
                      <th style="width: 15%;">Kontributor</th>
                  </tr>
              </thead>
              <tbody>
              @php
                $j = 1;
              @endphp
              @foreach ($kerjasamaSelesais as $kerjasamaSelesai)
                <tr>
                      <td>{{$j++}}</td>
                      <td>{{$kerjasamaSelesai->nama_kegiatan}}</td>
                      <td>{{$kerjasamaSelesai->lokasi}}</td>
                      <td>{{$kerjasamaSelesai->tanggal_akhir}}</td>
                      <td>
                        @php
                          $kons = $kerjasamaSelesai->peneliti_semua;
                          $sp = ", "
                        @endphp
                        @foreach($kons as $kon)
                          @if(isset($kon->peneliti_psb))
                            {{$kon->peneliti_psb->pegawai->nama}}{{$sp}}
                          @else
                            {{$kon->peneliti_nonpsb->nama_peneliti}}{{$sp}}
                          @endif
                        @endforeach
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
    $('#kerjasamaBerlangsung').DataTable({

    });

} );

$(document).ready( function () {
    $('#kerjasamaSelesai').DataTable({

    });
} );

</script>
@endsection