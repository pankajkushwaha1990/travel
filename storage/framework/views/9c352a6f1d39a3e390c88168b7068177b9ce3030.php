 
<?php $__env->startSection('title','Dashboard'); ?>
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
          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo e(url('member-edit-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Member (<?php echo e($agent->type); ?>)</h3>
              </div>
               <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Member Name *</label>
                    <input type="text" name="agent_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Name" value="<?php echo e($agent->name); ?>">
                    <?php if($errors->has('agent_name')): ?> <p style="color:red;"><?php echo e($errors->first('agent_name')); ?></p> <?php endif; ?>

                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                     <label for="exampleInputEmail1">Member Email  *</label>
                    <input name="agent_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Email" value="<?php echo e($agent->email); ?>">
                    <?php if($errors->has('agent_email')): ?> <p style="color:red;"><?php echo e($errors->first('agent_email')); ?></p> <?php endif; ?>
                  </div>
                </div>

              </div>

              <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                 <label for="exampleInputEmail1">Company *</label>
                  <input type="text" name="agent_company" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name" value="<?php echo e($agent->company); ?>" required="">
                    <?php if($errors->has('agent_company')): ?> <p style="color:red;"><?php echo e($errors->first('agent_company')); ?></p> <?php endif; ?>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Branch *</label>
                    <input type="text" name="agent_branch" class="form-control" id="exampleInputEmail1" placeholder="Enter Branch Name" value="<?php echo e($agent->branch); ?>" required="">
                    <?php if($errors->has('agent_branch')): ?> <p style="color:red;"><?php echo e($errors->first('agent_branch')); ?></p> <?php endif; ?>

                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Mobile  *</label>
                    <input name="agent_mobile" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Number" value="<?php echo e($agent->mobile); ?>" required="">
                    <?php if($errors->has('agent_mobile')): ?> <p style="color:red;"><?php echo e($errors->first('agent_mobile')); ?></p> <?php endif; ?>
                  </div>
                </div>
              </div>
            
            

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">City *</label>
                    <input type="text" name="agent_city" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent City" value="<?php echo e($agent->city); ?>">
                    <?php if($errors->has('agent_city')): ?> <p style="color:red;"><?php echo e($errors->first('agent_city')); ?></p> <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">State  *</label>
                    <input type="text" name="agent_state" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent State" value="<?php echo e($agent->state); ?>">
                     <?php if($errors->has('agent_state')): ?> <p style="color:red;"><?php echo e($errors->first('agent_state')); ?></p> <?php endif; ?>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country *</label>
                    <input type="text" name="agent_country" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Country" value="<?php echo e($agent->country); ?>">
                    <?php if($errors->has('agent_country')): ?> <p style="color:red;"><?php echo e($errors->first('agent_country')); ?></p> <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Agent Signature (200*50)px</label>
                              <div class="input-group">
                                <div class="custom-file2">
                                  <input type="file" name="agent_signature_file" class="custom-file-input2" id="src">
                                  <input type="hidden" name="old_agent_signature_file" value="<?php echo e($agent->signature_file); ?>">
                                  <label class="custom-file-label2" for="exampleInputFile">Choose Attachment</label>
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Signature Preview</label>
                              <img id="target" src="<?php echo e(url('').'/agent_docs/'.$agent->signature_file); ?>" style="width: 191px;height: 50px;"/>
                              </div>
                            </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Member Commision % *</label>
                    <input type="text" name="agent_commision" class="form-control" id="exampleInputEmail1" placeholder="Enter Comission In Percent" value="<?php echo e($agent->agent_commision); ?>" required="">
                    <input type="hidden" name="member_id" value="<?php echo e($agent->id); ?>" required="">
                    <?php if($errors->has('agent_commision')): ?> <p style="color:red;"><?php echo e($errors->first('agent_commision')); ?></p> <?php endif; ?>
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
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>