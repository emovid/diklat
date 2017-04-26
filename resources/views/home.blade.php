@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-block btn-info" href="{{ url('/ubahIdentitas') }}">Ubah Identitas</button>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-block btn-info" href="{{ url('/jadwalDiklat') }}">Jadwal Diklat</button>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-block btn-info" href="{{ url('/jadwalAudit') }}">Isi Jadwal Audit</button>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
