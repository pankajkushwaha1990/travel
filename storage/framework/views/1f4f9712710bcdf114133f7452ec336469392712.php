 
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
          <form role="form" method="post" action="<?php echo e(url('member-assign-menu-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Assign Menu To <?php echo e(ucfirst($employee->type)); ?></h3>
              </div>

               <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo e(ucfirst($employee->type)); ?> Name : </label>
                    <?php echo e(ucfirst($employee->name)); ?>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email : </label>
                    <?php echo e($employee->email); ?>

                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Location : </label>
                   <?php echo e(ucfirst($employee->city)." ".ucfirst($employee->state)." ".ucfirst($employee->country)); ?>

                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <h5>Select Menu</h5>
                  </div>
                </div>
              </div>
               <?php if($errors->has('menu')): ?> <p style="color:red;"><?php echo e($errors->first('menu')); ?></p> <?php endif; ?>

               <?php 
               if(!empty($employee->menu_allow) && $employee->menu_allow!=null){
                  $allow = json_decode($employee->menu_allow,true);
               }else{
                  $allow = array();
               }
               ?>

        <?php 
        if($employee->type){ ?>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student</label>
                    <input <?php echo e(in_array('student',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="student">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course</label>
                    <input <?php echo e(in_array('course',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="course">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Assign</label>
                    <input <?php echo e(in_array('assign',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="assign">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Offer Letter</label>
                    <input <?php echo e(in_array('offer',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="offer">
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">COE</label>
                    <input <?php echo e(in_array('coe',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="coe">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Approval</label>
                    <input <?php echo e(in_array('studentApproval',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="studentApproval">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment</label>
                    <input <?php echo e(in_array('payment',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="payment">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Agent Commission</label>
                    <input <?php echo e(in_array('agentComission',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="agentComission">
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Report</label>
                    <input <?php echo e(in_array('report',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="report">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enquiry</label>
                    <input <?php echo e(in_array('enquiry',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="enquiry">
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Notification</label>
                    <input <?php echo e(in_array('notification',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="notification">
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Export</label>
                    <input <?php echo e(in_array('export',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="export">
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Request For Invoice</label>
                    <input <?php echo e(in_array('rfi',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="rfi">
                    <input type="hidden" name="id_encode" value="<?php echo e(base64_encode($employee->id)); ?>">
                  </div>
                </div>
              </div>
<?php }else{?>
 <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student</label>
                    <input <?php echo e(in_array('student',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="student">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enquiry & Notification</label>
                    <input <?php echo e(in_array('enquiry',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="enquiry">
                  </div>
                </div>
               
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Agent Commission</label>
                    <input <?php echo e(in_array('agentComission',$allow) ? "checked" : ""); ?> type="checkbox" name="menu[]" value="agentComission">
                    <input type="hidden" name="id_encode" value="<?php echo e(base64_encode($employee->id)); ?>">

                  </div>
                </div>
                
                
              </div>

<?php } ?>
            

              <div class="row">
                <div class="col-md-11">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3"></div>
                
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
                <div class="col-md-3"></div>
                
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