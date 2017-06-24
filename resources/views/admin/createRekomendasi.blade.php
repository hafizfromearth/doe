@extends('admin.layout.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb grey">
            <li><a href="#">Master</a></li>
            <li><a href="{{action('RekomendasiController@index')}}">Produk</a></li>
            <li class="active">Input Produk</li>
          </ol>
        </div>

        @if(session('messages'))
        <div class="col-md-12">
          <div class="alert alert-danger">{{Session('messages')}}</div>
        </div>
        @endif

        <div class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">Form Input Produk</div>

                <div class="panel-body">
                  <form action="{{Action('RekomendasiController@store')}}" class="form form-horizontal" method="post" id="form-input" enctype="multipart/form-data">
                    {{csrf_field()}}

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kegiatan :</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="kegiatan">
                        <option value="">Pilih Kegiatan</option>
                        <option value="diving">Diving</option>
                        <option value="skating">Skating</option>
                      </select>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">
                          {{$errors->first('kegiatan')}}
                        </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pilih Berdasarkan Harga :</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="stabilizer_left" name="index_harga" value="pabrik" />
                        <label for="stabilizer_left">Pabrik</label>
                        <input type="radio" id="stabilizer_right" name="index_harga" value="toko" checked/>
                        <label for="stabilizer_right">Toko</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">
                          {{$errors->first('index_harga')}}
                        </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Minimum :</label>
                    <div class="col-sm-5">
                      <input type="text" name="min_price" value="{{old('min_price')}}" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">
                          {{$errors->first('min_price')}}
                        </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Maksimum :</label>
                    <div class="col-sm-5">
                      <input type="text" name="max_price" value="{{old('max_price')}}" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">
                          {{$errors->first('max_price')}}
                        </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="button" class="btn btn-info02">Submit</button>
                    </div>
                  </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
