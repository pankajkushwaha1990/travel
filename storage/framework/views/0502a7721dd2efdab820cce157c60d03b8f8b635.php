 
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('styles'); ?>
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
          <form role="form"  enctype="multipart/form-data" method="post" action="<?php echo e(url('student-create-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Section A - Personal Details</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>
             <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title *</label>
                          <select name="title" class="form-control" required="">
                            <option value="">Select Title</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                          </select>
                          <?php if($errors->has('title')): ?> <p style="color:red;"><?php echo e($errors->first('title')); ?></p> <?php endif; ?>

                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Gender *</label>
                          <select name="gender" class="form-control" required="">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Intermediate">Intermediate</option>
                          </select>
                          <?php if($errors->has('gender')): ?> <p style="color:red;"><?php echo e($errors->first('gender')); ?></p> <?php endif; ?>

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Date Of Birth *</label>
                          <input name="date_of_birth" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date Of Birth" value="<?php echo e(old('date_of_birth')); ?>" required="">
                          <?php if($errors->has('date_of_birth')): ?> <p style="color:red;"><?php echo e($errors->first('date_of_birth')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Email *</label>
                          <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address" value="<?php echo e(old('email')); ?>" required="">
                          <?php if($errors->has('email')): ?> <p style="color:red;"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Surname *</label>
                          <input type="text" name="surname" class="form-control" id="exampleInputEmail1" placeholder="Enter Surname" value="<?php echo e(old('surname')); ?>" required="">
                          <?php if($errors->has('surname')): ?> <p style="color:red;"><?php echo e($errors->first('surname')); ?></p> <?php endif; ?>

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Given Name*</label>
                          <input type="text" name="given_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Given Name" value="<?php echo e(old('given_name')); ?>" required="">
                          <?php if($errors->has('given_name')): ?> <p style="color:red;"><?php echo e($errors->first('given_name')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Preferred Name</label>
                          <input type="text" name="proffered_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Preffered Name" value="<?php echo e(old('proffered_name')); ?>">
                          <?php if($errors->has('proffered_name')): ?> <p style="color:red;"><?php echo e($errors->first('proffered_name')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Passport Number *</label>
                          <input type="text" name="passport_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Passport Number" value="<?php echo e(old('passport_number')); ?>" required="">
                          <?php if($errors->has('passport_number')): ?> <p style="color:red;"><?php echo e($errors->first('passport_number')); ?></p> <?php endif; ?>

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Phone Number*</label>
                          <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number" value="<?php echo e(old('phone_number')); ?>" required="">
                          <?php if($errors->has('phone_number')): ?> <p style="color:red;"><?php echo e($errors->first('phone_number')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Postal Code*</label>
                          <input type="text" name="post_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Postal Code" value="<?php echo e(old('post_code')); ?>" required="">
                          <?php if($errors->has('post_code')): ?> <p style="color:red;"><?php echo e($errors->first('post_code')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Town *</label>
                          <input type="text" name="town" class="form-control" id="exampleInputEmail1" placeholder="Enter Town" value="<?php echo e(old('town')); ?>" required="">
                          <?php if($errors->has('town')): ?> <p style="color:red;"><?php echo e($errors->first('town')); ?></p> <?php endif; ?>

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">State*</label>
                          <input type="text" name="state" class="form-control" id="exampleInputEmail1" placeholder="Enter State" value="<?php echo e(old('state')); ?>" required="">
                          <?php if($errors->has('state')): ?> <p style="color:red;"><?php echo e($errors->first('state')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Country *</label>
                          <input type="text" name="country" class="form-control" id="exampleInputEmail1" placeholder="Enter Country" value="<?php echo e(old('country')); ?>" required="">
                          <?php if($errors->has('country')): ?> <p style="color:red;"><?php echo e($errors->first('country')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Town/City Of Birth *</label>
                          <input type="text" name="town_city_birth" class="form-control" id="exampleInputEmail1" placeholder="Enter Town/City" value="<?php echo e(old('town_city_birth')); ?>" required="">
                          <?php if($errors->has('town_city_birth')): ?> <p style="color:red;"><?php echo e($errors->first('town_city_birth')); ?></p> <?php endif; ?>

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Birth Country*</label>
                          <input type="text" name="birth_country" class="form-control" id="exampleInputEmail1" placeholder="Enter Birth Country" value="<?php echo e(old('birth_country')); ?>" required="">
                          <?php if($errors->has('birth_country')): ?> <p style="color:red;"><?php echo e($errors->first('birth_country')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Do you have a valid Australian visa?</label>
                          <select name="valid_australian_visa" class="form-control valid_australian_visa">
                            <option value="">Select Type</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                          <?php if($errors->has('valid_australian_visa')): ?> <p style="color:red;"><?php echo e($errors->first('valid_australian_visa')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Street Address *</label>
                          <textarea type="text" name="street_address" class="form-control" id="exampleInputEmail1" placeholder="Enter Street Address" value="" required=""><?php echo e(old('street_address')); ?></textarea>
                          <?php if($errors->has('street_address')): ?> <p style="color:red;"><?php echo e($errors->first('street_address')); ?></p> <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Australian Visa Details</label>
                          <textarea type="text" name="australian_visa_details" class="form-control australian_visa_details" id="exampleInputEmail1" placeholder="Enter Visa Details" value=""><?php echo e(old('australian_visa_details')); ?></textarea>
                          <?php if($errors->has('australian_visa_details')): ?> <p style="color:red;"><?php echo e($errors->first('australian_visa_details')); ?></p> <?php endif; ?>
                        </div>
                      </div>

                    </div>
               </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section B: Emergency Contact Details</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Contact Name *</label>
                              <input type="text" name="emergency_contact_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Name" value="<?php echo e(old('emergency_contact_name')); ?>" required="">
                              <?php if($errors->has('emergency_contact_name')): ?> <p style="color:red;"><?php echo e($errors->first('emergency_contact_name')); ?></p> <?php endif; ?>

                            </div>
                          </div>

                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Relationship to you*</label>
                              <input name="emergency_relation_to_you" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="<?php echo e(old('emergency_relation_to_you')); ?>" required="">
                              <?php if($errors->has('emergency_relation_to_you')): ?> <p style="color:red;"><?php echo e($errors->first('emergency_relation_to_you')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Contact Number*</label>
                              <input name="emergency_contact_number" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number" value="<?php echo e(old('emergency_contact_number')); ?>" required="">
                              <?php if($errors->has('emergency_contact_number')): ?> <p style="color:red;"><?php echo e($errors->first('emergency_contact_number')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                        </div>
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section C: Language and Cultural Diversity</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Do you speak a language other than English at home? *</label><br>

                              
                                <input type="radio"  name="other_than_english" <?php echo e(old('other_than_english')=='Yes' ? "checked" : ""); ?> id="yes" value="Yes">
                                <label for="yes">Yes</label>
                             
                                <input type="radio" id="no" <?php echo e(old('other_than_english')=='No' ? "checked" : ""); ?> name="other_than_english" value="No">
                                <label for="no">No</label>
                              
                              <?php if($errors->has('other_than_english')): ?> <p style="color:red;"><?php echo e($errors->first('other_than_english')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Yes, specify: *</label>
                              <input type="text" name="other_than_english_specify" class="form-control" id="exampleInputEmail1" placeholder="Specify" value="<?php echo e(old('other_than_english_specify')); ?>">
                              <?php if($errors->has('other_than_english_specify')): ?> <p style="color:red;"><?php echo e($errors->first('other_than_english_specify')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                           <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Are you of Aboriginal or Torres Strait Islander origin? *</label>
                              <select name="islander_origin" class="form-control">
                                <option>Neither</option>
                                <option>Yes, Aboriginal</option>
                                <option>No, T.S. Islander</option>
                              </select>
                              <?php if($errors->has('islander_origin')): ?> <p style="color:red;"><?php echo e($errors->first('islander_origin')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Do you consider yourself to have a permanent/significant disability and/or learning difficulty?</label>
                              <br><small><sup>(Please refer to the Disability Supplement on the official Ashton College website for an explanation of the following terms.)</sup></small>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <input type="radio" <?php echo e(old('significant_disability')=='No' ? "checked" : ""); ?>  name="significant_disability" id="no1" value="No">
                                <label for="no1">No</label>
                              <?php if($errors->has('significant_disability')): ?> <p style="color:red;"><?php echo e($errors->first('significant_disability')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                             <input type="radio" value="Yes" <?php echo e(old('significant_disability')=='Yes' ? "checked" : ""); ?>  id="yes1" name="significant_disability">
                                <label for="yes1">Yes, please indicate:</label>
                              <?php if($errors->has('significant_disability')): ?> <p style="color:red;"><?php echo e($errors->first('significant_disability')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                        </div>
                        <?php 
                              $disArray = old('disability_value');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                                 $finalDids = end($disArray[7]);
                              }else{
                                $disArray = array();
                                $finalDids = '';
                              }
                        ?>
                         <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" <?php echo e(in_array('Hearing',$disArray) ? "checked" : ""); ?>  id="h" name="disability_value[]" value="Hearing">
                                <label for="h">Hearing / Deaf</label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" <?php echo e(in_array('Physical',$disArray) ? "checked" : ""); ?>  id="p" name="disability_value[]" value="Physical">
                                <label for="p">Physical </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" <?php echo e(in_array('Intellectual',$disArray) ? "checked" : ""); ?>  id="i" name="disability_value[]" value="Intellectual">
                                <label for="i">Intellectual </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" <?php echo e(in_array('Learning',$disArray) ? "checked" : ""); ?>  id="l" name="disability_value[]" value="Learning">
                                <label for="l">Learning</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" <?php echo e(in_array('Vision',$disArray) ? "checked" : ""); ?>   id="v" name="disability_value[]" value="Vision">
                                <label for="v">Vision</label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" <?php echo e(in_array('Mental',$disArray) ? "checked" : ""); ?>  id="m" name="disability_value[]" value="Mental">
                                <label for="m">Mental illness </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" <?php echo e(in_array('Medical',$disArray) ? "checked" : ""); ?>  id="c" name="disability_value[]" value="Medical">
                                <label for="c">Medical condition </label>
                            </div>
                          </div>      
                          <div class="col-md-2">
                            <div class="form-group"><label>Other, specify:</label>
                               </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">

                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Specify" value="<?php echo $finalDids;?>" name="disability_value[7]['specify']">
                            </div>
                          </div>
                        </div>


                         <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Have you undertaken an English Language Test?</label>
                              <br>

                              
                                <input type="radio" <?php echo e(old('english_test')=='Yes' ? "checked" : ""); ?>  name="english_test" id="yes99" value="Yes">
                                <label for="yes99">Yes</label>
                             
                                <input type="radio" name="english_test" id="no99" <?php echo e(old('english_test')=='No' ? "checked" : ""); ?> value="No">
                                <label for="no99">No</label>
                              
                              <?php if($errors->has('english_test')): ?> <p style="color:red;"><?php echo e($errors->first('english_test')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Yes, specify: *</label>

                               <select name="english_test_specify" class="form-control">
                                <option>IELTS</option>
                                <option>PTE Academic</option>
                                <option>TOEFL (Paper Based)</option>
                                <option>TOEFL (Internet Based)</option>
                                <option>Cambridge English (FCE)</option>
                                <option>Cambridge English (CAE)</option>
                                <option>Cambridge English (CPE)</option>
                                <option>Other</option>
                              </select>
                              <?php if($errors->has('english_test_specify')): ?> <p style="color:red;"><?php echo e($errors->first('english_test_specify')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                           <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Score:</label>
                              <input type="text" name="english_score" class="form-control" id="exampleInputEmail1" placeholder="Enter Score" value="<?php echo e(old('english_score')); ?>">
                              <?php if($errors->has('english_score')): ?> <p style="color:red;"><?php echo e($errors->first('english_score')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Date undertaken:</label>
                              <input type="text" name="english_date" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date" value="<?php echo e(old('english_date')); ?>">
                              <?php if($errors->has('english_date')): ?> <p style="color:red;"><?php echo e($errors->first('english_date')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                        </div>



                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section D: Overseas Student Health Cover</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                      
                    </div>
                  </div>
                  <div class="card-body">
                                             <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Do you require Ashton College to arrange Overseas Student Health Cover for you (OSHC)?</label>
                              <br>

                              
                                <input type="radio" <?php echo e(old('health_cover')=='Yes' ? "checked" : ""); ?> name="health_cover" value="Yes" id="yes101">
                                <label for="yes101">Yes</label>
                             
                                <input type="radio" name="health_cover" value="No" id="no101" <?php echo e(old('health_cover')=='No' ? "checked" : ""); ?>>
                                <label for="no101">No</label>
                              
                              <?php if($errors->has('health_cover')): ?> <p style="color:red;"><?php echo e($errors->first('health_cover')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1">No, provide your membership no</label>
                              <input type="text" name="mambership_no" class="form-control" id="exampleInputEmail1" placeholder="Membership No" value="<?php echo e(old('mambership_no')); ?>">
                              <?php if($errors->has('mambership_no')): ?> <p style="color:red;"><?php echo e($errors->first('mambership_no')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Please Provide Policy expiry date:</label><br>
                              <input type="text" name="policy_expire" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date" value="<?php echo e(old('policy_expire')); ?>">
                              <?php if($errors->has('policy_expire')): ?> <p style="color:red;"><?php echo e($errors->first('policy_expire')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                          
                           <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Yes, type of OSHC policy:</label>
                              <input type="text" name="policy_no" class="form-control" id="exampleInputEmail1" placeholder="Policy" value="<?php echo e(old('policy_no')); ?>">
                              <?php if($errors->has('policy_no')): ?> <p style="color:red;"><?php echo e($errors->first('policy_no')); ?></p> <?php endif; ?>

                            </div>
                          </div>
                         
                        </div>
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section E: Education and Experience</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                             <h6>What is your highest COMPLETED school level?</h6>
                            </div>
                          </div>
                    </div>

                    <?php 
                              $disArray = old('highest_school');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                    <div class="row">
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" <?php echo e(in_array('12 eq',$disArray) ? "checked" : ""); ?> type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="12 eq">Year 12 eq
                              <?php if($errors->has('highest_school')): ?> <p style="color:red;"><?php echo e($errors->first('highest_school')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" <?php echo e(in_array('11 eq',$disArray) ? "checked" : ""); ?> type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="11 eq">Year 11 eq
                              <?php if($errors->has('highest_school')): ?> <p style="color:red;"><?php echo e($errors->first('highest_school')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" <?php echo e(in_array('10 eq',$disArray) ? "checked" : ""); ?> type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="10 eq">Year 10 or below
                              <?php if($errors->has('highest_school')): ?> <p style="color:red;"><?php echo e($errors->first('highest_school')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" <?php echo e(in_array('N/A',$disArray) ? "checked" : ""); ?> type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="N/A">N/A
                              <?php if($errors->has('highest_school')): ?> <p style="color:red;"><?php echo e($errors->first('highest_school')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Year level completed:</label>
                              <input type="text" name="year_completed" class="form-control" id="exampleInputEmail1" placeholder="Enter Year Completed" value="<?php echo e(old('year_completed')); ?>" required="">
                              <?php if($errors->has('year_completed')): ?> <p style="color:red;"><?php echo e($errors->first('year_completed')); ?></p> <?php endif; ?>

                            </div>
                          </div>

                          <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Country:</label>
                              <input name="completion_country" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Country" value="<?php echo e(old('completion_country')); ?>" required="">
                              <?php if($errors->has('completion_country')): ?> <p style="color:red;"><?php echo e($errors->first('completion_country')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <h6>Have you successfully completed any of the below listed qualifications?</h6>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                              <input name="is_completed_qualification" <?php echo e(old('is_completed_qualification')=='No' ? "checked" : ""); ?> type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No">No
                              <?php if($errors->has('is_completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('is_completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="is_completed_qualification" <?php echo e(old('is_completed_qualification')=='Yes' ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes">Yes (If yes, tick all applicable boxes)
                              <?php if($errors->has('is_completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('is_completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                             
                            </div>
                          </div>

                          <?php 
                              $disArray = old('completed_qualification');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Bachelor degree or higher degree',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Bachelor degree or higher degree">Bachelor degree or higher degree
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Certificate IV',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate IV">Certificate IV
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Certificate I',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate I">Certificate I
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                             
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Advanced diploma or associate degree',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Advanced diploma or associate degree">Advanced diploma or associate degree
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Certificate III/Trade Certificate',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate III/Trade Certificate">Certificate III/Trade Certificate
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Other education',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Other education">Other education
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                             
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Diploma or associate diploma',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Diploma or associate diploma">Diploma or associate diploma
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" <?php echo e(in_array('Certificate II',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate II">Certificate II
                              <?php if($errors->has('completed_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('completed_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>

                    <?php 
                              $disArray = old('country_qualification');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                             <b>If you ticked any of the above, is your qualification:</b>
                            </div>
                          </div>
                          <div class="col-md-2">
                             <div class="form-group">
                              <input name="country_qualification[]" <?php echo e(in_array('Australian',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Australian">Australian
                              <?php if($errors->has('country_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('country_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="country_qualification[]" <?php echo e(in_array('Australian equivalent',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Australian equivalent">Australian equivalent
                              <?php if($errors->has('country_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('country_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-2">
                             <div class="form-group">
                              <input name="country_qualification[]" <?php echo e(in_array('International',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="International">International
                              <?php if($errors->has('country_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('country_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                             <b>Select one category which best describes the main reason you are undertaking study:</b>
                            </div>
                          </div>
                    </div>
                    <?php 
                              $disArray = old('reason_qualification');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                                 $finalDids = end($disArray[7]);
                              }else{
                                $disArray = array();
                                $finalDids = '';
                              }
                        ?>
                    <div class="row">
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" <?php echo e(in_array('get a job',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="get a job">To get a job
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" <?php echo e(in_array('To start my own business',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="To start my own business">To start my own business
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" <?php echo e(in_array('To develop my existing business',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="To develop my existing business">To develop my existing business
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" <?php echo e(in_array('To try a different career',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="To try a different career">To try a different career
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" <?php echo e(in_array('I want extra skills for my job',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="I want extra skills for my job">I want extra skills for my job
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" <?php echo e(in_array('It was a requirement of my job',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="It was a requirement of my job">It was a requirement of my job
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                            <input name="reason_qualification[]" <?php echo e(in_array('Other reasons',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Other reasons">Other reasons:
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[7]['reason']" type="text"  id="exampleInputEmail1" placeholder="Enter reason" value="<?php echo $finalDids;?>" class="form-control">
                              <?php if($errors->has('reason_qualification')): ?> <p style="color:red;"><?php echo e($errors->first('reason_qualification')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                             <b>Select which best describes your current employment status:</b>
                            </div>
                          </div>
                    </div>
                     <?php 
                              $disArray = old('employment_status');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" <?php echo e(in_array('Full time employee',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Full time employee">Full time employee
                              <?php if($errors->has('employment_status')): ?> <p style="color:red;"><?php echo e($errors->first('employment_status')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" <?php echo e(in_array('Part time employee',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Part time employee">Part time employee
                              <?php if($errors->has('employment_status')): ?> <p style="color:red;"><?php echo e($errors->first('employment_status')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" <?php echo e(in_array('Self employed',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Self employed">Self employed
                              <?php if($errors->has('employment_status')): ?> <p style="color:red;"><?php echo e($errors->first('employment_status')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" <?php echo e(in_array('Employer',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Employer">Employer
                              <?php if($errors->has('employment_status')): ?> <p style="color:red;"><?php echo e($errors->first('employment_status')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" <?php echo e(in_array('Unemployed',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Unemployed">Unemployed
                              <?php if($errors->has('employment_status')): ?> <p style="color:red;"><?php echo e($errors->first('employment_status')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" <?php echo e(in_array('Not employed/not seeking employment',$disArray) ? "checked" : ""); ?> type="checkbox"  id="exampleInputEmail1" placeholder="Enter reason" value="Not employed/not seeking employment" >Not employed/not seeking employment
                              <?php if($errors->has('employment_status')): ?> <p style="color:red;"><?php echo e($errors->first('employment_status')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                    </div>

                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section F: Course Information</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                             <b>Course Code</b>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                             <b>Course Name</b>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                             <b>Duration (Weeks)</b>
                            </div>
                          </div>
                    </div>
                    <?php 
                              $disArray = old('course_code');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                      <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                             <input name="course_code[]" type="checkbox" id="<?php echo e($cours->course_code); ?>" placeholder="Enter Relationship to you" value="<?php echo e($cours->course_code); ?>" <?php echo e(in_array($cours->course_code,$disArray) ? "checked" : ""); ?> ><label for="<?php echo e($cours->course_code); ?>"><?php echo e($cours->course_code); ?></label</>
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                            <?php echo e($cours->course_name); ?>

                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <?php 
                              $weeks          = explode('/',$cours->course_duration);
                              $course_amount  = explode('/',$cours->course_amount);
                              $material_amount = explode('/',$cours->material_amount);
                              $checked = "";     
                              $selcted = 0;                     

                              foreach ($weeks as $key => $week) { ?>
                                <input <?php echo $checked;?>  type="radio" name="course_duration[][<?php echo e($cours->course_code); ?>]" value="<?php echo e($week); ?>||<?php echo e($course_amount[$key]); ?>||<?php echo e($material_amount[$key]); ?>||<?php echo e($selcted++); ?>" id="<?php echo e($cours->course_code.$week); ?>">
                                <label for="<?php echo e($cours->course_code.$week); ?>"><?php echo $week;?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                              
                              <?php $checked = ''; } ?>
                             
                            </div>
                          </div>
                    </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                      <?php if($errors->has('course_code')): ?> <p style="color:red;"><?php echo e($errors->first('course_code')); ?></p> <?php endif; ?>
                      <?php if($errors->has('course_duration')): ?> <p style="color:red;"><?php echo e($errors->first('course_duration')); ?></p> <?php endif; ?>

                    
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Preferred Start Date</label>
                              <input name="course_start_date" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Start Date" value="<?php echo e(old('course_start_date')); ?>" required="">
                              <?php if($errors->has('course_start_date')): ?> <p style="color:red;"><?php echo e($errors->first('course_start_date')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Are you applying for credit transfers from previous studies?</b>
                            </div>
                          </div>
                          <?php 
                              $disArray = old('credit_transfer');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="credit_transfer[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" <?php echo e(in_array('No',$disArray) ? "checked" : ""); ?>> No
                              <?php if($errors->has('credit_transfer')): ?> <p style="color:red;"><?php echo e($errors->first('credit_transfer')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="credit_transfer[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" <?php echo e(in_array('Yes',$disArray) ? "checked" : ""); ?>> Yes
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Are you applying for RPL from previous studies?</b>
                            </div>
                          </div>
                           <?php 
                              $disArray = old('previous_studies');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="previous_studies[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" <?php echo e(in_array('No',$disArray) ? "checked" : ""); ?>> No
                              <?php if($errors->has('previous_studies')): ?> <p style="color:red;"><?php echo e($errors->first('previous_studies')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="previous_studies[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" <?php echo e(in_array('Yes',$disArray) ? "checked" : ""); ?>> Yes
                            </div>
                          </div>
                        </div>
                  </div>
          </div>
           <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section G: Airport Pickup and Accommodation</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Do you require Ashton College to arrange for you to be collected from the Airport?</b>
                            </div>
                          </div>
                          <?php 
                              $disArray = old('require_airport');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="require_airport[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" <?php echo e(in_array('No',$disArray) ? "checked" : ""); ?>> No
                              <?php if($errors->has('require_airport')): ?> <p style="color:red;"><?php echo e($errors->first('require_airport')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                            <input name="require_airport[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" <?php echo e(in_array('Yes',$disArray) ? "checked" : ""); ?>> Yes*
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Do you require assistance with arranging accommodation in Melbourne?</b>
                            </div>
                          </div>
                          <?php 
                              $disArray = old('require_assistance');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="require_assistance[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" <?php echo e(in_array('No',$disArray) ? "checked" : ""); ?>> No
                              <?php if($errors->has('require_assistance')): ?> <p style="color:red;"><?php echo e($errors->first('require_assistance')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="require_assistance[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" <?php echo e(in_array('Yes',$disArray) ? "checked" : ""); ?>> Yes*
                            </div>
                          </div>
                        </div>
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section H: Unique Student Identifier (USI)</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Your USI</b>
                            </div>
                          </div>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="usi_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Unique Student Identifier" value="<?php echo e(old('usi_code')); ?>" >
                              <?php if($errors->has('usi_code')): ?> <p style="color:red;"><?php echo e($errors->first('usi_code')); ?></p> <?php endif; ?>
                            </div>
                          </div>
                          
                        </div>
                         
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section K: Applicant Checklist</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Passport Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="passport_file" class="custom-file-input1" id="exampleInputFile" required="">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Passport</label> -->
                                </div>
                              </div>
                            </div>
                          </div>    
                           <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Academic Qualifications Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="qualification_file" class="custom-file-input1" id="exampleInputFile" required="">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>    
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Language Evidance Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="language_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>                         
                        </div>
                                            <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Evidence of OSHC</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="oshc_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>    
                           <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Student Signature Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="student_signature_file" class="custom-file-input1" id="exampleInputFile" required="">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Other Documents</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="student_other_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>      
                          <div class="col-md-4">
                             <div class="form-group">
                               <label for="exampleInputEmail1">Date:</label><br>
                              <input type="text" name="submit_date" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date" value="<?php echo e(old('submit_date')); ?>" required="">
                                                          </div>
                          </div>                         
                        </div>
                         
                  </div>
          </div>

           
              <!-- /.card-header -->
              <div class="row">
                <div class="col-md-11">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
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
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.datepicker').datepicker({
              format: 'dd/mm/yyyy'
           });
            $('.valid_australian_visa').change(function(){
               var visaStatus = $(this).val();
               if(visaStatus=='' || visaStatus=='No'){
                 $('.australian_visa_details').prop('required',false).prop('readonly',true).val('');

               }else{
                 $('.australian_visa_details').prop('required',true).prop('readonly',false).val('');
               }
            })
        });
        
</script>
<script type="text/javascript">
  $(function(){
    $('[name="other_than_english"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='Yes'){
         $('[name="other_than_english_specify"]').prop('readonly',false);
        // $('[name="islander_origin"]').prop('readonly',false);
      }else{
        $('[name="other_than_english_specify"]').prop('readonly',true);
        $('[name="other_than_english_specify"]').val('');

        // $('[name="islander_origin"]').prop('readonly',true);
        // $('[name="islander_origin"]').val('');
        
      }
    })

    $('[name="significant_disability"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='Yes'){
         $('[name="disability_value[]"]').prop('readonly',false);
        $('[name="disability_value[]"]').prop('disabled',false);        

      }else{
        $('[name="disability_value[]"]').attr('disabled','disabled');        
        $('[name="disability_value[]"]').prop('checked',false);        
      }
    })

    $('[name="english_test"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='Yes'){
         $('[name="english_test_specify"]').prop('disabled',false);
         $('[name="english_score"]').prop('readonly',false);
         $('[name="english_date"]').prop('readonly',false);
      }else{
       $('[name="english_test_specify"]').prop('disabled',true).val('');
         $('[name="english_score"]').prop('readonly',true).val('');
         $('[name="english_date"]').prop('readonly',true).val('');
        
      }
    })

    $('[name="health_cover"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='No'){
         $('[name="mambership_no"]').prop('readonly',false);
         $('[name="policy_no"]').prop('readonly',true);
         $('[name="policy_expire"]').prop('readonly',false);
      }else{
       $('[name="mambership_no"]').prop('readonly',true).val('');
         $('[name="policy_no"]').prop('readonly',false).val('');
         $('[name="policy_expire"]').prop('readonly',true).val('');
        
      }
    })

    $('[name="highest_school[]"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan!='N/A'){
         $('[name="year_completed"]').prop('readonly',false);
         $('[name="completion_country"]').prop('readonly',false);
         var cindex = $('[name="highest_school[]"]').index($(this));
         $('[name="highest_school[]"]').not(':eq('+cindex+')').prop('checked',false); 
      }else{
       $('[name="year_completed"]').prop('readonly',true).val('');
         $('[name="completion_country"]').prop('readonly',true).val('');
          var cindex = $('[name="highest_school[]"]').index($(this));
         $('[name="highest_school[]"]').not(':eq('+cindex+')').prop('checked',false);
        
      }
    })
    


    $('[name="is_completed_qualification"]').click(function(){
      var otherThan = $(this).val();
       if(otherThan=='Yes'){
        $('[name="is_completed_qualification"]').eq(0).prop('checked',false); 
         $('[name="completed_qualification[]"]').prop('readonly',false);
        $('[name="completed_qualification[]"]').prop('disabled',false);    

        $('[name="country_qualification[]"]').prop('readonly',false);
        $('[name="country_qualification[]"]').prop('disabled',false);    

      }else{
        $('[name="is_completed_qualification"]').eq(1).prop('checked',false); 

        $('[name="completed_qualification[]"]').prop('disabled',true);
        $('[name="completed_qualification[]"]').prop('checked',false);    

        $('[name="country_qualification[]"]').prop('disabled',true);
        $('[name="country_qualification[]"]').prop('checked',false);      
      }
    })

    $('[name="reason_qualification[]"]').click(function(){
      var cindex = $('[name="reason_qualification[]"]').index($(this));
     $('[name="reason_qualification[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="employment_status[]"]').click(function(){
      var cindex = $('[name="employment_status[]"]').index($(this));
     $('[name="employment_status[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="credit_transfer[]"]').click(function(){
      var cindex = $('[name="credit_transfer[]"]').index($(this));
     $('[name="credit_transfer[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="previous_studies[]"]').click(function(){
      var cindex = $('[name="previous_studies[]"]').index($(this));
     $('[name="previous_studies[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="require_airport[]"]').click(function(){
      var cindex = $('[name="require_airport[]"]').index($(this));
     $('[name="require_airport[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="require_assistance[]"]').click(function(){
      var cindex = $('[name="require_assistance[]"]').index($(this));
     $('[name="require_assistance[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })


  })
</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>