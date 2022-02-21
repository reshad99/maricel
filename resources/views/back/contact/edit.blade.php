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
                <label for="inputProjectLeader">Ünvan Azərbaycanca</label>
                <input type="text" id="inputName" value="{{$contact->address_az}}" name="address_az" class="form-control">
              @if ($errors->first('address_az'))
                  <span class="alert alert-danger">{{$errors->first('address_az')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Ünvan İngiliscə</label>
                <input type="text" id="inputName" value="{{$contact->address_en}}" name="address_en" class="form-control">
              @if ($errors->first('address_en'))
                  <span class="alert alert-danger">{{$errors->first('address_en')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="inputProjectLeader">Ünvan Rusca</label>
              <input type="text" id="inputName" value="{{$contact->address_ru}}" name="address_ru" class="form-control">
              @if ($errors->first('address_ru'))
                  <span class="alert alert-danger">{{$errors->first('address_ru')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">İnstagram link</label>
                <input type="text" id="inputName" value="{{$contact->instagram}}" name="instagram" class="form-control">
                @if ($errors->first('instagram'))
                    <span class="alert alert-danger">{{$errors->first('instagram')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Facebook link</label>
                <input type="text" id="inputName" value="{{$contact->facebook}}" name="facebook" class="form-control">
                @if ($errors->first('facebook'))
                    <span class="alert alert-danger">{{$errors->first('facebook')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Twitter link</label>
                <input type="text" id="inputName" value="{{$contact->twitter}}" name="twitter" class="form-control">
                @if ($errors->first('twitter'))
                    <span class="alert alert-danger">{{$errors->first('twitter')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Youtube link</label>
                <input type="text" id="inputName" value="{{$contact->youtube}}" name="youtube" class="form-control">
                @if ($errors->first('youtube'))
                    <span class="alert alert-danger">{{$errors->first('youtube')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Telefon 1</label>
                <input type="text" id="inputName" value="{{$contact->phone1}}" name="phone1" class="form-control">
                @if ($errors->first('phone1'))
                    <span class="alert alert-danger">{{$errors->first('phone1')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Email</label>
                <input type="text" id="inputName" value="{{$contact->email}}" name="email" class="form-control">
                @if ($errors->first('email'))
                    <span class="alert alert-danger">{{$errors->first('email')}}</span>
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

@endsection