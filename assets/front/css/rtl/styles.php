<?php
header("Content-type: text/css; charset: UTF-8");
if(isset($_GET['color']))
{
  $color = '#'.$_GET['color'];
}
else {
  $color = '#0f78f2';
}
?>

.contacts,select.currency.selectors.nice,.currency-selector  { 
    color: <?php echo $color; ?>;
}
.urip_product_count,.nav-menu.nav-menu-social>li.add-listing.green-bg,.banner-search .btn.bt-round{
    background:<?php echo $color; ?>;
}
.urip_product_count:hover,.item_info_bmc .author_bmv,.link.link_cart,._tag780{
    color: <?php echo $color; ?>;
}
a._uy98p.active, a._uy98p:hover, a._uy98p:focus{
    border-color:<?php echo $color; ?>;
    color:<?php echo $color; ?>;
}
.link.link_cart:hover, .link.link_cart:focus{
    background:<?php echo $color; ?>;
    border: 1px solid <?php echo $color; ?>;
}
.inner-flexible-box.subscribe-box .btn.btn-subscribe {
    background:<?php echo $color; ?>;
}

.nav-menu>.active>a, .nav-menu>.focus>a, .nav-menu>li:hover>a {
    color: <?php echo $color; ?> !important;
}
.nav-menu>li:hover>a .submenu-indicator-chevron {
    border-color: transparent <?php echo $color; ?> <?php echo $color; ?> transparent;
}
.nav-dropdown>li:hover>a {
    color:<?php echo $color; ?>;
}