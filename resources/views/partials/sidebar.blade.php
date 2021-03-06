<style type="text/css">
  .nav-sidebar .nav-item>.nav-link {
    position: relative;
    color: black;
}
.nav-sidebar .nav-item>.nav-link {
    position: relative;
    color: black;
}
.main-sidebar .brand-text, .sidebar .nav-link p, .sidebar .user-panel .info {
    transition: margin-left .3s linear,opacity .3s ease,visibility .3s ease;
    color: black;
}
</style>
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #feb353;">
    <!-- Brand Logo -->
    <center><a href="{{url('/dashboard')}}" class="brand-link">
        <img src="{{asset('dist/img/ashton.png')}}" class="img-circle elevation-3" style="width:30px;height:30px;" alt="Ashton College">
      
      <span class="brand-text font-weight-light">Travel Blaster</span>
    </a></center>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
          <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="" class="img-circle elevation-3"
           style="opacity: .8">
        </div>
        <div class="info">
          <a href="{{url('/dashboard')}}" style="color: black;" class="d-block">{{ $session->name }}</a>
        </div>
      </div>
<?php 
if(($session->type=='admin')){ ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('category-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('itinerary-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Itinerary</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{url('amenities-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inclusions</p>
                </a>
              </li>
          <!--    <li class="nav-item">
                <a href="{{url('flight-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flight</p>
                </a>
              </li> -->
            </ul>
         </li>

         
         

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Coupon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('coupon-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupon</p>
                </a>
              </li>
            </ul>
         </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('users-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
         </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Package
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('package-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package</p>
                </a>
              </li>
            </ul>
         </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('product-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
         </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Booking
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('user-package-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book A Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('user-booked-package-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booked Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('user-cancel-package-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancel Booked Package</p>
                </a>
              </li>
            </ul>
         </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('users-package-pay-pending-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay</p>
                </a>
              </li>
            </ul>
         </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('purchased-package-report-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package Report</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('purchased-user-report-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('transaction-history-report-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaction</p>
                </a>
              </li>
            </ul>
         </li>




       <!--   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('update-profile')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Signature</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('change-password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
         </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Course Fee Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('setting-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Application Fee</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('course-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses Fee</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('member-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('student-export')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export To SMS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('student-assign-id')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign ID</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('student-offer-letter-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer Letter</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{url('initial-payment-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Initial Payment</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('student-approval-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Approval</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('initial-payment-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Agent Commission
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('agent-commision-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

          

































          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('report-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Email
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('email-compose')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('enquiry-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notification
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('notification-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li> -->



        </ul>
      </nav>
<?php }else{ 
  if(!empty($session->menu_allow) && $session->menu_allow!=null){
               $allow = json_decode($session->menu_allow,true);
  }else{
               $allow = array();
  }
  ?>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('update-profile')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('change-password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
  @if(in_array('student',$allow))
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
           </li>
        @endif



        @if(in_array('assign',$allow))
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-share-alt"></i>
              <p>
                Assign
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student-assign-id')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign ID</p>
                </a>
              </li>
            </ul>
           </li>
        @endif

        @if(in_array('offer',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Offer Letter
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student-offer-letter-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        
         @if(in_array('rfi',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Request For Invoice
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('request-for-invoice')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

       

        @if(in_array('studentApproval',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-street-view"></i>
              <p>
                Student Approval
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student-approval-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('payment',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('initial-payment-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('agentComission',$allow))
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Agent Commission
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('agent-commision-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
           </li>
        @endif

        @if(in_array('report',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('report-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('mail',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Mail
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('email-compose')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        
          @if(in_array('enquiry',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('enquiry-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('notification',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Notification
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('notification-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('export',$allow))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Export To SMS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student-export')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generate</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

       

       </ul>
      </nav>

 <?php } ?> 


      <!-- Sidebar Menu -->

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>