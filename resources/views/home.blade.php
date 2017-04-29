@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                        <nav class="breadcrumb">
                          <span class="breadcrumb-item active">Home</span>
                        </nav>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4">                        
                            <button class="btn btn-block btn-info" onclick="location.href='{{ url('/ubahIdentitas/'.Auth::user()->id) }}'">Ubah Identitas</button>
                        </div>
                        <?php if ((Auth::user()->role == "adminRegional") || (Auth::user()->role == "superAdmin")): ?>
                            
                            <?php if (Auth::user()->role == "adminRegional"): ?>

                            <div class="col-xs-4">
                            <button class="btn btn-block btn-info" onclick="location.href='{{ url('/ubahDiklat') }}'">Ajukan Jadwal Diklat</button>
                            </div>

                            <?php else: ?>

                            <div class="col-xs-4">
                            <button class="btn btn-block btn-info" onclick="location.href='{{ url('/approveDiklat') }}'">Approve Jadwal Diklat</button>
                            </div>

                            <?php endif ?>


                            <div class="col-xs-4">
                                <button class="btn btn-block btn-info" onclick="location.href='{{ url('/jadwalAudit') }}'">Jadwal Audit</button>
                            </div>
                        <?php else: ?>
                             <div class="col-xs-4">
                                <button class="btn btn-block btn-info" onclick="location.href='{{ url('/jadwalAuditor') }}'">Pilih Jadwal Diklat</button>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block btn-info" onclick="location.href='{{ url('/lihatAudit') }}'">Lihat Jadwal Audit</button>
                            </div>
                        <?php endif ?>

                        
                        
                        
                       
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
