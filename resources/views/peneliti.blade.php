@extends('layouts.app')
@section('title-page-header', 'Peneliti')
@section('breadcrumb')
<li class="active"><a href="{{ route('peneliti') }}">Peneliti</a></li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Jumlah Peneliti</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <div id="fakultas" style="width:95%; height:250px;"></div>
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
        <h4>Daftar peneliti Trop BRC</h4>
      </div>
      <div class="box-body">
        <div>
          <table id="penelitiList" class="table table-striped">
              <thead>
                  <tr>
                      <th>Nomor</th>
                      <th>Nama</th>
                      <th>Departemen</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($penelitis as $peneliti)
                <tr>
                      <td>{{$i++}}</td>
                      <td>
                        @if($peneliti->pegawai->gelar_depan != null)
                          {{$peneliti->pegawai->gelar_depan}}.
                        @endif
                         {{$peneliti->pegawai->nama}}
                        @if($peneliti->pegawai->gelar_belakang != null)
                         , {{$peneliti->pegawai->gelar_belakang}}
                        @endif
                       </td>
                        
                      <td>{{$peneliti->departemen->nama_departemen}}</td>

                      <td>
                        <a href="{{url("/detail_peneliti/{$peneliti->id_peneliti}")}}"><button class="center btn btn-primary">Detail</button></a>
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
      $('#penelitiList').DataTable();
  } );

  $(function () { 
    var myChart = Highcharts.chart('fakultas', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Jumlah peneliti Trop BRC tingkat Fakultas'
      },
      subtitle: {
          text: 'Klik kolom untuk melihat tingkat Departemen'
      },
      xAxis: {
          type: 'category'
      },
      yAxis: {
          title: {
              text: 'Jumlah peneliti'
          }

      },
      legend: {
          enabled: false
      },
      

      tooltip: {
          pointFormat: 'Jumlah peneliti dari <span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b><br/>'
      },

      "series": [
          {
              "name": "Fakultas",
              "colorByPoint": true,
              "data": [
                  {
                      "name": "FAPERTA",
                      "y": {{$jmlFaperta}},
                      "drilldown": "FAPERTA"
                  },
                  {
                      "name": "FKH",
                      "y": {{$jmlFkh}},
                      "drilldown": "FKH"
                  },
                  {
                      "name": "FPIK",
                      "y": {{$jmlFpik}},
                      "drilldown": "FPIK"
                  },
                  {
                      "name": "FAPET",
                      "y": {{$jmlFapet}},
                      "drilldown": "FAPET"
                  },
                  {
                      "name": "FAHUTAN",
                      "y": {{$jmlFahutan}},
                      "drilldown": "FAHUTAN"
                  },
                  {
                      "name": "FATETA",
                      "y": {{$jmlFateta}},
                      "drilldown": "FATETA"
                  },
                  {
                      "name": "FMIPA",
                      "y": {{$jmlFmipa}},
                      "drilldown": "FMIPA"
                  },
                  {
                      "name": "FEM",
                      "y": {{$jmlFem}},
                      "drilldown": "FEM"
                  },
                  {
                      "name": "FEMA",
                      "y": {{$jmlFema}},
                      "drilldown": "FEMA"
                  },
                  {
                      "name": "DIP",
                      "y": {{$jmlDip}},
                      "drilldown": "DIP"
                  },
                  {
                      "name": "SB",
                      "y": {{$jmlSb}}
                      
                  },
                  {
                      "name": "SPs",
                      "y": {{$jmlSps}}
                      
                  },
              ]
          }
      ],
      "drilldown": {
          "series": [
              {
                  "name": "FAPERTA",
                  "id": "FAPERTA",
                  "data": [
                      [
                          "Agronomi dan Hortikultura",
                          {{$jmlAGH}}
                      ],
                      [
                          "Ilmu Tanah dan Sumber Daya Lahan",
                          {{$jmlIlmuTanah}}
                      ],
                      [
                          "Proteksi Tanaman",
                          {{$jmlProteksiTanaman}}
                      ],
                      [
                          "Arsitektur Lanskap",
                          {{$jmlARL}}
                      ]
                  ]
              },
              {
                  "name": "FKH",
                  "id": "FKH",
                  "data": [
                      [
                          "Anatomi Fisiologi dan Farmakologi",
                          {{$jmlAnatomiFisiologi}}
                      ],
                      [
                          "Ilmu Penyakit Hewan dan Kesmavet",
                          {{$jmlIlmuPenyakitHewan}}
                      ],
                      [
                          "Klinik Reproduksi Patologi",
                          {{$jmlKlinikReproduksi}}
                      ]
                  ]
              },
              {
                  "name": "FPIK",
                  "id": "FPIK",
                  "data": [
                      [
                          "Budidaya Perairan",
                          {{$jmlBDP}}
                      ],
                      [
                          "Manajemen Sumberdaya Perairan",
                          {{$jmlMSP}}
                      ],
                      [
                          "Teknologi Hasil Perairan",
                          {{$jmlTHP}}
                      ],
                      [
                          "Pemanfaatan Sumberdaya Perikanan",
                          {{$jmlPSP}}
                      ],
                      [
                          "Ilmu dan Teknologi Kelautan",
                          {{$jmlITK}}
                      ]
                  ]
              },
              {
                  "name": "FAPET",
                  "id": "FAPET",
                  "data": [
                      [
                          "Ilmu Produksi dan Teknologi Hasil Peternakan",
                          {{$jmlIPTP}}
                      ],
                      [
                          "Ilmu Nutrisi dan Teknologi Pakan",
                          {{$jmlINTP}}
                      ]
                  ]
              },
              {
                  "name": "FAHUTAN",
                  "id": "FAHUTAN",
                  "data": [
                      [
                          "Manajemen Hutan",
                          {{$jmlMNH}}
                      ],
                      [
                          "Hasil Hutan",
                          {{$jmlHH}}
                      ],
                      [
                          "Konservasi Sumberdaya Hutan dan Ekowisata",
                          {{$jmlKSHE}}
                      ],
                      [
                          "Silvikultur",
                          {{$jmlSilvikultur}}
                      ]
                  ]
              },
              {
                  "name": "FATETA",
                  "id": "FATETA",
                  "data": [
                      [
                          "Teknik Mesin dan Biosistem",
                          {{$jmlTMB}}
                      ],
                      [
                          "Teknologi Industri Pertanian",
                         {{$jmlTIP}}
                      ],
                      [
                          "Teknik Sipil dan Lingkungan",
                          {{$jmlSIL}}
                      ],
                      [
                          "Ilmu dan Teknologi Pangan",
                          {{$jmlITP}}
                      ]
                  ]
              },
              {
                  "name": "FMIPA",
                  "id": "FMIPA",
                  "data": [
                      [
                          "Statistika",
                          {{$jmlSTK}}
                      ],
                      [
                          "Geofisika dan Meteorologi Terapan",
                          {{$jmlGFM}}
                      ],
                      [
                          "Biologi",
                          {{$jmlBIO}}
                      ],
                      [
                          "Kimia",
                          {{$jmlKIM}}
                      ],
                      [
                          "Matematika",
                          {{$jmlMAT}}
                      ],
                      [
                          "Ilmu Komputer",
                          {{$jmlKOM}}
                      ],
                      [
                          "Fisika",
                          {{$jmlFIS}}
                      ],
                      [
                          "Biokimia",
                          {{$jmlBiokim}}
                      ]
                  ]
              },
              {
                  "name": "FEM",
                  "id": "FEM",
                  "data": [
                      [
                          "Ilmu Ekonomi",
                          {{$jmlIE}}
                      ],
                      [
                          "Manajemen",
                          {{$jmlMAN}}
                      ],
                      [
                          "Agribisnis",
                          {{$jmlAGB}}
                      ],
                      [
                          "Ekonomi Sumberdaya dan Lingkungan",
                          {{$jmlESL}}
                      ]
                  ]
              },
              {
                  "name": "FEMA",
                  "id": "FEMA",
                  "data": [
                      [
                          "Gizi Masyarakat",
                          {{$jmlGM}}
                      ],
                      [
                          "Ilmu Keluarga dan Konsumen",
                          {{$jmlIKK}}
                      ],
                      [
                          "Sains Komunikasi dan Pengembangan Masyarakat",
                          {{$jmlSKPM}}
                      ]
                  ]
              },
              {
                  "name": "DIP",
                  "id": "DIP",
                  "data": [
                      [
                          "Komunikasi",
                          {{$jmlKomunikasi}}
                      ],
                      [
                          "Ekowisata",
                          {{$jmlEkow}}
                      ],
                      [
                          "Manajemen Informatika",
                          {{$jmlManIn}}
                      ],
                      [
                          "Teknik Komputer",
                          {{$jmlTekKom}}
                      ],
                      [
                          "Suvervisor Jaminan Mutu Pangan",
                          {{$jmlSJMP}}
                      ],
                      [
                          "Manajemen Industri Jasa Makanan dan Gizi",
                         {{$jmlMIJMG}}
                      ],
                      [
                          "Teknologi Industri Benih",
                          {{$jmlTIB}}
                      ],
                      [
                          "Teknologi Produksi dan Manajemen Perikanan Budidaya",
                          {{$jmlManPerBud}}
                      ],
                      [
                          "Manajemen dan Teknologi Ternak",
                          {{$jmlManTekTer}}
                      ],
                      [
                          "Manajemen Agribisnis",
                          {{$jmlManAGB}}
                      ],
                      [
                          "Perencanaan dan Pengendalian Produksi Manufaktur",
                          {{$jmlPPPM}}
                      ],
                      [
                          "Teknik Komputer dan Jaringan",
                          {{$jmlTKJ}}
                      ],
                      [
                          "Analisis Kimia",
                          {{$jmlAnKim}}
                      ],
                      [
                          "Teknik dan Manajemen Lingkungan",
                         {{$jmlTekManLing}}
                      ],
                      [
                          "Akuntansi",
                          {{$jmlAkuntansi}}
                      ],
                      [
                          "Perkebunan Kelapa Sawit",
                          {{$jmlPerkebunanKlpSwt}}
                      ],
                      [
                          "Produksi dan Pengembangan Pertanian Terpadu",
                          {{$jmlProdPengPertanian}}
                      ],
                      [
                          "Paramedik Veteriner",
                          {{$jmlParVet}}
                      ]
                  ]
              }
          ]
      }
    });
  });
</script>
@endsection