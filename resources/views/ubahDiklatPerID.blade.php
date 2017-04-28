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
						  <li class="breadcrumb-item"><a href="{{ url('/jadwalDiklat') }}">Jadwal Diklat</a></li>
						  <li class="breadcrumb-item"><a href="{{ url('/ubahDiklat') }}">Ubah Data Diklat</a></li>
						  <li class="breadcrumb-item active">Edit Form</li>
						</ol>
                	</div>
                    <div class="col-xs-12">
                        <form action="{{ url('/updateDiklat/'.$book->id) }}" method="post" enctype="multipart/form-data">

							<?php $i=0; ?>
						    
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<div class="form-group">
								<label>Nama Diklat</label>
						    <input required="required"  placeholder="Nama Diklat" type="text" name = "namaDiklat" class="form-control" value="{{$book->namaDiklat}}" />
						    </div>

						    <div class="form-group">
						    	<label>Waktu Diklat</label>
						    	<input required="required"  placeholder="Waktu Diklat" type="text" name = "waktuDiklat" class="form-control" value="{{$book->waktuDiklat}}"/>
							</div>
						    
						    <div class="form-group">
						    	<label>Tempat Diklat</label>
						    	<input required="required"  placeholder="Tempat Diklat" type="text" name = "tempatDiklat" class="form-control" value="{{$book->tempatDiklat}}"/>
							</div>

							<div class="form-group">
								<label>Status Diklat</label>
						    	<input required="required"  placeholder="Email" type="text" name = "statusDiklat" class="form-control" value="{{$book->statusDiklat}}"/>
							</div>




						    <input type="submit" class="btn btn-success" value="Simpan" name="submit"/>


						</form>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@stop