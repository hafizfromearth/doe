@extends('toko.layout.tokoapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb grey">
            <li><a href="#">Master</a></li>
            <li><a href="{{action('TProdukController@index')}}">Produk</a></li>
            <li class="active">Input Produk</li>
          </ol>
        </div>

        @if(session('messages'))
        <div class="col-md-12">
          <div class="alert alert-danger">{{Session('messages')}}</div>
        </div>
        @endif

        @if(count($m_produk)==0)
        <div class="col-md-12">
          <h1 class="text-center">Barang Sudah Ditambahkan Semua</h1>
        </div>
        @endif

        @foreach($m_produk as $row)
        <div class="col-md-3 col-sm-4 col-lg-3">
          <div class="panel panel-success">
            <div class="panel-heading">
              {{ ucwords($row->nama_produk) }}
            </div>
            <div class="panel-body">
              <img src="/storage/{{$row->foto}}" alt="" class="img-responsive">
            </div>
            <div class="panel-footer">
              <form action="{{action('TProdukController@store')}}" method="post" class="form" id="{{'form-0'.$row->id}}">
                {{csrf_field()}}
                <input type="hidden" name="id_produk" value="{{$row->id}}">
                <div class="form-group">
                  <input type="text" name="harga_toko" class="form-control" placeholder="masukkan harga toko">
                </div>
                <span class="help-block"></span>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-block btn-info03">Simpan</button>
                </div>
              </form>
              <script type="text/javascript">
                $("#form-0{{$row->id}}").validate({
                  // errorElement: 'input',
                  // errorClass: 'help-block',
                  errorPlacement: function(error, element) {

                  // name attrib of the field
              		var n = element.attr("name");

              		if (n == "harga_toko"){
              			element.attr("placeholder", "Mohon Masukkan Harga Toko");
                    }
                  },
                  rules:{
                    harga_toko:{
                      required:true,
                      digits:true
                    }
                  },
                  highlight: function(element) {
                    // add a class "has_error" to the element
                    $(element).addClass('has-error');
                  }
                });
              </script>
            </div>
          </div>
        </div>
        @endforeach

    </div>
</div>
@endsection

@section('script')
  <script src="/slider/nouislider.js"></script>
  <script src="/slider/wNumb.js"></script>
@endsection
