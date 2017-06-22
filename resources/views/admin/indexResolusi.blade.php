@extends('admin.layout.adminapp')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <a href="{{action('ResolusiController@create')}}" class="btn btn-primary" id="create">Tambah Resolusi</a>
        </div>
        @if(Session('message'))
        <div class="col-md-12">
            <div class="alert alert-success">{{Session('message')}}</div>
        </div>
        @endif
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tabel Resolusi</div>

                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID Resolusi</th>
                        <th>Resolusi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $row)
                      <tr>
                        <td>{{$no++}}</td>
                        <td class="text-uppercase">{{'RES-0' . $row->id}}</td>
                        <td class="text-uppercase">{{$row->resolusi}}</td>
                        <td class="aksi">
                          <form class="" action="{{action('ResolusiController@destroy',$row->id)}}" method="post" style="display:hidden;">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$row->id}}">
                            <button type="submit" class="btn btn-danger02">Hapus</button>
                            <a href="{{action('ResolusiController@show',$row->id)}}" class="btn btn-info02">Detail</a>
                            <a href="{{action('ResolusiController@edit',$row->id)}}" class="btn btn-primary">Edit</a>
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
