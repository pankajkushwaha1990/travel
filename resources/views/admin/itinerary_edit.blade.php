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
          <form role="form" method="post" enctype="multipart/form-data" action="{{ url('/itinerary-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="itinerary_id" value="{{ $list->id }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
 <div class="card-body">
               
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Category *</label>
                    <select class="selectpicker form-control select_category" name="category_name" required="">
                      <option value="" >Select Category</option>
                      @foreach($category_list as $category)
                       <option @if($list->category_id==$category->id){{ 'selected' }} @endif value="{{ $category->id }}" >{{ $category->category_name }}</option>
                      @endforeach
                    </select>

                    @if ($errors->has('category_name')) <p style="color:red;">{{ $errors->first('category_name') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span class="name">Itinerary</span> Name *</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $list->Itinerary_name }}" required="">
                    @if ($errors->has('Itinerary_name')) <p style="color:red;">{{ $errors->first('Itinerary_name') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-3">
                     <div class="form-group">
                      <label ><span class="name">Itinerary</span> Logo (32*32)px</label>
                      <div class="input-group">
                        <div class="custom-file2">
                          <input type="file" name="logo_image" class="custom-file-input2" id="src" >
                          <label class="custom-file-label2" for="exampleInputFile">Choose Attachment</label>
                        </div>
                       </div>
                     </div>
                </div>  
                <div class="col-md-3">
                       <div class="form-group">
                        <label>Logo Preview</label>
                        <img id="target" style="width: 64px;height: 64px;" src="{{ url('').'/itinerary_image/'.$list->Itinerary_image }}" />
                        <input type="hidden" name="logo_image_old" class="custom-file-input2" value="{{ $list->Itinerary_image }}" required="">
                        </div>
                </div>
              </div>  
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >Country *</label>
                       <select class="selectpicker form-control select_country" data-live-search="true" name="country" required="">
                        <option value="" >Select Country</option>
                        @foreach($country_list as $country)
                         <option  @if($list->country==$country->id){{ 'selected' }} @endif value="{{ $country->id }}" >{{ $country->name }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('country')) <p style="color:red;">{{ $errors->first('country') }}</p> @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >State *</label>
                      <select class="form-control select_state" data-live-search="true" name="state" required="">
                        <option value="" >Select State</option>
                       
                      </select>
                      @if ($errors->has('state')) <p style="color:red;">{{ $errors->first('state') }}</p> @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label >City *</label>
                       <select class="form-control select_city" data-live-search="true" name="city" required="">
                        <option value="" >Select City</option>
                       
                      </select>
                      @if ($errors->has('city')) <p style="color:red;">{{ $errors->first('city') }}</p> @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                      <label ><span class="one_way"></span> Amount <span class="two_way"></span>*</label>
                      <input name="amount" type="text" class="form-control" placeholder="Enter Amount" value="{{ $list->price }}" required="">
                      @if ($errors->has('amount')) <p style="color:red;">{{ $errors->first('amount') }}</p> @endif
                  </div>
                  </div>
                 
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label >Description *</label>
                    <textarea name="description" required="" class="form-control textareaeditor" placeholder="Enter Description">{{ $list->Itinerary_description }} </textarea>
                    @if ($errors->has('description')) <p style="color:red;">{{ $errors->first('description') }}</p> @endif
                  </div>
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
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

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

    $('.select_country').change(function(){
      var country_id = $(this).val();
      if(country_id!=''){
        var state_html = '';
        $.ajax('<?php echo url('ajax-state-details-by-country_id');?>', {
                type: 'GET',  // http method
                data: { country_id:country_id },  // data to submit
                success: function (data, status, xhr) {
                  var state = $.parseJSON(data);
                  $.each( state, function( index, value ){
                      state_html+='<option value="'+value.id+'" >'+value.name+'</option>'
                  });
                  $('.select_state').html(state_html);
                }
        });
      }
    })
    $(document).ready(function(){
      var country_id     = $('.select_country').val();
      var state_selected = '<?php echo $list->state;?>'; 
      if(country_id!=''){
        var state_html = '';
        $.ajax('<?php echo url('ajax-state-details-by-country_id');?>', {
                type: 'GET',  // http method
                data: { country_id:country_id },  // data to submit
                success: function (data, status, xhr) {
                  var state = $.parseJSON(data);
                  $.each( state, function( index, value ){
                      if(state_selected==value.id){
                        state_html+='<option selected value="'+value.id+'" >'+value.name+'</option>'
                      }else{
                        state_html+='<option value="'+value.id+'" >'+value.name+'</option>'
                      }
                  });
                  $('.select_state').html(state_html);
                }
        });
        getCity(state_selected)
      }
    })

    $('body').on('change','.select_state',function(){
      var state_id = $(this).val();
      if(state_id!=''){
        var city_html = '';
        $.ajax('<?php echo url('ajax-city-details-by-state_id');?>', {
                type: 'GET',  // http method
                data: { state_id:state_id },  // data to submit
                success: function (data, status, xhr) {
                  var city = $.parseJSON(data);
                  $.each( city, function( index, value ){
                      city_html+='<option value="'+value.id+'" >'+value.name+'</option>'
                  });
                  $('.select_city').html(city_html);
                }
        });
      }
    })

    function getCity(state_id){
      var state_id = state_id;
      if(state_id!=''){
        var city_html = '';
      var city_selected = '<?php echo $list->city;?>'; 

        $.ajax('<?php echo url('ajax-city-details-by-state_id');?>', {
                type: 'GET',  // http method
                data: { state_id:state_id },  // data to submit
                success: function (data, status, xhr) {
                  var city = $.parseJSON(data);
                  $.each( city, function( index, value ){
                    if(city_selected==value.id){
                      city_html+='<option selected value="'+value.id+'" >'+value.name+'</option>'

                    }else{
                      city_html+='<option value="'+value.id+'" >'+value.name+'</option>'

                    }

                  });
                  $('.select_city').html(city_html);
                }
        });
      }
    }
    
  </script>
  @endsection