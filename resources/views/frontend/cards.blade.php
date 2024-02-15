<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Cards - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
              <div class="btn-list">
                <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                  Source code
                </a>
                <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                  <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                  Sponsor
                </a>
              </div>
            </div>
            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
              </a>
              <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                  <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                  <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Last updates</h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 1</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              Change deprecated html tags to text decoration classes (#29604)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 2</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              justify-content:between ⇒ justify-content:space-between (#29734)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions show">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 3</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              Update change-version.js (#29736)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 4</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              Regenerate package-lock.json (#29730)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Paweł Kuna</div>
                  <div class="mt-1 small text-muted">UI Designer</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Status</a>
                <a href="./profile.html" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Feedback</a>
                <div class="dropdown-divider"></div>
                <a href="./settings.html" class="dropdown-item">Settings</a>
                <a href="./sign-in.html" class="dropdown-item">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="./" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Interface
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="./accordion.html">
                          Accordion
                        </a>
                        <a class="dropdown-item" href="./blank.html">
                          Blank page
                        </a>
                        <a class="dropdown-item" href="./badges.html">
                          Badges
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./buttons.html">
                          Buttons
                        </a>
                        <div class="dropend">
                          <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            Cards
                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                          </a>
                          <div class="dropdown-menu">
                            <a href="./cards.html" class="dropdown-item">
                              Sample cards
                            </a>
                            <a href="./card-actions.html" class="dropdown-item">
                              Card actions
                              <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                            </a>
                            <a href="./cards-masonry.html" class="dropdown-item">
                              Cards Masonry
                            </a>
                          </div>
                        </div>
                        <a class="dropdown-item" href="./colors.html">
                          Colors
                        </a>
                        <a class="dropdown-item" href="./datagrid.html">
                          Data grid
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./datatables.html">
                          Datatables
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./dropdowns.html">
                          Dropdowns
                        </a>
                        <a class="dropdown-item" href="./modals.html">
                          Modals
                        </a>
                        <a class="dropdown-item" href="./maps.html">
                          Maps
                        </a>
                        <a class="dropdown-item" href="./map-fullsize.html">
                          Map fullsize
                        </a>
                        <a class="dropdown-item" href="./maps-vector.html">
                          Vector maps
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./navigation.html">
                          Navigation
                        </a>
                        <a class="dropdown-item" href="./charts.html">
                          Charts
                        </a>
                        <a class="dropdown-item" href="./pagination.html">
                          <!-- Download SVG icon from http://tabler-icons.io/i/pie-chart -->
                          Pagination
                        </a>
                      </div>
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="./placeholder.html">
                          Placeholder
                        </a>
                        <a class="dropdown-item" href="./steps.html">
                          Steps
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./stars-rating.html">
                          Stars rating
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./tabs.html">
                          Tabs
                        </a>
                        <a class="dropdown-item" href="./tables.html">
                          Tables
                        </a>
                        <a class="dropdown-item" href="./carousel.html">
                          Carousel
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./lists.html">
                          Lists
                        </a>
                        <a class="dropdown-item" href="./typography.html">
                          Typography
                        </a>
                        <a class="dropdown-item" href="./offcanvas.html">
                          Offcanvas
                        </a>
                        <a class="dropdown-item" href="./markdown.html">
                          Markdown
                        </a>
                        <a class="dropdown-item" href="./dropzone.html">
                          Dropzone
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./lightbox.html">
                          Lightbox
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./tinymce.html">
                          TinyMCE
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./inline-player.html">
                          Inline player
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <div class="dropend">
                          <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            Authentication
                          </a>
                          <div class="dropdown-menu">
                            <a href="./sign-in.html" class="dropdown-item">
                              Sign in
                            </a>
                            <a href="./sign-in-link.html" class="dropdown-item">
                              Sign in link
                            </a>
                            <a href="./sign-in-illustration.html" class="dropdown-item">
                              Sign in with illustration
                            </a>
                            <a href="./sign-in-cover.html" class="dropdown-item">
                              Sign in with cover
                            </a>
                            <a href="./sign-up.html" class="dropdown-item">
                              Sign up
                            </a>
                            <a href="./forgot-password.html" class="dropdown-item">
                              Forgot password
                            </a>
                            <a href="./terms-of-service.html" class="dropdown-item">
                              Terms of service
                            </a>
                            <a href="./auth-lock.html" class="dropdown-item">
                              Lock screen
                            </a>
                          </div>
                        </div>
                        <div class="dropend">
                          <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            <!-- Download SVG icon from http://tabler-icons.io/i/file-minus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 14l6 0" /></svg>
                            Error pages
                          </a>
                          <div class="dropdown-menu">
                            <a href="./error-404.html" class="dropdown-item">
                              404 page
                            </a>
                            <a href="./error-500.html" class="dropdown-item">
                              500 page
                            </a>
                            <a href="./error-maintenance.html" class="dropdown-item">
                              Maintenance page
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./form-elements.html" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l3 3l8 -8" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Form elements
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Extra
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="./empty.html">
                          Empty page
                        </a>
                        <a class="dropdown-item" href="./cookie-banner.html">
                          Cookie banner
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./activity.html">
                          Activity
                        </a>
                        <a class="dropdown-item" href="./gallery.html">
                          Gallery
                        </a>
                        <a class="dropdown-item" href="./invoice.html">
                          Invoice
                        </a>
                        <a class="dropdown-item" href="./search-results.html">
                          Search results
                        </a>
                        <a class="dropdown-item" href="./pricing.html">
                          Pricing cards
                        </a>
                        <a class="dropdown-item" href="./pricing-table.html">
                          Pricing table
                        </a>
                        <a class="dropdown-item" href="./faq.html">
                          FAQ
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./users.html">
                          Users
                        </a>
                        <a class="dropdown-item" href="./license.html">
                          License
                        </a>
                      </div>
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="./logs.html">
                          Logs
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./music.html">
                          Music
                        </a>
                        <a class="dropdown-item" href="./photogrid.html">
                          Photogrid
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./tasks.html">
                          Tasks
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./uptime.html">
                          Uptime monitor
                        </a>
                        <a class="dropdown-item" href="./widgets.html">
                          Widgets
                        </a>
                        <a class="dropdown-item" href="./wizard.html">
                          Wizard
                        </a>
                        <a class="dropdown-item" href="./settings.html">
                          Settings
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./trial-ended.html">
                          Trial ended
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./job-listing.html">
                          Job listing
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./page-loader.html">
                          Page loader
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Layout
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="./layout-horizontal.html">
                          Horizontal
                        </a>
                        <a class="dropdown-item" href="./layout-boxed.html">
                          Boxed
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./layout-vertical.html">
                          Vertical
                        </a>
                        <a class="dropdown-item" href="./layout-vertical-transparent.html">
                          Vertical transparent
                        </a>
                        <a class="dropdown-item" href="./layout-vertical-right.html">
                          Right vertical
                        </a>
                        <a class="dropdown-item" href="./layout-condensed.html">
                          Condensed
                        </a>
                        <a class="dropdown-item" href="./layout-combo.html">
                          Combined
                        </a>
                      </div>
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="./layout-navbar-dark.html">
                          Navbar dark
                        </a>
                        <a class="dropdown-item" href="./layout-navbar-sticky.html">
                          Navbar sticky
                        </a>
                        <a class="dropdown-item" href="./layout-navbar-overlap.html">
                          Navbar overlap
                        </a>
                        <a class="dropdown-item" href="./layout-rtl.html">
                          RTL mode
                        </a>
                        <a class="dropdown-item" href="./layout-fluid.html">
                          Fluid
                        </a>
                        <a class="dropdown-item" href="./layout-fluid-vertical.html">
                          Fluid vertical
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./icons.html" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
                    </span>
                    <span class="nav-link-title">
                      4158 icons
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Help
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                      Documentation
                    </a>
                    <a class="dropdown-item" href="./changelog.html">
                      Changelog
                    </a>
                    <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank" rel="noopener">
                      Source code
                    </a>
                    <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm" target="_blank" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Sponsor project!
                    </a>
                  </div>
                </li>
              </ul>
              <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                <form action="./" method="get" autocomplete="off" novalidate>
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                    </span>
                    <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Cards
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Card title</h3>
                  </div>
                  <div class="card-body">Simple card</div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header card-header-light">
                    <h3 class="card-title">Card title</h3>
                  </div>
                  <div class="card-body">Card with header background</div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card card-borderless">
                  <div class="card-body">
                    <h3 class="card-title">Card title</h3>
                    <div>Card without border</div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Card title <span class="card-subtitle">Subtitle</span></h3>
                  </div>
                  <div class="card-body">Card with title and subtitle</div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <a href="#" class="card card-link">
                  <div class="card-body">Default hover effect</div>
                </a>
              </div>
              <div class="col-md-6 col-lg-3">
                <a href="#" class="card card-link card-link-rotate">
                  <div class="card-body">Rotate hover effect</div>
                </a>
              </div>
              <div class="col-md-6 col-lg-3">
                <a href="#" class="card card-link card-link-pop">
                  <div class="card-body">Pop hover effect</div>
                </a>
              </div>
              <div class="col-md-6 col-lg-3">
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card card-rotate-right">
                  <div class="card-body">Card rotate right</div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card card-rotate-left">
                  <div class="card-body">Card rotate left</div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card card-active">
                  <div class="card-body">
                    <p>This is a card with active state.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card card-inactive">
                  <div class="card-body">
                    <p>This is some text inactive state.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-stamp">
                    <div class="card-stamp-icon bg-yellow">
                      <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Card with icon bg</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at consectetur culpa ducimus eum fuga fugiat, ipsa iusto, modi nostrum recusandae reiciendis saepe.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card bg-primary-lt">
                  <div class="card-body">
                    <h3 class="card-title">Card with primary light background</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at consectetur culpa ducimus eum fuga fugiat, ipsa iusto, modi nostrum recusandae reiciendis saepe.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card bg-primary text-primary-fg">
                  <div class="card-stamp">
                    <div class="card-stamp-icon bg-white text-primary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Card with background and icon</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at consectetur culpa ducimus eum fuga fugiat, ipsa iusto, modi nostrum recusandae reiciendis saepe.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-status-top bg-danger"></div>
                  <div class="card-body">
                    <h3 class="card-title">Card with top status</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-status-bottom bg-success"></div>
                  <div class="card-body">
                    <h3 class="card-title">Card with bottom status</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-status-start bg-primary"></div>
                  <div class="card-body">
                    <h3 class="card-title">Card with side status</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="ribbon ribbon-top bg-yellow"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Card with top ribbon</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at consectetur culpa ducimus eum fuga fugiat, ipsa iusto, modi nostrum recusandae reiciendis saepe.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="ribbon bg-red">NEW</div>
                  <div class="card-body">
                    <h3 class="card-title">Card with text ribbon</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at consectetur culpa ducimus eum fuga fugiat, ipsa iusto, modi nostrum recusandae reiciendis saepe.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Card with progress bar</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <div class="progress progress-sm card-progress">
                    <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                      <span class="visually-hidden">38% Complete</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card card-stacked">
                  <div class="card-body">
                    <h3 class="card-title">Stacked card</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="row row-0">
                    <div class="col-3">
                      <!-- Photo -->
                      <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" class="w-100 h-100 object-cover card-img-start" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" />
                    </div>
                    <div class="col">
                      <div class="card-body">
                        <h3 class="card-title">Card with left side image</h3>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit
                          incidunt, iste, itaque minima
                          neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="row row-0">
                    <div class="col-3 order-md-last">
                      <!-- Photo -->
                      <img src="./static/photos/finances-us-dollars-and-bitcoins-currency-money.jpg" class="w-100 h-100 object-cover card-img-end" alt="Finances - US Dollars and Bitcoins - Currency - Money" />
                    </div>
                    <div class="col">
                      <div class="card-body">
                        <h3 class="card-title">Card with right side image</h3>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit
                          incidunt, iste, itaque minima
                          neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <!-- Photo -->
                  <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url(./static/photos/home-office-desk-with-macbook-iphone-calendar-watch-and-organizer.jpg)"></div>
                  <div class="card-body">
                    <h3 class="card-title">Card with top image</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Card with bottom image</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <!-- Photo -->
                  <div class="img-responsive img-responsive-21x9 card-img-bottom" style="background-image: url(./static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg)"></div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Card with footer</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <div class="card-footer">
                    This is standard card footer
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Card with transparent footer</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <div class="card-footer card-footer-transparent">
                    This is transparent card footer
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Card with footer button</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <!-- Card footer -->
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Card with footer buttons</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <!-- Card footer -->
                  <div class="card-footer">
                    <div class="d-flex">
                      <a href="#" class="btn btn-link">Cancel</a>
                      <a href="#" class="btn btn-primary ms-auto">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <!-- Card footer -->
                  <div class="card-footer">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <a href="#">More information</a>
                      </div>
                      <div class="col-auto ms-auto">
                        <label class="form-check form-switch m-0">
                          <input class="form-check-input position-static" type="checkbox"  checked>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                  <!-- Card footer -->
                  <div class="card-footer">
                    <div class="row align-items-center">
                      <div class="col-auto ms-auto">
                        <div class="avatar-list avatar-list-stacked">
                          <span class="avatar avatar-sm rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
                          <span class="avatar avatar-sm rounded">JL</span>
                          <span class="avatar avatar-sm rounded" style="background-image: url(./static/avatars/002m.jpg)"></span>
                          <span class="avatar avatar-sm rounded" style="background-image: url(./static/avatars/003m.jpg)"></span>
                          <span class="avatar avatar-sm rounded" style="background-image: url(./static/avatars/000f.jpg)"></span>
                          <span class="avatar avatar-sm rounded">+3</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">
                          Active
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon nav-link-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                          Link
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                          Disabled
                        </a>
                      </li>
                      <li class="nav-item ms-auto">
                        <a class="nav-link" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">
                          Active
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon nav-link-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                          Link
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                          Disabled
                        </a>
                      </li>
                      <li class="nav-item ms-auto">
                        <a class="nav-link" href="#">
                          <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                      neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <!-- Cards with tabs component -->
                <div class="card-tabs">
                  <!-- Cards navigation -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="#tab-top-1" class="nav-link active" data-bs-toggle="tab">Tab 1</a></li>
                    <li class="nav-item"><a href="#tab-top-2" class="nav-link" data-bs-toggle="tab">Tab 2</a></li>
                    <li class="nav-item"><a href="#tab-top-3" class="nav-link" data-bs-toggle="tab">Tab 3</a></li>
                    <li class="nav-item"><a href="#tab-top-4" class="nav-link" data-bs-toggle="tab">Tab 4</a></li>
                  </ul>
                  <div class="tab-content">
                    <!-- Content of card #1 -->
                    <div id="tab-top-1" class="card tab-pane active show">
                      <div class="card-body">
                        <div class="card-title">Content of tab #1</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                    <!-- Content of card #2 -->
                    <div id="tab-top-2" class="card tab-pane">
                      <div class="card-body">
                        <div class="card-title">Content of tab #2</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                    <!-- Content of card #3 -->
                    <div id="tab-top-3" class="card tab-pane">
                      <div class="card-body">
                        <div class="card-title">Content of tab #3</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                    <!-- Content of card #4 -->
                    <div id="tab-top-4" class="card tab-pane">
                      <div class="card-body">
                        <div class="card-title">Content of tab #4</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <!-- Cards with tabs component -->
                <div class="card-tabs">
                  <div class="tab-content">
                    <!-- Content of card #1 -->
                    <div id="tab-bottom-1" class="card tab-pane active show">
                      <div class="card-body">
                        <div class="card-title">Content of tab #1</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                    <!-- Content of card #2 -->
                    <div id="tab-bottom-2" class="card tab-pane">
                      <div class="card-body">
                        <div class="card-title">Content of tab #2</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                    <!-- Content of card #3 -->
                    <div id="tab-bottom-3" class="card tab-pane">
                      <div class="card-body">
                        <div class="card-title">Content of tab #3</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                    <!-- Content of card #4 -->
                    <div id="tab-bottom-4" class="card tab-pane">
                      <div class="card-body">
                        <div class="card-title">Content of tab #4</div>
                        <p class="text-muted">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                        </p>
                      </div>
                    </div>
                  </div>
                  <!-- Cards navigation -->
                  <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a href="#tab-bottom-1" class="nav-link active" data-bs-toggle="tab">Tab 1</a></li>
                    <li class="nav-item"><a href="#tab-bottom-2" class="nav-link" data-bs-toggle="tab">Tab 2</a></li>
                    <li class="nav-item"><a href="#tab-bottom-3" class="nav-link" data-bs-toggle="tab">Tab 3</a></li>
                    <li class="nav-item"><a href="#tab-bottom-4" class="nav-link" data-bs-toggle="tab">Tab 4</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Cards inside card</h3>
                  </div>
                  <div class="card-body">
                    <div class="row row-cards">
                      <div class="col-md">
                        <div class="card">
                          <div class="card-status-top bg-red"></div>
                          <div class="card-header">
                            <h3 class="card-title">First card</h3>
                          </div>
                          <div class="card-body p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                              <line x1="0" y1="0" x2="400" y2="200"></line>
                              <line x1="0" y1="200" x2="400" y2="0"></line>
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="card">
                          <div class="card-status-top bg-green"></div>
                          <div class="card-header">
                            <h3 class="card-title">Second card</h3>
                          </div>
                          <div class="card-body p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                              <line x1="0" y1="0" x2="400" y2="200"></line>
                              <line x1="0" y1="200" x2="400" y2="0"></line>
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="card">
                          <div class="card-status-top bg-blue"></div>
                          <div class="card-header">
                            <h3 class="card-title">Third card</h3>
                          </div>
                          <div class="card-body p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                              <line x1="0" y1="0" x2="400" y2="200"></line>
                              <line x1="0" y1="200" x2="400" y2="0"></line>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card-group">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">First card</h3>
                    </div>
                    <div class="card-body p-0">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                        <line x1="0" y1="0" x2="400" y2="200"></line>
                        <line x1="0" y1="200" x2="400" y2="0"></line>
                      </svg>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Second card</h3>
                    </div>
                    <div class="card-body p-0">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                        <line x1="0" y1="0" x2="400" y2="200"></line>
                        <line x1="0" y1="200" x2="400" y2="0"></line>
                      </svg>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Third card</h3>
                    </div>
                    <div class="card-body p-0">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-100" preserveAspectRatio="none" width="400" height="200" viewBox="0 0 400 200" fill="transparent" stroke="var(--tblr-border-color, #b8cef1)">
                        <line x1="0" y1="0" x2="400" y2="200"></line>
                        <line x1="0" y1="200" x2="400" y2="0"></line>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row row-cards row-deck">
                  <div class="col">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Card title</h3>
                      </div>
                      <div class="card-body">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</div>
                      <div class="card-footer">
                        Last updated 3 mins ago
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Card title</h3>
                      </div>
                      <div class="card-body">This card has supporting text below as a natural lead-in to additional content.</div>
                      <div class="card-footer">
                        Last updated 3 mins ago
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Card with very long content</h3>
                      </div>
                      <div class="card-body">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</div>
                      <div class="card-footer">
                        Last updated 3 mins ago
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="empty">
                    <div class="empty-img"><img src="./static/illustrations/undraw_quitting_time_dm8t.svg" height="128" alt="">
                    </div>
                    <p class="empty-title">No results found</p>
                    <p class="empty-subtitle text-muted">
                      Try adjusting your search or filter to find what you're looking for.
                    </p>
                    <div class="empty-action">
                      <a href="./." class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                        Search again
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-3">
                      <div class="form-label">Card number</div>
                      <input type="text" name="input-mask" class="form-control" data-mask="0000 0000 0000 0000" data-mask-visible="true" placeholder="0000 0000 0000 0000"autocomplete="off"/>
                    </div>
                    <div class="mb-3">
                      <div class="form-label">Card name</div>
                      <input type="text" class="form-control">
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <div class="mb-3">
                          <label class="form-label">Expiration date</label>
                          <div class="row g-2">
                            <div class="col">
                              <select class="form-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                              </select>
                            </div>
                            <div class="col">
                              <select class="form-select">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="mb-3">
                          <div class="form-label">CVV</div>
                          <input type="number" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="mt-2">
                      <a href="#" class="btn btn-primary w-100">
                        Pay now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                  <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                  <li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta19
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1684106062" defer></script>
    <script src="./dist/js/demo.min.js?1684106062" defer></script>
  </body>
</html>