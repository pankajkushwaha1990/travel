@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
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
                <div class="col-md-5"><h3 class="card-title">Users List</h3></div>
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

                <div class="col-md-1"><a href="{{url('/user-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Adhaar</th>
                  <!-- <th>Pan</th> -->
                  <th>Passport</th>
                  <!-- <th>Signup On</th> -->
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($users_list))  
                @foreach($users_list as $users)
                  <tr>
                      <td>{{ $users->name }}</td>                      
                      <td><span class="<?php if($users->mobile_otp){ echo 'text text-success'; } ?>">{{ $users->mobile }}</span></td>
                      <td><span class="<?php if($users->email_otp){ echo 'text text-success'; } ?>">{{ $users->email }}</span></td>
                      <td>{{ $users->city_name }}</td>
                      <td>{{ $users->state_name }}</td>
                      <td>{{ $users->adhaar_file }}</td>
                      <!-- <td>{{ $users->pan_file }}</td> -->
                      <td>{{ $users->passport_file }}</td>
                      <!-- <td>{{ $users->created_at }}</td> -->
                      @if($users->status =='1')         
                        <td><a href="{{ url('user-change-status/0/'.base64_encode($users->id))}}"><button class="btn btn-sm btn-success"><i class="fa fa-check"></i></button></a></td>         
                      @else
                      <td><a href="{{ url('user-change-status/1/'.base64_encode($users->id))}}"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>        
                     @endif
                      <td>
                            <a href="{{ url('user-edit/'.base64_encode($users->id))}}">
                              <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></button>
                            </a>
                            <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('user-delete/'.base64_encode($users->id))}}">
                            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-trash-alt"></i></button>
                            
                          </a>
                      </td>
                  </tr>
                  @endforeach
                  @endif
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