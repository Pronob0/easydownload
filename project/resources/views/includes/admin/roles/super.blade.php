  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cat" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-sitemap"></i>
      <span>{{ __('Manage Categories') }}</span>
    </a>
    <div id="cat" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.cat.index') }}">{{ __('Main Categories') }}</a>
        <a class="collapse-item" href="{{ route('admin.subcat.index') }}">{{ __('Subcategories') }}</a>
        <a class="collapse-item" href="{{ route('admin.childcat.index') }}">{{ __('Childcategories') }}</a>
      </div>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order" aria-expanded="true"
    aria-controls="collapseTable">
    <i class="fas fa-fw fa-sitemap"></i>
    <span>{{ __('Manage Orders') }}</span>
  </a>
    <div id="order" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.order.index') }}">{{ __('Order List') }}</a>
        <a class="collapse-item" href="{{ route('admin.refund.index') }}">{{ __('Refund Order') }}</a>
        <a class="collapse-item" href="{{ route('admin.statement.index') }}">{{ __('Statements') }}</a>
      </div>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true"
    aria-controls="collapseTable">
    <i class="fas fa-fw fa-sitemap"></i>
    <span>{{ __('Manage Products') }}</span>
  </a>
    <div id="product" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.product.index') }}">{{ __('Product List') }}</a>
        <a class="collapse-item" href="{{ route('admin.product.completed') }}">{{ __('Approved') }}</a>
        <a class="collapse-item" href="{{ route('admin.product.pending') }}">{{ __('Pending') }}</a>
        <a class="collapse-item" href="{{ route('admin.product.declined') }}">{{ __('Soft Reject') }}</a>
        <a class="collapse-item" href="{{ route('admin.product.resubmit') }}">{{ __('Resubmission ') }}</a>
      </div>
    </div>
  </li>


   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#level" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-at"></i>
      <span>{{  __('Author Level') }}</span>
    </a>
    <div id="level" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.level.index') }}">{{ __('Level List') }}</a>
        <a class="collapse-item" href="{{ route('admin.badge.index') }}">{{ __('Badge List') }}</a>
        <a class="collapse-item" href="{{ route('admin.trending.index') }}">{{ __('Trending') }}</a>
      </div>
    </div>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.coupon.index') }}">
      <i class="fas fa-fw fa-percentage"></i>
      <span>{{ __('Set Coupon') }}</span></a>
  </li> --}}

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-cogs"></i>
      <span>{{  __('General Settings') }}</span>
    </a>
    <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.gs.logo') }}">{{ __('Logo') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.fav') }}">{{ __('Favicon') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.load') }}">{{ __('Loader') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.order') }}">{{ __('Order Settings') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.breadcumb') }}">{{ __('Breadcumb Banner') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.contents') }}">{{ __('Website Contents') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.maintenance') }}">{{ __('Website Maintain') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.theme') }}">{{ __('Themes') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.product.details') }}">{{ __('Product Page') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.footer') }}">{{ __('Footer') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.error.banner') }}">{{ __('Error Banner') }}</a>
        <a class="collapse-item" href="{{ route('admin.gs.captcha') }}">{{ __('Captcha') }}</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#homepage" aria-expanded="true"
    aria-controls="collapseTable">
    <i class="fas fa-fw fa-sitemap"></i>
    <span>{{ __('Home Page Setting') }}</span>
  </a>
    <div id="homepage" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.ps.hero') }}">{{ __('Hero Section') }}</a>
        <a class="collapse-item" href="{{ route('admin.ps.recent') }}">{{ __('Recent Theme') }}</a>
        <a class="collapse-item" href="{{ route('admin.ps.featured') }}">{{ __('Featured Theme') }}</a>
        <a class="collapse-item" href="{{ route('admin.ps.blog') }}">{{ __('Blog Section') }}</a>
        <a class="collapse-item" href="{{ route('admin.ps.newsletter') }}">{{ __('Newsletter Section') }}</a>
        <a class="collapse-item" href="{{ route('admin.partner.index') }}">{{ __('Partners') }}</a>
      </div>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#email_settings" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-at"></i>
      <span>{{  __('Email Settings') }}</span>
    </a>
    <div id="email_settings" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.mail.index') }}">{{ __('Email Template') }}</a>
        <a class="collapse-item" href="{{ route('admin.mail.config') }}">{{ __('Email Configurations') }}</a>
        <a class="collapse-item" href="{{ route('admin.group.show') }}">{{ __('Group Email') }}</a>
      </div>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-user"></i>
      <span>{{  __('Users') }}</span>
    </a>
    <div id="customer" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.user.index') }}">{{ __('User List') }}</a>
        <a class="collapse-item" href="{{ route('admin.withdraw.index') }}">{{ __('Withdraw Request') }} @if( DB::table('withdraws')->where('status','pending')->count() > 0)
            <span class="badge badge-sm badge-danger badge-counter">{{ DB::table('withdraws')->where('status','pending')->count() }}</span>@endif</a>
            <a class="collapse-item" href="{{ route('admin.user.bonus') }}">{{ __('Registration Bonus') }}</a>

      </div>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.role.index') }}">
      <i class="fas fa-fw fa-users-cog"></i>
      <span>{{ __('Manage Roles') }}</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.user.message') }}">
      <i class="fas fa-fw fa-users-cog"></i>
      <span>{{ __('Messages') }}</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-newspaper"></i>
      <span>{{  __('Manage Blog') }}</span>
    </a>
    <div id="blog" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.cblog.index') }}">{{ __('Categories') }}</a>
        <a class="collapse-item" href="{{ route('admin.blog.index') }}">{{ __('Posts') }}</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#social" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-paper-plane"></i>
      <span>{{  __('Social Settings') }}</span>
    </a>
    <div id="social" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('admin.social.index')}}">{{ __('Social Links') }}</a>
        <a class="collapse-item" href="{{ route('admin.social.facebook') }}">{{ __('Facebook Login') }}</a>
        <a class="collapse-item" href="{{ route('admin.social.google') }}">{{ __('Google Login') }}</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-edit"></i>
      <span>{{  __('Menu Page Settings') }}</span>
    </a>
    <div id="menu" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.ps.contact') }}">{{ __('Contact Us Page') }}</a>
        <a class="collapse-item" href="{{ route('admin.page.index') }}">{{ __('Other Pages') }}</a>
        <a class="collapse-item" href="{{ route('admin.faq.index') }}">{{ __('FAQ Page') }}</a>
      </div>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seoTools" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-wrench"></i>
      <span>{{  __('SEO Tools') }}</span>
    </a>
    <div id="seoTools" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('admin.seotool.analytics')}}">{{ __('Google Analytics') }}</a>
        <a class="collapse-item" href="{{route('admin.seotool.keywords')}}">{{ __('Website Meta Keywords') }}</a>


      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment_gateways" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-newspaper"></i>
      <span>{{  __('Payment Settings') }}</span>
    </a>
    <div id="payment_gateways" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.payment.info') }}">{{ __('Payment Informations') }}</a>
        <a class="collapse-item" href="{{ route('admin.currency.index') }}">{{ __('Currencies') }}</a>
        <a class="collapse-item" href="{{ route('admin.payment.index') }}">{{  __('Payment Gateways')  }}</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.staff.index') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>{{ __('Manage Staff') }}</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#langs" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-language"></i>
      <span>{{  __('Language Settings') }}</span>
    </a>
    <div id="langs" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('admin.lang.index')}}">{{ __('Website Language') }}</a>
        <a class="collapse-item" href="{{route('admin.tlang.index')}}">{{ __('Admin Panel Language') }}</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.font.index') }}">
      <i class="fas fa-font"></i>
      <span>{{ __('Fonts') }}</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.subs.index') }}">
      <i class="fas fa-fw fa-users-cog"></i>
      <span>{{ __('Subscribers') }}</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.cache.clear') }}">
      <i class="fas fa-sync"></i>
      <span>{{ __('Clear Cache') }}</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sactive" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-at"></i>
      <span>{{  __('System Activation') }}</span>
    </a>
    <div id="sactive" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('admin-activation-form')}}">{{ __('Activation') }}</a>
        <a class="collapse-item" href="{{route('admin-generate-backup')}}">{{ __('Generate Backup') }}</a>
      </div>
    </div>
  </li>
  <div class="version mt-4">
      <h6 class="text-center bolder text-black">Version: 1.2</h6>
  </div>


