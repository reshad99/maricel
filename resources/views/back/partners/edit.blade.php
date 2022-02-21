@extends('back.layouts.master')

@section('title', 'Tərəfdaşlar')
@section('content')

  <form action="" method="POST" enctype="multipart/form-data">  
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
           
            <div class="form-group">
              <label for="inputName">Link</label>
              <input type="text" id="inputName" value="{{$partner->link}}" name="link" class="form-control">
              @if ($errors->first('link'))
                  <span class="alert alert-danger">{{$errors->first('link')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Loqo</label><br>
              <input type="file" name="logo" id="">
              @if ($errors->first('logo'))
                  <span class="alert alert-danger">{{$errors->first('logo')}}</span>
              @endif
            </div>
          </div>
        </div>
            
            <!-- /.card -->
        </div>
        </div>
        <div class="row">
        <div class="col-12">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Update" class="btn btn-success float-right">
        </div>
        </div>
    </form>
    
@endsection

@section('js')
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->
@endsection