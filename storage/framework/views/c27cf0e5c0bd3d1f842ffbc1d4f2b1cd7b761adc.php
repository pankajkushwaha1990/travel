 
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
                <div class="col-md-5"><h3 class="card-title">Offer Letter List</h3></div>
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

                <!-- div class="col-md-1"><a href="<?php echo e(url('/offer/create')); ?>"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div> -->
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Offer No</th>
                  <th>Student Name</th>
                  <th>Mobile</th>
                  <th>Created By</th>
                  <th>Date Of Issue</th>
                  <th>Orientation Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="font-size: 14px" ><?php echo e($course->assign_id); ?></td>
            <td style="font-size: 14px"><?php echo e($course->title.' '.$course->surname.' '.$course->given_name); ?></td>
            <td style="font-size: 14px"><?php echo e($course->phone_number); ?></td>
            <td style="font-size: 14px"><?php echo e(ucfirst($course->type)); ?></td>
            <td style="font-size: 14px"><?php if(!empty($course->date_of_issue)): ?> <?php echo e(date('d/m/Y',strtotime($course->date_of_issue))); ?> <?php endif; ?></td>
            <td style="font-size: 14px"><?php if(!empty($course->orientation_date)): ?> <?php echo e(date('d/m/Y',strtotime($course->orientation_date))); ?> <?php endif; ?></td>
            <!-- <td></td> -->

            <td>                

                   <?php if($course->date_of_issue!=''): ?> 
                     <a href="<?php echo e(url('student-offer-letter-view/'.base64_encode($course->student_id))); ?>">
                       <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                     </a> 
                  <?php endif; ?>

                   <?php if($course->assign_id !='' && $course->offer_no=='' && $session->type!='agent'): ?>
                    <a href="<?php echo e(url('student-offer-edit/'.base64_encode($course->student_id))); ?>">
                      <button type="button" class="btn btn-sm btn-info">Generate</button>
                    </a>
                  <?php endif; ?>

                  <?php if($course->assign_id !='' && $course->offer_no!='' && $session->type!='agent'): ?>
                    <a href="<?php echo e(url('student-offer-edit/'.base64_encode($course->student_id))); ?>">
                      <button type="button" class="btn btn-sm btn-success">Generated</button>
                    </a>
                  <button offerLetterLink="<?php echo e(url('student-offer-letter-view-public/'.base64_encode($course->student_id))); ?>"   class="btn btn-sm btn-success openStatusModelMail" studentId='<?php echo e($course->student_id); ?>' studentName="<?php echo e($course->title.' '.$course->surname.' '.$course->given_name); ?>" messageToAdmin="<?php echo e($course->message); ?>" studentEmail="<?php echo e($course->student_email); ?>" agentEmail="<?php echo e($course->agent_email); ?>" messageText="Welcome To Ashton" agentName="<?php echo e($course->name); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></button>
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

    <!-- Modal -->
<div id="openStatusModelMail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 150%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Mail</h4>
      </div>
      <div class="modal-body" >
       <form role="form" method="post" action="<?php echo e(url('student-mail-send')); ?>">
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="row">
          <div class="col-md-1"><b>To</b></div>
          <div class="col-md-1">Student:</div>
          <div class="col-md-4" id="studentEmailNew"></div>
          <input type="hidden" name="toEmail[]" class="studentEmailNew">
          <div class="col-md-1">Agent:</div>
          <div class="col-md-4" id="agentEmailNew"></div>
          <input type="hidden" name="toEmail[]" class="agentEmailNew">


        </div>
        <br>
        <div class="row">
          <div class="col-md-1"><b>CC</b></div>
          <div class="col-md-10"><input type="text" class="form-control" name="toEmail[]"></div>
        </div>
        <input type="hidden" name="studentId" id="studentId" value=''>
        <br>
        <div class="row">
          <div class="col-md-1"><b>Message</b></div>
          <div class="col-md-10"><textarea class="form-control" name="message" id="messageTextNew"></textarea></div>
        </div>

       <br>
        <div class="row">
                <div class="col-md-10">
                  Merge Link With Message <a href="" target="_blank" class="offerLetterLink">Offer Letter Link</a>
                  <input type="hidden" name="offerLetterLink" value="" class="attachLink">
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>

              </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
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

    $('.openStatusModelMail').click(function(){
      var studentEmail = $(this).attr('studentEmail');
      var agentEmail   = $(this).attr('agentEmail');
      var messageText  = $(this).attr('messageText');
      var offerLetterLink = $(this).attr('offerLetterLink');

      $('#studentEmailNew').text(studentEmail);
      $('.offerLetterLink').attr('href',offerLetterLink);
      $('.studentEmailNew').val(studentEmail);
      $('.attachLink').val(offerLetterLink);
      $('#agentEmailNew').text(agentEmail);
      $('.agentEmailNew').val(agentEmail);
      $('#messageTextNew').text(messageText);
      $('#openStatusModelMail').modal('toggle');
    })
        
  });
</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>