 
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
          <form role="form" method="post" action="<?php echo e(url('course-create-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Course</h3>
              </div>
               <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Name *</label>
                    <input type="text" name="course_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Name" value="<?php echo e(old('course_name')); ?>" required="">
                    <?php if($errors->has('course_name')): ?> <p style="color:red;"><?php echo e($errors->first('course_name')); ?></p> <?php endif; ?>

                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Course Code  *</label>
                    <input name="course_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Code" value="<?php echo e(old('course_code')); ?>" required="">
                    <?php if($errors->has('course_code')): ?> <p style="color:red;"><?php echo e($errors->first('course_code')); ?></p> <?php endif; ?>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration (Week) *</label>
                    <input type="text" name="course_duration" class="form-control" id="exampleInputEmail1" placeholder="Enter Duration In Week" value="<?php echo e(old('course_duration')); ?>" required="">
                    <?php if($errors->has('course_duration')): ?> <p style="color:red;"><?php echo e($errors->first('course_duration')); ?></p> <?php endif; ?>
                  </div>
                </div>


              </div>
            
             <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Amount  *</label>
                    <input name="course_amount" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Amount" value="<?php echo e(old('course_amount')); ?>" required="">
                     <?php if($errors->has('course_amount')): ?> <p style="color:red;"><?php echo e($errors->first('course_amount')); ?></p> <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Material Fee *</label>
                    <input type="text" name="material_amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Material Amount" value="<?php echo e(old('material_amount')); ?>" required="">
                    <?php if($errors->has('material_amount')): ?> <p style="color:red;"><?php echo e($errors->first('material_amount')); ?></p> <?php endif; ?>
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
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>