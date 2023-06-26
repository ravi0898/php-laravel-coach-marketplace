@extends('coach.layouts.header')
@section('styles') 
@endsection
@section('content')
<div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="col-12 mb-0 mb-sm-4 mb-xl-0">
                  <h3 class="font-weight-bold text-white">FAQ</h3>
                  <h6 class="font-weight-normal mb-0 text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6>
                </div>
             </div>

            <div class="col-md-12 stretch-card mb-0 mb-sm-0">
              <div class="w-100 bg-transparent">
                <div class="card-body bg-transparent card-padding">
                  <div class="row">

                    <div class="form-group col-lg-12 faq card-padding">

                     <ul class="faq-list">
                         
                        @if(count($faq) > 0)
                        @php $i = 1; @endphp
                        @foreach($faq as $faq_list)
                     
                      <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                        <a data-toggle="collapse" class="collapsed" href="#faq_{{ $i }}" aria-expanded="false">{{ $faq_list->title }} <i class="ti-angle-down"></i></a>
                        <div id="faq_{{ $i }}" class="collapse" data-parent=".faq-list" style="">
                          <p>
                            {{ $faq_list->descp }}
                          </p>
                        </div>
                      </li>
            
                       @php $i++; @endphp
                       @endforeach
                       @endif
            
                      
                      
                    </ul>
                      
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 

        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

     



         <script type="text/javascript">

         $(document).ready(function () {

         $('#order-table').DataTable();

        });

        </script>

        <script>

        $(document).ready(function(){

          $('[data-toggle="tooltip"]').tooltip();   

        });

        </script>

@endsection
