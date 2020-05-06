 
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
                <div class="col-md-5"><h3 class="card-title">Enquiry List</h3></div>
                <div class="col-md-5"><h3 class="card-title">
                  <?php if(session()->get('success')): ?>
                    <span class="text-success">
                      <?php echo e(session()->get('success')); ?>  
                    </span>
                  <?php endif; ?></h3>
                </div>
                <div class="col-md-2"><a href="<?php echo e(url('/enquiry-compose')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Compose</button></a></div>

                
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Attachment</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <?php if($session->id==$course->from_id): ?>
            <td>Sent</td>
          <?php else: ?>
            <td>Inbox</td>
          <?php endif; ?>
            <td><?php echo e($course->from_name); ?></td>
            <td><?php echo e($course->to_name); ?></td>
            <td><?php echo e(substr($course->enquery_subject,0,75).".."); ?></td>
            <td><?php echo e(substr($course->enquery_message,0,150).".."); ?></td>
            <?php if($course->attachment): ?>
             <td><a download href="<?php echo e(url('').'/enquiry_docs/'.$course->attachment); ?>">Download</a></td>
            <?php else: ?>
             <td></td>
             <?php endif; ?>
            <td><?php echo e(date('d/m/Y',strtotime($course->created_at))); ?></td>

            <td>
                <form action="<?php echo e(url('student', $course->id)); ?>" method="post">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="<?php echo e(url('enquiry-list-view/'.base64_encode($course->id))); ?>">
                    <button type="button" class="btn btn-sm btn-primary">View</button>
                  </a>
                </form>
            </td>
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
    $("#example1").DataTable({
        "order": [[ 6, "desc" ]]
    });
  });
</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>