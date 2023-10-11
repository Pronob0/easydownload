<div class="special-box">
  <div class="heading-area">
      <h4 class="title">
        {{__('Files')}} ({{__('Select the files needed for')}} <strong class="text-uppercase">{{ $category->name }}</strong>)
      </h4>
  </div>
  <form class="pb-4 px-5" action="{{ route('admin-form-files') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="category_id" value="{{ $category->id }}">
    @if (request()->input('section') == 'themes')
    <div class="custom-control custom-checkbox mb-2">
      <input type="checkbox" class="custom-control-input" id="wpTheme" name="wordpress_theme" {{ $category->wordpress_theme == 1 ? 'checked' : '' }} value="1">
      <label class="custom-control-label mr-4" for="wpTheme">{{__('WordPress Theme')}}</label>
      (
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="wp_status1" name="wp_status" class="custom-control-input" {{ $category->wp_status == 1 ? 'checked' : '' }} value="1">
        <label class="custom-control-label" for="wp_status1">{{__('Required')}}</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="wp_status2" name="wp_status" class="custom-control-input" {{ $category->wp_status == 0 ? 'checked' : '' }} value="0">
        <label class="custom-control-label" for="wp_status2">{{__('Optional')}}</label>
      </div>
      )
    </div>
    @endif
    @if (request()->input('section') == 'themes' || request()->input('section') == 'videos')
    <div class="custom-control custom-checkbox mb-2">
      <input type="checkbox" class="custom-control-input" id="releaseForm" name="release_form" {{ $category->release_form == 1 ? 'checked' : '' }} value="1">
      <label class="custom-control-label mr-4" for="releaseForm">{{__('Release Form')}}</label>
      (
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="release_status1" name="release_status" class="custom-control-input" {{ $category->release_status == 1 ? 'checked' : '' }} value="1">
        <label class="custom-control-label" for="release_status1">{{__('Required')}}</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="release_status2" name="release_status" class="custom-control-input" {{ $category->release_status == 0 ? 'checked' : '' }} value="0">
        <label class="custom-control-label" for="release_status2">{{__('Optional')}}</label>
      </div>
      )
    </div>
    @endif
    @if (request()->input('section') == 'scripts')
    <div class="custom-control custom-checkbox mb-2">
      <input type="checkbox" class="custom-control-input" id="previewSS" name="preview_screenshots" {{ $category->preview_screenshots == 1 ? 'checked' : '' }} value="1">
      <label class="custom-control-label mr-4" for="previewSS">{{__('Preview Screenshots')}}</label>
      (
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="ps_status1" name="ps_status" class="custom-control-input" {{ $category->ps_status == 1 ? 'checked' : '' }} value="1">
        <label class="custom-control-label" for="ps_status1">{{__('Required')}}</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="ps_status2" name="ps_status" class="custom-control-input" {{ $category->ps_status == 0 ? 'checked' : '' }} value="0">
        <label class="custom-control-label" for="ps_status2">{{__('Optional')}}</label>
      </div>
      )
    </div>
    @endif
    @if (request()->input('section') == 'scripts')
    <div class="custom-control custom-checkbox mb-2">
      <input type="checkbox" class="custom-control-input" id="wpPlugin" name="wordpress_plugin" {{ $category->wordpress_plugin == 1 ? 'checked' : '' }} value="1">
      <label class="custom-control-label mr-4" for="wpPlugin">{{__('WordPress Plugin')}}</label>
      (
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="wpp_status1" name="wpp_status" class="custom-control-input" {{ $category->wpp_status == 1 ? 'checked' : '' }} value="1">
        <label class="custom-control-label" for="wpp_status1">{{__('Required')}}</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="wpp_status2" name="wpp_status" class="custom-control-input" {{ $category->wpp_status == 0 ? 'checked' : '' }} value="0">
        <label class="custom-control-label" for="wpp_status2">{{__('Optional')}}</label>
      </div>
      )
    </div>
    @endif
    {{-- @if (request()->input('section') == 'scripts')
    <div class="custom-control custom-checkbox mb-2">
      <input type="checkbox" class="custom-control-input" id="livePreview" name="live_preview" {{ $category->live_preview == 1 ? 'checked' : '' }} value="1">
      <label class="custom-control-label mr-4" for="livePreview">Live Preview</label>
      (
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="lp_status1" name="lp_status" class="custom-control-input" {{ $category->lp_status == 1 ? 'checked' : '' }} value="1">
        <label class="custom-control-label" for="lp_status1">Required</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="lp_status2" name="lp_status" class="custom-control-input" {{ $category->lp_status == 0 ? 'checked' : '' }} value="0">
        <label class="custom-control-label" for="lp_status2">Optional</label>
      </div>
      )
    </div>
    @endif --}}
    @if (request()->input('section') == 'scripts')
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="videoPreview" name="video_preview" {{ $category->video_preview == 1 ? 'checked' : '' }} value="1">
      <label class="custom-control-label mr-4" for="videoPreview">{{__('Video Preview')}}</label>
      (
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="video_status1" name="video_status" class="custom-control-input" {{ $category->video_status == 1 ? 'checked' : '' }} value="1">
        <label class="custom-control-label" for="video_status1">{{__('Required')}}</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="video_status2" name="video_status" class="custom-control-input" {{ $category->video_status == 0 ? 'checked' : '' }} value="0">
        <label class="custom-control-label" for="video_status2">{{__('Optional')}}</label>
      </div>
      )
    </div>
    @endif
    <div class="text-left mt-3">
      <button type="submit" class="btn btn-primary">{{__('SUBMIT')}}</button>
    </div>
  </form>
</div>
