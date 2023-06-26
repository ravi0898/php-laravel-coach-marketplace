@extends('admin.layouts.header')

@section('styles') 

    

@endsection

@section('content')

        <div class="content-wrapper">

    

          <div class="row">

            <div class="col-md-12 grid-margin">

              <div class="col-6 mb-4 mb-xl-0">

                  <h3 class="font-weight-bold text-white">FAQ List</h3>

                </div>



                <div class="col-6 mb-4 mb-xl-0">

                  <a class="font-weight-bold btn btn-primary" href="{{route('admin-addFaq')}}">Add FAQ</a>

                </div>

             </div>



            <div class="col-md-12 grid-margin w-100">

              <div class="">

                <div class="">

                  <div class="row">

                  @if (\Session::has('success'))



                    <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">

                    <strong> <i class="mdi mdi-thumb-up-outline"></i> </strong> {!! \Session::get('success') !!}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                    </button>

                  </div>

                  @endif

                    <div class="form-group col-lg-12 table-responsive">



                      <table id="transaction-table" class="table" style="width:100%">

        <thead>

            <tr class="text-white">

                <th>Sr.No.</th>

                <th>Title</th>

                <th>Description</th> 
                <th>Type</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            

            @php

            $sno = 1;

            @endphp

            @foreach ($faqData as $faqDataList) 



            <tr>

                <td>{{ $sno }}</td>

                <td>{{ substr($faqDataList->title, 0, 30).'...' }}</td>
                
                <td>{{ substr($faqDataList->descp, 0, 50).'...' }}</td>
                 
                <td>{{ $faqDataList->type}}</td>


                



                <td>

                  <div class="dropdown">

                          <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="mdi mdi-dots-vertical"></i>

                          </button>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4" style="">

                            @php $ide = $faqDataList->id; @endphp

                            <a class="dropdown-item" href="{{ route('admin-faq-edit',$ide) }}">Edit </a>

                            <a href="javascript:(void)" class="dropdown-item" data-href="{{route('admin-faq-delete',$ide)}}" data-toggle="modal" data-target="#confirm-deny">Delete </a>

                          </div>

                        </div>

                </td>

             

            </tr>

            @php

            $sno++;

            @endphp



            @endforeach





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
<!-- Modal -1 -->

<div class="modal fade" id="confirm-deny">

  <div class="modal-dialog">

     <div class="modal-content">

        <!-- Modal Header -->

        <div class="modal-header">

           <h4 class="modal-title">Confirmation</h4>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

           <p>Are you sure, you want to delete this faq?</p>

           <!-- <p class="debug-url"></p> -->

        </div>

        <div class="modal-footer">

           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

           <a class="btn btn-success btn-ok">Ok</a>

        </div>

     </div>

  </div>

</div>

<!-- Modal 1-->






@endsection

@section('scripts')   



<script type="text/javascript">

  $(document).ready(function () {

  $('#transaction-table').DataTable();

});</script>

<script>
$('#confirm-deny').on('show.bs.modal', function(e) {
$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>

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

