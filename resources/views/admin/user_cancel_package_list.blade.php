@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<style type="text/css">
  td {
    font-size: 14px;
  }
</style>
@endsection 
@section('content')
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
                <div class="col-md-4"><h3 class="card-title">Package List</h3></div>
                 <div class="col-md-6">
                    <h5 class="card-title">
                  @if(session()->get('success'))
                    <span class="text-success">
                      {{ session()->get('success') }}  
                    </span>
                  @endif
                   @if(session()->get('failure'))
                    <span class="text-danger">
                      {{ session()->get('failure') }}  
                    </span>
                  @endif
              </h5>
                </div>

                <div class="col-md-2"><a href="{{url('/user-package-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Book Package</button></a></div>
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
                  <th>Itinerary</th>
                  <th>Coupon</th>
                  <th>Cost Break</th>
                  <th>Final Cost </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($package_list as $package)
        <tr>
            <td>{{ ucfirst($package->user_details[0]->name) }}</td>
            <td>{{ ucfirst($package->package_details[0]->package_name) }}</td>
            <!-- <td>{{$package->package_details[0]->package_days."/".$package->package_details[0]->package_night }}</td> -->

            <td><ol><?php 
                $total = 0;
                foreach ($package->iternery_added as $key => $itinerary) {
                  if($itinerary->itinerary_default_status==1){
                    $total += $itinerary->itinerary_cost;
                    $new = '*';
                  }else{
                    $new = "";
                  }
                 ?>
                  <li><?php echo $itinerary->item_details[0]->itinerary_name; ?> <span class="badge"><?php echo $itinerary->itinerary_cost." ".$new; ?></span></li>
               
                <?php 
              } 
            ?></ol>
            </td>
            <?php 
            $final_package_cost = $package->package_cost+$total;
            if(!empty($package->coupon_code) && $package->coupon_code!='NoCoupons'){
                if($package->coupon_details[0]->coupon_type=='percentage'){
                  $coupon_value         = $package->coupon_details[0]->coupon_value;
                  $final_package_cost   =  ($final_package_cost*$coupon_value)/100;
                  $coupon_show          =  $coupon_value." %";
                }elseif($package->coupon_details[0]->coupon_type=='flat'){
                  $coupon_value         = $package->coupon_details[0]->coupon_value;
                  $final_package_cost   =   $coupon_value;
                  $coupon_show          =  "- ".$coupon_value; 
                }
            }else{
             $coupon_value = 0; 
             $final_package_cost   = 0;
             $package->coupon_code = "No Coupon"; 
             $coupon_show          = 0; 
            }
            ?>


            <td>{{ $package->coupon_code }} ({{ $coupon_show }})</td>
            <td>{{ $package->package_cost."+".$total."-".$final_package_cost}}</td>
            <td>{{ $package->package_cost+$total-$final_package_cost }}</td>

            <td>
           
                 <button type="button" class="btn btn-primary btn-sm pay_modal" user_name="{{ ucfirst($package->user_details[0]->name) }}" user_id="{{ $package->user_id }}" package_name="{{ ucfirst($package->package_details[0]->package_name) }}" package_id="{{ $package->package_id }}" final_cost="{{ $package->final_package_cost }}" pending_cost="{{ $package->pending_amount }}">
                  Settlement
                </button>
              <button type="button" package_name="{{ ucfirst($package->package_details[0]->package_name) }}"  user_name="{{ ucfirst($package->user_details[0]->name) }}" paid_amount_history="{{ base64_encode(json_encode($package->paid_history)) }}" class="btn btn-primary btn-sm paid_amount_history">History</button>
                 <!--  <a href="{{ url('member-edit/'.base64_encode($package->id))}}">
                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  </a>
                  <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('member-delete/'.base64_encode($package->id))}}">
                  <button class="btn btn-sm btn-danger" type="button">Delete</button>
                </a> -->
               
            </td>
        </tr>
        @endforeach
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

    <div class="modal fade" id="pay_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Make Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
        <form role="form" enctype="multipart/form-data" method="post" action="{{ url('user-package-payment-create-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">

            <div class="card-body">
               
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
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Type *</label>
                    <select class="selectpicker form-control payment_type" name="payment_type" required="">
                              <option value="" >Select Payment type</option>
                              <option value="cash" >Cash</option>
                              <option value="cheque" >Cheque</option>
                  </select>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Amount *</label>
                    <input type="text" name="user_paid_amount" class="form-control user_paid_amount" placeholder="Paid Amount" value="" required="">
                  </div>
                </div>
            </div>
            <div class="row">                 
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Status *</label>
                    <select class="selectpicker form-control payment_type" name="payment_status" required="">
                              <option value="" >Select Payment Status</option>
                              <option value="settlement" >settlement</option>
                  </select>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Date *</label>
                    <input type="text" name="user_paid_date" class="form-control datepicker" placeholder="Paid Date" value="" required="">
                  </div>
                </div>
            </div>
            <div class="row">                 
                 <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Description *</label>
                   <textarea name="payment_description" required="" class="form-control" placeholder="Enter Payment Description"> </textarea>
                                 
                  </div>
                </div>
            </div>
          </div>
        </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
  @endsection
  @section('scripts')
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
</script>
<script type="text/javascript">
  $(function(){
    $('.pay_modal').click(function(){
      $('.user_name_modal').html($(this).attr('user_name'));
      $('.user_id_modal').val($(this).attr('user_id'));
      $('.package_name_modal').html($(this).attr('package_name'));
      $('.package_id_modal').val($(this).attr('package_id'));
      $('.package_id_modal').val($(this).attr('package_id'));
      $('.user_paid_amount').val($(this).attr('pending_cost'));
      $('#pay_modal').modal('show');
    })
  })
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
  @endsection