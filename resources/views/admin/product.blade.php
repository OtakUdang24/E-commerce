@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Products
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Data</a></li>
        <li class="active">Product</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover display">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12 col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Product</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <form role="form" id="addproduct">
                        <div class="box-body" style="">
                            <div class="form-group">
                                <label for="exampleInputCode">Code</label>
                                <input type="text" readonly class="form-control" id="exampleInputCode"
                                    placeholder="BRG-0001">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputStock">Stock</label>
                                <input type="text" class="form-control" id="exampleInputStock" placeholder="Stock">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhoto">Photo</label>
                                <div class="col-xs-12">
                                    <img id="preview" width="200" height="200" />
                                    <input type="file" style="margin-top: 20px;" name="cover" id="imgInp">

                                    <p class="help-block">Photo Product.</p>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>

                            <div class="form-group">
                                <label>Categories</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('js')
<script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        readURL(this);
    });
</script>

@endsection