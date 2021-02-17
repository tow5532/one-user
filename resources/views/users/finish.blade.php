@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h2 class="title-effect">{{ trans('auth.notice.finish.0') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="pb-50 clearfix">
                        <div class="alert alert-danger" role="alert" style="line-height:25px;">
                            <b style="font-size:18px;text-transform:capitalize;padding-bottom:5px;">{{trans('auth.notice.notice')}}</b>
                            <br>
                            <br>
                            -{{ trans('auth.notice.finish.1') }}
                            <br>
                            -{{ trans('auth.notice.finish.2') }}
                        </div>
                        <div class="col-12 mb-20 mt-30 no-padding">
                            <a class="button btn-block" href="{{route('wallet')}}">{{ trans('auth.notice.finish.3') }}</a>
                        </div>

                        <div class="col-12 mb-20 mt-10 no-padding">
                            <a href="{{route('game.slot')}}" class="button black btn-block">
                                {{ trans('auth.notice.finish.4') }}
                            </a>
                        </div>
                        <div class="col-12 mb-20 mt-10 no-padding">
                            <a href="{{route('mypage')}}" class="button gray btn-block">
                                {{ trans('auth.notice.finish.5') }}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 no-padding">
                        <a href="javascript:triggerUE4EventBlank('close');" class="button">
                            <span>{{trans('auth.button.close')}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .button, .button.gray:hover, .button.gray.active, .button.gray:focus, .button.border:hover, .button.border:focus, .button.border, .button.border.gray:hover, .button.border.gray:focus, .button.black:hover, .button.black.active, .button.black:focus, .button.icon-color i, .btn-primary, .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover, .data-table .table-2 .table thead tr th, .dropcap.dropcap-border, .feature-text.round:hover .feature-icon i, .feature-text.round:hover .feature-icon span, .feature-text.theme-icon .feature-icon span, .feature-text.theme-icon .feature-icon i, .feature-text.square:hover .feature-icon i, .feature-text.square:hover .feature-icon span, .remember-checkbox label:before, .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover, .panel-primary>.panel-heading, .panel-primary, .nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .pricing-table.active .pricing-top, .pricing-table.active.boxed, .membership-pricing-table table .plan-header-standard, .nav-border .nav.nav-tabs > li.active > a:focus, .nav-border .nav.nav-tabs > li.active > a:hover, .nav-border .nav.nav-tabs > li.active > a, .nav-border .nav.nav-tabs > li.active > a:focus, .nav-border .nav.nav-tabs > li.active > a:hover, .testimonial-avatar img, .our-history .timeline > li > .timeline-badge, .isotope-filters button.active, .isotope-filters button:hover, .sidebar-widget .widget-categories li a:hover i, .blog .timeline li:hover .timeline-badge, .blog .timeline li:hover .timeline-panel, .video-background-banner .slider-content, .service-blog ul, .service-blog.left ul, .personal-typer-banner h2, .personal-typer-banner b {
            border-color: #84ba3f;
        }
        .theme-bg, .accordion.gray .acd-group.acd-active .acd-heading, .accordion.gray .acd-group .acd-heading:hover, .accordion.shadow .acd-group.acd-active .acd-heading, .accordion.shadow .acd-group .acd-heading:hover, .accordion.accordion-border .acd-group.acd-active .acd-heading, .accordion.accordion-border .acd-group .acd-heading:hover, .button, .button.gray:hover, .button.gray.active, .button.gray:focus, .button.border:hover, .button.border:focus, .button.border.gray:hover, .button.border.gray:focus, .button.black:hover, .button.black.active, .button.black:focus, .btn-primary, .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover, .owl-carousel .owl-dots .owl-dot:hover span, .owl-carousel .owl-dots .owl-dot.active span, .data-table .table-1 thead, .dropcap, del, mark, .feature-text.round:hover .feature-icon i, .feature-text.round:hover .feature-icon span, .feature-text.theme-icon .feature-icon span, .feature-text.theme-icon .feature-icon i, .feature-text.square:hover .feature-icon i, .feature-text.square:hover .feature-icon span, .feature-box .border, .portfolio-item .portfolio-overlay, .portfolio-item a.popup:hover, .section-title.line .title:before, .section-title.bg span, .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover, .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover, .panel-primary>.panel-heading, .price.active .header, .membership-pricing-table table .plan-header-standard, .play-video, .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover, .nav-border .nav.nav-tabs > li.active > a, .nav-border .nav.nav-tabs > li.active > a:focus, .nav-border .nav.nav-tabs > li.active > a:hover, .testimonial.green, .mejs-controls .mejs-time-rail .mejs-time-current, .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .mejs-controls .mejs-volume-button .mejs-volume-slider, .footer .footer-tags li a:hover, .isotope-filters button.active, .isotope-filters button:hover, .blog-entry.blockquote, .blog-entry.blockquote blockquote, .blog-entry.blockquote .blog-detail, .blog-box .post-category a, .blog .timeline li:hover .timeline-badge, .blog .timeline li.entry-date-bottom a:hover, .contact-box i, .custom-content, .owl-carousel .owl-nav i, .services-text-box-green, .popup-video-banner a:hover span, .login-bg .login-title, .login-social li a.fb:hover, .login-social li a.twitter:hover, .login-social li a.pinterest:hover, .register-bg .register-title, .process .process-step strong, #back-to-top .top, .tab .nav.nav-tabs > li.active > a, .nav.nav-tabs > li.active > a:focus, .nav.nav-tabs > li.active > a:hover, .footer-widget-social a i:hover, .shpping-cart strong.item, .header.fancy .topbar, .bootstrap-datetimepicker-widget table td.active, .bootstrap-datetimepicker-widget table td.active:hover, .modal-subscribe .subscribe-icon, .product .product-image .add-to-cart a, .testimonial.theme-bg, .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover, .pagination li a:focus, .pagination li a:hover, .pagination li span:focus, .pagination li span:hover {
            background: #84ba3f;
        }
        .no-padding{padding:0px !important;}
    </style>
    <script type="text/javascript" src="{{ URL::asset('js/HTMLMenuUE4Connector.js') }}"></script>
@stop
