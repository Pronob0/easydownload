
@if (session()->has('success'))
    <div class="alert alert-success  flashmessage" role="alert">
        <p class="m-0">{{session()->get('success')}}</p>
    </div>
@endif

<!-- Validation Message -->
@if ($errors->any())
 	<div class="row justify-content-center no-print">
        <div class="col-sm-12">
			<div class="alert alert-warning alert-dismissible  fade show" role="alert">
                <p class="pl-4 m-0" style="color:#856404"><strong>Warning: </strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
				
				
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
        </div>
    </div>
@endif


<!-- Success Message -->
@if (session()->has('Warning'))
 	<div class="row justify-content-center no-print">
        <div class="col-sm-12">
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				
				<strong>Warning: </strong>{{ session()->get('Warning') }}

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
        </div>
    </div>
@endif

<!-- Success Message -->
@if (session()->has('Success'))
 	<div class="row justify-content-center no-print">
        <div class="col-sm-12">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				
				<strong>Success: </strong>{{ session()->get('Success') }}

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
        </div>
    </div>
@endif


<!-- Update Message -->
@if (session()->has('Update'))
 	<div class="row justify-content-center">
        <div class="col-sm-12">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				
				<strong>Update: </strong>{{ session()->get('Update') }}
				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
        </div>
    </div>
@endif


<!-- Delete Message -->
@if (session()->has('Delete'))
 	<div class="row justify-content-center">
        <div class="col-sm-12">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				
				<strong>Delete: </strong>{{ session()->get('Delete') }}
				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
        </div>
    </div>
@endif
