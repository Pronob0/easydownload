
@extends('layouts.front')
@section('content')

@includeIf('includes.user.common')

			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
                    @if (auth()->user()->is_author == 1)
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <p class="card-text text-center">{{ __('You are author Now.') }}</p>
                            </div>
                        </div>
                    @else
                    <div class="extra_ijyu98">
                        <div class="extra_ijyu98_head">
                            <h4>Become an Author</h4>
                        </div>
                        <div class="extra_ijyu98_body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <form action="{{route('user.author.submit')}}"  method="POST">
                                        @csrf
                                    <div class="_iolp65">
                                        <ul class="no-ul-list mb-3">
                                            <li>
                                                <input id="a-4" class="checkbox-custom" name="is_author" value="author" type="checkbox"  required>
                                                <label for="a-4" class="checkbox-custom-label">Accept Terms and Condition</label>
                                            </li>

                                        </ul>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn_update">Save &amp; Update</button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->





@endsection


















{{--  --}}
