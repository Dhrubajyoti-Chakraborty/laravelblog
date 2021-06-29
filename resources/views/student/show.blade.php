@extends('layouts.app')

@section('headSection')

<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">

@endSection

@section('main-content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @include('layouts.pagehead')

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Posts</h3>
          <a href="{{--route('post.create')--}}" class="col-lg-offset-5 btn btn-success">Add New</a>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>S.No.</td>
                  <td>Title</td>
                  <td>Sub Title</td>
                  <td>Slug</td>
                  <td>Created At</td>
                  <td>Edit</td>
              
                  <td>Delete</td>
                </tr>
                </thead>
                <tbody>
              @foreach($students as $student)
              <tr>
                  <th>{{$loop->index + 1}}</th>
                  <th>{{$student->title}}</th>
                  <th>{{$student->subtitle}}</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                  <th>{{$student->slug}}</th>
                  <th>{{$student->created_at}}</th>
                  <th><a href="{{route('student.edit',$student->id)}}"> <span class="glyphicon glyphicon-edit"></a></span></th>
                
                  <th>
                  <form id="delete-form-{{$student->id}}" action="{{route('student.destroy',$student->id)}}" method="post" style="display:none">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  </form>
                  <a href="" onclick="
                  if(confirm('Are you sur to delete?')){
                  event.preventDefault(); document.getElementById('delete-form-{{$student->id}}').submit();
                  }else{
                    event.preventDefault();}">
                    <span class="glyphicon glyphicon-trash"></a></span>
                  </th>
                </tr> 
              @endforeach
            
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
</div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection

@section('footerSection')

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
