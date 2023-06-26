@extends('admin.layouts.header')
@section('styles') 
    
@endsection
@section('content')
        <div class="content-wrapper">
    
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="col-12 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Business Model</h3>
                </div>
             </div>

            <div class="col-md-12 grid-margin w-100">


              <div class="card">
                
                <div class="card-body row">
                   <div class="form-group col-lg-6">
                   <input type="text" name="ename" class="form-control form-control-lg" id="" placeholder="Business Model Name">
                   </div>


                <div class="form-group col-lg-6">
                  <input type="submit" name="submit" class="form-control btn btn-primary" value="Add">
                </div>

                </div>


              </div>


              <br>


              <div class="">
                <div class="">
                  <div class="row">

                    <div class="form-group col-lg-12 table-responsive">

                      <table id="transaction-table" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No.</th>
                <th>Business Model Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Srk</td>
                

                <td>
                  <div class="dropdown">
                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                           <a class="dropdown-item" href="#">Withdrawal </a>
                            <a class="dropdown-item" href="#">Donet </a>
                         
                          
                          </div>
                        </div>
                </td>
             
            </tr>

            <tr>
                <td>2</td>
                <td>gk</td>
                 <td>
                  <div class="dropdown">
                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">
                           <a class="dropdown-item" href="#">Withdrawal </a>
                            <a class="dropdown-item" href="#">Donet </a>
                         
                          
                          </div>
                        </div>
                </td>  
               
            </tr>

        </tbody>
       
    </table>
                      
    </div>

                </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->



@endsection
@section('scripts')   

<script type="text/javascript">
  $(document).ready(function () {
  $('#transaction-table').DataTable();
});</script>

<script type="text/javascript">

$(document).ready(function() {
  $("#example").DataTable({
    aaSorting: [],
    responsive: true,

    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0
      },
      {
        responsivePriority: 2,
        targets: -1
      }
    ]
  });

  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "300px",
      display: "inline-block"
    });

  $('[data-toggle="tooltip"]').tooltip();
});

</script>
@endsection
