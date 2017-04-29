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
							
							<?php if (Auth::user()->role == "superAdmin"): ?>
							<div class="form-group">
							<label>Regional Diklat</label>
						    <input required="required"  placeholder="Regional Diklat" type="text" name = "regionalDiklat" class="form-control" readonly="readonly" value="{{$book->regionalDiklat}}" />
						    </div>
						    <?php endif ?>

							<div class="form-group">
							<label>Nama Diklat</label>
						    <input required="required"  placeholder="Nama Diklat" type="text" name = "namaDiklat" class="form-control" readonly="readonly" value="{{$book->namaDiklat}}" />
						    </div>

						    <div class="form-group">
						    	<label>Waktu Diklat</label>
						    	
						    	<div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
							    <input required="required" type="text" class="form-control" placeholder="Waktu Diklat" name = "waktuDiklat" value="{{$book->waktuDiklat}}" >
								    <div class="input-group-addon">
								        <span class="glyphicon glyphicon-th"></span>
								    </div>
								</div>
							</div>
						    
						    <div class="form-group">
						    	<label>Tempat Diklat</label>
						    	<input required="required"  placeholder="Tempat Diklat" type="text" name = "tempatDiklat" class="form-control" value="{{$book->tempatDiklat}}"/>
							</div>

							<?php if (Auth::user()->role == "superAdmin"): ?>
							

							<div class="form-group">
								<label>Status Diklat</label>
			                      <select required="required" id="statusDiklat" name="statusDiklat" class="form-control selectpicker"  title="Keterangan Audit" value="{{$book->statusDiklat}}">
			                        <option value="Disetujui">Disetujui</option>
			                        <option value="Unable">Unable</option>
			                        

			                      </select>

		                    </div>

		                    <?php endif ?>
							




						    <input type="submit" class="btn btn-success" value="Simpan" name="submit"/>


						</form>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('body.script')
<script>
$('#statusDiklat').val('{{$book->statusDiklat}}');
</script>


@show