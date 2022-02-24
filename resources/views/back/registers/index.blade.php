@extends('back.layouts.master')

@section('title', 'Qeydiyyatdan keçənlər')
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
                <th>Seçdiyi Kart Növü</th>
                <th>Kart Nömrəsi</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($registers as $r)
                <tr id="tr-id-{{$r->id}}">
                  <td>{{$r->name}}</td>
                  <td>{{$r->email}}</td>
                  <td>{{$r->phone}}</td>
                  <td>{{$r->card->name_az}}</td>
                  <td id="td-{{$r->id}}">{{$r->card_number}}</td>
                  <td><button type="button" class="btn btn-primary card_number" id="num-{{$r->id}}" data-number="{{$r->card_number}}" data-name="{{$r->name}}" data-id="{{$r->id}}" data-toggle="modal" data-target="#exampleModalCenter">
                    Kart Nömrəsi Ver
                  </button>
                <button class="btn btn-danger delete" data-id="{{$r->id}}">
                  <i class="fa fa-fw fa-trash"></i></button></td>
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Maricel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="javascript:void(0)" id="card_number_form" method="post">
      <div class="modal-body">
       <div class="form-group">
         <label for="card_number">Kart Nömrəsi</label>
         <input type="text" name="card_number" id="card_number_input" class="form-control">
         <input type="hidden" name="id_hidden" id="id_hidden">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

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
      "responsive": true, "lengthChange": false, "autoWidth": false
    })

    $(".card_number").click(function(){
      var number = $(this).data('number');
      var name = $(this).data('name');
      var id = $(this).data('id');
      var old_number = $("#num-"+id);
      $('#card_number_input').val(number);
      $('#exampleModalLongTitle').html(name);
      $('#id_hidden').val(id);
    })

    $(document).on('click', '.delete', function(){
        id = $(this).data('id');
        alertify.confirm("Silmək istədiyinizə əminsiniz?",
        function(){
          $.ajax({
            url: '/admin/register/delete',
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

    $('#card_number_form').on('submit', function(){
      var form_data = $('#card_number_form').serialize();

      $.ajax({
        url: "/admin/register/card-number",
        type: "POST",
        data: form_data,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend: function()
        {
          $('#exampleModalCenter').css('opacity', '.4');
          $('.save').attr('disabled', 'disabled')
          $('.close_modal').attr('disabled', 'disabled')
          $('.loader').css('display', 'block')
        },
        success: function(data)
        {
          $('.loader').fadeOut()
          $('#exampleModalCenter').css('opacity', '1')
          $('#exampleModalCenter').modal('hide')
          alertify.alert('Kart nömrəsi uğurla verildi! İstifadəçiyə Email göndərildi!');
          $('.save').attr('disabled', false)
          $('.close_modal').attr('disabled', false)
          $('#td-'+data.id).html(data.card_number);
          $("#num-"+data.id).data('number', data.card_number);
        },
        error: function(data){
          console.log(data);
        }
      })
    })
  });


</script>

<style>

body {margin: 0; padding: 0; overflow: hidden;}
@keyframes loader-animation {
  0% {
    left: -100%;
  }
  49% {
    left: 100%;
  }
  50% {
    left: 100%;
  }
  100% {
    left: -100%;
  }
}
.loader {
  height: 5px;
  width: 100%;
}
.loader .bar {
  width:100%;
  position: absolute;
  height: 5px;
  background-color: rgb(71, 47, 209);
  animation-name: loader-animation;
  animation-duration: 3s;
  animation-iteration-count: infinite;
  animation-timing-function: ease-in-out;
}

</style>
@endsection
