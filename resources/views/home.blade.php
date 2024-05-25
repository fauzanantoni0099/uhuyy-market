<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Theta is a bootstrap & laravel admin dashboard template">
    <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin - UhuyyRecords.</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="/img/core-img/dis6.jpg">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="/back/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
    <!-- jvectormap css -->
    <link href="/back/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- Datepicker css -->
    <link href="/back/assets/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="/back/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Infobar Notifications Sidebar -->

<!-- End Infobar Notifications Sidebar -->
<!-- Start Infobar Setting Sidebar -->
<div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
    <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
        <h4>Settings</h4><a href="javascript:void(0)" id="infobar-settings-close" class="infobar-settings-close"><img src="/back/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close"></a>
    </div>
    <div class="infobar-settings-sidebar-body">
        <div class="custom-layout-setting">
            <div class="row align-items-center pb-3">
                <div class="col-12">
                    <div class="account-box active">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <div class="account-box">
                                <img
                                    src="back/assets/images/users/men.svg"
                                    class="img-fluid"
                                    alt="user"
                                />
                                <h5>{{ Auth::user()->name }}</h5>
                                <p>Logout</p>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="infobar-settings-sidebar-overlay"></div>
<!-- End Infobar Setting Sidebar -->
<!-- Start Containerbar -->
<div id="containerbar">
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Logobar -->
            <div class="logobar">
                <a href="{{'/home'}}" class="logo logo-large"><img src="/img/core-img/logow.png" class="img-fluid" alt="logo"></a>
                <a href="{{'/home'}}" class="logo logo-small"><img src="/img/core-img/logow.png" class="img-fluid" alt="logo"></a>
            </div>
            <!-- End Logobar -->
            <!-- Start Profilebar -->
            <div class="profilebar text-center">
                <img src="/img/core-img/uhuy.png" class="img-fluid" alt="profile" style="width: 80px">
                <div class="profilename">
                    <h5 class="text-white">{{Auth::user()->name}}</h5>
                </div>
            </div>
            <!-- End Profilebar -->
            <!-- Start Navigationbar -->
            <div class="navigationbar">
                <ul class="vertical-menu">
                    <li class="vertical-header">Master</li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="/back/assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Dashboard</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('artist.index')}}"><i class="mdi mdi-circle"></i>Artist</a></li>
                            <li><a href="{{route('album.index')}}"><i class="mdi mdi-circle"></i>Albums</a></li>
                            <li><a href="{{route('song.index')}}"><i class="mdi mdi-circle"></i>Songs</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="/back/assets/images/svg-icon/layouts.svg" class="img-fluid" alt="layouts"><span>Layouts</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('event.index')}}"><i class="mdi mdi-circle"></i>Events</a></li>
                            <li><a href="{{route('testimonial.index')}}"><i class="mdi mdi-circle"></i>Testimonials</a></li>
                            <li><a href="{{route('message.index')}}"><i class="mdi mdi-circle"></i>Messages</a></li>
                            <li><a href="{{route('gallery.index')}}"><i class="mdi mdi-circle"></i>Gallery</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- End Navigationbar -->
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->
    <!-- Start Rightbar -->
    <div class="rightbar">
        <!-- Start Topbar Mobile -->
        <div class="topbar-mobile">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="mobile-logobar">
                        <a href="index.html" class="mobile-logo"><img src="/back/assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="mobile-togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="topbar-toggle-icon">
                                    <a class="topbar-toggle-hamburger" href="javascript:void();">
                                        <img src="/back/assets/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                        <img src="/back/assets/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img src="/back/assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                        <img src="/back/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Topbar -->
        <div class="topbar">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center">
                    <div class="togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img src="/back/assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                        <img src="/back/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="searchbar">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2"><img src="/back/assets/images/svg-icon/search.svg" class="img-fluid" alt="search"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="settingbar">
                                    <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                        <img src="/back/assets/images/svg-icon/logout.svg" class="img-fluid" alt="settings">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Topbar -->
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Social Media</h4>
                    <div class="breadcrumb-list">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Social Media</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbbar -->
        <!-- Start Contentbar -->
        <div class="contentbar">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h5 class="card-title mb-0">Live Campaigns</h5>
                                </div>
                                <div class="col-5">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item mr-0"><a href="#" class="card-arrow"><i class="feather icon-chevron-left"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="card-arrow"><i class="feather icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center pb-0 px-0">
                            <div class="row align-items-center">
                                <div class="col-md-4"><p>Clicks</p></div>
                                <div class="col-md-4"><h3>1985</h3></div>
                                <div class="col-md-4"><p><span class="badge badge-success-inverse font-16">10%<i class="feather icon-arrow-up-right"></i></span></p></div>
                            </div>
                            <canvas height="150" id="chartjs-boundary-area-chart" class="chartjs-chart mt-4"></canvas>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title mb-0">Performance</h5>
                                </div>
                                <div class="col-6">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item mr-0 font-12">Referrals</li>
                                        <li class="list-inline-item"><input type="checkbox" class="js-switch-performance" checked /></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center pb-0 px-0">
                            <div class="row align-items-center">
                                <div class="col-md-4"><p>Sessions</p></div>
                                <div class="col-md-4"><h3>2589</h3></div>
                                <div class="col-md-4"><p><span class="badge badge-danger-inverse font-16">25%<i class="feather icon-arrow-down-right"></i></span></p></div>
                            </div>
                            <canvas height="150" id="chartjs-bar-chart" class="chartjs-chart mt-4"></canvas>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h5 class="card-title mb-0">Statistics</h5>
                                </div>
                                <div class="col-7">
                                    <div class="card-statistics">
                                        <ul class="nav nav-pills mb-0" id="stastic-pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-selected="true">Day</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"  aria-selected="false">Month</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center pb-0 px-0">
                            <div class="row align-items-center">
                                <div class="col-md-4"><p>Visitors</p></div>
                                <div class="col-md-4"><h3>795</h3></div>
                                <div class="col-md-4"><p><span class="badge badge-success-inverse font-16">19%<i class="feather icon-arrow-up-right"></i></span></p></div>
                            </div>
                            <canvas height="150" id="chartjs-stacked-area-chart" class="chartjs-chart mt-4"></canvas>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title mb-0">Wallet</h5>
                                </div>
                                <div class="col-6">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item mr-0 font-12">Update <a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center pb-3">
                                <div class="col-6">
                                    <p class="mb-2">Balance</p>
                                    <h3><sup>$</sup>389</h3>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary">Pay</button>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <p>Used</p>
                                </div>
                                <div class="col-6 text-right">
                                    <p>$280</p>
                                </div>
                            </div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="font-12 mb-0">*Keep min balance of $50.</p>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-12 col-xl-5">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title mb-0">Spent</h5>
                                </div>
                                <div class="col-6">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item">
                                            <div class="form-group mb-0 amount-spent-select">
                                                <select class="form-control" id="formControlSelectSocialMedia">
                                                    <option>Facebook</option>
                                                    <option>Instagram</option>
                                                    <option>News Feed</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <p><i class="feather icon-disc text-primary mr-2"></i>40% - Instagram</p>
                                    <p><i class="feather icon-disc text-warning mr-2"></i>35% - Facebook</p>
                                    <p><i class="feather icon-disc text-light mr-2"></i>25% - News Feed</p>
                                </div>
                                <div class="col-md-5">
                                    <canvas height="142" id="chartjs-pie-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-6 col-lg-6 col-xl-2">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title text-white mb-0">Instagram</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p class="dash-social-icon"><i class="feather icon-instagram"></i></p>
                                    <h3 class="text-white mb-4">695</h3>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="text-white text-center mb-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-6 col-lg-6 col-xl-2">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title text-white mb-0">Facebook</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p class="dash-social-icon"><i class="feather icon-facebook"></i></p>
                                    <h3 class="text-white mb-4">263</h3>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="text-white text-center mb-0">Likes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title mb-0">Sources of Users</h5>
                                </div>
                                <div class="col-4">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item mr-0 font-12"><button type="button" class="btn btn-sm btn-primary-rgba font-14 px-2">Export</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <canvas id="chartjs-doughnut-chart" class="chartjs-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title mb-0">Top Countries</h5>
                                </div>
                                <div class="col-4">
                                    <ul class="list-inline-group text-right mt-1 mb-0 pl-0">
                                        <li class="list-inline-item mr-0 font-12"><i class="feather icon-more-vertical- font-20 text-primary"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive dash-flag-icon">
                                <table class="table table-borderless mb-2">
                                    <thead>
                                    <tr>
                                        <th scope="col">Flag</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Likes</th>
                                        <th scope="col">Follows</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><i class="flag flag-icon-us flag-icon-squared"></i></th>
                                        <td>USA</td>
                                        <td>2,500</td>
                                        <td>65,858</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="flag flag-icon-cn flag-icon-squared"></i></th>
                                        <td>China</td>
                                        <td>1,285</td>
                                        <td>95,258</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="flag flag-icon-ru flag-icon-squared"></i></th>
                                        <td>Russia</td>
                                        <td>758</td>
                                        <td>25,985</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="flag flag-icon-es flag-icon-squared"></i></th>
                                        <td>Spain</td>
                                        <td>652</td>
                                        <td>32,125</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="flag flag-icon-br flag-icon-squared"></i></th>
                                        <td>Brazil</td>
                                        <td>254</td>
                                        <td>12,896</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title mb-0">Browsers</h5>
                                </div>
                                <div class="col-4">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item mr-0 font-12"><button type="button" class="btn btn-sm btn-success-rgba font-14 px-2">Update</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive dash-flag-icon">
                                <table class="table table-borderless mb-2">
                                    <thead>
                                    <tr>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Browser</th>
                                        <th scope="col">Per(%)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><img src="/back/assets/images/browser/chrome.png" class="img-fluid" alt="chrome"></th>
                                        <td>Google Chrome</td>
                                        <td>35%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="/back/assets/images/browser/safari.png" class="img-fluid" alt="safari"></th>
                                        <td>Safari</td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="/back/assets/images/browser/windows.png" class="img-fluid" alt="windows"></th>
                                        <td>Microsoft Edge</td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="/back/assets/images/browser/mozilla.png" class="img-fluid" alt="mozilla"></th>
                                        <td>Mozilla Firefox</td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="/back/assets/images/browser/opera.png" class="img-fluid" alt="opera"></th>
                                        <td>Opera</td>
                                        <td>5%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Country Wise Performance</h5>
                        </div>
                        <div class="card-body">
                            <div id="world-map" class="vector-world-map"></div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <p class="piety-data-attributes mb-0 mr-3">
                                                <span data-peity='{ "fill": ["#6e81dc", "rgba(255,255,255,0.05)"],   "innerRadius": 20, "radius": 24 }'>5/7</span>
                                            </p>
                                            <div class="media-body">
                                                <p class="mb-1 text-white f-w-6 font-18">62%</p>
                                                <h5 class="card-title text-muted font-16 mb-0">USA</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <p class="piety-data-attributes mb-0 mr-3">
                                                <span data-peity='{ "fill": ["#5fc27e", "rgba(255,255,255,0.05)"],   "innerRadius": 20, "radius": 24 }'>5.5/7</span>
                                            </p>
                                            <div class="media-body">
                                                <p class="mb-1 text-white f-w-6 font-18">83%</p>
                                                <h5 class="card-title text-muted font-16 mb-0">India</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <p class="piety-data-attributes mb-0 mr-3">
                                                <span data-peity='{ "fill": ["#fcc100", "rgba(255,255,255,0.05)"],   "innerRadius": 20, "radius": 24 }'>4/7</span>
                                            </p>
                                            <div class="media-body">
                                                <p class="mb-1 text-white f-w-6 font-18">55%</p>
                                                <h5 class="card-title text-muted font-16 mb-0">Australia</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <p class="piety-data-attributes mb-0 mr-3">
                                                <span data-peity='{ "fill": ["#f44455", "rgba(255,255,255,0.05)"],   "innerRadius": 20, "radius": 24 }'>3/7</span>
                                            </p>
                                            <div class="media-body">
                                                <p class="mb-1 text-white f-w-6 font-18">35%</p>
                                                <h5 class="card-title text-muted font-16 mb-0">Argentina</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <p class="piety-data-attributes mb-0 mr-3">
                                                <span data-peity='{ "fill": ["#72d0fb", "rgba(255,255,255,0.05)"],   "innerRadius": 20, "radius": 24 }'>6.5/7</span>
                                            </p>
                                            <div class="media-body">
                                                <p class="mb-1 text-white f-w-6 font-18">92%</p>
                                                <h5 class="card-title text-muted font-16 mb-0">Russia</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <p class="piety-data-attributes mb-0 mr-3">
                                                <span data-peity='{ "fill": ["#718093", "rgba(255,255,255,0.05)"],   "innerRadius": 20, "radius": 24 }'>2/7</span>
                                            </p>
                                            <div class="media-body">
                                                <p class="mb-1 text-white f-w-6 font-18">28%</p>
                                                <h5 class="card-title text-muted font-16 mb-0">South Africa</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Contentbar -->
        <!-- Start Footerbar -->
        <div class="footerbar">
            <footer class="footer">
                <p class="mb-0">© 2024 UhuyyRecords - Taffy Developer.</p>
            </footer>
        </div>
        <!-- End Footerbar -->
    </div>
    <!-- End Rightbar -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="/back/assets/js/jquery.min.js"></script>
<script src="/back/assets/js/popper.min.js"></script>
<script src="/back/assets/js/bootstrap.min.js"></script>
<script src="/back/assets/js/modernizr.min.js"></script>
<script src="/back/assets/js/detect.js"></script>
<script src="/back/assets/js/jquery.slimscroll.js"></script>
<script src="/back/assets/js/vertical-menu.js"></script>
<!-- Switchery js -->
<script src="/back/assets/plugins/switchery/switchery.min.js"></script>
<!-- Chart js -->
<script src="/back/assets/plugins/chart.js/chart.min.js"></script>
<script src="/back/assets/plugins/chart.js/chart-bundle.min.js"></script>
<!-- Piety Chart js -->
<script src="/back/assets/plugins/peity/jquery.peity.min.js"></script>
<!-- Vector Maps js -->
<script src="/back/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/back/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- Custom Dashboard Social js -->
<script src="/back/assets/js/custom/custom-dashboard-social.js"></script>
<!-- Core js -->
<script src="/back/assets/js/core.js"></script>
<!-- End js -->
</body>
</html>
