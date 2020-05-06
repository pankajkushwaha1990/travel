 
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha256-P8k8w/LewmGk29Zwz89HahX3Wda5Bm8wu2XkCC0DL9s=" crossorigin="anonymous" />
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
                <div class="col-md-5"><h3 class="card-title">Itinerary List</h3></div>
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

                <div class="col-md-1"><a href="<?php echo e(url('/itinerary-create')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Itinerary Name</th>
                  <th>Price</th>
                  <th>Itinerary City</th>
                  <th>Itinerary State</th>
                  <th>Itinerary Country</th>
                  <!-- <th>Itinerary Description</th> -->
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $itinerarys_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerarys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td> <?php echo e($itinerarys->category_details[0]->category_name); ?>  
                       
                      </td>                      
                      <td><a  href="<?php echo e(url('').'/itinerary_image/'.$itinerarys->Itinerary_image); ?>" data-fancybox data-caption="<?php echo e($itinerarys->Itinerary_name); ?>">
                          <img   src="<?php echo e(url('').'/itinerary_image/'.$itinerarys->Itinerary_image); ?>" width="32" height="32" alt="" />
                        </a><?php echo e($itinerarys->Itinerary_name); ?></td>                      
                      <td><?php echo e($itinerarys->price); ?></td>                      
                      <td><?php echo e($itinerarys->city_details[0]->name); ?></td>                      
                      <td><?php echo e($itinerarys->state_details[0]->name); ?></td>                      
                      <td><?php echo e($itinerarys->country_details[0]->name); ?></td>                      
                      <!-- <td><img width="32" height="32" src="<?php echo e(url('').'/amenities_image/'.$itinerarys->Itinerary_image); ?>"></td> -->
                      <!-- <td><?php echo e($itinerarys->Itinerary_description); ?></td> -->
                      <?php if($itinerarys->status =='1'): ?>         
                        <td><a href="<?php echo e(url('itinerary-change-status/0/'.base64_encode($itinerarys->id))); ?>"><button class="btn btn-sm btn-success">Active</button></a></td>         
                      <?php else: ?>
                      <td><a href="<?php echo e(url('itinerary-change-status/1/'.base64_encode($itinerarys->id))); ?>"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                     <?php endif; ?>
                      <td>
                          <form action="<?php echo e(url('agent', $itinerarys->id)); ?>" method="post">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="<?php echo e(url('itinerary-edit/'.base64_encode($itinerarys->id))); ?>">
                              <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <a onclick="return confirm('Are You Sure To Delete?');" href="<?php echo e(url('itinerary-delete/'.base64_encode($itinerarys->id))); ?>">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js" integrity="sha256-yDarFEUo87Z0i7SaC6b70xGAKCghhWYAZ/3p+89o4lE=" crossorigin="anonymous"></script>
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