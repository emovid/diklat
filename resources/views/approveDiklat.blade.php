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
                          <li class="breadcrumb-item"><a href='{{ url('/home') }}'>Home</a></li>
                          <li class="breadcrumb-item active">Approve Jadwal Diklat</li>
                        </ol>
                    </div>


                  
                    

                    <div class="col-xs-12">
                        @if ($diklatList->count())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Regional</th>
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
                                        <td>{{ $book->regionalDiklat }}</td>
                                        <td>{{ $book->namaDiklat }}</td>
                                        <td>{{ $book->waktuDiklat }}</td>
                                        <td>{{ $book->tempatDiklat }}</td>
                                        <td>{{ $book->statusDiklat }}</td>
                                    

                                        
                                        <td><a class="btn btn-warning" data-placement="bottom" title="Edit Data" href="{{ url('/ubahDiklatPerID/'.$book->id)}}"><span class="glyphicon glyphicon-pencil"></a></td>
                                        

                                        

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <center>
                            
                         </center>
                        @else
                            There are no book in the book list
                        @endif
                    </div>
                    <div class="col-xs-12">
                      
                      <div style="float:right">
                      <button class="btn btn-primary btn-simple" onclick="location.href='{{ url('/home') }}'">Kembali</button>
                      
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
