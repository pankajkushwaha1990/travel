 
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
                <div class="col-md-5"><h3 class="card-title">Package List</h3></div>
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

                <div class="col-md-1"><a href="<?php echo e(url('/package-create')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Package Name</th>
                  <th>D/N</th>
                  <th>Cost</th>
                  <th>Amenities</th>
                 <!--  <th>Hotel</th>
                  <th>Flight</th> -->
                  <th>Itinerary</th>
                  <th>Banner/Hot Place</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $package_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(ucfirst($package->package_name)); ?></td>
            <td><?php echo e($package->package_days."/".$package->package_night); ?></td>
            <td><?php echo e($package->package_cost); ?></td>
            <td>
              <?php 
              if($package->amenities_details){
                foreach ($package->amenities_details as $key => $amenities) { ?>
                  <button type="button" class="btn btn-primary btn-sm"><?php echo $amenities->amenities_name; ?></button>
                <?php }
              } ?>
            </td>

            <td>
              <?php 
              if($package->itinerary_details){
                foreach ($package->itinerary_details as $key => $itinerary) {
                   if($itinerary->itinerary_default_status==0){
                 ?>
                  <button type="button" class="btn btn-primary btn-sm"><?php echo $itinerary->item_details[0]->Itinerary_name; ?> <span class="badge"><?php echo $itinerary->itinerary_cost; ?></span></button>
                <?php }else{ ?>
                  <button type="button" class="btn btn-danger btn-sm"><?php echo $itinerary->item_details[0]->Itinerary_name; ?> <span class="badge"><?php echo $itinerary->itinerary_cost; ?></span></button>
                <?php }
              } 
            } ?>
            </td>
           
            <td>

                 <?php if($package->banner =='1'): ?>         
                        <a href="<?php echo e(url('package-banner-change-status/0/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-success">Active</button></a>         
                  <?php else: ?>
                       <a href="<?php echo e(url('package-banner-change-status/1/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-danger">Deactive</button></a>      
                 <?php endif; ?>
                 <?php if($package->hot_place =='1'): ?>         
                        <a href="<?php echo e(url('package-hot-place-change-status/0/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-success">Active</button></a>         
                  <?php else: ?>
                       <a href="<?php echo e(url('package-hot-place-change-status/1/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-danger">Deactive</button></a>      
                 <?php endif; ?>
                 <!--  <a href="<?php echo e(url('member-edit/'.base64_encode($package->id))); ?>">
                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  </a>
                  <a onclick="return confirm('Are You Sure To Delete?');" href="<?php echo e(url('member-delete/'.base64_encode($package->id))); ?>">
                  <button class="btn btn-sm btn-danger" type="button">Delete</button>
                </a> -->
               
            </td>

             <td>
           
                  <?php if($package->status =='1'): ?>         
                        <a href="<?php echo e(url('package-change-status/0/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-success">Active</button></a>         
                  <?php else: ?>
                  <a href="<?php echo e(url('package-change-status/1/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-danger">Deactive</button></a>      
                 <?php endif; ?>
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