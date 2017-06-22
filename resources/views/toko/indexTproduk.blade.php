@extends('toko.layout.tokoapp')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <a href="{{route('toko.produk.create')}}" class="btn btn-primary" id="create">Tambah Produk</a>
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
                        <th>Foto</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $row)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{'CAM-0' . $row->id_produk}}</td>
                        <td class="text-capitalize">{{$row->produk->nama_produk}}</td>
                        <td class="text-center"><img src="/storage/{{$row->produk->foto}}" alt="{{$row->foto}}" class="foto-table"></td>
                        <td class="aksi">
                          <form class="" action="{{action('TProdukController@destroy',$row->id)}}" method="post" style="display:hidden;">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <button type="submit" class="btn btn-danger02">Hapus</button>
                            <a href="{{action('TProdukController@show',$row->id)}}" class="btn btn-info02">Detail</a>
                            <a href="{{action('TProdukController@edit',$row->id)}}" class="btn btn-primary">Edit</a>
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
