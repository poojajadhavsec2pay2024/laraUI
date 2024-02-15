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
    <title>Lists - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
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
                        <a class="dropdown-item active" href="./lists.html">
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
                  Lists
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-md-6">
                <div class="row row-cards">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Top users</h3>
                      </div>
                      <div class="card-body">
                        <div class="row g-3">
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)">
                                  <span class="badge bg-red"></span></span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Paweł Kuna</a>
                                <div class="text-muted text-truncate mt-n1">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar">
                                  <span class="badge bg-x"></span>JL</span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Jeffie Lewzey</a>
                                <div class="text-muted text-truncate mt-n1">3 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Mallory Hulme</a>
                                <div class="text-muted text-truncate mt-n1">today</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)">
                                  <span class="badge bg-green"></span></span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Dunn Slane</a>
                                <div class="text-muted text-truncate mt-n1">6 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)">
                                  <span class="badge bg-red"></span></span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Emmy Levet</a>
                                <div class="text-muted text-truncate mt-n1">3 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)">
                                  <span class="badge bg-yellow"></span></span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Maryjo Lebarree</a>
                                <div class="text-muted text-truncate mt-n1">2 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar">
                                  <span class="badge bg-x"></span>EP</span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Egan Poetz</a>
                                <div class="text-muted text-truncate mt-n1">4 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)">
                                  <span class="badge bg-yellow"></span></span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Kellie Skingley</a>
                                <div class="text-muted text-truncate mt-n1">6 days ago</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)">
                                  <span class="badge bg-x"></span></span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Christabel Charlwood</a>
                                <div class="text-muted text-truncate mt-n1">today</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row g-3 align-items-center">
                              <a href="#" class="col-auto">
                                <span class="avatar">
                                  <span class="badge bg-x"></span>HS</span>
                              </a>
                              <div class="col text-truncate">
                                <a href="#" class="text-reset d-block text-truncate">Haskel Shelper</a>
                                <div class="text-muted text-truncate mt-n1">yesterday</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Contacts</h3>
                      </div>
                      <div class="list-group list-group-flush">
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input"></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Christabel Charlwood</a>
                              <div class="d-block text-muted text-truncate mt-n1">Compressed Sass output support (#29702)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item active">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input" checked></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">HS</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Haskel Shelper</a>
                              <div class="d-block text-muted text-truncate mt-n1">Set vertical-align on .form-check-input (#29521)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input"></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/006m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Lorry Mion</a>
                              <div class="d-block text-muted text-truncate mt-n1">Keep themed appearance for print (#29714)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input"></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/004f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Leesa Beaty</a>
                              <div class="d-block text-muted text-truncate mt-n1">Use double quotes in `.stylelintrc` (#29709)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item active">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input" checked></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/007m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Perren Keemar</a>
                              <div class="d-block text-muted text-truncate mt-n1">Regenerate package-lock.json (#29695)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input"></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">SA</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Sunny Airey</a>
                              <div class="d-block text-muted text-truncate mt-n1">Switch to the Coveralls Action (#29478)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input"></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/009m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Geoffry Flaunders</a>
                              <div class="d-block text-muted text-truncate mt-n1">Fix npm audit vulnerability (#29677)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item active">
                          <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input" checked></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/010m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Thatcher Keel</a>
                              <div class="d-block text-muted text-truncate mt-n1">config.yml: update popper.js to v1.16.0 (#29624)</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Links and buttons</h3>
                      </div>
                      <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                          The current link item
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row row-cards">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Last commits</h3>
                      </div>
                      <div class="list-group list-group-flush list-group-hoverable">
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-red"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Paweł Kuna</a>
                              <div class="d-block text-muted text-truncate mt-n1">Change deprecated html tags to text decoration classes (#29604)</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">JL</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Jeffie Lewzey</a>
                              <div class="d-block text-muted text-truncate mt-n1">justify-content:between ⇒ justify-content:space-between (#29734)</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Mallory Hulme</a>
                              <div class="d-block text-muted text-truncate mt-n1">Update change-version.js (#29736)</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-green"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Dunn Slane</a>
                              <div class="d-block text-muted text-truncate mt-n1">Regenerate package-lock.json (#29730)</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-red"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Emmy Levet</a>
                              <div class="d-block text-muted text-truncate mt-n1">Some minor text tweaks</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-yellow"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Maryjo Lebarree</a>
                              <div class="d-block text-muted text-truncate mt-n1">Link to versioned docs</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">EP</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Egan Poetz</a>
                              <div class="d-block text-muted text-truncate mt-n1">Copywriting edits</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="badge bg-yellow"></span></div>
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-reset d-block">Kellie Skingley</a>
                              <div class="d-block text-muted text-truncate mt-n1">Enable RFS for font resizing</div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">People</h3>
                      </div>
                      <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">
                        <div class="list-group-header sticky-top">A</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/023f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Eva Acres</a>
                              <div class="text-muted text-truncate mt-n1">Change deprecated html tags to text decoration classes (#29604)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">SA</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Sunny Airey</a>
                              <div class="text-muted text-truncate mt-n1">justify-content:between ⇒ justify-content:space-between (#29734)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/049m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Northrop Alforde</a>
                              <div class="text-muted text-truncate mt-n1">Update change-version.js (#29736)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/039m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Virgil Archbutt</a>
                              <div class="text-muted text-truncate mt-n1">Regenerate package-lock.json (#29730)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/033m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Guthry Arlott</a>
                              <div class="text-muted text-truncate mt-n1">Some minor text tweaks</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">AA</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Arlie Armstead</a>
                              <div class="text-muted text-truncate mt-n1">Link to versioned docs</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/062m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Ashton Arndell</a>
                              <div class="text-muted text-truncate mt-n1">Copywriting edits</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/062f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Kass Aspinal</a>
                              <div class="text-muted text-truncate mt-n1">Enable RFS for font resizing</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/043m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Rabi Attle</a>
                              <div class="text-muted text-truncate mt-n1">Compressed Sass output support (#29702)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">B</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/024m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Cary Baleine</a>
                              <div class="text-muted text-truncate mt-n1">Set vertical-align on .form-check-input (#29521)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/046m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Borden Barkworth</a>
                              <div class="text-muted text-truncate mt-n1">Keep themed appearance for print (#29714)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/066m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Regan Baser</a>
                              <div class="text-muted text-truncate mt-n1">Use double quotes in `.stylelintrc` (#29709)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/004f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Leesa Beaty</a>
                              <div class="text-muted text-truncate mt-n1">Regenerate package-lock.json (#29695)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/041f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Guendolen Belliss</a>
                              <div class="text-muted text-truncate mt-n1">Switch to the Coveralls Action (#29478)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">TB</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Tallie Bettis</a>
                              <div class="text-muted text-truncate mt-n1">Fix npm audit vulnerability (#29677)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/029m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Donnie Biggin</a>
                              <div class="text-muted text-truncate mt-n1">config.yml: update popper.js to v1.16.0 (#29624)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/056m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Mel Bilovus</a>
                              <div class="text-muted text-truncate mt-n1">Update anchor.js to v4.2.1 (#29662)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">EB</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Errol Blackley</a>
                              <div class="text-muted text-truncate mt-n1">Dist (#29638)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/027m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Jermaine Booley</a>
                              <div class="text-muted text-truncate mt-n1">Make check label cursor customizable (#29654)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/055m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Cleavland Bratchell</a>
                              <div class="text-muted text-truncate mt-n1">Fixed input-height-sm and input-height-lg calculations (#29653)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/057m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Luca Brayn</a>
                              <div class="text-muted text-truncate mt-n1">package.json: Add funding property (#29646)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/051f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Tonye Brikner</a>
                              <div class="text-muted text-truncate mt-n1">Remove shx. (#29636)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/038m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Granger Brockton</a>
                              <div class="text-muted text-truncate mt-n1">dashboard/index.html: update tabler-icons to v4.24.1 (#29651)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/032m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Arin Broxup</a>
                              <div class="text-muted text-truncate mt-n1">Regenerate package-lock.json.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/056f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Gwennie Bryce</a>
                              <div class="text-muted text-truncate mt-n1">site/assets/js/search.js: ignore the LGTM alert (#29634)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/030m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Kerwinn Burkart</a>
                              <div class="text-muted text-truncate mt-n1">Tighten regex a bit. If we need to make this more robust in the future, we can revert this as needed.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/043f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Tamqrah Busher</a>
                              <div class="text-muted text-truncate mt-n1">example.html: use double quotes</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">C</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/015m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Delaney Cairney</a>
                              <div class="text-muted text-truncate mt-n1">Example shortcode: use a regex and simplify logic.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/019m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Rooney Cassy</a>
                              <div class="text-muted text-truncate mt-n1">Move docs JS one folder up. (#29632)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/051m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Howard Catteroll</a>
                              <div class="text-muted text-truncate mt-n1">progress: Fix IE overflow (#29629)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Christabel Charlwood</a>
                              <div class="text-muted text-truncate mt-n1">removing last occurences of _fixTitle in our docs (#29631)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/017m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Portie Christou</a>
                              <div class="text-muted text-truncate mt-n1">Update modal.md (#29621) Fix typo</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/041m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Trefor Cocksedge</a>
                              <div class="text-muted text-truncate mt-n1">Update stylelint-config-twbs-bootstrap to 0.9.0 (#29612)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/021m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Mata Codlin</a>
                              <div class="text-muted text-truncate mt-n1">Remove calc function from docs</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/019f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Julietta Coke</a>
                              <div class="text-muted text-truncate mt-n1">Add calc() to function blacklist</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/037f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Tonia Colqueran</a>
                              <div class="text-muted text-truncate mt-n1">Doc tweaks.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/008f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Tessie Curzon</a>
                              <div class="text-muted text-truncate mt-n1">Revert complex calculation</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">D</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/064m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Creighton Deluze</a>
                              <div class="text-muted text-truncate mt-n1">Add add and subtract function</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/032f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Otha Denial</a>
                              <div class="text-muted text-truncate mt-n1">Update normalizeDataKey to match the spec (#29609)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/053m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Verne Diment</a>
                              <div class="text-muted text-truncate mt-n1">Remove redundant "Navbar divider" from "Contents" (#29601)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/033f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Stafani Ding</a>
                              <div class="text-muted text-truncate mt-n1">Update .form-check to properly support gradients when enabled (#29338)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/035f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Georgeanna Do Rosario</a>
                              <div class="text-muted text-truncate mt-n1">v5: Simplify navbars by requiring containers (#29339)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/016f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Ninon Don</a>
                              <div class="text-muted text-truncate mt-n1">Remove unneeded ESLint suppression and regenerate lock file (#29593)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/018m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Emmott Dowsett</a>
                              <div class="text-muted text-truncate mt-n1">remove superflous transition parameter (#29595)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">E</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/011f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Carroll Erat</a>
                              <div class="text-muted text-truncate mt-n1">Added animation when modal backdrop is static (#29516)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/022f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Peria Errichiello</a>
                              <div class="text-muted text-truncate mt-n1">Add configurable button text wrapping (#29554)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/005f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Dyann Escala</a>
                              <div class="text-muted text-truncate mt-n1">Enable eslint no-console rule except for build directory (#29585)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/047m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Chalmers Ewington</a>
                              <div class="text-muted text-truncate mt-n1">Regenerate package-lock.json (#29571)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">F</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/054m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Jarred Farthin</a>
                              <div class="text-muted text-truncate mt-n1">Fix one dev npm vulnerability. (#29568)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/009m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Geoffry Flaunders</a>
                              <div class="text-muted text-truncate mt-n1">Update hugo-bin to v0.47.0 (Hugo 0.59.0) (#29562)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">G</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/015f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Merrily Garforth</a>
                              <div class="text-muted text-truncate mt-n1">Rename close icon to close button (#29387)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/011m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Johnnie Gilby</a>
                              <div class="text-muted text-truncate mt-n1">Get rid of unneeded `div`s. (#29563)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/063m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Byrom Gillson</a>
                              <div class="text-muted text-truncate mt-n1">Update popper.js to v1.16.0. (#29537)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/017f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Gratia Gooley</a>
                              <div class="text-muted text-truncate mt-n1">v5: Icons docs cleanup (#29450)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/013f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Leigha Gorce</a>
                              <div class="text-muted text-truncate mt-n1">v5: Update colors to add shades and tints (#29348)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/058f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Jennilee Graves</a>
                              <div class="text-muted text-truncate mt-n1">Add link to Icons site in our docs (#29544)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/049f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Lianne Greenroa</a>
                              <div class="text-muted text-truncate mt-n1">Skip hidden dropdowns while focusing (#29523)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/053f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Barbara Grenkov</a>
                              <div class="text-muted text-truncate mt-n1">Add make-col-auto mixin (#29367)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/050f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Fifi Gumm</a>
                              <div class="text-muted text-truncate mt-n1">Update dependabot config (#29536)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">H</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/037m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Neale Havock</a>
                              <div class="text-muted text-truncate mt-n1">Add dependabot config (#29526)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/020m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Haze Hubbert</a>
                              <div class="text-muted text-truncate mt-n1">Update devDependencies. (#29508)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Mallory Hulme</a>
                              <div class="text-muted text-truncate mt-n1">Fix top level ampersand (#29518)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/036m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Karlis Hundell</a>
                              <div class="text-muted text-truncate mt-n1">Carousel variables (#29493)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">I</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/044m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Timotheus Iacomo</a>
                              <div class="text-muted text-truncate mt-n1">Group line-height variables (#29466)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/061m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Sean Ilyasov</a>
                              <div class="text-muted text-truncate mt-n1">Add color argument to button mixins (#29444)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/025m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Reynold Indgs</a>
                              <div class="text-muted text-truncate mt-n1">Add new .bg-body utility class (#29511)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/060m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Hillard Ivic</a>
                              <div class="text-muted text-truncate mt-n1">Drop support for Node.js 8. (#29496)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">J</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/063f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Sam Jarlmann</a>
                              <div class="text-muted text-truncate mt-n1">Rename "js/tests/units" to "js/tests/unit". (#29503)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">K</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/010m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Thatcher Keel</a>
                              <div class="text-muted text-truncate mt-n1">Dist (#29484)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/007m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Perren Keemar</a>
                              <div class="text-muted text-truncate mt-n1">CI: move `CI` env variable to the root of the workflow. (#29499)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/048m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Bernarr Kellett</a>
                              <div class="text-muted text-truncate mt-n1">Update devDependencies. (#29447)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/058m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Maddy Kenneway</a>
                              <div class="text-muted text-truncate mt-n1">Add variable for `$breadcrumb-font-size` (#29467)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/021f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Sandi Keys</a>
                              <div class="text-muted text-truncate mt-n1">add modularity integration test</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/045m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Arlan Kilrow</a>
                              <div class="text-muted text-truncate mt-n1">return to the original file structure to avoid breaking modularity</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Paweł Kuna</a>
                              <div class="text-muted text-truncate mt-n1">Fix border for single card in accordion (#29453)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">L</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/012f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Marsha Labat</a>
                              <div class="text-muted text-truncate mt-n1">Variable card height (#29462)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/027f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Beatrix Ladewig</a>
                              <div class="text-muted text-truncate mt-n1">Better radio input (#29441)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/054f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Zitella Lawes</a>
                              <div class="text-muted text-truncate mt-n1">Trim trailing whitespace from markdown files (#29460)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Maryjo Lebarree</a>
                              <div class="text-muted text-truncate mt-n1">Remove appearance from textarea (#29455)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/028m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Price Letixier</a>
                              <div class="text-muted text-truncate mt-n1">v5: .form-check layout changes (#29322)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Emmy Levet</a>
                              <div class="text-muted text-truncate mt-n1">Remove "extra" section from composer.json (#29420)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">JL</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Jeffie Lewzey</a>
                              <div class="text-muted text-truncate mt-n1">coveralls: Add `COVERALLS_GIT_BRANCH` (#29458)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/036f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Leandra Liddicoat</a>
                              <div class="text-muted text-truncate mt-n1">workflows/test.yml: specify `CI=true` (#29440)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/047f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Rivy Lochet</a>
                              <div class="text-muted text-truncate mt-n1">README.md: link to the Actions page for Tests (#29480)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">M</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/038f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Claudelle MacKilroe</a>
                              <div class="text-muted text-truncate mt-n1">Variable carousel indicator opacity (#29468)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/042f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Bettina Matuszyk</a>
                              <div class="text-muted text-truncate mt-n1">Remove outline from select box in FF (#29445)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/018f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Odelinda McCosh</a>
                              <div class="text-muted text-truncate mt-n1">Remove duplicated td selector (#29454)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/028f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Harriot McGeady</a>
                              <div class="text-muted text-truncate mt-n1">Change blue and pink colors to be accessible. (#29198)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/048f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Netti McGreay</a>
                              <div class="text-muted text-truncate mt-n1">Sass: remove redundant stylelint inline suppressions. (#29427)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/045f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Shana Meryett</a>
                              <div class="text-muted text-truncate mt-n1">`update-deps`: remove moot `cross-env` call. (#29419)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/039f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Marchelle Millam</a>
                              <div class="text-muted text-truncate mt-n1">Grid card example tweaks (#29409)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/020f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Riane Milward</a>
                              <div class="text-muted text-truncate mt-n1">.eslintrc.json: Remove a couple of default rules.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/046f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Crystie Mingaud</a>
                              <div class="text-muted text-truncate mt-n1">GH Actions updates. (#29429)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/006m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Lorry Mion</a>
                              <div class="text-muted text-truncate mt-n1">Use Hugo for our docs Sass and JS. (#29280)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/026m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Parke Moneypenny</a>
                              <div class="text-muted text-truncate mt-n1">examples: darken gray a little bit.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/059f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Brinn Moses</a>
                              <div class="text-muted text-truncate mt-n1">card.md: use `text-dark` for warning card.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/013m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Elston Muffett</a>
                              <div class="text-muted text-truncate mt-n1">badge.md: use `text-dark` for warning.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/006f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Avivah Mugleston</a>
                              <div class="text-muted text-truncate mt-n1">Darken footer color.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">N</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/060f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Linnet Newborn</a>
                              <div class="text-muted text-truncate mt-n1">Tweak syntax highlighting colors to be WCAG2AA valid.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/067m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Andros Newcome</a>
                              <div class="text-muted text-truncate mt-n1">workflows/test.yml: switch to `setup-node@v1`. (#29410)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/024f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Juanita Nobles</a>
                              <div class="text-muted text-truncate mt-n1">Fix incorrect aspect ratio on IE11</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/040f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Jaymee Noni</a>
                              <div class="text-muted text-truncate mt-n1">Remove redundant properties</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">O</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/061f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Roseline OIlier</a>
                              <div class="text-muted text-truncate mt-n1">Responsive sticky top (#29158)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/022m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Parker Oaten</a>
                              <div class="text-muted text-truncate mt-n1">Update devDependencies. (#29381)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">P</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/023m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Johannes Paternoster</a>
                              <div class="text-muted text-truncate mt-n1">Typo fix (#29382)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/034f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Stephie Petrolli</a>
                              <div class="text-muted text-truncate mt-n1">Remove unnecessary z-index</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">EP</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Egan Poetz</a>
                              <div class="text-muted text-truncate mt-n1">Make sure the content doesn't cover the navbar dropdown</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/055f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Mavra Portail</a>
                              <div class="text-muted text-truncate mt-n1">about/brand.md: Remove unused class.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/065f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Danette Pountney</a>
                              <div class="text-muted text-truncate mt-n1">Use the `$white` variable.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/029f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Desirae Prahm</a>
                              <div class="text-muted text-truncate mt-n1">Docs tweaks</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">Q</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/057f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Gayel Quesne</a>
                              <div class="text-muted text-truncate mt-n1">Move shortcodes used only once where they are needed.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">R</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/040m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Clayton Rosentholer</a>
                              <div class="text-muted text-truncate mt-n1">getting-started/theming.md: throw an error if the regex doesn't succeed.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/012m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Ban Rzehor</a>
                              <div class="text-muted text-truncate mt-n1">Break a couple of long lines.</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">S</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/031f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Madeleine Salle</a>
                              <div class="text-muted text-truncate mt-n1">homepage: remove redundant class (#29357)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/064f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Annie Scarisbrick</a>
                              <div class="text-muted text-truncate mt-n1">Update subnav to remove breadcrumb and just keep versions and search (#29368)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/035m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Yvor Sheldon</a>
                              <div class="text-muted text-truncate mt-n1">Update devDependencies. (#29349)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar">HS</span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Haskel Shelper</a>
                              <div class="text-muted text-truncate mt-n1">Tweak form validation snippet. (#29359)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/069m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Guthry Shimman</a>
                              <div class="text-muted text-truncate mt-n1">Examples: use our utilities more. (#29358)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/016m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Wilburt Siegertsz</a>
                              <div class="text-muted text-truncate mt-n1">Use the example shortcode in more places. (#29346)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Kellie Skingley</a>
                              <div class="text-muted text-truncate mt-n1">ESLint: specify `--report-unused-disable-directives` (#29350)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/068m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Sawyere Skipsea</a>
                              <div class="text-muted text-truncate mt-n1">Docs: simplify a few Hugo `range`s. (#29333)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/052f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Kathryn Skypp</a>
                              <div class="text-muted text-truncate mt-n1">Fix a few redirected links. (#29352)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Dunn Slane</a>
                              <div class="text-muted text-truncate mt-n1">Fix shortcodes/example.html class bug. (#29344)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/065m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Freedman Smith</a>
                              <div class="text-muted text-truncate mt-n1">Add responsive example</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/034m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Harris Speer</a>
                              <div class="text-muted text-truncate mt-n1">Allow override default col width</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/010f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Cesya Spritt</a>
                              <div class="text-muted text-truncate mt-n1">Cleanup</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/031m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Emlen Stairmand</a>
                              <div class="text-muted text-truncate mt-n1">Move margins, and equal height via utility example</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/026f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Mela Sydes</a>
                              <div class="text-muted text-truncate mt-n1">First pass at .row-cols classes</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">T</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/042m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Neville Trobridge</a>
                              <div class="text-muted text-truncate mt-n1">card.md remove empty `class` placeholder argument (#29345)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/050m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Onfre Tull</a>
                              <div class="text-muted text-truncate mt-n1">carousel.md: Remove duplicate bd-example div. (#29341)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/059m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Hewie Tweddle</a>
                              <div class="text-muted text-truncate mt-n1">Merge lint scripts (#29329)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">U</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/009f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Flossi Uttley</a>
                              <div class="text-muted text-truncate mt-n1">Clean up line heights & add line height utilities (#29271)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">V</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/030f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Netti Vondrasek</a>
                              <div class="text-muted text-truncate mt-n1">docs-sidebar.html: reindent. (#29337)</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-header sticky-top">W</div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/044f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Gerti Washington</a>
                              <div class="text-muted text-truncate mt-n1"></div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/052m.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Bord Wheatcroft</a>
                              <div class="text-muted text-truncate mt-n1"></div>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row">
                            <div class="col-auto">
                              <a href="#">
                                <span class="avatar" style="background-image: url(./static/avatars/025f.jpg)"></span>
                              </a>
                            </div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Nanni Wooler</a>
                              <div class="text-muted text-truncate mt-n1"></div>
                            </div>
                          </div>
                        </div>
                      </div>
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