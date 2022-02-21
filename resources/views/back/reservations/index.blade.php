@extends('back.layouts.master')

@section('title', 'Əlaqə')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @if (session('success'))
          <span class="alert alert-success">{{session('success')}}</span>
        @endif
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Ad, Soyad</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Kart Nömrəsi</th>
                <th>Kart Növü </th>
                <th>Rezerv etdiyi tarix</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($reservations as $r)
                <tr id="tr-id-{{$r->id}}">
                  <td>{{$r->name}}</td>
                  <td>{{$r->email}}</td>
                  <td>{{$r->phone}}</td>
                  <td>{{$r->card_number}}</td>
                  <td>
                    @if (isset($r->card->card->name_az))
                    {{$r->card->card->name_az}}
                    @else
                    <div class="alert alert-danger">Müştərinin daxil etdiyi nömrə sizin verdiyiniz nömrə ilə eyni deyil</div> 
                    @endif
                    
                  </td>
                  <td>{{$r->date}}</td>
                  <td id="id-{{$r->id}}">@if ($r->confirm == 0)
                    <button type="button" data-id="{{$r->id}}" data-num="1" class="btn btn-success check">
                      <i class="fa fa-fw fa-check"></i>
                    </button>
                    @else 
                    <button type="button" data-id="{{$r->id}}" data-num="0" class="btn btn-danger check">
                      <i class="fa fa-fw fa-close"></i>
                    </button>
                  @endif
                  <button type="button" data-id="{{$r->id}}" class="btn btn-danger delete">
                    <i class="fa fa-fw fa-trash"></i>
                  </button>
                    </td>
                </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

  <!-- Button trigger modal -->

    
@endsection


@section('js')
    <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- JavaScript Alertify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    })

    $(document).on('click', '.check', function(){
      num = $(this).data('num');
      id = $(this).data('id');

      if (num == 1) 
      {
        message = "Rezervi təsdiq etmək istədiyinizə əminsiniz?";
      }
      else
      {
        message = "Rezervi ləğv etmək istədiyinizə əminsiniz?";
      }

      alertify.confirm(message,
      function(){
        $.ajax({
        url: '/admin/reserve/check',
        type: 'post',
        data: {id:id, num:num},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(data)
        {
          if(data == 1)
          {
            alertify.success('Rezerv təsdiq olundu');
            $("#id-"+id).html(`<button type="button" data-id="`+id+`" data-num="0" class="btn btn-danger check">
                      <i class="fa fa-fw fa-close"></i>
                    </button>
                    <button type="button" data-id="`+id+`" class="btn btn-danger delete">
                    <i class="fa fa-fw fa-trash"></i>
                  </button>`);
          }
          else
          {
            alertify.error('Rezerv ləğv olundu');
            $("#id-"+id).html(`<button type="button" data-id="`+id+`" data-num="1" class="btn btn-success check">
                      <i class="fa fa-fw fa-check"></i>
                    </button>
                    <button type="button" data-id="`+id+`" class="btn btn-danger delete">
                    <i class="fa fa-fw fa-trash"></i>
                  </button>`);
          }
          
        },
        error: function(data)
        {
          alertify.error('Əməliyyatda problem yarandı');
          console.log(data);
        }
      })

      },
      function(){
        alertify.error('Əməliyyat ləğv edildi');
      }).set({title:"Təsdiq"}).set({labels:{ok:'Bəli', cancel: 'Xeyr'}});

      

      

      
    })
  });

  $(document).on('click', '.delete', function(){
        id = $(this).data('id');
        alertify.confirm("Silmək istədiyinizə əminsiniz?", 
        function(){
          $.ajax({
            url: '/admin/reserve/delete',
            type: 'post',
            data: {id:id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function()
            {
              alertify.success('Məlumat Silindi');
              $("#tr-id-"+id).fadeOut('slow');
            },
            error: function(data)
            {
              console.log(data);
              alertify.error('Əməliyyatda problem yarandı');
            }
          })
        },
        function(){
          alertify.error('Əməliyyat ləğv edildi');
        }).set({title:"Silmək"}).set({labels:{ok:'Bəli', cancel: 'Xeyr'}});
      })


</script>
@endsection