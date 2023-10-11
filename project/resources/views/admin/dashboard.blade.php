@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    </ol>
  </div>
  @if(Session::has('cache'))

  <div class="alert alert-success validation">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
              aria-hidden="true">×</span></button>
      <h3 class="text-center">{{ Session::get("cache") }}</h3>
  </div>


@endif

  <div class="row mb-3">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Active Users') }}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \DB::table('users')->where('ban',0)->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Blocked Users') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \DB::table('users')->where('ban',1)->count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-danger"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Authors') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \DB::table('users')->where('is_author',1)->count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-tie fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Active Products') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \DB::table('items')->where('status','completed')->count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-file fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Approval Pending') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \DB::table('items')->where('status','pending')->count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-file fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Update Approval Pending') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \DB::table('items')->where('Resubmission',1)->count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-file fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Sale') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \DB::table('items')->sum('sell') }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Sale profit') }}</div>
                <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><i class='fas fa-dollar-sign'></i> {{ \DB::table('ordered_items')->sum('admin_profit') }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-money-check-alt fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-md-6 mt-5 mb-5">
        <h5 class=" mb-3 text-gray-800">{{ __('Top Best Seller') }}</h5>
        <div class="card h-100">
          <div class="card-body">
              <table class="table  table-striped ">
                <thead class="thead-dark">
                    <tr>
                      <th >SL</th>
                      <th >Name</th>
                      <th>Email</th>
                      <th >Sale</th>
                    </tr>
                  </thead>
                  <tbody>

                      @foreach ($products as $product)
                            @foreach (DB::table('users')->where('id',$product->user_id)->get() as $user)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ DB::table('items')->where('user_id',$user->id)->sum('sell') }}</td>

                            </tr>
                            @endforeach
                      @endforeach

                  </tbody>
              </table>

          </div>
        </div>
      </div>

      <div class="col-xl-6 col-md-6 mt-5 mb-5">
        <h5 class=" mb-3 text-gray-800">{{ __('New Seller Under One Week') }}</h5>
        <div class="card h-100">
          <div class="card-body">
              <table class="table  table-striped ">
                <thead class="thead-dark">
                    <tr>
                      <th >SL</th>
                      <th >Name</th>
                      <th class="w-25">Email</th>
                      <th >Sale</th>

                    </tr>
                  </thead>
                  <tbody>

                      @foreach ($users as $user)
                      @php
                          $date = Carbon\Carbon::parse($user->email_verified_at);
                          $now = Carbon\Carbon::now();
                          $diff = $date->diffInDays($now);
                      @endphp
                      @if ($diff<=7)

                      <tr>
                        <th>{{ $noo++ }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ DB::table('items')->where('user_id',$user->id)->sum('sell') }}</td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
      </div>

       <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12 mt-5">
                    <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Total Sales in Last 30 Days') }}</h6>

                    </div>
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>



  </div>
  <!--Row-->

@endsection

@section('scripts')
<script language="JavaScript">
    displayLineChart();

    function displayLineChart() {
        var data = {
            labels: [
              @php
              echo $days;
              @endphp
            ],
            datasets: [{
                label: "Prime and Fibonacci",
                fillColor: "#3dbcff",
                strokeColor: "#0099ff",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [
                @php
                  echo $sales;
                @endphp
                ]
            }]
        };
        var ctx = document.getElementById("lineChart").getContext("2d");
        var options = {
            responsive: true
        };
        var lineChart = new Chart(ctx).Line(data, options);
    }

</script>

@endsection
