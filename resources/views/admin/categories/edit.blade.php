@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->

              @if (Session::has('status'))
                <div class="alert alert-success">
                  {{ Session::get('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            @endif

            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
              @csrf @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category name</label>
                  <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" value={{ old('category_name', $category->category_name) }}>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                <input type="submit" class="btn btn-primary" value="Save" >
              </div>
            </form>
              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('scripts')
  <!-- DataTables -->
  <script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


  <script>
    $(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
      if (confirmed){
          window.location.href = link;
        };
      });
    });
  </script>
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection