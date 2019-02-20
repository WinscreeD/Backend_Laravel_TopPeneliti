<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Biofarmaka</title>

      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  </head>

  <body>
    <table>
        <tr>
            <th>Nama Kegiatan</th>
            <th>Tanggal mulai</th>
        </tr>
        @foreach ($ini as $penelitian)
        <tr>
            <td>{{$penelitian->nama_kegiatan}}</td>
            <td>{{$penelitian->tanggal_awal}}</td>
        </tr>
        @endforeach
    </table>
  </body>
</html>
