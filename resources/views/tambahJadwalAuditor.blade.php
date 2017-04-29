@extends('layouts.app')

@section('content')
<?php
if (Auth::user()->regionalUser == "1") {
    $lokasi = "Medan";
} elseif (Auth::user()->regionalUser == "2") {
    $lokasi = "Pekanbaru";
} elseif (Auth::user()->regionalUser == "3") {
    $lokasi = "Palembang";
} elseif (Auth::user()->regionalUser == "4") {
    $lokasi = "Medan";
} elseif (Auth::user()->regionalUser == "5") {
    $lokasi = "Palembang";
} elseif (Auth::user()->regionalUser == "6") {
    $lokasi = "Sumatera";
} elseif (Auth::user()->regionalUser == "7") {
    $lokasi = "Jawa Bagian Barat";
} elseif (Auth::user()->regionalUser == "8") {
    $lokasi = "Jawa Bagian Barat";
} elseif (Auth::user()->regionalUser == "9") {
    $lokasi = "Bandung";
} elseif (Auth::user()->regionalUser == "10") {
    $lokasi = "Semarang";
} elseif (Auth::user()->regionalUser == "11") {
    $lokasi = "Tidak Ada Data";
} elseif (Auth::user()->regionalUser == "12") {
    $lokasi = "Surabaya";
} elseif (Auth::user()->regionalUser == "13") {
    $lokasi = "Banjarbaru";
} elseif (Auth::user()->regionalUser == "14") {
    $lokasi = "Balikpapan";
} elseif (Auth::user()->regionalUser == "15") {
    $lokasi = "Manado";
} elseif (Auth::user()->regionalUser == "16") {
    $lokasi = "Makassar";
} elseif (Auth::user()->regionalUser == "17") {
    $lokasi = "Mataram";
} elseif (Auth::user()->regionalUser == "18") {
    $lokasi = "Jayapura";
} elseif (Auth::user()->regionalUser == "19") {
    $lokasi = "Ambon";
} elseif (Auth::user()->regionalUser == "20") {
    $lokasi = "Tidak Ada Data";
} elseif (Auth::user()->regionalUser == "21") {
    $lokasi = "Kantor Pusat";
}  else {
    $lokasi = "Kantor Pusat";
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Jadwal Diklat</div>

                <div class="panel-body">
                    <div class="col-xs-12">


                    
						

                        @if ($diklatList->count())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Nama Diklat</th>
                                        <th>Waktu</th>
                                        <th>Tempat</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($diklatList as $book)
                                        <?php $i++; ?>

                                    <tr>
          								<form id="formJadwal" action="{{ url('/tambahJadwalAuditorBaru') }}" method="post" enctype="multipart/form-data">
				                    	<input type="hidden" form="formJadwal" name="_token" value="{{ csrf_token() }}"/>
				                    	<input type="hidden" form="formJadwal" name = "idAuditor" class="form-control" readonly="readonly" value="{{Auth::user()->id}}" />
				                    	<input type="hidden" form="formJadwal" name = "timAuditor" class="form-control" readonly="readonly" value="{{Auth::user()->timUser}}" />
				                    	<input type="hidden" form="formJadwal" name = "regionalAuditor" class="form-control" readonly="readonly" value="{{Auth::user()->regionalUser}}" />

                                        <td>{{ $book->namaDiklat }}</td>
                                        <input type="hidden" form="formJadwal" name = "namaKegiatan" class="form-control" readonly="readonly" value="{{ $book->namaDiklat }}" />
                                        <td>{{ $book->waktuDiklat }}</td>
                                        <input type="hidden" form="formJadwal" name = "waktuKegiatan" class="form-control" readonly="readonly" value="{{ $book->waktuDiklat }}" />
                                        
                                        <td>{{ $book->tempatDiklat }}</td>
                                        <input type="hidden" form="formJadwal" name = "tempatKegiatan" class="form-control" readonly="readonly" value="{{ $book->tempatDiklat }}" />
                                        
                                        <td><button type="submit" form="formJadwal" class="btn btn-warning" data-placement="bottom" title="Tambah Data" form="formJadwal" ><span class="glyphicon glyphicon-plus"></button></td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <center>
                            <form method="GET" action="{{ url('/tambahJadwalAuditorBaru') }}" id="my_form"></form>

							
                         </center>
                        @else
                            There are no book in the book list
                        @endif
                    </div>
                    <div class="col-xs-12">
                      <div style="float:right">
                        <button class="btn btn-primary btn-simple" onclick="location.href='{{ url('/jadwalAuditor') }}'">Kembali</button>
                        
                      </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('body.script')
<script>
function goBack() {
    window.history.back();
}




</script>


@show