 
<?php $__env->startSection('title','Dashboard'); ?> 
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Student (<?php echo $student;?>)</h5>
              </div>
            </div>
        <?php if($session->type!='agent'): ?>
           <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Employee (<?php echo $employee;?>)</h5>
              </div>
            </div>
          <?php endif; ?>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-3">
                       <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pending Student (<?php echo $student_pending;?>)</h5>
              </div>
            </div>
       <?php if($session->type!='agent'): ?>

           <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Agent (<?php echo $employee_agent;?>)</h5>
              </div>
            </div>
          <?php endif; ?>
          </div>
          

          <div class="col-lg-3">
                       <div class="card">
              <div class="card-body">
                <h5 class="card-title">Approved Student (<?php echo $student_approved;?>)</h5>
              </div>
            </div>

             <div class="card">
              <div class="card-body">
                <h5 class="card-title">Today/All Enquiry. (<?php echo $today_enquiry[0]->today_enquiry;?> / <?php echo e($all_enquiry[0]->today_enquiry); ?> )</h5>
              </div>
            </div>

<!--             <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div> -->

            <!-- /.card -->
          </div>

          <div class="col-lg-3">
                       <div class="card">
              <div class="card-body">
                <h5 class="card-title">Rejected Student (<?php echo $student_rejected;?>)</h5>
              </div>
            </div>

<!--             <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div> -->

            <!-- /.card -->
          </div>




          <!-- /.col-md-6 -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <iframe  src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fashtoncollegeau&tabs=timeline&width=600&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="620" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
          </div>
          <div class="col-md-6">
            <div class="container" style="height: 500px;overflow-x: auto;">
              <?php 
              if(!empty($notification)){
                foreach ($notification as $key => $notifications) { ?>
                 <div class="alert alert-info">
                  <span class="text-warning"><?php echo e(date('d/m/Y',strtotime($notifications->created_at))); ?></span>

                   | <?php echo e(substr($notifications->notification_subject,0,105).".."); ?> || 
                  <a href="<?php echo e(url('/notification-list-view/'.base64_encode($notifications->id))); ?>">
                    <button type="button" class="btn btn-sm btn-default pull-right">View</button>
                  </a></div>
                <?php }

              } ?>  
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>