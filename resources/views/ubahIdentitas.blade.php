@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Data Pribadi</div>

                <div class="panel-body">

                    <div class="panel-group">

                    <div class="col-xs-12">
                      <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('Nama', 'Nama') !!}
                            {!! Form::text('nama', null, ['class'=> 'form-control', 'placeholder' => "Masukkan Nama" ]) !!}
                        </div>
                      </div>

                      <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('Regional', 'Regional') !!}
                            {!! Form::text('regional', null, ['class'=> 'form-control', 'placeholder' => "Masukkan Regional" ]) !!}
                        </div>
                      </div>
                      
                      <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('TIM', 'TIM') !!}
                            {!! Form::text('tim', null, ['class'=> 'form-control', 'placeholder' => "Masukkan TIM" ]) !!}
                        </div>
                      </div>

                      <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('Email', 'Email') !!}
                            {!! Form::text('email', null, ['class'=> 'form-control', 'placeholder' => "Masukkan Email" ]) !!}
                        </div>
                      </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
