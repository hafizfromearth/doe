@extends('admin.layout.adminapp')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <a href="{{action('MTokoController@create')}}" class="btn btn-primary" id="create">Tambah Toko</a>
        </div>
        @if(Session('message'))
        <div class="col-md-12">
            <div class="alert alert-success">{{Session('message')}}</div>
        </div>
        @endif
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tabel Toko</div>

                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID Toko</th>
                        <th>Nama Toko</th>

                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $row)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{'STR-0' . $row->id}}</td>
                        <td class="text-capitalize">{{$row->name}}</td>
                        <td class="aksi">
                          <form class="" action="{{action('MTokoController@destroy',$row->id)}}" method="post" style="display:hidden;">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <button type="submit" class="btn btn-danger02">Hapus</button>
                            <a href="{{action('MTokoController@show',$row->id)}}" class="btn btn-info02">Detail</a>
                            <a href="{{action('MTokoController@edit',$row->id)}}" class="btn btn-primary">Edit</a>
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
