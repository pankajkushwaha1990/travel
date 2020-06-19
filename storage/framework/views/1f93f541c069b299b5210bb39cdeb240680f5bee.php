 
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<style type="text/css">
  td {
    font-size: 14px;
  }
</style>
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
                <div class="col-md-5"><h3 class="card-title">Users List</h3></div>
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

                <div class="col-md-1"><a href="<?php echo e(url('/user-create')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Adhaar</th>
                  <!-- <th>Pan</th> -->
                  <th>Passport</th>
                  <!-- <th>Signup On</th> -->
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($users_list)): ?>  
                <?php $__currentLoopData = $users_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($users->name); ?></td>                      
                      <td><span class="<?php if($users->mobile_otp){ echo 'text text-success'; } ?>"><?php echo e($users->mobile); ?></span></td>
                      <td><span class="<?php if($users->email_otp){ echo 'text text-success'; } ?>"><?php echo e($users->email); ?></span></td>
                      <td><?php echo e($users->city_name); ?></td>
                      <td><?php echo e($users->state_name); ?></td>
                      <td><?php echo e($users->adhaar_file); ?></td>
                      <!-- <td><?php echo e($users->pan_file); ?></td> -->
                      <td><?php echo e($users->passport_file); ?></td>
                      <!-- <td><?php echo e($users->created_at); ?></td> -->
                      <?php if($users->status =='1'): ?>         
                        <td><a href="<?php echo e(url('user-change-status/0/'.base64_encode($users->id))); ?>"><button class="btn btn-sm btn-success"><i class="fa fa-check"></i></button></a></td>         
                      <?php else: ?>
                      <td><a href="<?php echo e(url('user-change-status/1/'.base64_encode($users->id))); ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>        
                     <?php endif; ?>
                      <td>
                            <a href="<?php echo e(url('user-edit/'.base64_encode($users->id))); ?>">
                              <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></button>
                            </a>
                            <a onclick="return confirm('Are You Sure To Delete?');" href="<?php echo e(url('user-delete/'.base64_encode($users->id))); ?>">
                            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-trash-alt"></i></button>
                            
                          </a>
                      </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
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