 
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
          <form role="form" method="post" action="<?php echo e(url('student-assign-edit-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           <input type="hidden" name="student_id" value="<?php echo e(base64_encode($agent->id)); ?>">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Student Assign ID</h3>
              </div>
               <div class="card-body">
<div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title *</label>
                    <p><?php echo e($agent->title); ?></p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender *</label>
                    <p><?php echo e($agent->gender); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth ('YYYY-MM-DD') *</label>
                   <p><?php echo e($agent->date_of_birth); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email *</label>
                    <p><?php echo e($agent->email); ?></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Surname *</label>
                    <p><?php echo e($agent->surname); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Given Name*</label>
                    <p><?php echo e($agent->given_name); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Proffered Name*</label>
                    <p><?php echo e($agent->proffered_name); ?></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Passport Number *</label>
                    <p><?php echo e($agent->passport_number); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number*</label>
                    <p><?php echo e($agent->phone_number); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Postal Code*</label>
                    <p><?php echo e($agent->post_code); ?></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Town *</label>
                    <p><?php echo e($agent->town); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">State*</label>
                    <p><?php echo e($agent->state); ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Country *</label>
                    <p><?php echo e($agent->country); ?></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Assign Id/Offer No *</label>
                    <input type="text" name="assign_id" class="form-control" id="exampleInputEmail1" placeholder="Enter Assign Id/Offer No" value="<?php echo e($agent->assign_id); ?>" required="">
                    <?php if($errors->has('assign_id')): ?> <p style="color:red;"><?php echo e($errors->first('assign_id')); ?></p> <?php endif; ?>

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