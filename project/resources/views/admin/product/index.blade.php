@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
	<h5 class=" mb-0 text-gray-800 pl-3">{{ __('Product') }}</h5>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Products') }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">{{ __('Product') }}</a></li>
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
		  <thead>
			<tr>
                <th>{{ __('Thumbnail') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Demo Link') }}</th>
                <th>{{ __('Main File') }}</th>
                <th>{{ __('Sell') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Feature') }}</th>
                <th class="w-25">{{ __('Action') }}</th>
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

{{-- COMMENT MODAL STARTS --}}

<div class="modal fade" id="commentModal" data-itemid="" tabindex="-1" role="dialog" aria-labelledby="commentModal" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="submit-loader">
                        <img  src="{{asset('assets/images/spinner.gif')}}" alt="">
                </div>
                <div class="modal-header">
                <h5 class="modal-title">{{__('Soft rejection issue')}}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-itemid="">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="commentForm" action="{{ route('admin.itemcreate.soft') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="itemid" value="">
                        <div class="form-group">
                            <label for="">{{__('Comment')}} *</label>
                            <textarea name="comment" class="form-control" rows="5" cols="80" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="commentSubmit" class="btn btn-secondary" type="submit">{{__('Submit')}}</button>
                    <button id="commentModalCloseBtn" type="button" class="btn btn-secondary" data-dismiss="modal" data-itemid="">Close</button>
                </div>
        </div>
    </div>

</div>

{{-- COMMENT MODAL ENDS --}}


{{-- DELETE MODAL --}}
<div class="modal fade confirm-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __("Confirm Delete") }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p class="text-center">{{__("You are about to delete this Product.")}}</p>
				<p class="text-center">{{ __("Do you want to proceed?") }}</p>
			</div>

			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
				<a href="javascript:;" class="btn btn-danger btn-ok">{{ __("Delete") }}</a>
			</div>
		</div>
	</div>
</div>
{{-- DELETE MODAL ENDS --}}

@endsection



@section('scripts')

    <script type="text/javascript">
	"use strict";

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               searching: false,
               ajax: '{{ route('admin.product.datatables','none') }}',
               columns: [

                        { data: 'thumbnail_imagename', name: 'thumbnail_imagename' , searchable: false, orderable: false},
                        { data: 'name', name: 'name' },
                        { data: 'category_id', name: 'category_id' },
                        { data: 'regular_price', name: 'regular_price' },
                        { data: 'demo_link', name: 'demo_link' },
                        { data: 'MainFile', name: 'MainFile' },
                        { data: 'sell', name: 'sell' },
                        { data: 'status', name: 'status' },
                        { data: 'is_feature', name: 'is_feature' },
            			{ data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                }
            });

</script>
{{-- DATA TABLE ENDS--}}



<script>
    $(document).ready(function() {

        var data = null;
        var demoStatus = null; // 0 - demo url not needed, 1 - demo url needed
        var itemid = null;

        $(document).on('click','.decision',function () {


            data = $(this).data('val');
            itemid = $(this).attr('data-itemid');
            demoStatus = $(this).attr('data-demo_status');

            // if changed to soft reject
            if(data == 'declined') {
                $("input[name='itemid']").val(itemid);
                $("#commentModal").data('itemid', itemid);
                $("#commentModalCloseBtn").data('itemid', itemid);
                $("#commentModal button.close").data('itemid', itemid);
                $("#commentModal").modal('show');
            }



        });
        // after comment submitted by reviewer
                $("#commentSubmit").on('click', function(e) {
                    if (admin_loader == 1) {
                        $('.gocover').show();
                    }
                    e.preventDefault();
                    let fd = new FormData(document.getElementById('commentForm'));
                    fd.append('status', data);
                    fd.append('section', '{{ request()->input('section') }}');
                    console.log(data);
                    $.ajax({
                        url: '{{ route('admin.itemcreate.soft') }}',
                        data: fd,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            // console.log(data);

                            if (data.success) {
                                table.ajax.reload();
                                 $('.alert-success').show();
                                 $('.alert-success p').html('Data Updated Successfull');
                                $("#commentModal").modal('hide');
                                $("#commentModal form").trigger('reset');

                            }
                            else{
                                $('.alert-danger').show();
                                $('.alert-danger p').html('Comment Field Required');
                                $("#commentModal").modal('hide');
                                $("#commentModal form").trigger('reset');
                               }


                        }
                    });
                });
    });

    </script>

@endsection
