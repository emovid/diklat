@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Diklat</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                        <form action="{{ url('/tambahDiklatBaru') }}" method="post" enctype="multipart/form-data">

							<?php $i=0; ?>
						    
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							<div class="form-group">
								<label>Tim Diklat</label>
						    <input required="required"  placeholder="Tim Diklat" type="text" name = "timDiklat" class="form-control" />
						    </div>

						    <div class="form-group">
								<label>Regional Diklat</label>
						    <input required="required"  placeholder="Regional Diklat" type="text" name = "regionalDiklat" class="form-control" />
						    </div>

							<div class="form-group">
								<label>Nama Diklat</label>
						    <input required="required"  placeholder="Nama Diklat" type="text" name = "namaDiklat" class="form-control" />
						    </div>

						    <div class="form-group">
						    	<label>Waktu Diklat</label>
						    	<input required="required"  placeholder="Waktu Diklat" type="text" name = "waktuDiklat" class="form-control" />
							</div>
						    
						    <div class="form-group">
						    	<label>Tempat Diklat</label>
						    	<input required="required"  placeholder="Tempat Diklat" type="text" name = "tempatDiklat" class="form-control" />
							</div>

							<div class="form-group">
								<label>Status Diklat</label>
						    	<input required="required"  placeholder="Status Diklat" type="text" name = "statusDiklat" class="form-control" />
							</div>



							<div style="float:right">
		                        <button class="btn btn-primary btn-simple" onclick="goBack()">Kembali</button>
		                        <input type="submit" class="btn btn-success" value="Simpan" name="submit"/>
		                    </div>
						    


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
function goBack() {
    window.history.back();
}
</script>
@show