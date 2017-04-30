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
						  <li class="breadcrumb-item"><a href='{{ url('/jadwalAuditor') }}'>Jadwal Diklat Auditor</a></li>
						  <li class="breadcrumb-item"><a href="{{ url('/tambahJadwalAuditor') }}">Jadwal Diklat Tersedia</a></li>
						  <li class="breadcrumb-item active">Input Form</li>
						</ol>
                	</div>
                    <div class="col-xs-12">
                        <form action="{{ url('/tambahJadwalAuditorBaru') }}" method="post" enctype="multipart/form-data">

							<?php $i=0; ?>
						    
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							
							
							<div class="form-group">
							<label>Regional Auditor</label>
						    <input required="required"  placeholder="Regional Auditor" type="text" name = "regionalAuditor" class="form-control" readonly="readonly" value="{{Auth::user()->regionalUser}}" />
						    </div>

						    <div class="form-group">
							<label>Tim Auditor</label>
						    <input required="required"  placeholder="Tim Auditor" type="text" name = "timAuditor" class="form-control" readonly="readonly" value="{{Auth::user()->timUser}}" />
						    </div>
						    

							<div class="form-group">
							<label>Nama Diklat</label>
						    <input required="required"  placeholder="Nama Diklat" type="text" name = "namaKegiatan" class="form-control" readonly="readonly" value="{{$book->namaDiklat}}" />
						    </div>

						    <div class="form-group">
					    	<label>Waktu Diklat</label>
					    	<input required="required"  placeholder="Waktu Diklat" type="text" name = "waktuKegiatan" class="form-control" readonly="readonly" value="{{$book->waktuDiklat}}" />
						
							</div>
						    
						    <div class="form-group">
						    	<label>Tempat Diklat</label>
						    	<input required="required" readonly="readonly"  placeholder="Tempat Kegiatan" type="text" name = "tempatKegiatan" class="form-control" value="{{$book->tempatDiklat}}"/>
							</div>

							
							




						    <input type="submit" class="btn btn-success" value="Tambah Data" name="submit"/>


						</form>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@stop

