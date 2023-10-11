@extends('layouts.front')
@section('content')


@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
                    <div class="row mt-0">
                        <div class="col-lg-10 col-md-8 col-sm-8">

                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="withdraw-btn ">
                                <a href="{{route('user.withdraw.request')}}" class="link_portfolio"><i class="fas fa-plus"></i>  {{__('Withdraw Now')}}</a>
                            </div>
                        </div>

                    </div>



					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="table-responsive">
								<table class="table table-lg table-hover">
									<thead class="thead-dark">
										<tr>
                                            <th>{{ __('Withdraw Date') }}</th>
                                            <th>{{ __('Method') }}</th>
                                            <th>{{ __('Account') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Status') }}</th>
										</tr>
									</thead>

									<tbody>
                                        @foreach($withdraws as $withdraw)
                                        <tr>
                                            <td>{{date('d-M-Y',strtotime($withdraw->created_at))}}</td>
                                            <td>{{$withdraw->method}}</td>
                                            @if($withdraw->method != "Bank")
                                            <td>{{$withdraw->acc_email}}</td>
                                            @else
                                            <td>{{$withdraw->iban}}</td>
                                            @endif
                                            <td>${{ round($withdraw->amount , 2) }}</td>
                                            <td>{{ucfirst($withdraw->status)}}</td>
                                        </tr>
                                        @endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
