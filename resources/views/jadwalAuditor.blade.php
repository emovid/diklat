@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                          <li class="breadcrumb-item active">Jadwal Diklat Auditor</li>
                        </ol>
                    </div>
                    <div class="col-xs-12">
                      <label> Regional : {{Auth::user()->regionalUser}} </label>
                      <br/>
                      <label> TIM : {{Auth::user()->timUser}} </label>
                      
                    </div>


                    
                    <div class="col-xs-12">
                        @if ($jadwalList->count())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Nama Diklat</th>
                                        <th>Tempat Diklat</th>
                                        <th>Waktu </th>
                                        
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($jadwalList as $book)
                                        <?php $i++; ?>
                                    <tr>
                                        
                                        
                                                                                
                                        <td>{{ $book->namaKegiatan }}</td>
                                        <td>{{ $book->tempatKegiatan }}</td>
                                        <?php $i=0; ?>
                                        @foreach ($audit as $cektanggal)
                                            <?php $i++; ?>
                                            @if (($cektanggal->waktuMulaiAudit <  $book->waktuKegiatan ) && ($cektanggal->waktuSelesaiAudit >  $book->waktuKegiatan  ))
                                            
                                                <?php $s="Tidak Bentrok"; ?>
                                            @else
                                                <?php $s="fa fa-exclamation-triangle"; ?>
                                            @endif
                                        @endforeach
                                        <td>{{ $book->waktuKegiatan }} <i class="<?php echo $s ?>" style="color: red" aria-hidden="true"></i></td>  
                                        


                                        <td><a class="btn btn-danger" data-placement="bottom" title="Hapus Data" method="get" href="{{ url('/deleteJadwalAuditor/'.$book->id) }}"><span class="glyphicon glyphicon-trash"></a></td>
                                        
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <center>
                            <?php echo $jadwalList->render(); ?>
                         </center>
                        @else
                            There are no book in the book list
                        @endif
                    </div>

                    <div class="col-xs-12">
                      <div style="float:right">
                        <button class="btn btn-primary btn-simple" onclick="location.href='{{ url('/home') }}'">Kembali</button>
                        <button class="btn btn-primary btn-success" onclick="location.href='{{ url('/tambahJadwalAuditor') }}'">Tambah Data</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

