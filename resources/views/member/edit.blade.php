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
						  <li class="breadcrumb-item active">Ubah Identitas</li>
						</ol>
                	</div>
                    <div class="col-xs-12">
                        <form action="{{ url('/update/'.$book->id) }}" method="post" enctype="multipart/form-data">

							<?php $i=0; ?>
						    
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<div class="form-group">
								<label>Nama</label>
						    <input required="required"  placeholder="Nama" type="text" name = "name" class="form-control" value="{{$book->name}}" />
						    </div>

						    <?php if (Auth::user()->role != "superAdmin"): ?>
						    <div class="form-group">
						    	<label>Regional</label>
						    	<input required="required"  placeholder="Regional" type="text" name = "regionalUser" class="form-control" value="{{$book->regionalUser}}"/>
							</div>
							<?php endif ?>
						    
							<?php if (Auth::user()->role == "auditor"): ?>
	                        <div class="form-group">
						    	<label>Tim</label>
						    	<input required="required"  placeholder="Tim" type="text" name = "timUser" class="form-control" value="{{$book->timUser}}"/>
							</div>
	                        <?php endif ?>
						    
						    

							<div class="form-group">
								<label>Email</label>
						    	<input required="required"  placeholder="Email" type="text" name = "email" class="form-control" value="{{$book->email}}"/>
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