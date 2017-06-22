@extends('admin.layout.adminapp')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <a href="{{action('MProdukController@create')}}" class="btn btn-primary" id="create">Tambah Produk</a>
        </div>
        @if(Session('message'))
        <div class="col-md-12">
            <div class="alert alert-success">{{Session('message')}}</div>
        </div>
        @endif
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tabel Produk</div>

                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Pabrikan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
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
                        <td class="aksi">
                          <form class="" action="{{action('MProdukController@destroy',$row->id)}}" method="post" style="display:hidden;">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <button type="submit" class="btn btn-danger02">Hapus</button>
                            <a href="{{action('MProdukController@show',$row->id)}}" class="btn btn-info02">Detail</a>
                            <a href="{{action('MProdukController@edit',$row->id)}}" class="btn btn-primary">Edit</a>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
