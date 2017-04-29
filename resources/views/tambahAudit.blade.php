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
                <div class="panel-heading">Tambah Data Audit</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                        <form action="{{ url('/tambahAuditBaru') }}" method="post" enctype="multipart/form-data">

							<?php $i=0; ?>
						    
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							

						    <div class="form-group">
								<label>Regional</label>
						    <input required="required"  placeholder="Regional" type="text" name = "regionalAudit" class="form-control" readonly="readonly" value="{{Auth::user()->regionalUser}}" />
						    </div>

						    <div class="form-group">
								<label>Unit Kerja</label>
						    <input required="required"  placeholder="Unit Kerja" type="text" name = "unitKerjaAudit" class="form-control" readonly="readonly" value="<?php echo $lokasi; ?>" />
						    </div>

						    <div class="form-group">
								<label>Tim</label>
						    <input required="required"  placeholder="Tim" type="text" name = "timAudit" class="form-control"  />
						    </div>

						    

						    <div class="form-group">
								<label>Waktu Mulai</label>
						    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
						    <input required="required" type="text" class="form-control" placeholder="Waktu Mulai" name = "waktuMulaiAudit">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-th"></span>
							    </div>
							</div>

						    </div>

							<div class="form-group">
								<label>Waktu Selesai</label>
						    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
						    <input required="required" type="text" class="form-control" placeholder="Waktu Selesai" name = "waktuSelesaiAudit">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-th"></span>
							    </div>
							</div>
						    </div>


							<div class="form-group">
								<label>Keterangan</label>
			                      <select required="required" id="keteranganAudit" name="keteranganAudit" class="form-control selectpicker"  title="Keterangan Audit" >
			                        <option value="Hari Audit">Hari Audit</option>
			                        <option value="Off Audit">Off Audit</option>
			                        

			                      </select>

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