@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Purchase History') }}</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Orders') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">{{ __('All Orders') }}</a></li>
        </ol>
        </div>
    </div>


    <!-- Row -->
    <div class="row mt-3">
      <!-- Datatables -->
      <div class="col-lg-12">

        @include('includes.admin.form-success')

        <div class="card mb-4">
          <div class="table-responsive p-3">
            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
              <thead class="thead-light">
                <tr>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Order Number')}}</th>
                    <th>{{__('Total Qty')}}</th>
                    <th>{{__('Total Cost')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <!-- DataTable with Hover -->

    </div>
    <!--Row-->

{{-- STATUS MODAL --}}

<div class="modal fade confirm-modal" id="details" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __("Purchase details") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Back") }}</a>
      </div>
    </div>
	</div>
</div>

{{-- STATUS MODAL ENDS --}}


{{-- STATUS MODAL --}}
    <div class="modal fade confirm-modal" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ __("Update Status") }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <p class="text-center">{{ __("You are about to change the status.") }}</p>
              <p class="text-center">{{ __("Do you want to proceed?") }}</p>
            </div>

            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
              <a href="javascript:;" class="btn btn-success btn-ok">{{ __("Update") }}</a>
            </div>
          </div>
        </div>
    </div>
{{-- STATUS MODAL ENDS --}}


{{-- MESSAGE MODAL --}}
<div class="sub-categori">
  <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="vendorformLabel">{{__('Send Email')}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="container-fluid p-0">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="contact-form">
                                  <form id="emailreply">
                                      {{csrf_field()}}
                                      <ul>
                                          <li>
                                              <input type="email" class="input-field eml-val" id="eml" name="to" placeholder="{{__('Email')}} *" value="" required="">
                                          </li>
                                          <li>
                                              <input type="text" class="input-field" id="subj" name="subject" placeholder="{{__('Subject')}} *" required="">
                                          </li>
                                          <li>
                                              <textarea class="input-field textarea" name="message" id="msg" placeholder="{{__('Your Message')}} *" required=""></textarea>
                                          </li>
                                      </ul>
                                      <button class="submit-btn" id="emlsub" type="submit">{{__('Send Email')}}</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

{{-- MESSAGE MODAL ENDS --}}


@endsection


@section('scripts')

<script type="text/javascript">
	"use strict";

var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               searching: false,
               ajax: '{{ route('admin.order.datatables') }}',
               columns: [
                        { data: 'email', name: 'email' },
                        { data: 'id', name: 'id' },
                        { data: 'totalQty', name: 'totalQty' },
                        { data: 'pay_amount', name: 'pay_amount' },
                        { data: 'action', searchable: false, orderable: false }

                     ],
                language : {

                }
            });

</script>

@endsection
