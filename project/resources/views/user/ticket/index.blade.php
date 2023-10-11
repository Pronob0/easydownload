
@extends('layouts.front')

@section('content')

@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
            @include('includes.admin.form-both')
			<section class="gray-light">
				<div class="container">
					<div class="row">


<div class="col-lg-8 col-md-12 col-sm-12">
    <button type="button" class="btn btn_update mb-2" data-toggle="modal" data-target="#ticketmodal">
        {{ __('Add Ticket') }}
      </button>
      <br>
    <div class="table-responsive">
        <table class="table table-lg table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('Subject') }}</th>
                    <th>{{ __('Message') }}</th>
                    <th>{{ __('Time') }}</th>
                    <th>{{ __('Action') }}</th>

                </tr>
            </thead>

            <tbody>
                	@if (count($convs) == 0)
							<tr>
								<td>{{__('No tickets found.')}}</td>
							</tr>
						@else
                @foreach($convs as $conv)

                <tr class="conv">
                    <input type="hidden" value="{{$conv->id}}">
                    <td>{{$conv->subject}}</td>
                    <td>{{$conv->text}}</td>

                    <td>{{$conv->created_at->diffForHumans()}}</td>
                    <td>


                    <a href="{{route('user.message.show',$conv->id)}}" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
                    <button type="button" data-toggle="modal" data-target="#confirm-delete"  data-href=" {{ route('user.message.delete1',$conv->id) }} " class="btn btn-danger btn-sm btn-rounded">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>

                </tr>
              @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{ $convs->links() }}
</div>
<div class="col-lg-4 col-md-12 col-sm-12">
    <!-- Single Author Info -->
    @include('includes.user.common-sidebar')




</div>




					</div>
				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->
            {{-- DELETE MODAL --}}
<div class="modal fade confirm-modal" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
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
{{-- MESSAGE MODAL --}}
<div class="sub-categori">
    <div class="modal fade confirm-modal" id="ticketmodal" tabindex="-1" role="dialog"
    aria-labelledby="vendorformLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="vendorformLabel">{{ __("Send Message") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-form">
                            <form id="emailreply1">
                                {{csrf_field()}}


                                <div class="form-group">
                                    <input type="text" class="form-control" id="subj1" name="subject"  placeholder="{{ __('Subject') }}" value="" required="">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="msg1" cols="20" rows="6" placeholder="{{ __('Your Message') }} "required=""></textarea>
                                </div>



                                <button class="submit-btn btn btn_update mx-auto" id="emlsub1" type="submit">{{ __("Send Message") }}</button>
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

<script src="{{ asset("assets/user/js/custom.js") }}"></script>



<script type="text/javascript">

    $(document).on("submit", "#emailreply1" , function(){
    var token = $(this).find('input[name=_token]').val();
    var subject = $(this).find('input[name=subject]').val();
    var message =  $(this).find('textarea[name=message]').val();
    var $type  = $(this).find('input[name=type]').val();
    $('#subj1').prop('disabled', true);
    $('#msg1').prop('disabled', true);
    $('#emlsub1').prop('disabled', true);
$.ajax({
      type: 'post',
      url: "{{URL::to('/user/admin/user/send/message')}}",
      data: {
          '_token': token,
          'subject'   : subject,
          'message'  : message,
          'type'   : $type
            },
      success: function( data) {
    $('#subj1').prop('disabled', false);
    $('#msg1').prop('disabled', false);
    $('#subj1').val('');
    $('#msg1').val('');
  $('#emlsub1').prop('disabled', false);
  if(data == 0)
    toastr.error("{{__('something_wrong')}}");
  else
    toastr.success("{{ __('message sent') }}");
  $('.close').click();
      }

  });
    return false;
  });

</script>




@endsection
