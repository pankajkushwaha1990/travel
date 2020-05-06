 
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
                <div class="col-md-5"><h3 class="card-title">Agent Comissions</h3></div>
                <div class="col-md-6"><h3 class="card-title">
                  <?php if(session()->get('success')): ?>
                    <span class="text-success">
                      <?php echo e(session()->get('success')); ?>  
                    </span>
                  <?php endif; ?></h3>
                </div>


                <?php if($session->type!='agent'): ?>
                 <div class="col-md-1"><a href="<?php echo e(url('/request-for-invoice')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Request</button></a></div>
                <?php endif; ?>

                
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Student Email</th>
                  <!-- <th>Created By</th> -->
                  <th>Agent Email</th>

                  <th>Fee</th>
                  <th>Payment Date</th>
                  <th>Comission Rate</th>

                  <th>Agent Comission</th>
                  <th>Agent Payment Status</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php $totalPaidComission[] = 0;$totalUnpaidComission[] = 0;$totalFee[] = 0;  $totalAgentComission[] = 0;    ?>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="font-size: 12px;"><?php echo e($course->title.' '.$course->surname.' '.$course->given_name); ?></td>
            <td style="font-size: 12px;"><?php echo e($course->student_email); ?></td>
            <!-- <td style="font-size: 12px;"><?php echo e(ucfirst($course->type)); ?></td> -->
            <td style="font-size: 12px;"><?php echo e($course->agent_email); ?></td>

            <td style="font-size: 12px;"><?php echo e($totalFee[] = $course->debit_fee); ?></td>
            <td style="font-size: 12px;"><?php echo e(date('d/m/Y',strtotime($course->payment_date))); ?></td>
            <td style="font-size: 12px;"><?php echo e($course->agent_commision_percentage); ?> %</td>
            <td style="font-size: 12px;"><?php echo e($totalAgentComission[] =  ($course->debit_fee *  $course->agent_commision_percentage)/100); ?></td>
             <?php if($course->agent_commision_payment_status=='null' || $course->agent_commision_payment_status=='0'): ?>     
              <td>
                <button class="btn btn-sm btn-danger">Pending</button>
              <?php if($session->type!='agent'): ?>
                <a href="<?php echo e(url('agent-commision-change-payment-status/'.base64_encode($course->payment_id))); ?>/1"><button class="btn btn-sm btn-success">Pay</button></a>
                <?php endif; ?>
            </td>
              <input type="hidden" value="<?php $totalUnpaidComission[] = ($course->debit_fee *  $course->agent_commision_percentage)/100;?>">
            <?php elseif($course->agent_commision_payment_status =='1'): ?>
            <td>
              <button class="btn btn-sm btn-success">Paid</button>
              <?php if($session->type!='agent'): ?>
                <a href="<?php echo e(url('agent-commision-change-payment-status/'.base64_encode($course->payment_id))); ?>/0"><button class="btn btn-sm btn-info">Hold</button></a></td>
                <?php endif; ?>

             <input type="hidden" value="<?php $totalPaidComission[] = ($course->debit_fee *  $course->agent_commision_percentage)/100;?>">
           <?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>


            <!-- /.card-body -->
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Total Summary</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Total Fee</label>
                              <div><?php echo array_sum($totalFee); ?></div>
                              
                            </div>
                          </div>

                          <div class="col-md-2">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Agent Comission</label>
                             <div><?php echo array_sum($totalAgentComission); ?></div>
                            </div>
                          </div>
                          <div class="col-md-2">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Paid Comission</label>
                              <div><?php echo array_sum($totalPaidComission); ?></div>
                                                          </div>
                          </div>
                           <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Pending Comission</label>
                              <div><?php echo array_sum($totalUnpaidComission); ?></div>
                                                          </div>
                          </div>
                        </div>
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