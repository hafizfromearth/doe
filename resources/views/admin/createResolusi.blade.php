@extends('admin.layout.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb grey">
            <li><a href="#">Master</a></li>
            <li><a href="{{action('ResolusiController@index')}}">Resolusi</a></li>
            <li class="active">Input Resolusi</li>
          </ol>
        </div>

        @if(session('messages'))
        <div class="col-md-12">
          <div class="alert alert-danger">{{Session('messages')}}</div>
        </div>
        @endif

        <div class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">Form Input Resolusi</div>

                <div class="panel-body">
                  <form action="{{Action('ResolusiController@store')}}" class="form form-horizontal" method="post" id="form-input" enctype="multipart/form-data">
                    {{csrf_field()}}

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Resolusi :</label>
                    <div class="col-sm-5">
                      <input type="text" name="resolusi" id="resolusi" class="form-control resolusi" value="{{old('resolusi')}}">
                    </div>
                    <div class="col-sm-5">
                        <span class="help-block">
                          {{$errors->first('resolusi')}}
                        </span>
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
<script src="/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/jquery-validation/dist/additional-methods.js"></script>
<script src="/jquery-validation/dist/localization/messages_id.js"></script>
<script>
  $("#form-input").validate({
   errorClass: "help-block",
   errorElement: "span",
    rules:{
      resolusi:{
        required:true
      }
    }
  });
</script>
@endsection
