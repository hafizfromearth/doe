@extends('admin.layout.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb grey">
            <li><a href="#">Master</a></li>
            <li><a href="{{action('MProdukController@index')}}">Produk</a></li>
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
                  <form action="{{Action('MProdukController@store')}}" class="form form-horizontal" method="post" id="form-input" enctype="multipart/form-data">
                    {{csrf_field()}}

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Produk :</label>
                    <div class="col-sm-5">
                      <input type="text" name="nama_produk" id="nama_produk" class="form-control nama_produk" value="{{old('nama_produk')}}">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">
                          {{$errors->first('nama_produk')}}
                        </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Pabrik:</label>
                    <div class="col-sm-5">
                      <input type="text" name="harga_pabrik" id="harga_pabrik" class="form-control harga_pabrik" value="{{old('harga_pabrik')}}" placeholder="">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('harga_pabrik')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Wide Lens :</label>
                    <div class="col-sm-5">
                      <input type="text" name="wide_lens" id="wide_lens" class="form-control wide_lens" value="{{old('wide_lens')}}" placeholder="">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('wide_lens')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pixel:</label>
                    <div class="col-sm-5">
                      <input type="text" name="pixel_cam" id="pixel_cam" class="form-control pixel_cam" value="{{old('pixel_cam')}}" placeholder="">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('pixel_cam')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Resolusi:</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="id_resolusi">
                        <option value="">Pilih Resolusi</option>
                        @foreach($resolusi as $row)
                          <option value="{{$row->id}}">{{$row->resolusi}}P/{{$row->fps}}FPS</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('resolusi')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Baterai:</label>
                    <div class="col-sm-5">
                      <input type="text" name="battery" id="battery" class="form-control battery" value="{{old('battery')}}" placeholder="">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('battery')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Stabilizer:</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="stabilizer_left" name="stabilizer" value="y" />
                        <label for="stabilizer_left">Ya</label>
                        <input type="radio" id="stabilizer_right" name="stabilizer" value="n" checked/>
                        <label for="stabilizer_right">Tidak</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('stabilizer')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Time Lapse</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="lapse_left" name="time_lapse" value="y" />
                        <label for="lapse_left">Ya</label>
                        <input type="radio" id="lapse_right" name="time_lapse" value="n" checked/>
                        <label for="lapse_right">Tidak</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('time_lapse')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Night Mode:</label>
                    <div class="col-sm-5">
                      @if(old('night_mode')=="n")
                      <div class="switch-field">
                        <input type="radio" id="night_left" name="night_mode" value="y" />
                        <label for="night_left">Ya</label>
                        <input type="radio" id="night_right" name="night_mode" value="n" checked/>
                        <label for="night_right">Tidak</label>
                      </div>
                      @elseif(old('night_mode')=="y")
                      <div class="switch-field">
                        <input type="radio" id="night_left" name="night_mode" value="y" checked/>
                        <label for="night_left">Ya</label>
                        <input type="radio" id="night_right" name="night_mode" value="n" />
                        <label for="night_right">Tidak</label>
                      </div>
                      @else
                      <div class="switch-field">
                        <input type="radio" id="night_left" name="night_mode" value="y" />
                        <label for="night_left">Ya</label>
                        <input type="radio" id="night_right" name="night_mode" value="n" checked/>
                        <label for="night_right">Tidak</label>
                      </div>
                      @endif
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('night_mode')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Wifi:</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="wifi_left" name="wifi" value="y" />
                        <label for="wifi_left">Ya</label>
                        <input type="radio" id="wifi_right" name="wifi" value="n" checked/>
                        <label for="wifi_right">Tidak</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('wifi')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Waterproof:</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="wp_left" name="waterproof" value="y" />
                        <label for="wp_left">Ya</label>
                        <input type="radio" id="wp_right" name="waterproof" value="n" checked/>
                        <label for="wp_right">Tidak</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('waterproof')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">LCD:</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="lcd_left" name="lcd" value="y" />
                        <label for="lcd_left">Ya</label>
                        <input type="radio" id="lcd_right" name="lcd" value="n" checked/>
                        <label for="lcd_right">Tidak</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('lcd')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mobile Support:</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="mobile_support_left" name="mobile_support" value="y" />
                        <label for="mobile_support_left">Ya</label>
                        <input type="radio" id="mobile_support_right" name="mobile_support" value="n" checked/>
                        <label for="mobile_support_right">Tidak</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('mobile_support')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">GPS:</label>
                    <div class="col-sm-5">
                      <div class="switch-field">
                        <input type="radio" id="gps_left" name="gps" value="y" />
                        <label for="gps_left">Ya</label>
                        <input type="radio" id="gps_right" name="gps" value="n" checked/>
                        <label for="gps_right">Tidak</label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('gps')}}</span>
                    </div>
                  </div>

                  <br>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Quality:</label>
                    <div class="col-sm-5">
                      <div id="quality" class="slider-range"></div>
                      <input type="hidden" name="quality" id="v-quality" class="form-control" value="{{old('quality')}}">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('quality')}}</span>
                    </div>
                  </div>

                  <br>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Durabilty:</label>
                    <div class="col-sm-5">
                      <div id="durability" class="slider-range"></div>
                      <input type="hidden" name="durability" id="v-durability" class="form-control" value="{{old('durability')}}">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('durability')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Deskripsi :</label>
                    <div class="col-sm-5">
                      <textarea name="deskripsi" id="deskripsi" class="form-control deskripsi" rows="8" cols="40">{{old('deskripsi')}}</textarea>
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('deskripsi')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Foto :</label>
                    <div class="col-sm-5">
                      <input type="file" name="foto" id="foto" class="form-control foto">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">{{$errors->first('foto')}}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-5">
                      <button type="submit" class="btn btn-info02">Simpan</button>
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
  <script src="/slider/nouislider.js"></script>
  <script src="/slider/wNumb.js"></script>

  <script type="text/javascript">
  var st = $("#v-quality").val();
  var start;
  if (st == ""||st==false) {
    start = 1;
  }else {
    start = $("#v-quality").val();
  }
  var qFormat = document.getElementById('quality');
  var qInput = document.getElementById('v-quality');
  noUiSlider.create(qFormat, {
    start: start,
    step:1,
    behaviour: 'snap',
    tooltips:true,
    connect: [true, false],
    range: {
      'min':  1,
      'max':  10
    },
      format: wNumb({
    		decimals: 0,
        thousand: ''
    	})
    });
    qFormat.noUiSlider.on('update', function( values, handle ) {
    	qInput.value = values[handle];
    });
      qInput.addEventListener('change', function(){
    	qFormat.noUiSlider.set(this.value);
    });
  </script>

  <script type="text/javascript">
  var st = $("#v-durability").val();
  var start;
  if (st == ""||st==false) {
    start = 1;
  }else {
    start = $("#v-durability").val();
  }
  var dFormat = document.getElementById('durability');
  var dInput = document.getElementById('v-durability');
  noUiSlider.create(dFormat, {
    start: start,
    step:1,
    behaviour: 'snap',
    tooltips:true,
    connect: [true, false],
    range: {
      'min':  1,
      'max':  10
    },
      format: wNumb({
    		decimals: 0,
        thousand: ''
    	})
    });
    dFormat.noUiSlider.on('update', function( values, handle ) {
    	dInput.value = values[handle];
    });
      dInput.addEventListener('change', function(){
    	dFormat.noUiSlider.set(this.value);
    });
  </script>
@endsection
