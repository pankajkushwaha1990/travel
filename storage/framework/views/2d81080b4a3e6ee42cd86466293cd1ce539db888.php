 
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('styles'); ?>
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

    <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-md-12">
          <form role="form" method="post" action="<?php echo e(url('initial-payment-edit-submit')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           <input type="hidden" name="payment_id" value="<?php echo e(base64_encode($agent->payment_id)); ?>">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Student Payment</h3>
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
                    <p><?php echo e($agent->student_email); ?></p>
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
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Assign Id/Offer No *</label>
                    <input type="text" name="offer_assign" readonly="" class="form-control" id="exampleInputEmail1" placeholder="Enter Assign Id/Offer No" value="<?php echo e($agent->offer_assign); ?>" required="">
                    <?php if($errors->has('offer_assign')): ?> <p style="color:red;"><?php echo e($errors->first('offer_assign')); ?></p> <?php endif; ?>

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Invoice No *</label>
                    <input type="text" name="invoice_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Invoice No" value="<?php echo e($agent->invoice_no); ?>" required="">
                    <?php if($errors->has('invoice_no')): ?> <p style="color:red;"><?php echo e($errors->first('invoice_no')); ?></p> <?php endif; ?>

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount *</label>
                    <input type="text" name="debit_fee" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" value="<?php echo e($agent->debit_fee); ?>" required="">
                    <?php if($errors->has('debit_fee')): ?> <p style="color:red;"><?php echo e($errors->first('debit_fee')); ?></p> <?php endif; ?>

                  </div>
                </div>

                 <div class="col-md-2">
                       <div class="form-group">
                        <?php 
                        $date = explode('-',$agent->payment_date);
                        $payment_date = $date[2]."/".$date[1]."/".$date[0];
                        ?>
                        <label for="exampleInputEmail1">Payment Date *</label>
                        <input name="payment_date" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Payment Date" value="<?php echo e($payment_date); ?>" required="">
                        <?php if($errors->has('payment_date')): ?> <p style="color:red;"><?php echo e($errors->first('payment_date')); ?></p> <?php endif; ?>
                      </div>
                </div>
                <div class="col-md-2">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Payment Status</label>
                        <br>
                        <input name="payment_status" <?php echo e(($agent->payment_status)=='Success' ? "checked" : ""); ?> type="radio" class="" id="exampleInputEmail55" placeholder="Enter Description" value="Success" checked="">Success<br>
                        <input name="payment_status" type="radio" <?php echo e(($agent->payment_status)=='Dishonoured' ? "checked" : ""); ?>  class="" id="exampleInputEmail1" placeholder="Enter Description" value="Dishonoured">Dishonoured

                      </div>
                    </div>
                <div class="col-md-2">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Payment Description</label>
                        <input name="payment_description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="<?php echo e($agent->payment_description); ?>">
                        <?php if($errors->has('payment_description')): ?> <p style="color:red;"><?php echo e($errors->first('payment_description')); ?></p> <?php endif; ?>

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
  <?php $__env->startSection('scripts'); ?>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
                $(function () {
                    $('.datepicker').datepicker({
              format: 'dd/mm/yyyy'
           });
                });
</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>