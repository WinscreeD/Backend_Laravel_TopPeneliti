@extends('layouts.app')
@section('title-page-header','Detail')
@section('breadcrumb')
<li class="active"><a>Detail Peneliti</a></li>
@endsection
@section('content')

{{-- Summary Profil --}}
<div class="row">
  <div class="col-sm-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>Profil dan jumlah kegiatan peneliti yang pernah dilakukan</h4>
      </div>
      <div class="box-body">
        <div class="col-md-4">
          <img class="center-block img-circle " src="{{asset('images/avatar5.png')}}" style="width: 115px; height: 115px;">
          <h3 class="text-center">{{$peneliti->pegawai->nama}}</h3>
          <p class="text-center">{{$peneliti->departemen->nama_departemen}}</p>
          <div><b>Email :</b> {{$peneliti->pegawai->email}}</div>
          <div><b>No. Hp :</b> {{$peneliti->pegawai->nomor_hp}}</div>
          <div><b>Telepon :</b> {{$peneliti->pegawai->telepon}}</div>
          <div><b>Alamat :</b> {{$peneliti->pegawai->alamat}}</div>
          @if($sumpenelitianOngoing != 0 || $sumkerjasamaOngoing != 0 || $sumpengmasOngoing != 0)
            <div><b>Status : </b><button class="btn btn-xs btn-success">Aktif</button></div>
          @else
            <div><b>Status : </b><button class="btn btn-xs btn-danger">Tidak Aktif</button></div>
          @endif
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h4>Total Penelitian</h4>
                </div>
                <div class="box-body">
                <h2 class="text-center"><b>{{$penelitianDikti}}</b></h2>
                </div>
              </div>
              <!-- /.box -->
            </div>
            {{-- end md 6 --}}
            <div class="col-md-4">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h4>Total Kerja Sama</h4>
                </div>
                <div class="box-body">
                <h2 class="text-center"><b>{{$kerjasama}}</b></h2>
                </div>
              </div>
              <!-- /.box -->   
            </div>
            <div class="col-md-4">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h4>Total Seminar Ilmiah</h4>
                </div>
                <div class="box-body">
                <h2 class="text-center"><b>{{$seminarWorkshop}}</b></h2>
                </div>
              </div>
              <!-- /.box -->
            </div>
          </div>
          {{-- end row --}}
          <div class="row">
            {{-- end md 6 --}}
            <div class="col-md-4">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h4>Total PengMas</h4>
                </div>
                <div class="box-body">
                <h2 class="text-center"><b>{{$pengmas}}</b></h2>
                </div>
              </div>
              <!-- /.box -->   
            </div>
            <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h4>Total Publikasi</h4>
                </div>
                <div class="box-body">
                <h2 class="text-center"><b>{{$jurnals}}</b></h2>
                </div>
              </div>
              <!-- /.box -->   
            </div>
          </div>
          {{-- end row --}}
        </div>
      </div>
    </div>
  </div>
</div>
@if($sumpenelitianOngoing != 0 || $sumkerjasamaOngoing != 0 || $sumpengmasOngoing != 0)
  <div class="row">
    <div class="col-sm-12">
      <div class="alert" style="background-color: #b3e8b2;">
        <p class="text-center">Saat ini {{$peneliti->pegawai->nama}} sedang melakukan <b>{{$sumpenelitianOngoing}} penelitian</b>, <b>{{$sumkerjasamaOngoing}} kerjasama</b>, dan <b>{{$sumpengmasOngoing}} pengabdian masyarakat</b>.</p>
      </div>
    </div>
  </div>
@endif
{{-- Penelitian berlangsung --}}
<div class="row">
  {{-- penelitian --}}
  @if($sumpenelitianOngoing != 0)
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h4>Penelitian yang sedang dilakukan</h4>
        </div>
        <div class="box-body">
        <table id="penelitianOngoing" class="table table-striped">
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
                  @foreach ($penelitianOngoing->Kegiatan as $pen)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$pen->nama_kegiatan}}</td>
                          <td>{{$pen->lokasi}}</td>
                          <td>{{$pen->tanggal_awal}}</td>
                          <td>
                            @php
                              $kons = $pen->peneliti_semua;
                             
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
    </div>
  @endif
  {{-- kerjasama --}}
  @if($sumkerjasamaOngoing != 0)
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h4>Kerja sama yang sedang dilakukan</h4>
        </div>
        <div class="box-body">
        <table id="kerjasamaOngoing" class="table table-striped">
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
                  @foreach ($kerjasamaOngoing->Kegiatan as $pen)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$pen->nama_kegiatan}}</td>
                          <td>{{$pen->instansi}}</td>
                          <td>{{$pen->tanggal_awal}}</td>
                          <td>
                            @php
                              $kons = $pen->peneliti_semua;
                              
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
    </div>
  @endif
  {{-- pengmas --}}
  @if($sumpengmasOngoing != 0)
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h4>Penelitian yang sedang dilakukan</h4>
        </div>
        <div class="box-body">
        <table id="pengmasOngoing" class="table table-striped">
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
                  @foreach ($pengmasOngoing->Kegiatan as $pen)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$pen->nama_kegiatan}}</td>
                          <td>{{$pen->lokasi}}</td>
                          <td>{{$pen->tanggal_awal}}</td>
                          <td>
                            @php
                              $kons = $pen->peneliti_semua;
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
    </div>
  @endif
  <div class="col-md-6">
    <div class="box box-success">
      <div class="box-header with-border">
        <h4>Seminar ilmiah yang pernah diikuti</h4>
      </div>
      <div class="box-body">
        <div class="chart">
          <div id="seminarPeneliti"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>Kegiatan yang pernah dilakukan</h4>
      </div>
      <div class="box-body">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#penelitian" data-toggle="tab">Penelitian</a></li>
            <li><a href="#kerjasama" data-toggle="tab">Kerja sama</a></li>
            <li><a href="#seminar" data-toggle="tab">Seminar Ilmiah</a></li>
            <li><a href="#pengmas" data-toggle="tab">Pengabdian Masyarakat</a></li>
            <li><a href="#publikasi" data-toggle="tab">Publikasi</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="penelitian">
              <table id="penelitianPast" class="table table-striped">
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
                  @foreach ($penelitianPast->Kegiatan as $pen)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$pen->nama_kegiatan}}</td>
                          <td>{{$pen->lokasi}}</td>
                          <td>{{$pen->tanggal_awal}}</td>
                          <td>
                            @php
                              $kons = $pen->peneliti_semua;
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
            <!-- /.tab-pane -->
            <div class="tab-pane" id="kerjasama">
              <div>
                <table id="kerjasamaPast" class="table table-striped">
                  <thead>
                      <tr>
                          <th style="width: 5%;">No</th>
                          <th style="width: 50%;">Judul</th>
                          <th style="width: 15%;">Lokasi</th>
                          <th style="width: 15%;">Tanggal selesai</th>
                          <th style="width: 20%;">Kontributor</th>
                      </tr>
                  </thead>
                  <tbody>
                  @php
                  $i = 1;
                  @endphp
                  @foreach ($kerjasamaPast->Kegiatan as $pen)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$pen->nama_kegiatan}}</td>
                          <td>{{$pen->lokasi}}</td>
                          <td>{{$pen->tanggal_awal}}</td>
                          <td>
                            @php
                              $kons = $pen->peneliti_semua;
                              
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
            <!-- /.tab-pane -->
            <div class="tab-pane" id="seminar">
              <table id="seminarPast" class="table table-striped">
                  <thead>
                      <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 30%;">Nama Kegiatan</th>
                        <th style="width: 5%;">Lokasi</th>
                        <th style="width: 15%;">Tanggal Dilaksana</th>
                        <th style="width: 15%;">Peserta</th>
                        <th style="width: 15%;">Tingkat</th>
                      </tr>
                  </thead>
                  <tbody>
                  @php
                  $i = 1;
                  @endphp
                  @foreach ($seminarPast->Kegiatan as $key1 => $pen)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$pen->nama_kegiatan}}</td>
                          <td>{{$pen->lokasi}}</td>
                          <td>{{$pen->tanggal_akhir}}</td>
                          <td>
                            @php
                              $kons = $pen->peneliti_semua;
                              
                            @endphp
                            <ul>
                            @foreach($kons as $key2 => $kon)
                              @if(isset($kon->peneliti_psb))
                                <li>{{$kon->peneliti_psb->pegawai->nama}}<b>({{$peran[$key1][$key2]}})</b></li>
                              @else
                                <li>{{$kon->peneliti_nonpsb->nama_peneliti}}<b>({{$peran[$key1][$key2]}})</b></li>
                              @endif
                            @endforeach
                            </ul>
                          </td>
                          <td>{{$pen->kategori_kegiatan->nama_kategori}}</td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
             <!-- /.tab-pane -->
            <div class="tab-pane" id="pengmas">
              <table id="pengmasPast" class="table table-striped">
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
                  @foreach ($pengmasPast->Kegiatan as $pen)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$pen->nama_kegiatan}}</td>
                          <td>{{$pen->lokasi}}</td>
                          <td>{{$pen->tanggal_awal}}</td>
                          <td>
                            @php
                              $kons = $pen->peneliti_semua;
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
            {{-- Jurnal --}}
            <div class="tab-pane" id="publikasi">
              <table id="jurnalPen" class="table table-striped">
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
                  @foreach ($jurnalPast->Publikasi_Jurnal as $jur)
                    <tr>
                          <td>{{$i++}}</td>
                          <td>{{$jur->judul_artikel}}</td>
                          <td>{{$jur->nama_berkala}}</td>
                          <td>
                            @php
                              $kons = $jur->peneliti_semua;
                              
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
                          <td>{{$jur->status_akreditasi}}</td>
                          <td>{{$jur->tahun_terbit}}</td>
                          <td>{{$jur->volume_halaman}}</td>
                          @if(isset($jur->url))
                            <td><a href="{{$jur->url}}">Link</a></td>
                          @else
                            <td>Belum tersedia</td>
                          @endif
                      </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
    </div>
  </div>
</div>
{{-- Satistik --}}
<div class="row">
  <dir class="col-sm-12">
    <div class="box box-info">
      <div class="box-body">
        <div id="kegiatanPenelitiDetail" style="width:95%; height:400px;"></div>
      </div>
    </div>
  </dir>
</div>
@endsection


@section('script')
<script type="text/javascript">
  $(document).ready( function () {
    $('#penelitianOngoing').DataTable({

    });

  } );

  $(document).ready( function () {
    $('#kerjasamaOngoing').DataTable({

    });

  } );
  $(document).ready( function () {
    $('#pengmasOngoing').DataTable({

    });

  } );

  $(document).ready( function () {
    $('#penelitianPast').DataTable({

    });

  } );

  $(document).ready( function () {
    $('#kerjasamaPast').DataTable({

    });

  } );
  $(document).ready( function () {
    $('#seminarPast').DataTable({

    });

  } );
  $(document).ready( function () {
    $('#pengmasPast').DataTable({

    });

  } );

  $(document).ready( function () {
    $('#jurnalPen').DataTable({

    });

  } );

  //grafik kegiatan tiga tahun terakhir
  $(function () { 
    var myChart = Highcharts.chart('kegiatanPenelitiDetail', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Kegiatan {{$peneliti->pegawai->nama}} tiga tahun terakhir'
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
            data: [{{$diktiTigaThnLalu}}, {{$diktiDuaThnLalu}}, {{$diktiThnLalu}},{{$diktiThnIni}}]
        },{
            name: 'Kerjasama',
            data: [{{$kerjasamaTigaThnLalu}}, {{$kerjasamaDuaThnLalu}}, {{$kerjasamaThnLalu}},{{$kerjasamaThnIni}}]
        },{
            name: 'Seminardan Workshop',
            data: [{{$semwoTigaThnLalu}}, {{$semwoDuaThnLalu}}, {{$semwoThnLalu}},{{$semwoThnIni}}]
        },{
            name: 'Pengabdian Masyarakat',
            data: [{{$pengmasTigaThnLalu}}, {{$pengmasDuaThnLalu}}, {{$pengmasThnLalu}},{{$pengmasThnIni}}]
        }]
    });

    //grafik seminar
    var myChart = Highcharts.chart('seminarPeneliti', {
      chart: {
          type: 'pie'
      },
      title: {
          text: 'Jumlah Seminar Berdasarkan Regional'
      },
      subtitle: {
          text: 'Klik regional untuk melihat peran'
      },
      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f} kegiatan</b>'
      },

      "series": [
          {
              "name": "Regional",
              "colorByPoint": true,
              "data": [
                  {
                      "name": "Tingkat Nasional",
                      "y": {{$jmlNasional}},
                      "drilldown": "Nasional"
                  },
                  {
                      "name": "Tingkat Internasional",
                      "y": {{$jmlInternasional}},
                      "drilldown": "Internasional"
                  }
              ]
          }
      ],
      "drilldown": {
          "series": [
              {
                  "name": "Nasional",
                  "id": "Nasional",
                  "data": [
                      [
                          "Peserta",
                          {{$sbgpesertaNasional}}
                      ],
                      [
                          "Pemakalah Oral",
                          {{$sbgoralNasional}}
                      ],
                      [
                          "Pemakalah Poster",
                          {{$sbgposterNasional}}
                      ],
                      [
                          "Keynote Speaker",
                          {{$sbgkeynoteNasional}}
                      ]
                  ]
              },
              {
                  "name": "Internasional",
                  "id": "Internasional",
                  "data": [
                      [
                          "Peserta",
                          {{$sbgpesertaInternasional}}
                      ],
                      [
                          "Pemakalah Oral",
                          {{$sbgoralInternasional}}
                      ],
                      [
                          "Pemakalah Poster",
                          {{$sbgposterInternasional}}
                      ],
                      [
                          "Keynote Speaker",
                          {{$sbgkeynoteInternasional}}
                      ]
                  ]
              }
          ]
      }
    });
  });
</script>
@endsection