 
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
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
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-5"><h3 class="card-title">Student List</h3></div>
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

               <!--  <div class="col-md-1"><a href="<?php echo e(url('/student/create')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div> -->
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Date Of Birth</th>
                  <th>Email</th>
                  <th>Country</th>
                  <th>Created By</th>
                  <th>Action</th>
                  <th>Approval Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($course->title.' '.$course->surname.' '.$course->given_name); ?></td>
            <td><?php echo e($course->date_of_birth); ?></td>
            <td><?php echo e($course->student_email); ?></td>
            <td><?php echo e($course->country); ?></td>
            <td><?php echo e(ucfirst($course->type)); ?></td>
            <td>
              <?php if($session->type!='agent'): ?>
                <form action="<?php echo e(url('student', $course->id)); ?>" method="post">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="<?php echo e(url('student-approval-change-status/'.base64_encode($course->student_id))); ?>">
                    <button type="button" class="btn btn-sm btn-primary">Change Status</button>
                  </a>
                </form>
                <?php endif; ?>

            </td>
             <?php if($course->approval_status == null || $course->approval_status == 0): ?>         
              <td><button class="btn btn-sm btn-danger">Pending</button></td> 
            <?php elseif($course->approval_status =='3'): ?>
            <td><button class="btn btn-sm btn-info">In-Process</button></td>        
            <?php elseif($course->approval_status =='1'): ?>
            <td><button class="btn btn-sm btn-success">Approved</button></td>
            <?php elseif($course->approval_status =='2'): ?>
            <td><button class="btn btn-sm btn-danger">Decliend</button></td> 
            <?php elseif($course->approval_status =='4'): ?>
            <td><button class="btn btn-sm btn-default">Completed</button></td> 
            <?php elseif($course->approval_status =='5'): ?>
            <td><button class="btn btn-sm btn-warning">Cancled</button></td>        
           <?php endif; ?>


        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>