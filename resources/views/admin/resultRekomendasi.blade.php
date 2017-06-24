@extends('admin.layout.adminapp')

@section('content')
<div class="container-fluid">
    <div class="row">
        @if(Session('message'))
        <div class="col-md-12">
            <div class="alert alert-success">{{Session('message')}}</div>
        </div>
        @endif
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{action('RekomendasiController@create')}}">Kembali</a></div>

                <div class="panel-body">
                @if(count($data)==0)
                <h1>Data Tidak Ditemukan</h1>
                @else
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga Pabrikan</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{'CAM-0' . $row->id}}</td>
                      <td class="text-capitalize">{{$row->nama_produk}}</td>
                      <td>{{myHelpers::rupiah($row->harga_pabrik)}}</td>
                      <td class="text-center"><img src="/storage/{{$row->foto}}" alt="{{$row->foto}}" class="foto-table"></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
