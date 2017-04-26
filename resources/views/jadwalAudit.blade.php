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
                        @if ($auditList->count())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Unit Kerja</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($diklatList as $book)
                                        <?php $i++; ?>
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->nama }}</td>
                                        <td>{{ $book->waktu_mulai }}</td>
                                        <td>{{ $book->tempat_selesai }}</td>
                                        <td>{{ $book->keterangan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <center>
                            {!!$auditList->render()!!}
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