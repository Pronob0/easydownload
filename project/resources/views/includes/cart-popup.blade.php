<div id="details">
    <div class="success-message text-center">
        <i class="far fa-check-circle"></i>
        <p><strong>{{__('Item added to your cart')}}</strong></p>
</div>
<div class="item-details bg-light d-flex justify-content-evenly p-2">
        <div class="thumb mr-4 my-5"><img src="{{asset("assets/images/".$item->thumbnail_imagename)}}" alt="" class="img-fluid w-100"></div>
        <div class="content my-5">
            <h4 class="title">{{$item->name}}</h4>
            @if ($item->user->username)
                <span>{{__('by')}} {{$item->user->username}}</span>
            @else
                <span>{{__('by')}} {{__('admin')}}</span>
            @endif
            <h3 class="price">{{$item->cartPrice($cartItem["total_price"]) }}</h3>
            <p style="text-transform: capitalize"><strong>{{__('License')}}:</strong> {{$cartItem['license']}}</p>
            <p style="text-transform: capitalize"><strong>{{__('Free Support Duration')}}:</strong> {{$gs->support_duration}}</p>
            <a href="" class="btn btn-sm btn-primary change-details-btn mt-2">{{__('Change Details')}}</a>
        </div>
</div>
    <div class="text-right">

    </div>
</div>



<div id="changeDetails" style="display: none;">

    <div class="form-box-items">
        <div class="form-box-item">
            <form id="updateSelection">
                {{csrf_field()}}
                <input type="hidden" name="cart_item_id" value="{{$cartItem["id"]}}">

                <div class="input-container half">
                    <label for="new_pwd" class="rl-label">{{__('Select a License')}}</label>
                    <select name="license" class="form-control">
                        <option selected disabled>{{__('Select a License')}}...</option>
                        <option value="regular" {{$cartItem["license"] == 'regular' ? 'selected' : ''}}>{{__('Regular License')}}</option>
                        <option value="extended" {{$cartItem["license"] == 'extended' ? 'selected' : ''}}>{{__('Extended License')}}</option>
                    </select>
                </div>

                <div class="input-container half">
                    <label for="new_pwd" class="rl-label">{{__('Select Support Duration')}}</label>
                    <select name="support" class="form-control ">
                        <option selected disabled>{{__('Select Support Duration')}}...</option>
                        <option value="{{$gs->support_duration}} months">{{$gs->support_duration}} {{__('months support')}}</option>
                        <option value="{{$gs->support_duration * 2}} months">{{$gs->support_duration * 2}} {{__('months support')}}</option>
                    </select>
                </div>

            </form>
        </div>
    </div>

    <div id="itemDetails">
        @includeIf('includes.item-details')
    </div>
</div>


<script>
    'use strict';
    var itemid = "{{$item->id}}";
    var cartItemId = "{{$cartItem['id']}}";
    var includedDuration = "{{$gs->support_duration}}";
    var extendedDuration = "{{$gs->support_duration * 2}}";

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $("input[name='support']").on('change', function() {
            let supportStatus = $(this).is(":checked");
            if (supportStatus) {
                var support = extendedDuration + ' months';
            } else {
                var support = includedDuration + ' months';
            }


            let fd = new FormData();
            fd.append('itemid', itemid);
            fd.append('support', support);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{url('/')}}/cart/update-support/" + cartItemId,
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {

                    let cartItemId = data.cartItem.id;
                    $("#cartPopup").load("{{url('/')}}/load/"+itemid+'/'+cartItemId+"/cartpopup", function(data) {
                    });
                }
            })
        });


    	$(".change-details-btn").on('click', function(event) {
            event.preventDefault();

    		$("#details").hide();
    		$("#changeDetails").show();

            let supportStatus = $("input[name='support']").is(':checked');

            if (supportStatus) {
                $("select[name='support']").val(extendedDuration + ' months');
            } else {
                $("select[name='support']").val(includedDuration + ' months');
            }
    	});


        $("select[name='support']").on('change', function() {
            let fd = new FormData(document.getElementById('updateSelection'));

            $.ajax({
                url: "{{route('front.cart.updateselection')}}",
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);

                        $("#itemDetails").load("{{url('/')}}/load/"+itemid+'/'+cartItemId+"/item-details", function() {

                    });
                }
            });
        });


        $("select[name='license']").on('change', function() {
            let fd = new FormData(document.getElementById('updateSelection'));

            $.ajax({
                url: "{{route('front.cart.updateselection')}}",
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);

                    $("#itemDetails").load("{{url('/')}}/load/"+itemid+'/'+cartItemId+"/item-details");
                }
            });
        });


        $("#saveSelectionBtn").on('click', function() {
            location.reload();
        });


        $("#cancelBtn, #keepBrowsing").on('click', function() {
            $.magnificPopup.close();
        });

    });
</script>
