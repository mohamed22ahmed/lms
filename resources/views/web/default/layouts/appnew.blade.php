<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
@endphp

<head>
    @include('web.default.includes.metas')
    <title>{{ $pageTitle ?? '' }}{{ !empty($generalSettings['site_name']) ? (' | '.$generalSettings['site_name']) : '' }}</title>

    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/simplebar/simplebar.css">
    <link rel="stylesheet" href="/assets/default/css/app.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/Landing_1/assets/plugins/css/bootstrap.min.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/Landing_1/assets/plugins/css/animate.min.css" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/Landing_1/assets/plugins/css/owl.carousel.min.css" />
    <!-- Maginific Popup CSS -->
    <link rel="stylesheet" href="assets/Landing_1/assets/plugins/css/maginific-popup.min.css" />
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/Landing_1/assets/plugins/css/nice-select.min.css" />
    <!-- Icofont -->
    <link rel="stylesheet" href="assets/Landing_1/assets/plugins/css/icofont.css" />
    <!-- Uicons -->
    <link rel="stylesheet" href="assets/Landing_1/assets/plugins/css/uicons.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/Landing_1/assets/libs/Inte_Tel_Code/css/intlTelInput.css" />
    <link rel="stylesheet" href="assets/Landing_1/style.css" />
    @if($isRtl)
        <link rel="stylesheet" href="/assets/default/css/rtl-app.css">
    @endif

    @stack('styles_top')
    @stack('scripts_top')

    <style>
        {!! !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : '' !!}

        {!! getThemeFontsSettings() !!}

        {!! getThemeColorsSettings() !!}
    </style>


    @if(!empty($generalSettings['preloading']) and $generalSettings['preloading'] == '1')
        @include('admin.includes.preloading')
    @endif
</head>

<body class="@if($isRtl) rtl @endif">

<div id="app" class="{{ (!empty($floatingBar) and $floatingBar->position == 'top' and $floatingBar->fixed) ? 'has-fixed-top-floating-bar' : '' }}">
    @if(!empty($floatingBar) and $floatingBar->position == 'top')
{{--        @include('web.default.includes.floating_bar')--}}
    @endif

    @if(!isset($appHeader))
{{--        @include('web.default.includes.top_nav')--}}
{{--        @include('web.default.includes.navbar')--}}
    @endif

    @if(!empty($justMobileApp))
{{--        @include('web.default.includes.mobile_app_top_nav')--}}
    @endif

    @yield('content')

    @if(!isset($appFooter))
{{--        @include('web.default.includes.footer')--}}
    @endif

{{--    @include('web.default.includes.advertise_modal.index')--}}

    @if(!empty($floatingBar) and $floatingBar->position == 'bottom')
{{--        @include('web.default.includes.floating_bar')--}}
    @endif
</div>
<!-- Template JS File -->
<script src="/assets/default/js/app.js"></script>
<script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
<script src="/assets/default/vendors/moment.min.js"></script>
<script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>
<script type="text/javascript" src="/assets/default/vendors/simplebar/simplebar.min.js"></script>

@if(empty($justMobileApp) and checkShowCookieSecurityDialog())
    @include('web.default.includes.cookie-security')
@endif


<script>
    var deleteAlertTitle = '{{ trans('public.are_you_sure') }}';
    var deleteAlertHint = '{{ trans('public.deleteAlertHint') }}';
    var deleteAlertConfirm = '{{ trans('public.deleteAlertConfirm') }}';
    var deleteAlertCancel = '{{ trans('public.cancel') }}';
    var deleteAlertSuccess = '{{ trans('public.success') }}';
    var deleteAlertFail = '{{ trans('public.fail') }}';
    var deleteAlertFailHint = '{{ trans('public.deleteAlertFailHint') }}';
    var deleteAlertSuccessHint = '{{ trans('public.deleteAlertSuccessHint') }}';
    var forbiddenRequestToastTitleLang = '{{ trans('public.forbidden_request_toast_lang') }}';
    var forbiddenRequestToastMsgLang = '{{ trans('public.forbidden_request_toast_msg_lang') }}';
</script>

@if(session()->has('toast'))
    <script>
        (function () {
            "use strict";

            $.toast({
                heading: '{{ session()->get('toast')['title'] ?? '' }}',
                text: '{{ session()->get('toast')['msg'] ?? '' }}',
                bgColor: '@if(session()->get('toast')['status'] == 'success') #43d477 @else #f63c3c @endif',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: '{{ session()->get('toast')['status'] }}'
            });
        })(jQuery)
    </script>
@endif

@include('web.default.includes.purchase_notifications')

@stack('styles_bottom')
@stack('scripts_bottom')

<script src="/assets/default/js/parts/main.min.js"></script>

<script>
    @if(session()->has('registration_package_limited'))
    (function () {
        "use strict";

        handleLimitedAccountModal('{!! session()->get('registration_package_limited') !!}')
    })(jQuery)

    {{ session()->forget('registration_package_limited') }}
    @endif

    {!! !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : '' !!}
</script>
<script src="assets/Landing_1/assets/plugins/js/jquery.min.js"></script>
<script src="assets/Landing_1/assets/plugins/js/jquery-migrate.js"></script>

<!-- Bootstrap JS -->
<script src="assets/Landing_1/assets/plugins/js/bootstrap.min.js"></script>
<!-- Gsap JS -->
<script src="assets/Landing_1/assets/plugins/js/gsap/gsap.js"></script>
<script src="assets/Landing_1/assets/plugins/js/gsap/gsap-scroll-to-plugin.js"></script>
<script src="assets/Landing_1/assets/plugins/js/gsap/gsap-scroll-smoother.js"></script>
<script src="assets/Landing_1/assets/plugins/js/gsap/gsap-scroll-trigger.js"></script>
<script src="assets/Landing_1/assets/plugins/js/gsap/gsap-split-text.js"></script>
<!-- Wow JS -->
<script src="assets/Landing_1/assets/plugins/js/wow.min.js"></script>
<!-- Owl Carousel JS -->
<script src="assets/Landing_1/assets/plugins/js/owl.carousel.min.js"></script>
<!-- Magnific Popup JS -->
<script src="assets/Landing_1/assets/plugins/js/magnific-popup.min.js"></script>
<!-- CounterUp  JS -->
<script src="assets/Landing_1/assets/plugins/js/jquery.counterup.min.js"></script>
<script src="assets/Landing_1/assets/plugins/js/waypoints.min.js"></script>
<!-- Nice Select JS -->
<script src="assets/Landing_1/assets/plugins/js/nice-select.min.js"></script>
<!-- Cursor JS -->
<script src="assets/Landing_1/assets/plugins/js/ep-cursor.js"></script>
<!-- Back To Top JS -->
<script src="assets/Landing_1/assets/plugins/js/backToTop.js"></script>
<!-- Main JS -->
<script src="assets/Landing_1/assets/plugins/js/active.js"></script>
<script src="assets/Landing_1/assets/libs/Inte_Tel_Code/js/intlTelInput.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        preferredCountries: ["sa", "eg"],
        separateDialCode: true,
        utilsScript: "assets/Landing_1/assets/libs/Inte_Tel_Code/js/utils.js",
    });
</script>
</body>
</html>
