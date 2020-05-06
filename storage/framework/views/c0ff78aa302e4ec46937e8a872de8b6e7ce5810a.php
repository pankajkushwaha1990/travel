 
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
          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo e(url('change-password-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>



               <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Password</label>
                     <input type="Password" required="" minlength="6"  name="old_password" class="form-control" id="exampleInputEmail1" placeholder="Enter Old Password" value="">
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                     <label for="exampleInputEmail1">New Password</label>
                     <input type="Password" minlength="6" required=""  name="new_password" class="form-control" id="exampleInputEmail1" placeholder="Enter New Password" value="">
                   
                  </div>
                </div>


<div class="col-md-4">
                   <div class="form-group">
                     <label for="exampleInputEmail1">Confirm Password</label>
                     <input type="Password" minlength="6" required=""  name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="Enter Confirm Password" value="">
                   
                  </div>
                </div>


              </div>


              <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-6">
                    <h5 class="card-title">
                  <?php if(session()->get('success')): ?>
                    <span class="text-success">
                      <?php echo e(session()->get('success')); ?>  
                    </span>
                  <?php endif; ?>
                   <?php if(session()->get('failure')): ?>
                    <span class="text-danger">
                      <?php echo e(session()->get('failure')); ?>  
                    </span>
                  <?php endif; ?>
              </h5>
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