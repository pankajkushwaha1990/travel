 
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
 
</style>
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
          <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(url('package-create-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Package</h3>
              </div>
               <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Package Name *</label>
                      <input type="text" name="package_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Name" value="<?php echo e(old('package_name')); ?>" required="">
                      <?php if($errors->has('package_name')): ?> <p style="color:red;"><?php echo e($errors->first('package_name')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Package Days *</label>
                      <input type="number" name="package_day" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Days" value="<?php echo e(old('package_day')); ?>" required="">
                      <?php if($errors->has('package_day')): ?> <p style="color:red;"><?php echo e($errors->first('package_day')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Package Nights *</label>
                      <input type="number" name="package_night" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Nights" value="<?php echo e(old('package_day')); ?>" required="">
                      <?php if($errors->has('package_night')): ?> <p style="color:red;"><?php echo e($errors->first('package_night')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Package Validity *</label>
                      <input name="package_validity" type="text" class="form-control" placeholder="Enter Package Validity" value="<?php echo e(old('package_validity')); ?>" required="">
                      <?php if($errors->has('package_validity')): ?> <p style="color:red;"><?php echo e($errors->first('package_validity')); ?></p> <?php endif; ?>
                  </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Select Country *</label>
                      <select class="selectpicker form-control" data-live-search="true" name="package_country" required="">
                         <option value="" >Select Country</option>
                        <?php if(!empty($country_list)): ?>
                          <?php $__currentLoopData = $country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($country->id); ?>" ><?php echo e($country->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                        <?php if($errors->has('amenities_list')): ?> <p style="color:red;"><?php echo e($errors->first('amenities_list')); ?></p> <?php endif; ?>
                     </div>
                    </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Purchase Limit *</label>
                      <input name="package_purchase_limit" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Limit" value="<?php echo e(old('package_purchase_limit')); ?>" required="">
                      <?php if($errors->has('package_purchase_limit')): ?> <p style="color:red;"><?php echo e($errors->first('package_purchase_limit')); ?></p> <?php endif; ?>
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Amenities List *</label>
                      <select class="selectpicker form-control" data-live-search="true" multiple="" name="amenities_list[]" required="">
                        <?php if(!empty($amenities_list)): ?>
                          <?php $__currentLoopData = $amenities_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($amenities->id); ?>" ><?php echo e($amenities->amenities_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                        <?php if($errors->has('amenities_list')): ?> <p style="color:red;"><?php echo e($errors->first('amenities_list')); ?></p> <?php endif; ?>
                     </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Hotel List *</label>
                      <select class="selectpicker form-control" data-live-search="true"  name="hotel_list">
                        <option value="">Select Hotel</option>
                        <?php if(!empty($hotel_list)): ?>
                          <?php $__currentLoopData = $hotel_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($hotel->id); ?>" ><?php echo e($hotel->Itinerary_name); ?> (<?php echo e($hotel->country_details[0]->name."/".$hotel->state_details[0]->name."/".$hotel->city_details[0]->name); ?>)</option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                        <?php if($errors->has('amenities_list')): ?> <p style="color:red;"><?php echo e($errors->first('amenities_list')); ?></p> <?php endif; ?>
                     </div>
                    </div>

                    <div class="col-md-4">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Hotel Category *</label>
                      <select name="hotel_category" class="form-control" required="" >
                        <option selected="" value="1">Select Hotel Category</option>

                        <option value="1">1 * Star</option>
                        <option  value="2">2 * Star</option>
                        <option  value="3">3 *  Star</option>
                        <option  value="4">4 * Star</option>
                        <option  value="5">5 * Star</option>
                        <!-- <option value="1">Admin</option> -->
                      </select>
                      <?php if($errors->has('email_verify')): ?> <p style="color:red;"><?php echo e($errors->first('email_verify')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                 </div>
                 <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Flight List *</label>
                      <select class="selectpicker form-control" data-live-search="true" name="flights_list[]" >
                        <option value=''>Select Flight</option>
                        <?php if(!empty($flights_list)): ?>
                          <?php $__currentLoopData = $flights_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($flight->id); ?>" ><?php echo e($flight->Itinerary_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                        <?php if($errors->has('flights_list')): ?> <p style="color:red;"><?php echo e($errors->first('flights_list')); ?></p> <?php endif; ?>
                     </div>
                    </div>
                    <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight Type *</label>
                      <select name="flight_type[]" class="form-control" >
                        <option value="">Select Type</option>
                        <option  value="arrival">Arrival</option>
                        <option  value="departure">Departure</option>
                        <!-- <option value="1">Admin</option> -->
                      </select>
                      <?php if($errors->has('flight_type')): ?> <p style="color:red;"><?php echo e($errors->first('flight_type')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Date/Time*</label>
                       <input name="flight_date_time[]" type="datetime-local" class="form-control" placeholder="Enter Title" value="" >
                     
                      <?php if($errors->has('flight_date_time')): ?> <p style="color:red;"><?php echo e($errors->first('flight_date_time')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight No.*</label>
                       <input name="flight_number[]" type="text" class="form-control" placeholder="Enter Flight No." value="" >
                     
                      <?php if($errors->has('flight_number')): ?> <p style="color:red;"><?php echo e($errors->first('flight_number')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight From.*</label>
                       <input name="flight_from[]" type="text" class="form-control" placeholder="From" value="" >
                     
                      <?php if($errors->has('flight_from')): ?> <p style="color:red;"><?php echo e($errors->first('flight_from')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-md-1">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight To.*</label>
                       <input name="flight_to[]" type="text" class="form-control" placeholder="To" value="">
                     
                      <?php if($errors->has('flight_to')): ?> <p style="color:red;"><?php echo e($errors->first('flight_to')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Duration.*</label>
                       <input name="duration[]" type="text" class="form-control" placeholder="HH:MM" value="">
                     
                      <?php if($errors->has('duration')): ?> <p style="color:red;"><?php echo e($errors->first('duration')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                 </div>

                  <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Flight List *</label>
                      <select class="selectpicker form-control" data-live-search="true" name="flights_list[]" >
                        <option value=''>Select Flight</option>
                        <?php if(!empty($flights_list)): ?>
                          <?php $__currentLoopData = $flights_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($flight->id); ?>" ><?php echo e($flight->Itinerary_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                        <?php if($errors->has('flights_list')): ?> <p style="color:red;"><?php echo e($errors->first('flights_list')); ?></p> <?php endif; ?>
                     </div>
                    </div>
                    <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight Type *</label>
                      <select name="flight_type[]" class="form-control">
                        <option selected="" value="">Select Type</option>
                        <option  value="arrival">Arrival</option>
                        <option  value="departure" selected="">Departure</option>
                        <!-- <option value="1">Admin</option> -->
                      </select>
                      <?php if($errors->has('flight_type')): ?> <p style="color:red;"><?php echo e($errors->first('flight_type')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Date/Time*</label>
                       <input name="flight_date_time[]" type="datetime-local" class="form-control" placeholder="Enter Title" value="">
                     
                      <?php if($errors->has('flight_date_time')): ?> <p style="color:red;"><?php echo e($errors->first('flight_date_time')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight No.*</label>
                       <input name="flight_number[]" type="text" class="form-control" placeholder="Enter Flight No." value="" >
                     
                      <?php if($errors->has('flight_number')): ?> <p style="color:red;"><?php echo e($errors->first('flight_number')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight From.*</label>
                       <input name="flight_from[]" type="text" class="form-control" placeholder="From" value="" >
                     
                      <?php if($errors->has('flight_from')): ?> <p style="color:red;"><?php echo e($errors->first('flight_from')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-md-1">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Flight To.*</label>
                       <input name="flight_to[]" type="text" class="form-control" placeholder="To" value="" >
                     
                      <?php if($errors->has('flight_to')): ?> <p style="color:red;"><?php echo e($errors->first('flight_to')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Duration.*</label>
                       <input name="duration[]" type="text" class="form-control" placeholder="HH:MM" value="">
                     
                      <?php if($errors->has('duration')): ?> <p style="color:red;"><?php echo e($errors->first('duration')); ?></p> <?php endif; ?>
                    </div>
                  </div>
                 </div>
                  <div class="row">
                     <div class="col-md-6">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Package Image *</label>
                     </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                       <input name="package_image_title[]" type="text" class="form-control" placeholder="Enter Banner Title" value="" required="">
                       </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                       <input name="package_image_description[]" type="text" class="form-control"  placeholder="Enter Description" value="" required="">
                       </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                       <input name="package_image[]" type="file" class="form-control package_image_select" ids="package_image_select" placeholder="Enter Description" value="" required="">
                       </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <img src="" id="package_image_select" alt="For Banner Image">
                       </div>
                    </div>
                     <div class="col-md-1">
                      <div class="form-group">
                        <button type="button" class="btn btn-success addMorePackageImageClick">+</button>
                       </div>
                    </div>
                  </div>

                 <div class="addMorePackageImage">
                  
                 </div>

                <div class="row">
                     <div class="col-md-6">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Iternity Add*</label>
                     </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                       <label for="exampleInputEmail1"></label>
                     </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Default  - Optional</label>
                     </div>
                    </div>
                    
                  </div>

                  <div class="row">

                  <div class="col-md-2">
                    <div class="form-group">
                      <select name="iternity_day[]" class="form-control" required="">
                        <option  value="">Select Day</option>
                        <?php 
                        $days = range(1,15);
                        foreach ($days as $key => $day) { ?>
                          <option  value="<?php echo $day;?>"><?php echo $day;?> Day</option>
                        <?php } ?>
                      </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                       <!-- <div class="form-group"> -->
                        <!-- <label for="exampleInputEmail1">Select Category *</label> -->
                        <select class="form-control select_iternary" name="iternity_item[]" required="">
                          <option value="" >Select Itinerary</option>
                          <?php $__currentLoopData = $itinerary_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($itinerary->id); ?>" amount="<?php echo e($itinerary->price); ?>"><?php echo e($itinerary->Itinerary_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('iternity_item')): ?> <p style="color:red;"><?php echo e($errors->first('iternity_item')); ?></p> <?php endif; ?>
                      </div>
                     <!-- <input name="iternity_title[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="" required=""> -->
                     <!-- </div> -->
                  </div>
              
                  <div class="col-md-3 class_add_ways">
                    <div class="form-group">
                     <input name="iternity_cost[]" class="form-control item_cost" id="" placeholder="Enter Amount" value="" required="">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="range" class="default_optional_slider" name="iternity_default_status[]" value="0" name="0" min="0" max="1">
                     </div>
                  </div>
                   <div class="col-md-1">
                    <div class="form-group">
                      <button type="button" class="btn btn-success addMorePackageIternity">+</button>
                     </div>
                  </div>
                </div>

                 <div class="addMorePackageIternityContent">
                  
                </div>

                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Package Description *</label>
                    <textarea name="package_description" required="" class="form-control textareaeditor" placeholder="Enter Amenities Description"> </textarea>
                                      </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Terms & Conditions *</label>
                    <textarea name="package_term_condition" required="" class="form-control" placeholder="Enter Amenities Description"> </textarea>
                                      </div>
                </div>
              </div>


 
               

       

              <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Iternrary Amount *</label>
                      <div class="iternity_amount"></div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Final Amount *</label>
                      <input type="number" name="" class="form-control final_amount" id="exampleInputEmail1" placeholder="Enter Final Amount" value="" required="">
                                          </div>
                  </div>
                 
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Add Tax (Percentage)*</label>
                      <input name="" type="text" class="form-control add_tax" placeholder="Enter Tax Percentage" value="" required="">
                                        </div>
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Final Amount *</label>
                       <div class="final_amount_submit"></div>
                      <input name="package_cost" type="hidden" class="form-control final_amount_submit_hidden"  value="0" required="">

                       <div class="package_cost"></div>
                      </div>
                  </div>

                  <div class="col-md-1">
                   <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <button type="button" class="btn btn-success calculate_amount">Calculate</button>
                  </div>
                </div>

               
                <div class="col-md-1">
                   <div class="form-group">
                    <label for="exampleInputEmail1"></label>

                    <div><button class="btn btn-success submit_button" style="display: none;">Submit</button></div>,
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
  <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
  <script type="text/javascript">
    $('body').on('change','.package_image_select',function(e){
         var ids = $(this).attr('ids');
         readURL(this,ids);
    })


    function readURL(input,ids) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+ids).attr('src', e.target.result).width(32).height(32);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
  <script type="text/javascript">
    $(function(){
      $('.addMorePackageImageClick').click(function(){
        var lengths = $('input').length;
        var html = '<div class="row"><div class="col-md-3"><div class="form-group"><input name="package_image_title[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="" required=""></div></div><div class="col-md-3"><div class="form-group"><input name="package_image_description[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="" required=""></div></div><div class="col-md-3"><div class="form-group"><input name="package_image[]" type="file" class="form-control package_image_select" ids="'+lengths+'" placeholder="Enter Description" value="" required=""></div></div><div class="col-md-2"><div class="form-group"><img src="" id="'+lengths+'"></div></div><div class="col-md-1"><div class="form-group"><button type="button" class="btn btn-danger removeMorePackageImageClick">-</button></div></div></div>';
        $('.addMorePackageImage').append(html);
      })

      $('body').on('click','.removeMorePackageImageClick',function(){
        $(this).parent().parent().parent().remove();
      })

      $('.addMorePackageIternity').click(function(){
        var php_cate = '<?php echo json_encode($itinerary_list); ?>';
        var itinerary_list = $.parseJSON(php_cate);
        var state_html = '';
        $.each( itinerary_list, function( index, value ){
                      state_html+='<option  value="'+value.id+'" amount="'+value.price+'" >'+value.Itinerary_name+'</option>';
        });
        var html2 ='<div class="row"><div class="col-md-2"><div class="form-group"><select name="iternity_day[]" class="form-control" required=""><option value="">Select Day</option><option value="1">1 Day</option><option value="2">2 Day</option><option value="3">3 Day</option><option value="4">4 Day</option><option value="5">5 Day</option><option value="6">6 Day</option><option value="7">7 Day</option><option value="8">8 Day</option><option value="9">9 Day</option><option value="10">10 Day</option><option value="11">11 Day</option><option value="12">12 Day</option><option value="13">13 Day</option><option value="14">14 Day</option><option value="15">15 Day</option></select></div></div><div class="col-md-4"><div class="form-group"><select class="form-control select_iternary" name="iternity_item[]" required=""><option value="">Select Itinerary</option>'+state_html+'</select></div></div><div class="col-md-3 class_add_ways"><div class="form-group"><input name="iternity_cost[]" class="form-control item_cost" id="" placeholder="Enter Amount" value="" required=""></div></div><div class="col-md-2"><div class="form-group"><input type="range" name="iternity_default_status[]" class="default_optional_slider" value="0" min="0" max="1"></div></div><div class="col-md-1"><div class="form-group"><button class="btn btn-danger rempoveMorePackageIternity">-</button></div></div></div>';
        $('.addMorePackageIternityContent').append(html2);
      })

      $('body').on('click','.rempoveMorePackageIternity',function(){
        $(this).parent().parent().parent().remove();
      })

      // $('body').on('change','.select_category',function(){
      // var current_index = $(this).index('.select_category');

      //   var category_id = $(this).val();
      //   if(category_id!=''){
      //     var list_html = '<option value="">Select Item</option>';
      //     $.ajax('<?php //echo url('ajax-iternary-details-by-category_id');?>', {
      //             type: 'GET',  // http method
      //             data: { category_id:category_id },  // data to submit
      //             success: function (data, status, xhr) {
      //               var iternary = $.parseJSON(data);
      //               $.each( iternary, function( index, value ){
      //                   list_html+='<option amount="'+value.price+'" value="'+value.id+'" >'+value.Itinerary_name+' ('+value.country+'/'+value.state+'/'+value.city+')</option>'
      //               });
      //               $('.select_iternary').eq(current_index).html(list_html);
      //             }
      //     });
      //   }
      // })

       $('body').on('change','.select_iternary',function(){ 
          var current_index = $(this).index('.select_iternary');
          var itinerary_value = $(this).val();
          var item_cost = $(this).find('option:selected').attr('amount');
          if(itinerary_value==''){
             item_cost = 0;
          }
          $('.item_cost').eq(current_index).val(item_cost);
       })

      // $('body').on('change','.select_ways',function(){ 
      //    var  item_cost = $(this).val();
      //    item_cost      = item_cost.substr(4);
      //    $(this).parent().parent().next().children().find('.item_cost').val(item_cost);
      //     // $('.item_cost').val(item_cost);
      // })

      $('body').on('click','.calculate_amount',function(){ 
        var sum = 0;
        $('.item_cost').each(function( index, value ){
            var default_value = parseInt($('.default_optional_slider').eq(index).val());
            if($(this).val()!='' && default_value==0){
             sum+= parseInt($(this).val());  
            }     
        });
        $('.iternity_amount').text(sum); 
        $('.final_amount_submit').text(sum); 
        $('.final_amount_submit_hidden').val(sum); 

        var final_amount = $('.final_amount').val();
        if(final_amount!=''){
          sum  = parseInt(final_amount);
        }
        $('.final_amount_submit').text(sum); 
        $('.final_amount_submit_hidden').val(sum); 



        var add_tax = $('.add_tax').val();
        if(add_tax!=''){
          sum  += sum*parseInt(add_tax)/100;
        }
        $('.final_amount_submit').text(sum); 
        $('.final_amount_submit_hidden').val(sum); 

        $('.submit_button').show();
      })

      $('body').on('click','.addMorePackageIternity,.addMorePackageIternityContent,.final_amount,.add_tax',function(){ 
        $('.submit_button').hide();
      });


    })
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>