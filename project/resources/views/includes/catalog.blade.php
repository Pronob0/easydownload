<div class="col-lg-3">
    <div class="left-aside">
      <div class="top-filter">
        <select id="sortby" name="sort" >
            <option value="new">{{ __('Newest') }}</option>
            <option value="old">{{ __('Oldest') }}</option>
            <option value="popular">{{ __('Most Popular') }}</option>
            <option value="high_rated">{{ __('Highest Rated') }}</option>
            <option value="low_price">{{ __('Lowest Price') }}</option>
            <option value="high_price">{{ __('Highest Price') }}</option>
        </select>
      </div>
      <div class="accordion">
        <div class="mycard">
          <div class="mycard-header" id="headingRating">
            <span class="" data-toggle="collapse" data-target="#collapseRating" aria-expanded="true" aria-controls="collapseRating">
              {{ __('Rating') }} <i class="fas fa-chevron-down"></i>
            </span>
          </div>

          <div id="collapseRating" class="collapse show" aria-labelledby="headingRating">
          <div class="mycard-body">
            <div class="custom-control custom-radio">
              <input type="radio" id="s1" name="rating" value="4.5" class="custom-control-input ratings">
              <label class="custom-control-label" for="s1">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </span>
                <span class="right-info">
                  {{ __('4.5 & Up') }}
                </span>
              </label>
            </div>
              <div class="custom-control custom-radio">
              <input type="radio" id="s2" name="rating" value="4" class="custom-control-input ratings">
              <label class="custom-control-label" for="s2">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="right-info">
                  {{ __('4.0 & Up') }}
                </span>
              </label>
              </div>
              <div class="custom-control custom-radio">
              <input type="radio" id="s3" name="rating" value="3" class="custom-control-input ratings">
              <label class="custom-control-label" for="s3">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="right-info">
                  {{ __('3.0 & Up') }}
                </span>
              </label>
              </div>
              <div class="custom-control custom-radio">
              <input type="radio" id="s4" name="rating" value="2" class="custom-control-input ratings">
              <label class="custom-control-label" for="s4">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                </span>
                <span class="right-info">
                  {{ __('2.0 & Up') }}
                </span>
              </label>
              </div>
          </div>
          </div>
        </div>

        <div class="mycard">
          <div class="mycard-header" id="headingDuration">
            <span class="collapsed" type="button" data-toggle="collapse" data-target="#collapseDuration" aria-expanded="false" aria-controls="collapseDuration">
            {{ __('Video Duration') }} <i class="fas fa-chevron-down"></i>
            </span>
          </div>
          <div id="collapseDuration" class="collapse" aria-labelledby="headingDuration">
          <div class="mycard-body">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="durations" value="0-2" class="custom-control-input durations" id="vd1">
              <label class="custom-control-label" for="vd1">{{ __('0-2 Hours') }}</label>
              </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="durations" value="2-6" class="custom-control-input durations" id="vd2">
              <label class="custom-control-label" for="vd2">{{ __('2-6 Hours') }}</label>
              </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="durations" value="6-12" class="custom-control-input durations" id="vd3">
              <label class="custom-control-label" for="vd3">{{ __('6-12 Hours') }}</label>
              </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="durations" value="12-18" class="custom-control-input durations" id="vd4">
              <label class="custom-control-label" for="vd4">{{ __('12-18 Hours') }}</label>
              </div>
          </div>
          </div>
        </div>



        <div class="mycard">
          <div class="mycard-header" id="headingPrice">
            <span class="collapsed" type="button" data-toggle="collapse" data-target="#collapsePrice" aria-expanded="false" aria-controls="collapsePrice">
            {{ __('Price') }} <i class="fas fa-chevron-down"></i>
            </span>
          </div>
          <div id="collapsePrice" class="collapse" aria-labelledby="headingPrice">
          <div class="mycard-body">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" id="pri1" class="custom-control-input course-type" name="type" value="paid">
              <label class="custom-control-label" for="pri1">{{ __('Paid') }}</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" id="pri2" class="custom-control-input course-type" name="type" value="free">
              <label class="custom-control-label" for="pri2">{{ __('Free') }}</label>
            </div>
          </div>
          </div>
        </div>

        <div class="mycard">
          <div class="mycard-header" id="headingLevel">
            <span class="collapsed" type="button" data-toggle="collapse" data-target="#collapseLevel" aria-expanded="false" aria-controls="collapseLevel">
            {{ __('Level') }} <i class="fas fa-chevron-down"></i>
            </span>
          </div>
          <div id="collapseLevel" class="collapse" aria-labelledby="headingLevel">
          <div class="mycard-body">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input course-level" name="level" value="all" id="lv1">
              <label class="custom-control-label" for="lv1">{{ __('All Levels') }}</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input course-level" name="level" value="beginner" id="lv2">
              <label class="custom-control-label" for="lv2">{{ __('Beginner') }}</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input course-level" name="level" value="intermediate" id="lv3">
              <label class="custom-control-label" for="lv3">{{ __('Intermediate') }}</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input course-level" name="level" value="advanced" id="lv4">
              <label class="custom-control-label" for="lv4">{{ __('Advanced') }}</label>
            </div>
          </div>
          </div>
        </div>
        </div>
    </div>
  </div>
