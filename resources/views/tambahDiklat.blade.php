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
								<label>Regional</label>
						    <input required="required"  placeholder="Regional" type="text" name = "regionalDiklat" class="form-control" readonly="readonly" value="{{Auth::user()->regionalUser}}" />
						    </div>

							

						    <div class="form-group">
								<label>Nama Diklat</label>
			                      <select required="required" id="namaDiklat" name="namaDiklat" class="form-control selectpicker"  title="Nama Diklat" >
			                        <option value="Metodologi Audit Audit">Metodologi Audit</option>
			                        <option value="Manajemen Resiko Dasar">Manajemen Resiko Dasar</option>
			                        <option value="Penulisan Laporan Hasil Pemeriksaan">Penulisan Laporan Hasil Pemeriksaan</option>
			                        <option value="Teknik Wawancara untuk Auditor">Teknik Wawancara untuk Auditor</option>
			                        <option value="Pengadaan Barang Jasa APLN">Pengadaan Barang Jasa APLN</option>
			                        <option value="Pengantar Fraud Risk Management">Pengantar Fraud Risk Management</option>

			                      </select>

		                    </div>

						    

							<div class="form-group">
								<label>Waktu Diklat</label>
							    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
							    <input required="required" type="text" class="form-control" placeholder="Waktu Diklat" name = "waktuDiklat" >
								    <div class="input-group-addon">
								        <span class="glyphicon glyphicon-th"></span>
								    </div>
								</div>

						    </div>
						    
						    <div class="form-group">
						    	<label>Tempat Diklat</label>
						    	<input required="required"  placeholder="Tempat Diklat" type="text" name = "tempatDiklat" class="form-control" />
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