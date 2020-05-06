 
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
                <div class="col-md-5"><h3 class="card-title">Coupons List</h3></div>
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

                <div class="col-md-1"><a href="<?php echo e(url('/coupons-create')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Coupon Name</th>
                  <th>Coupon Code</th>
                  <th>Amount/Percent</th>
                  <th>Coupon Type</th>
                  <th>coupon Limit</th>
                  <!-- <th>Create On</th> -->
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $coupons_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($coupons->coupon_name); ?></td>                      
                      <td><?php echo e($coupons->coupon_code); ?></td>
                      <td><?php echo e($coupons->coupon_value); ?></td>
                      <td><?php echo e(strtoupper($coupons->coupon_type)); ?></td>
                      <td><?php echo e($coupons->coupon_limit); ?></td>
                      <!-- <td><?php echo e($coupons->created_date); ?></td> -->
                      <?php if($coupons->status =='1'): ?>         
                        <td><a href="<?php echo e(url('coupons-change-status/0/'.base64_encode($coupons->id))); ?>"><button class="btn btn-sm btn-success">Active</button></a></td>         
                      <?php else: ?>
                      <td><a href="<?php echo e(url('coupons-change-status/1/'.base64_encode($coupons->id))); ?>"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                     <?php endif; ?>
                      <td>
                          <form action="<?php echo e(url('agent', $coupons->id)); ?>" method="post">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="<?php echo e(url('coupons-edit/'.base64_encode($coupons->id))); ?>">
                              <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <a onclick="return confirm('Are You Sure To Delete?');" href="<?php echo e(url('coupons-delete/'.base64_encode($coupons->id))); ?>">
                            <button class="btn btn-sm btn-danger" type="button">Delete</button>
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
    $("#example1").DataTable({"aaSorting": []});
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