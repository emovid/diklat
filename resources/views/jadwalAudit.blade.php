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
                          <li class="breadcrumb-item active">Jadwal Audit</li>
                        </ol>
                    </div>
                    <div class="col-xs-12">
                    <?php if (Auth::user()->role != "superAdmin"): ?>
                      <label> Regional : {{Auth::user()->regionalUser}} </label>
                      <?php endif ?>
                      <br/>
                        <?php if (Auth::user()->role == "auditor"): ?>
                        <label> TIM : {{Auth::user()->timUser}} </label>
                        <?php endif ?>
                    </div>
                    

                    <div class="col-xs-12">
                        @if ($auditList->count())
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <?php if (Auth::user()->role == "superAdmin"): ?>
                                        <th>Regional</th>
                                        <?php endif ?>
                                        <th>Unit Kerja</th>
                                        <th>Tim</th>
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
                                        <?php if (Auth::user()->role == "superAdmin"): ?>
                                        <td>{{ $book->regionalAudit }}</td>
                                        <?php endif ?>
                                        <td>{{ $book->unitKerjaAudit }}</td>
                                        <td>{{ $book->timAudit }}</td>
                                        <td>{{ $book->waktuMulaiAudit }}</td>
                                        <td>{{ $book->waktuSelesaiAudit }}</td>
                                        <td>{{ $book->keteranganAudit }}</td>
                                        <td><a class="btn btn-warning" data-placement="bottom" title="Edit Data" href="{{ url('/ubahAuditPerID/'.$book->id)}}"><span class="glyphicon glyphicon-pencil"></a></td>
                                        <td><a class="btn btn-danger" data-placement="bottom" title="Hapus Data" method="get" href="{{ url('/deleteAudit/'.$book->id) }}"><span class="glyphicon glyphicon-trash"></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <center>
                            <?php echo $auditList->render(); ?>
                         </center>
                        @else
                            There are no book in the book list
                        @endif
                    </div>
                    <div class="col-xs-12">
                      <div style="float:right">
                        <button class="btn btn-primary btn-simple" onclick="location.href='{{ url('/home') }}'">Kembali</button>
                        <button class="btn btn-primary btn-success" onclick="location.href='{{ url('/tambahAudit') }}'">Tambah Data</button>
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