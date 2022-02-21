@extends('back.layouts.master')

@section('title', 'Əlaqə')
@section('content')


  <form action="" method="POST" enctype="multipart/form-data">  
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class="form-group">
                <label for="inputProjectLeader">Ad Azərbaycanca</label>
                <input type="text" id="inputName" value="{{$card->name_az}}" name="name_az" class="form-control">
              @if ($errors->first('name_az'))
                  <span class="alert alert-danger">{{$errors->first('name_az')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Ad İngiliscə</label>
                <input type="text" id="inputName" value="{{$card->name_en}}" name="name_en" class="form-control">
              @if ($errors->first('name_en'))
                  <span class="alert alert-danger">{{$errors->first('name_en')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="inputProjectLeader">Ad Rusca</label>
              <input type="text" id="inputName" value="{{$card->name_ru}}" name="name_ru" class="form-control">
              @if ($errors->first('name_ru'))
                  <span class="alert alert-danger">{{$errors->first('name_ru')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Məlumat Azərbaycanca</label>
              <textarea id="summernote1" name="text_az">{!!$card->text_az!!}</textarea>
              @if ($errors->first('text_az'))
                  <span class="alert alert-danger">{{$errors->first('text_az')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Məlumat İngiliscə</label>
              <textarea id="summernote2" name="text_en">{!!$card->text_en!!}</textarea>
              @if ($errors->first('text_en'))
                  <span class="alert alert-danger">{{$errors->first('text_en')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="inputProjectLeader">Məlumat Rusca</label>
              <textarea id="summernote3" name="text_ru">{!!$card->text_ru!!}</textarea>
              @if ($errors->first('text_ru'))
                  <span class="alert alert-danger">{{$errors->first('text_ru')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Şəkil</label>
                <input type="file" id="upload" name="photo" onChange="readURL(this)" class="form-control">
                <img src="/images/cards/{{$card->photo}}" class="mt-1" style="width: 20%" id="img" alt="">
              @if ($errors->first('photo'))
                  <span class="alert alert-danger">{{$errors->first('photo')}}</span>
              @endif
            </div>
        </div>
            
            <!-- /.card -->
        </div>
        </div>
        <div class="row">
        <div class="col-12">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Update" class="btn btn-success justify-content-end">
        </div>
        </div>
    </form>
    
@endsection

@section('js')
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->

<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>


<!-- CodeMirror -->
<script src="/plugins/codemirror/codemirror.js"></script>
<script src="/plugins/codemirror/mode/css/css.js"></script>
<script src="/plugins/codemirror/mode/xml/xml.js"></script>
<script src="/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
      // Summernote
      $('#summernote1').summernote()
      $('#summernote2').summernote()
      $('#summernote3').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

  <script>
    $(function(){
  $('#upload').change(function(){
    var input = this;
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#img').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
    else
    {
      $('#img').attr('src', '/assets/no_preview.png');
    }
  });

});
  </script>

@endsection