@extends('layouts.app')
@section('title-page-header', 'Publikasi')
@section('breadcrumb')
<li class="active"><a href="{{ route('penelitian') }}">Publikasi</a></li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h4 class="box-title">Daftar publikasi Trop BRC</h4>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <table id="publikasi" class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th style="width: 50%;">Judul</th>
                      <th style="width: 15%;">Nama Berkala</th>
                      <th style="width: 15%;">Penulis</th>
                      <th style="width: 15%;">Akreditasi</th>
                      <th style="width: 15%;">Tahun Terbit</th>
                      <th style="width: 15%;">Keterangan</th>
                      <th style="width: 15%;">URL</th>
                  </tr>
              </thead>
              <tbody>
              @php
              $i = 1;
              @endphp
              @foreach ($jurnals as $jurnal)
                <tr>
                      <td>{{$i++}}</td>
                      <td>{{$jurnal->judul_artikel}}</td>
                      <td>{{$jurnal->nama_berkala}}</td>
                      <td>
                        @php
                          $kons = $jurnal->peneliti_semua;
                          
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
                      <td>{{$jurnal->status_akreditasi}}</td>
                      <td>{{$jurnal->tahun_terbit}}</td>
                      <td>{{$jurnal->volume_halaman}}</td>
                      @if(isset($jurnal->url))
                        <td><a href="{{$jurnal->url}}">Tersedia</a></td>
                      @else
                        <td>Belum tersedia</td>
                      @endif
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
    $('#publikasi').DataTable({

    });

} );
</script>
@endsection