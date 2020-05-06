@extends('master') 
@section('title','Dashboard')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-md-12">
          <form role="form" method="post" enctype="multipart/form-data" action="{{ url('category-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
<div class="card-body">
               
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name *</label>
                    <input type="text" name="category_name" class="form-control"  placeholder="Enter Category Name" value="{{ $list->category_name }}" required="">
                    @if ($errors->has('category_name')) <p style="color:red;">{{ $errors->first('category_name') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Category Logo (32*32)px</label>
                              <div class="input-group">
                                <div class="custom-file2">
                                  <input type="file" name="category_image" class="custom-file-input2" id="src">
                                  <label class="custom-file-label2" for="exampleInputFile">Choose Attachment</label>
                                  <input type="hidden" name="category_image_old" value="{{ $list->category_logo }}" id="src">
                                  <input type="hidden" name="category_id" value="{{ $list->id }}" required="">
                                  
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Logo Preview</label>
                              <img src="{{ url('').'/category_image/'.$list->category_logo }}" id="target" style="width: 64px;height: 64px;"/>
                              </div>
                            </div>
                          </div>  
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label >Description *</label>
                    <textarea name="category_description" class="form-control" placeholder="Enter Category Description">{{ $list->category_description }} </textarea>
                    @if ($errors->has('category_description')) <p style="color:red;">{{ $errors->first('category_description') }}</p> @endif
                  </div>
                </div>
              </div>

    

              <div class="row">
                <div class="col-md-11">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
              </form>
            </div>
          </div>
            <!-- /.card -->

          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    <script type="text/javascript">
    function showImage(src,target) {
  var fr=new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };
  src.addEventListener("change",function() {
    // fill fr with image data    
    fr.readAsDataURL(src.files[0]);
  });
}

var src = document.getElementById("src");
var target = document.getElementById("target");
showImage(src,target);
  </script>
  @endsection