@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Jadwal Audit</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                      <label> Regional : 9 </label>
                      <br/>
                      <label> TIM : A </label>
                    </div>
                    </div>

                    <div class="col-xs-12">
                        @if ($diklatList->count())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Diklat</th>
                                        <th>Waktu</th>
                                        <th>Tempat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($diklatList as $book)
                                        <?php $i++; ?>
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->nama }}</td>
                                    </tr>

                                        <td><a class="btn btn-primary" data-placement="bottom" title="Lihat Data" data-toggle="modal" data-id ="book->id" data-target="#modalshow<?php echo $book->id;?>" href="#"><span class="glyphicon glyphicon-user"></a></td>
                                        <td><a class="btn btn-warning" data-placement="bottom" title="Edit Data" href="{{ url('getData/employees/'.$book->id.'/edit')}}"><span class="glyphicon glyphicon-pencil"></a></td>
                                        <td><a class="btn btn-danger" data-placement="bottom" title="Hapus Data" data-toggle="modal" href="#" data-target="#modaldelete"><span class="glyphicon glyphicon-trash"></a></td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <center>
                            {!!$diklatList->render()!!}
                         </center>
                        @else
                            There are no book in the book list
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection