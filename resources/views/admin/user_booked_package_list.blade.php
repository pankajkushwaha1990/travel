@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
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
                  <th>D/N</th>
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
            <td>{{$package->package_details[0]->package_days."/".$package->package_details[0]->package_night }}</td>

            <td><?php 
                $total = 0;
                foreach ($package->iternery_added as $key => $itinerary) {
                  if($itinerary->itinerary_default_status==1){
                    $total += $itinerary->itinerary_cost;
                    $new = 'success';
                  }else{
                    $new = "primary";
                  }
                 ?>
                  <button type="button" class="btn btn-<?php echo $new;?> btn-sm"><?php echo $itinerary->item_details[0]->Itinerary_name; ?> <span class="badge"><?php echo $itinerary->itinerary_cost; ?></span></button>
               
                <?php 
              } 
            ?>
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


            <td><button type="button" class="btn btn-info btn-sm">{{ $package->coupon_code }} ({{ $coupon_show }})</button></td>
            <td>{{ $package->package_cost."+".$total."-".$final_package_cost}}</td>
            <td>{{ $package->package_cost+$total-$final_package_cost }}</td>

            <td>
           
                  @if($package->status =='1')         
                        <a href="{{ url('package-change-status/0/'.base64_encode($package->id))}}"><button class="btn btn-sm btn-success">Active</button></a>         
                  @else
                  <a href="{{ url('package-change-status/1/'.base64_encode($package->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a>      
                 @endif
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
  @endsection
  @section('scripts')
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
  @endsection