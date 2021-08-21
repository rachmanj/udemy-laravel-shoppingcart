@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">New Product</h3>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Product name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}">
                  </div>
                  <div class="form-group">
                    <label for="price">Product price</label>
                    <input type="number" name="price" class="form-control" id="price" min="1" value="{{ old('price', $product->price) }}">
                  </div>
                  <div class="form-group">
                    <label>Product category</label>
                    <select class="form-control select2" style="width: 100%;" name="categories_id">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ $product->categories_id === $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <label for="product_image">Product image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="product_image" id="product_image">
                      <label class="custom-file-label">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                  <input type="submit" class="btn btn-success" value="Save">
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
      <!-- jquery-validation -->
  <script src="{{ asset('assets/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>

@endsection