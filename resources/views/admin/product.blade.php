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
                    <form method="POST" action="{{ route('product.store') }}" role="form" id="addproduct">
                        @csrf
                        <div class="box-body" style="">
                            <div class="form-group">
                                <label for="exampleInputCode">Code</label>
                                <input type="text" readonly class="form-control" id="exampleInputCode"
                                    placeholder="BRG-0001">
                            </div>
                            <div class="form-group {{ ($errors->first('name')) ? 'has-error'  : ''}}">
                                <label class="control-label" for="inputError"><i class="{{ ($errors->first('name')) ? 'fa fa-times-circle-o'  : ''}}"></i> Name</label>
                                <input name="name" type="text" class="form-control" id="inputError" value="{{ old('username') }}" placeholder="Name">
                                @if($errors->first('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ ($errors->first('description')) ? 'has-error'  : ''}}">
                                <label class="control-label" for="inputError"><i class="{{ ($errors->first('description')) ? 'fa fa-times-circle-o'  : ''}}"></i> Description</label>
                                <textarea class="form-control" name="description" value="{{ old('description') }}" id="inputError" rows="3" placeholder="Enter ..."></textarea>
                                @if($errors->first('description'))
                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ ($errors->first('stock')) ? 'has-error'  : ''}}">
                                <label class="control-label" for="inputError"><i class="{{ ($errors->first('stock')) ? 'fa fa-times-circle-o'  : ''}}"></i> Stock</label>
                                <input type="text" class="form-control" name="stock" value="{{ old('stock') }}" id="inputError" placeholder="Stock">
                                @if($errors->first('stock'))
                                    <span class="help-block">{{ $errors->first('stock') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ ($errors->first('photo')) ? 'has-error'  : ''}}">
                                
                                <div class="col-xs-12">
                                <label class="control-label" for="imgInp"><i class="{{ ($errors->first('photo')) ? 'fa fa-times-circle-o'  : ''}}"></i> Photo</label>
                                </div>
                                    <img id="preview" width="200" height="200" />
                                    <input type="file" style="margin-top: 20px;" name="cover" id="imgInp">
                                    @if($errors->first('photo'))
                                    <span class="help-block">{{ $errors->first('photo') }}</span>
                                @endif
                                <!-- </div> -->
                            </div>
                            <div class="form-group {{ ($errors->first('price')) ? 'has-error'  : ''}}">
                                <div class="input-group">
                                    <!-- <label class="control-label" for="inpurError"><i class="fa fa-times-circle-o"></i> Price</label> -->
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                    <span class="input-group-addon">.00</span> 
                                </div>
                            @if($errors->first('price'))
                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif                          
                            </div>

                
                            <div class="form-group {{ ($errors->first('category_id')) ? 'has-error'  : ''}}">
                                <label class="control-label" for="imgInp"><i class="{{ ($errors->first('category_id')) ? 'fa fa-times-circle-o'  : ''}}"></i> Category</label>
                                <select name="category_id" class="form-control">
                                    <option></option>
                                    <option value="1">option 2</option>
                                    <option value="2">option 3</option>
                                    <option value="3">option 4</option>
                                    <option value="4">option 5</option>
                                </select>
                                @if($errors->first('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
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