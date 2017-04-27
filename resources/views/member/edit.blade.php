@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Perbarui Data Member</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                        <form action="{{ url('/update/'.$book->id) }}" method="post" enctype="multipart/form-data">

							<?php $i=0; ?>
						    
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<div class="form-group">
								<label>Nama</label>
						    <input required="required"  placeholder="Nama" type="text" name = "name" class="form-control" value="{{$book->name}}" />
						    </div>

						    <div class="form-group">
						    	<label>Regional</label>
						    	<input required="required"  placeholder="Regional" type="text" name = "regionalUser" class="form-control" value="{{$book->regionalUser}}"/>
							</div>
						    
						    <div class="form-group">
						    	<label>Tim</label>
						    	<input required="required"  placeholder="Tim" type="text" name = "timUser" class="form-control" value="{{$book->timUser}}"/>
							</div>

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