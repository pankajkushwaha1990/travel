@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha256-P8k8w/LewmGk29Zwz89HahX3Wda5Bm8wu2XkCC0DL9s=" crossorigin="anonymous" />
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
                <div class="col-md-5"><h3 class="card-title">Itinerary List</h3></div>
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

                <div class="col-md-1"><a href="{{url('/itinerary-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
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
                @foreach($itinerarys_list as $itinerarys)
                  <tr>
                      <td> {{ $itinerarys->category_details[0]->category_name }}  
                       
                      </td>                      
                      <td><a  href="{{ url('').'/itinerary_image/'.$itinerarys->Itinerary_image }}" data-fancybox data-caption="{{ $itinerarys->Itinerary_name }}">
                          <img   src="{{ url('').'/itinerary_image/'.$itinerarys->Itinerary_image }}" width="32" height="32" alt="" />
                        </a>{{ $itinerarys->Itinerary_name}}</td>                      
                      <td>{{ $itinerarys->price}}</td>                      
                      <td>{{ $itinerarys->city_details[0]->name }}</td>                      
                      <td>{{ $itinerarys->state_details[0]->name }}</td>                      
                      <td>{{ $itinerarys->country_details[0]->name }}</td>                      
                      <!-- <td><img width="32" height="32" src="{{ url('').'/amenities_image/'.$itinerarys->Itinerary_image }}"></td> -->
                      <!-- <td>{{$itinerarys->Itinerary_description}}</td> -->
                      @if($itinerarys->status =='1')         
                        <td><a href="{{ url('itinerary-change-status/0/'.base64_encode($itinerarys->id))}}"><button class="btn btn-sm btn-success">Active</button></a></td>         
                      @else
                      <td><a href="{{ url('itinerary-change-status/1/'.base64_encode($itinerarys->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                     @endif
                      <td>
                          <form action="{{ url('agent', $itinerarys->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ url('itinerary-edit/'.base64_encode($itinerarys->id))}}">
                              <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('itinerary-delete/'.base64_encode($itinerarys->id))}}">
                            <button class="btn btn-sm btn-danger" type="button">Delete</button>
                          </a>
                          </form>
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
  @endsection