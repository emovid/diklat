@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Jadwal Audit</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                      <label> Regional : {{Auth::user()->regionalUser}} </label>
                      <br/>
                      <label> TIM : {{Auth::user()->timUser}} </label>
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
                                    @foreach ($auditList as $book)
                                        <?php $i++; ?>
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->unitKerjaAudit }}</td>
                                        <td>{{ $book->waktuMulaiAudit }}</td>
                                        <td>{{ $book->waktuSelesaiAudit }}</td>
                                        <td>{{ $book->keteranganAudit }}</td>
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
                        <button class="btn btn-primary btn-simple" onclick="goBack()">Kembali</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('body.script')
<script>
function goBack() {
    window.history.back();
}
</script>
@show