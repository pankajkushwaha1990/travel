 
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

         <section class="content">
      <div class="row">
        <div class="col-12">

          <form role="form" method="get" action="<?php echo e(url('purchased-user-report-list')); ?>">
          
          <div class="card">
                  <div class="card-body">
                    <div class="row">
                       <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Select User</label>
                        <?php 
                        $agent_details = [];
                        $start_date = $end_date ='';
                        $users_id_get = 'all';
                        if(isset($_GET['user_id'])){
                          $users_id_get     = $_GET['user_id'];
                          $start_date       = $_GET['start_date'];
                          $end_date         = $_GET['end_date'];
                        }
                        ?>
                        <select name="user_id" class="form-control">
                            <option  value="">Select User</option>
                          <?php $__currentLoopData = $user_filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent_id => $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($users_id_get==$users->id ? "selected" : ""); ?> value="<?php echo e($users->id); ?>"><?php echo e($users->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                    </div> 
                     <div class="col-md-3">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Start Date</label>
                          <input name="start_date" type="text" class="form-control datepicker" placeholder="Select Start Date" value="<?php echo e($start_date); ?>" >
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="exampleInputEmail1">End Date</label>
                          <input name="end_date" type="text" class="form-control datepicker" placeholder="Select End Date" value="<?php echo e($end_date); ?>" >
                        </div>
                      </div>
                       
                    <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Find</label>
                            <button  type="submit" class="form-control btn btn-success findStudent">Search</button>
                          </div>
                    </div> 
                     <div class="col-md-1">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Reset</label>
                      <a href="<?php echo e(url('/purchased-user-report-list')); ?>"><button type="button" class="btn btn-block btn-primary">Reset</button></a>
                    </div>
                    </div>

                                    <!--  <div class="col-md-1"><a href="<?php echo e(url('/requestForInvoiceFilter')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Request</button></a></div> -->

                  </div> 
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Main content -->
        <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-4"><h3 class="card-title">User Report List</h3></div>
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

               <!--  <div class="col-md-2"><a href="<?php echo e(url('/user-package-create')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Book Package</button></a></div> -->
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Package Name</th>
                  <!-- <th>D/N</th> -->
                  <!-- <th>Amenities</th> -->
                  <!-- <th>Hotel</th> -->
                  <!-- <th>Flight</th> -->
               <!--    <th>Itinerary</th>
                  <th>Coupon</th>
                  <th>Cost Break</th> -->
                  <th>Final Cost </th>
                  <th>Pending Cost </th>
                  <th>Action</th>

                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $package_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
           <td><?php echo e(ucfirst($package->user_details[0]->name)); ?></td>
            <td><?php echo e(ucfirst($package->package_details[0]->package_name)); ?></td>
           
            <td><?php echo e($package->final_package_cost); ?></td>
            <td><?php echo e($package->pending_amount); ?></td>
            <td><?php echo e(date('d/m/Y',strtotime($package->created_at))); ?></td>

            <td>
              <button type="button" package_name="<?php echo e(ucfirst($package->package_details[0]->package_name)); ?>"  user_name="<?php echo e(ucfirst($package->user_details[0]->name)); ?>" paid_amount_history="<?php echo e(base64_encode(json_encode($package->paid_history))); ?>" class="btn btn-primary btn-sm paid_amount_history">History</button>
           
                 <!--  <?php if($package->status =='1'): ?>         
                        <a href="<?php echo e(url('package-change-status/0/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-success">Active</button></a>         
                  <?php else: ?>
                  <a href="<?php echo e(url('package-change-status/1/'.base64_encode($package->id))); ?>"><button class="btn btn-sm btn-danger">Deactive</button></a>      
                 <?php endif; ?> -->
                 <!--  <a href="<?php echo e(url('member-edit/'.base64_encode($package->id))); ?>">
                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  </a>
                  <a onclick="return confirm('Are You Sure To Delete?');" href="<?php echo e(url('member-delete/'.base64_encode($package->id))); ?>">
                  <button class="btn btn-sm btn-danger" type="button">Delete</button>
                </a> -->
               
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

     <div class="modal fade" id="paid_amount_history" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Make Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name *</label>
                    <div class="user_name_modal">Pankaj</div>
                    <input type="hidden" name="user_id" class="user_id_modal" value="">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Package Name *</label>
                    <div class="package_name_modal">Pankaj</div>
                    <input type="hidden" name="package_id" class="package_id_modal" value="">
                  </div>
                </div>
             </div>
             <div class="row">
             <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Paid Amount</th>
                  <th>Payment Status</th>
                  <th>Payment Mode</th>
                  <th>Payment Date</th> 
                </tr>
                </thead>
                <tbody class="paid_amount_history_content">

                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
      
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('scripts'); ?>
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

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

     $(function () {
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
     });
    });

   $(function(){
    $('.paid_amount_history').click(function(){
      var paid_history = $(this).attr('paid_amount_history');
      var paid_amount_history = $.parseJSON(atob(paid_history));
      var paid_amount_history_table = '';
      for(var p=0;p<paid_amount_history.length;p++){
         paid_amount_history_table+='<tr><td>'+paid_amount_history[p].paid_amount+'</td><td>'+paid_amount_history[p].payment_status+'</td><td>'+paid_amount_history[p].payment_type+'</td><td>'+paid_amount_history[p].paid_date+'</td></tr>'
      }
      $('.paid_amount_history_content').html(paid_amount_history_table);
      $('.user_name_modal').html($(this).attr('user_name'));
      $('.package_name_modal').html($(this).attr('package_name'));
      $('#paid_amount_history').modal('show');


    })
  })

</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>