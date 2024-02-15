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
    <title>Form elements - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
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
                <li class="nav-item dropdown">
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
                <li class="nav-item active">
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
                  Form elements
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-12">
                <form action="https://httpbin.org/post" method="post" class="card">
                  <div class="card-header">
                    <h4 class="card-title">Form elements</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-4">
                        <div class="row">
                          <div class="col-md-6 col-xl-12">
                            <div class="mb-3">
                              <label class="form-label">Static</label>
                              <div class="form-control-plaintext">Input value</div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Text</label>
                              <input type="text" class="form-control" name="example-text-input" placeholder="Input placeholder">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Password</label>
                              <input type="text" class="form-control" name="example-password-input" placeholder="Input placeholder">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Disabled</label>
                              <input type="text" class="form-control" name="example-disabled-input" placeholder="Disabled..."
	       value="Well, she turned me into a newt." disabled>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Readonly</label>
                              <input type="text" class="form-control" name="example-disabled-input" placeholder="Readonly..."
	       value="Well, how'd you become king, then?" readonly>
                            </div>
                            <div class="mb-3">
                              <label class="form-label required">Required</label>
                              <input type="text" class="form-control" name="example-required-input" placeholder="Required..." >
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Textarea <span class="form-label-description">56/100</span></label>
                              <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Content..">Oh! Come and see the violence inherent in the system! Help, help, I'm being repressed! We shall say 'Ni' again to you, if you do not appease us. I'm not a witch. I'm not a witch. Camelot!</textarea>
                            </div>
                            <div class="mb-3">
                              <div class="form-label">Select</div>
                              <select class="form-select" >
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <div class="form-label">Select multiple</div>
                              <select class="form-select"  multiple>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <div class="form-label">Select multiple states</div>
                              <select type="text" class="form-select" id="select-states" value="" multiple>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ" selected>Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC" selected>South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY" selected>Wyoming</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Input group</label>
                              <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Search for…">
                                <button class="btn" type="button">Go!</button>
                              </div>
                              <div class="input-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">
                                    Action
                                  </a>
                                  <a class="dropdown-item" href="#">
                                    Another action
                                  </a>
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Input group buttons</label>
                              <div class="input-group">
                                <input type="text" class="form-control">
                                <button type="button" class="btn">Action</button>
                                <button data-bs-toggle="dropdown" type="button" class="btn dropdown-toggle dropdown-toggle-split"></button>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="#">
                                    Action
                                  </a>
                                  <a class="dropdown-item" href="#">
                                    Another action
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Icon input</label>
                              <div class="input-icon mb-3">
                                <input type="text" value="" class="form-control" placeholder="Search…">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                </span>
                              </div>
                              <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                </span>
                                <input type="text" value="" class="form-control" placeholder="Username">
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Loader input</label>
                              <div class="input-icon mb-3">
                                <input type="text" value="" class="form-control" placeholder="Loading…">
                                <span class="input-icon-addon">
                                  <div class="spinner-border spinner-border-sm text-muted" role="status"></div>
                                </span>
                              </div>
                              <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <div class="spinner-border spinner-border-sm text-muted" role="status"></div>
                                </span>
                                <input type="text" value="" class="form-control" placeholder="Loading…">
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Separated inputs</label>
                              <div class="row g-2">
                                <div class="col">
                                  <input type="text" class="form-control" placeholder="Search for…">
                                </div>
                                <div class="col-auto">
                                  <a href="#" class="btn btn-icon" aria-label="Button">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Input with help icon</label>
                              <div class="row g-2">
                                <div class="col">
                                  <input type="text" class="form-control" placeholder="Search for…">
                                </div>
                                <div class="col-auto align-self-center">
                                  <span class="form-help" data-bs-toggle="popover" data-bs-placement="top"
			      data-bs-content="<p>ZIP Code must be US or CDN format. You can use an extended ZIP+4 code to determine address more accurately.</p>
                                  <p class='mb-0'><a href='#'>USP ZIP codes lookup tools</a></p>
                                  "
                                  data-bs-html="true">?</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                            <label class="form-label">Form control rounded</label>
                            <input type="text" class="form-control form-control-rounded mb-2" name="Form control rounded" placeholder="Text..">
                            <div class="input-icon">
                              <input type="text" value="" class="form-control form-control-rounded" placeholder="Search…">
                              <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                              </span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Form control flush</label>
                            <input type="text" class="form-control form-control-flush" name="Form control flush" placeholder="Text..">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Input group</label>
                            <div class="input-group mb-2">
                              <span class="input-group-text">
                                @
                              </span>
                              <input type="text" class="form-control"  placeholder="username"  autocomplete="off">
                            </div>
                            <div class="input-group mb-2">
                              <input type="text" class="form-control"  placeholder="subdomain"  autocomplete="off">
                              <span class="input-group-text">
                                .tabler.io
                              </span>
                            </div>
                            <div class="input-group">
                              <span class="input-group-text">
                                https://
                              </span>
                              <input type="text" class="form-control"  placeholder="subdomain"  autocomplete="off">
                              <span class="input-group-text">
                                .tabler.io
                              </span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Input with checkbox or radios</label>
                            <div class="input-group mb-2">
                              <span class="input-group-text">
                                <input class="form-check-input m-0" type="checkbox" checked>
                              </span>
                              <input type="text" class="form-control"  autocomplete="off">
                            </div>
                            <div class="input-group">
                              <input type="text" class="form-control"  autocomplete="off">
                              <span class="input-group-text">
                                <input class="form-check-input m-0" type="radio" checked>
                              </span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Input with prepended text</label>
                            <div class="input-group input-group-flat">
                              <span class="input-group-text">
                                https://tabler.io/users/
                              </span>
                              <input type="text" class="form-control ps-0"  value="yourfancyusername" autocomplete="off">
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Input with appended text</label>
                            <div class="input-group input-group-flat">
                              <input type="text" class="form-control text-end pe-0"  value="yourfancydomain" autocomplete="off">
                              <span class="input-group-text">
                                .tabler.io
                              </span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Input with appended link</label>
                            <div class="input-group input-group-flat">
                              <input type="password" class="form-control"  value="ultrastrongpassword" autocomplete="off">
                              <span class="input-group-text">
                                <a href="#" class="input-group-link">Show password</a>
                              </span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Input with appended kbd</label>
                            <div class="input-group input-group-flat">
                              <input type="text" class="form-control"  autocomplete="off">
                              <span class="input-group-text">
                                <kbd>ctrl + K</kbd>
                              </span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Input with appended icon links</label>
                            <div class="input-group input-group-flat">
                              <input type="text" class="form-control"  autocomplete="off">
                              <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Clear search" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                </a>
                                <a href="#" class="link-secondary ms-2" title="Search settings" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/adjustments -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M6 4v4" /><path d="M6 12v8" /><path d="M10 16a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M12 4v10" /><path d="M12 18v2" /><path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M18 4v1" /><path d="M18 9v11" /></svg>
                                </a>
                                <a href="#" class="link-secondary ms-2 disabled" title="Add notification" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                                </a>
                              </span>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Floating inputs</label>
                            <div class="form-floating mb-3">
                              <input type="email" class="form-control" id="floating-input" value="name@example.com" autocomplete="off">
                              <label for="floating-input">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                              <input type="password" class="form-control" id="floating-password" value="Password" autocomplete="off">
                              <label for="floating-password">Password</label>
                            </div>
                            <div class="form-floating">
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                              <label for="floatingSelect">Select</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="row">
                        <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                            <label class="form-label">Image Check</label>
                            <div class="row g-2">
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck" type="checkbox" value="1" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck" type="checkbox" value="2" class="form-imagecheck-input"  checked/>
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/brainstorming-session-with-creative-designers.jpg" alt="Brainstorming session with creative designers" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck" type="checkbox" value="3" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/finances-us-dollars-and-bitcoins-currency-money.jpg" alt="Finances - US Dollars and Bitcoins - Currency - Money" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck" type="checkbox" value="4" class="form-imagecheck-input"  checked/>
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/group-of-people-brainstorming-and-taking-notes-2.jpg" alt="Group of people brainstorming and taking notes" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck" type="checkbox" value="5" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/blue-sofa-with-pillows-in-a-designer-living-room-interior.jpg" alt="Blue sofa with pillows in a designer living room interior" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck" type="checkbox" value="6" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/home-office-desk-with-macbook-iphone-calendar-watch-and-organizer.jpg" alt="Home office desk with Macbook, iPhone, calendar, watch & organizer" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Image Check Radio</label>
                            <div class="row g-2">
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck-radio" type="radio" value="1" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/group-of-people-sightseeing-in-the-city.jpg" alt="Group of people sightseeing in the city" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck-radio" type="radio" value="2" class="form-imagecheck-input"  checked/>
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/color-palette-guide-sample-colors-catalog-.jpg" alt="Color Palette Guide. Sample Colors Catalog." class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck-radio" type="radio" value="3" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/stylish-workplace-with-computer-at-home.jpg" alt="Stylish workplace with computer at home" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck-radio" type="radio" value="4" class="form-imagecheck-input"  checked/>
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/pink-desk-in-the-home-office.jpg" alt="Pink desk in the home office" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck-radio" type="radio" value="5" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/young-woman-sitting-on-the-sofa-and-working-on-her-laptop.jpg" alt="Young woman sitting on the sofa and working on her laptop" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                              <div class="col-6 col-sm-4">
                                <label class="form-imagecheck mb-2">
                                  <input name="form-imagecheck-radio" type="radio" value="6" class="form-imagecheck-input" />
                                  <span class="form-imagecheck-figure">
                                    <img src="./static/photos/coffee-on-a-table-with-other-items.jpg" alt="Coffee on a table with other items" class="form-imagecheck-image">
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Color Input</label>
                            <div class="row g-2">
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="dark" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-dark"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput form-colorinput-light">
                                  <input name="color" type="radio" value="white" class="form-colorinput-input"  checked/>
                                  <span class="form-colorinput-color bg-white"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="blue" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-blue"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="azure" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-azure"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="indigo" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-indigo"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="purple" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-purple"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="pink" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-pink"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="red" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-red"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="orange" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-orange"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="yellow" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-yellow"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color" type="radio" value="lime" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-lime"></span>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Color Input</label>
                            <div class="row g-2">
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="dark" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-dark rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput form-colorinput-light">
                                  <input name="color-rounded" type="radio" value="white" class="form-colorinput-input"  checked/>
                                  <span class="form-colorinput-color bg-white rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="blue" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-blue rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="azure" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-azure rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="indigo" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-indigo rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="purple" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-purple rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="pink" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-pink rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="red" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-red rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="orange" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-orange rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="yellow" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-yellow rounded-circle"></span>
                                </label>
                              </div>
                              <div class="col-auto">
                                <label class="form-colorinput">
                                  <input name="color-rounded" type="radio" value="lime" class="form-colorinput-input" />
                                  <span class="form-colorinput-color bg-lime rounded-circle"></span>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Color picker</label>
                            <input type="color" class="form-control form-control-color" value="#206bc4" title="Choose your color">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Validation States </label>
                            <input type="text" class="form-control is-valid mb-2" placeholder="Valid State..">
                            <input type="text" class="form-control is-invalid" placeholder="Invalid State..">
                            <div class="invalid-feedback">Invalid feedback</div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Validation States (lite)</label>
                            <input type="text" class="form-control is-valid is-valid-lite mb-2" placeholder="Valid State..">
                            <input type="text" class="form-control is-invalid is-invalid-lite" placeholder="Invalid State..">
                          </div>
                          <label class="form-label">Form fieldset</label>
                          <fieldset class="form-fieldset">
                            <div class="mb-3">
                              <label class="form-label required">Full name</label>
                              <input type="text" class="form-control" autocomplete="off"/>
                            </div>
                            <div class="mb-3">
                              <label class="form-label required">Company</label>
                              <input type="text" class="form-control"  autocomplete="off"/>
                            </div>
                            <div class="mb-3">
                              <label class="form-label required">Email</label>
                              <input type="email" class="form-control"  autocomplete="off"/>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Phone number</label>
                              <input type="tel" class="form-control" autocomplete="off"/>
                            </div>
                            <label class="form-check">
                              <input type="checkbox" class="form-check-input"/>
                              <span class="form-check-label required">I agree to the Terms & Conditions</span>
                            </label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                            <label class="form-label">Simple selectgroup</label>
                            <div class="form-selectgroup">
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="HTML" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">HTML</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="CSS" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">CSS</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="PHP" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">PHP</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="JavaScript" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">JavaScript</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Icon input</label>
                            <div class="form-selectgroup">
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="sun" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                                </span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="moon" class="form-selectgroup-input">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                                </span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="cloud-rain" class="form-selectgroup-input">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/cloud-rain -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7" /><path d="M11 13v2m0 3v2m4 -5v2m0 3v2" /></svg>
                                </span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="cloud" class="form-selectgroup-input">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/cloud -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6.657 18c-2.572 0 -4.657 -2.007 -4.657 -4.483c0 -2.475 2.085 -4.482 4.657 -4.482c.393 -1.762 1.794 -3.2 3.675 -3.773c1.88 -.572 3.956 -.193 5.444 1c1.488 1.19 2.162 3.007 1.77 4.769h.99c1.913 0 3.464 1.56 3.464 3.486c0 1.927 -1.551 3.487 -3.465 3.487h-11.878" /></svg>
                                </span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="Other" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">Other</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Selectgroup with icons and text</label>
                            <div class="form-selectgroup">
                              <label class="form-selectgroup-item">
                                <input type="radio" name="icons" value="home" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                  Home</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="radio" name="icons" value="user" class="form-selectgroup-input">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                  User</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="radio" name="icons" value="circle" class="form-selectgroup-input">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/circle -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /></svg>
                                  Circle</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="radio" name="icons" value="square" class="form-selectgroup-input">
                                <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/square -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /></svg>
                                  Square</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Different style</label>
                            <div class="form-selectgroup form-selectgroup-pills">
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="HTML" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">HTML</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="CSS" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">CSS</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="PHP" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">PHP</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="checkbox" name="name" value="JavaScript" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">JavaScript</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Payment method</label>
                            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                              <label class="form-selectgroup-item flex-fill">
                                <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input">
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div>
                                    <span class="payment payment-provider-visa payment-xs me-2"></span>
                                    ending in <strong>7998</strong>
                                  </div>
                                </div>
                              </label>
                              <label class="form-selectgroup-item flex-fill">
                                <input type="radio" name="form-payment" value="mastercard" class="form-selectgroup-input" checked>
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div>
                                    <span class="payment payment-provider-mastercard payment-xs me-2"></span>
                                    ending in <strong>2807</strong>
                                  </div>
                                </div>
                              </label>
                              <label class="form-selectgroup-item flex-fill">
                                <input type="radio" name="form-payment" value="paypal" class="form-selectgroup-input">
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div>
                                    <span class="payment payment-provider-paypal payment-xs me-2"></span>
                                  </div>
                                </div>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Project Manager</label>
                            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                              <label class="form-selectgroup-item flex-fill">
                                <input type="checkbox" name="form-project-manager[]" value="1" class="form-selectgroup-input" >
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div class="form-selectgroup-label-content d-flex align-items-center">
                                    <span class="avatar me-3" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                    <div>
                                      <div class="font-weight-medium">Paweł Kuna</div>
                                      <div class="text-muted">UI Designer</div>
                                    </div>
                                  </div>
                                </div>
                              </label>
                              <label class="form-selectgroup-item flex-fill">
                                <input type="checkbox" name="form-project-manager[]" value="2" class="form-selectgroup-input"  checked>
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div class="form-selectgroup-label-content d-flex align-items-center">
                                    <span class="avatar me-3">JL</span>
                                    <div>
                                      <div class="font-weight-medium">Jeffie Lewzey</div>
                                      <div class="text-muted">Chemical Engineer</div>
                                    </div>
                                  </div>
                                </div>
                              </label>
                              <label class="form-selectgroup-item flex-fill">
                                <input type="checkbox" name="form-project-manager[]" value="3" class="form-selectgroup-input" >
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div class="form-selectgroup-label-content d-flex align-items-center">
                                    <span class="avatar me-3" style="background-image: url(./static/avatars/002m.jpg)"></span>
                                    <div>
                                      <div class="font-weight-medium">Mallory Hulme</div>
                                      <div class="text-muted">Geologist IV</div>
                                    </div>
                                  </div>
                                </div>
                              </label>
                              <label class="form-selectgroup-item flex-fill">
                                <input type="checkbox" name="form-project-manager[]" value="4" class="form-selectgroup-input" >
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div class="form-selectgroup-label-content d-flex align-items-center">
                                    <span class="avatar me-3" style="background-image: url(./static/avatars/003m.jpg)"></span>
                                    <div>
                                      <div class="font-weight-medium">Dunn Slane</div>
                                      <div class="text-muted">Research Nurse</div>
                                    </div>
                                  </div>
                                </div>
                              </label>
                              <label class="form-selectgroup-item flex-fill">
                                <input type="checkbox" name="form-project-manager[]" value="5" class="form-selectgroup-input" >
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                  <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </div>
                                  <div class="form-selectgroup-label-content d-flex align-items-center">
                                    <span class="avatar me-3" style="background-image: url(./static/avatars/000f.jpg)"></span>
                                    <div>
                                      <div class="font-weight-medium">Emmy Levet</div>
                                      <div class="text-muted">VP Product Management</div>
                                    </div>
                                  </div>
                                </div>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Buttons group</label>
                            <div class="btn-group w-100"role="group">
                              <input type="radio" class="btn-check" name="btn-radio-basic" id="btn-radio-basic-1" autocomplete="off" checked>
                              <label for="btn-radio-basic-1" type="button" class="btn">1 min</label>
                              <input type="radio" class="btn-check" name="btn-radio-basic" id="btn-radio-basic-2" autocomplete="off">
                              <label for="btn-radio-basic-2" type="button" class="btn">5 min</label>
                              <input type="radio" class="btn-check" name="btn-radio-basic" id="btn-radio-basic-3" autocomplete="off">
                              <label for="btn-radio-basic-3" type="button" class="btn">10 min</label>
                              <input type="radio" class="btn-check" name="btn-radio-basic" id="btn-radio-basic-4" autocomplete="off">
                              <label for="btn-radio-basic-4" type="button" class="btn">30 min</label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Buttons group with dropdown</label>
                            <div class="btn-group w-100"role="group">
                              <input type="radio" class="btn-check" name="btn-radio-dropdown" id="btn-radio-dropdown-1" autocomplete="off" checked>
                              <label for="btn-radio-dropdown-1" type="button" class="btn">Option 1</label>
                              <input type="radio" class="btn-check" name="btn-radio-dropdown" id="btn-radio-dropdown-2" autocomplete="off">
                              <label for="btn-radio-dropdown-2" type="button" class="btn">Option 2</label>
                              <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="btn-radio-dropdown" id="btn-radio-dropdown-dropdown" autocomplete="off">
                                <label for="btn-radio-dropdown-dropdown" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Other
                                </label>
                                <div class="dropdown-menu">
                                  <label class="dropdown-item"><input class="form-check-input m-0 me-2" type="radio"> Option 1</label>
                                  <label class="dropdown-item"><input class="form-check-input m-0 me-2" type="radio"> Option 2</label>
                                  <label class="dropdown-item"><input class="form-check-input m-0 me-2" type="radio"> Option 3</label>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="#">
                                    Option 4
                                  </a>
                                  <a class="dropdown-item" href="#">
                                    Option 5
                                  </a>
                                  <a class="dropdown-item" href="#">
                                    Option 6dropdown-menu
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label">Vertical buttons group</label>
                                <div class="btn-group-vertical w-100"role="group">
                                  <input type="radio" class="btn-check" name="btn-radio-vertical" id="btn-radio-vertical-1" autocomplete="off" checked>
                                  <label for="btn-radio-vertical-1" type="button" class="btn">Button 1</label>
                                  <input type="radio" class="btn-check" name="btn-radio-vertical" id="btn-radio-vertical-2" autocomplete="off">
                                  <label for="btn-radio-vertical-2" type="button" class="btn">Button 2</label>
                                  <input type="radio" class="btn-check" name="btn-radio-vertical" id="btn-radio-vertical-3" autocomplete="off">
                                  <label for="btn-radio-vertical-3" type="button" class="btn">Button 3</label>
                                  <input type="radio" class="btn-check" name="btn-radio-vertical" id="btn-radio-vertical-4" autocomplete="off">
                                  <label for="btn-radio-vertical-4" type="button" class="btn">Button 4</label>
                                  <input type="radio" class="btn-check" name="btn-radio-vertical" id="btn-radio-vertical-5" autocomplete="off">
                                  <label for="btn-radio-vertical-5" type="button" class="btn">Button 5</label>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label">Vertical with dropdown</label>
                                <div class="btn-group-vertical w-100"role="group">
                                  <input type="radio" class="btn-check" name="btn-radio-vertical-dropdown" id="btn-radio-vertical-dropdown-1" autocomplete="off" checked>
                                  <label for="btn-radio-vertical-dropdown-1" type="button" class="btn">Button 1</label>
                                  <input type="radio" class="btn-check" name="btn-radio-vertical-dropdown" id="btn-radio-vertical-dropdown-2" autocomplete="off">
                                  <label for="btn-radio-vertical-dropdown-2" type="button" class="btn">Button 2</label>
                                  <input type="radio" class="btn-check" name="btn-radio-vertical-dropdown" id="btn-radio-vertical-dropdown-3" autocomplete="off">
                                  <label for="btn-radio-vertical-dropdown-3" type="button" class="btn">Button 3</label>
                                  <input type="radio" class="btn-check" name="btn-radio-vertical-dropdown" id="btn-radio-vertical-dropdown-4" autocomplete="off">
                                  <label for="btn-radio-vertical-dropdown-4" type="button" class="btn">Button 4</label>
                                  <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="btn-radio-vertical-dropdown" id="btn-radio-vertical-dropdown-dropdown" autocomplete="off">
                                    <label for="btn-radio-vertical-dropdown-dropdown" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Other
                                    </label>
                                    <div class="dropdown-menu">
                                      <label class="dropdown-item"><input class="form-check-input m-0 me-2" type="radio"> Option 1</label>
                                      <label class="dropdown-item"><input class="form-check-input m-0 me-2" type="radio"> Option 2</label>
                                      <label class="dropdown-item"><input class="form-check-input m-0 me-2" type="radio"> Option 3</label>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end">
                                      <a class="dropdown-item" href="#">
                                        Option 4
                                      </a>
                                      <a class="dropdown-item" href="#">
                                        Option 5
                                      </a>
                                      <a class="dropdown-item" href="#">
                                        Option 6dropdown-menu
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Toolbar</label>
                            <div class="btn-group w-100"role="group">
                              <input type="radio" class="btn-check" name="btn-radio-toolbar" id="btn-radio-toolbar-1" autocomplete="off" checked>
                              <label for="btn-radio-toolbar-1" class="btn btn-icon"><!-- Download SVG icon from http://tabler-icons.io/i/bold -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 5h6a3.5 3.5 0 0 1 0 7h-6z" /><path d="M13 12h1a3.5 3.5 0 0 1 0 7h-7v-7" /></svg>
                              </label>
                              <input type="radio" class="btn-check" name="btn-radio-toolbar" id="btn-radio-toolbar-2" autocomplete="off">
                              <label for="btn-radio-toolbar-2" class="btn btn-icon"><!-- Download SVG icon from http://tabler-icons.io/i/italic -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 5l6 0" /><path d="M7 19l6 0" /><path d="M14 5l-4 14" /></svg>
                              </label>
                              <input type="radio" class="btn-check" name="btn-radio-toolbar" id="btn-radio-toolbar-3" autocomplete="off">
                              <label for="btn-radio-toolbar-3" class="btn btn-icon"><!-- Download SVG icon from http://tabler-icons.io/i/underline -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 5v5a5 5 0 0 0 10 0v-5" /><path d="M5 19h14" /></svg>
                              </label>
                              <input type="radio" class="btn-check" name="btn-radio-toolbar" id="btn-radio-toolbar-4" autocomplete="off">
                              <label for="btn-radio-toolbar-4" class="btn btn-icon"><!-- Download SVG icon from http://tabler-icons.io/i/copy -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /><path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" /></svg>
                              </label>
                              <input type="radio" class="btn-check" name="btn-radio-toolbar" id="btn-radio-toolbar-5" autocomplete="off">
                              <label for="btn-radio-toolbar-5" class="btn btn-icon"><!-- Download SVG icon from http://tabler-icons.io/i/scissors -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M8.6 8.6l10.4 10.4" /><path d="M8.6 15.4l10.4 -10.4" /></svg>
                              </label>
                              <input type="radio" class="btn-check" name="btn-radio-toolbar" id="btn-radio-toolbar-6" autocomplete="off">
                              <label for="btn-radio-toolbar-6" class="btn btn-icon"><!-- Download SVG icon from http://tabler-icons.io/i/file-plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M12 11l0 6" /><path d="M9 14l6 0" /></svg>
                              </label>
                              <input type="radio" class="btn-check" name="btn-radio-toolbar" id="btn-radio-toolbar-7" autocomplete="off">
                              <label for="btn-radio-toolbar-7" class="btn btn-icon"><!-- Download SVG icon from http://tabler-icons.io/i/file-minus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 14l6 0" /></svg>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="row">
                        <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                            <div class="form-label">Radios</div>
                            <div>
                              <label class="form-check">
                                <input class="form-check-input" type="radio" 
	       name="radios"  checked>
                                <span class="form-check-label">Option 1</span>
                              </label>
                              <label class="form-check">
                                <input class="form-check-input" type="radio" 
	       name="radios" >
                                <span class="form-check-label">Option 2</span>
                              </label>
                              <label class="form-check">
                                <input class="form-check-input" type="radio"  disabled>
                                <span class="form-check-label">Option 3</span>
                              </label>
                              <label class="form-check">
                                <input class="form-check-input" type="radio"  checked disabled>
                                <span class="form-check-label">Option 4</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="form-label">Inline Radios</div>
                            <div>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" 
	       name="radios-inline"  checked>
                                <span class="form-check-label">Option 1</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" 
	       name="radios-inline" >
                                <span class="form-check-label">Option 2</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" 
	       name="radios-inline"  disabled>
                                <span class="form-check-label">Option 3</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="form-label">Checkboxes</div>
                            <div>
                              <label class="form-check">
                                <input class="form-check-input" type="checkbox" >
                                <span class="form-check-label">Checkbox input</span>
                              </label>
                              <label class="form-check">
                                <input class="form-check-input" type="checkbox"  disabled>
                                <span class="form-check-label">Disabled checkbox input</span>
                              </label>
                              <label class="form-check">
                                <input class="form-check-input" type="checkbox"  checked>
                                <span class="form-check-label">Checked checkbox input</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="form-label">Inline Checkboxes</div>
                            <div>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" >
                                <span class="form-check-label">Option 1</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox"  disabled>
                                <span class="form-check-label">Option 2</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox"  checked>
                                <span class="form-check-label">Option 3</span>
                              </label>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Checkboxes with description</label>
                            <label class="form-check">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-label">
                                Default checkbox
                              </span>
                              <span class="form-check-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                              </span>
                            </label>
                            <label class="form-check">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-label">
                                Longer checkbox item that wraps on to two separate lines
                              </span>
                              <span class="form-check-description">
                                Ab alias aut, consequuntur cumque esse eveniet incidunt laborum minus molestiae.
                              </span>
                            </label>
                            <label class="form-check">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-label">
                                Default checkbox without description
                              </span>
                            </label>
                          </div>
                          <div class="mb-3">
                            <div class="form-label">Toggle switches</div>
                            <label class="form-check form-switch">
                              <input class="form-check-input" type="checkbox"  checked>
                              <span class="form-check-label">Option 1</span>
                            </label>
                            <label class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" >
                              <span class="form-check-label">Option 2</span>
                            </label>
                            <label class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" >
                              <span class="form-check-label">Option 3</span>
                            </label>
                          </div>
                          <div class="mb-3">
                            <div class="form-label">Single switch</div>
                            <label class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" >
                              <span class="form-check-label">I agree with terms and conditions</span>
                            </label>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Notification</label>
                            <div class="divide-y">
                              <div>
                                <label class="row">
                                  <span class="col">Push Notifications</span>
                                  <span class="col-auto">
                                    <label class="form-check form-check-single form-switch">
                                      <input class="form-check-input" type="checkbox" checked>
                                    </label>
                                  </span>
                                </label>
                              </div>
                              <div>
                                <label class="row">
                                  <span class="col">SMS Notifications</span>
                                  <span class="col-auto">
                                    <label class="form-check form-check-single form-switch">
                                      <input class="form-check-input" type="checkbox">
                                    </label>
                                  </span>
                                </label>
                              </div>
                              <div>
                                <label class="row">
                                  <span class="col">Email Notifications</span>
                                  <span class="col-auto">
                                    <label class="form-check form-check-single form-switch">
                                      <input class="form-check-input" type="checkbox" checked>
                                    </label>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="form-label">Custom File Input</div>
                            <input type="file" class="form-control" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Date of birth</label>
                            <div class="row g-2">
                              <div class="col-5">
                                <select name="user[month]" class="form-select">
                                  <option value="">Month</option>
                                  <option value="1">January</option>
                                  <option value="2">February</option>
                                  <option value="3">March</option>
                                  <option value="4">April</option>
                                  <option value="5">May</option>
                                  <option selected="selected" value="6">June</option>
                                  <option value="7">July</option>
                                  <option value="8">August</option>
                                  <option value="9">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                                </select>
                              </div>
                              <div class="col-3">
                                <select name="user[day]" class="form-select">
                                  <option value="">Day</option>
                                  <option value="1" >1</option>
                                  <option value="2" >2</option>
                                  <option value="3" >3</option>
                                  <option value="4" >4</option>
                                  <option value="5" >5</option>
                                  <option value="6" >6</option>
                                  <option value="7" >7</option>
                                  <option value="8" >8</option>
                                  <option value="9" >9</option>
                                  <option value="10" >10</option>
                                  <option value="11" >11</option>
                                  <option value="12" >12</option>
                                  <option value="13" >13</option>
                                  <option value="14" >14</option>
                                  <option value="15" >15</option>
                                  <option value="16" >16</option>
                                  <option value="17" >17</option>
                                  <option value="18" >18</option>
                                  <option value="19" >19</option>
                                  <option value="20"  selected>20</option>
                                  <option value="21" >21</option>
                                  <option value="22" >22</option>
                                  <option value="23" >23</option>
                                  <option value="24" >24</option>
                                  <option value="25" >25</option>
                                  <option value="26" >26</option>
                                  <option value="27" >27</option>
                                  <option value="28" >28</option>
                                  <option value="29" >29</option>
                                  <option value="30" >30</option>
                                  <option value="31" >31</option>
                                </select>
                              </div>
                              <div class="col-4">
                                <select name="user[year]" class="form-select">
                                  <option value="">Year</option>
                                  <option value="2014" >2014</option>
                                  <option value="2013" >2013</option>
                                  <option value="2012" >2012</option>
                                  <option value="2011" >2011</option>
                                  <option value="2010" >2010</option>
                                  <option value="2009" >2009</option>
                                  <option value="2008" >2008</option>
                                  <option value="2007" >2007</option>
                                  <option value="2006" >2006</option>
                                  <option value="2005" >2005</option>
                                  <option value="2004" >2004</option>
                                  <option value="2003" >2003</option>
                                  <option value="2002" >2002</option>
                                  <option value="2001" >2001</option>
                                  <option value="2000" >2000</option>
                                  <option value="1999" >1999</option>
                                  <option value="1998" >1998</option>
                                  <option value="1997" >1997</option>
                                  <option value="1996" >1996</option>
                                  <option value="1995" >1995</option>
                                  <option value="1994" >1994</option>
                                  <option value="1993" >1993</option>
                                  <option value="1992" >1992</option>
                                  <option value="1991" >1991</option>
                                  <option value="1990" >1990</option>
                                  <option value="1989"  selected>1989</option>
                                  <option value="1988" >1988</option>
                                  <option value="1987" >1987</option>
                                  <option value="1986" >1986</option>
                                  <option value="1985" >1985</option>
                                  <option value="1984" >1984</option>
                                  <option value="1983" >1983</option>
                                  <option value="1982" >1982</option>
                                  <option value="1981" >1981</option>
                                  <option value="1980" >1980</option>
                                  <option value="1979" >1979</option>
                                  <option value="1978" >1978</option>
                                  <option value="1977" >1977</option>
                                  <option value="1976" >1976</option>
                                  <option value="1975" >1975</option>
                                  <option value="1974" >1974</option>
                                  <option value="1973" >1973</option>
                                  <option value="1972" >1972</option>
                                  <option value="1971" >1971</option>
                                  <option value="1970" >1970</option>
                                  <option value="1969" >1969</option>
                                  <option value="1968" >1968</option>
                                  <option value="1967" >1967</option>
                                  <option value="1966" >1966</option>
                                  <option value="1965" >1965</option>
                                  <option value="1964" >1964</option>
                                  <option value="1963" >1963</option>
                                  <option value="1962" >1962</option>
                                  <option value="1961" >1961</option>
                                  <option value="1960" >1960</option>
                                  <option value="1959" >1959</option>
                                  <option value="1958" >1958</option>
                                  <option value="1957" >1957</option>
                                  <option value="1956" >1956</option>
                                  <option value="1955" >1955</option>
                                  <option value="1954" >1954</option>
                                  <option value="1953" >1953</option>
                                  <option value="1952" >1952</option>
                                  <option value="1951" >1951</option>
                                  <option value="1950" >1950</option>
                                  <option value="1949" >1949</option>
                                  <option value="1948" >1948</option>
                                  <option value="1947" >1947</option>
                                  <option value="1946" >1946</option>
                                  <option value="1945" >1945</option>
                                  <option value="1944" >1944</option>
                                  <option value="1943" >1943</option>
                                  <option value="1942" >1942</option>
                                  <option value="1941" >1941</option>
                                  <option value="1940" >1940</option>
                                  <option value="1939" >1939</option>
                                  <option value="1938" >1938</option>
                                  <option value="1937" >1937</option>
                                  <option value="1936" >1936</option>
                                  <option value="1935" >1935</option>
                                  <option value="1934" >1934</option>
                                  <option value="1933" >1933</option>
                                  <option value="1932" >1932</option>
                                  <option value="1931" >1931</option>
                                  <option value="1930" >1930</option>
                                  <option value="1929" >1929</option>
                                  <option value="1928" >1928</option>
                                  <option value="1927" >1927</option>
                                  <option value="1926" >1926</option>
                                  <option value="1925" >1925</option>
                                  <option value="1924" >1924</option>
                                  <option value="1923" >1923</option>
                                  <option value="1922" >1922</option>
                                  <option value="1921" >1921</option>
                                  <option value="1920" >1920</option>
                                  <option value="1919" >1919</option>
                                  <option value="1918" >1918</option>
                                  <option value="1917" >1917</option>
                                  <option value="1916" >1916</option>
                                  <option value="1915" >1915</option>
                                  <option value="1914" >1914</option>
                                  <option value="1913" >1913</option>
                                  <option value="1912" >1912</option>
                                  <option value="1911" >1911</option>
                                  <option value="1910" >1910</option>
                                  <option value="1909" >1909</option>
                                  <option value="1908" >1908</option>
                                  <option value="1907" >1907</option>
                                  <option value="1906" >1906</option>
                                  <option value="1905" >1905</option>
                                  <option value="1904" >1904</option>
                                  <option value="1903" >1903</option>
                                  <option value="1902" >1902</option>
                                  <option value="1901" >1901</option>
                                  <option value="1900" >1900</option>
                                  <option value="1899" >1899</option>
                                  <option value="1898" >1898</option>
                                  <option value="1897" >1897</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Text mask</label>
                            <input type="text" name="input-mask" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000"autocomplete="off"/>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Telephone mask</label>
                            <input type="text" name="input-mask" class="form-control" data-mask="(00) 0000-0000" data-mask-visible="true" placeholder="(00) 0000-0000"autocomplete="off"/>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Autosize textarea</label>
                            <textarea class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                            <label class="form-label">Datalist example</label>
                            <input class="form-control" list="datalistOptions" placeholder="Type to search..."/>
                            <datalist id="datalistOptions">
                              <option value="Aruba"/>
                              <option value="Afghanistan"/>
                              <option value="Angola"/>
                              <option value="Anguilla"/>
                              <option value="Albania"/>
                              <option value="Andorra"/>
                              <option value="United Arab Emirates"/>
                              <option value="Argentina"/>
                              <option value="Armenia"/>
                              <option value="American Samoa"/>
                            </datalist>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Range input</label>
                            <input type="range" class="form-range mb-2" value="40" min="0" max="100" step="10">
                            <div class="form-range mb-2" id="range-simple"></div>
                            <div class="form-range mb-2" id="range-connect"></div>
                            <div class="form-range mb-2 text-green" id="range-color"></div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Datepicker</label>
                            <input class="form-control mb-2" placeholder="Select a date" id="datepicker-default" value="2020-06-20"/>
                            <div class="input-icon mb-2">
                              <input class="form-control " placeholder="Select a date" id="datepicker-icon" value="2020-06-20"/>
                              <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                              </span>
                            </div>
                            <div class="input-icon">
                              <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                              </span>
                              <input class="form-control" placeholder="Select a date" id="datepicker-icon-prepend" value="2020-06-20"/>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Inline datepicker</label>
                            <div class="datepicker-inline" id="datepicker-inline"></div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Progress</label>
                            <div class="progress mb-2">
                              <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                <span class="visually-hidden">38% Complete</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Form buttons</label>
                            <div class="row">
                              <div class="col">
                                <a href="#" class="btn w-100">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                                  Login with Github
                                </a>
                              </div>
                              <div class="col">
                                <a href="#" class="btn w-100">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                                  Login with Twitter
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Tags input</label>
                            <select type="text" class="form-select" placeholder="Select tags" id="select-tags" value="" multiple>
                              <option value="HTML">HTML</option>
                              <option value="JavaScript">JavaScript</option>
                              <option value="CSS">CSS</option>
                              <option value="jQuery">jQuery</option>
                              <option value="Bootstrap">Bootstrap</option>
                              <option value="Ruby">Ruby</option>
                              <option value="Python">Python</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Advanced select</label>
                            <select type="text" class="form-select" id="select-users" value="">
                              <option value="1">Chuck Tesla</option>
                              <option value="2">Elon Musk</option>
                              <option value="3">Paweł Kuna</option>
                              <option value="4">Nikola Tesla</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Advanced select with optgroup</label>
                            <select type="text" class="form-select" id="select-optgroups" value="">
                              <optgroup label="Tags">
                                <option value="HTML">HTML</option>
                                <option value="JavaScript">JavaScript</option>
                                <option value="CSS">CSS</option>
                                <option value="jQuery">jQuery</option>
                                <option value="Bootstrap">Bootstrap</option>
                                <option value="Ruby">Ruby</option>
                                <option value="Python">Python</option>
                              </optgroup>
                              <optgroup label="People">
                                <option value="Chuck Tesla">Chuck Tesla</option>
                                <option value="Elon Musk">Elon Musk</option>
                                <option value="Paweł Kuna">Paweł Kuna</option>
                                <option value="Nikola Tesla">Nikola Tesla</option>
                              </optgroup>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Select with avatars</label>
                            <select type="text" class="form-select" id="select-people" value="">
                              <option value="1" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/000m.jpg)&quot;&gt;&lt;/span&gt;">Paweł Kuna</option>
                              <option value="2" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;JL&lt;/span&gt;">Jeffie Lewzey</option>
                              <option value="3" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/002m.jpg)&quot;&gt;&lt;/span&gt;">Mallory Hulme</option>
                              <option value="4" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/003m.jpg)&quot;&gt;&lt;/span&gt;">Dunn Slane</option>
                              <option value="5" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/000f.jpg)&quot;&gt;&lt;/span&gt;">Emmy Levet</option>
                              <option value="6" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/001f.jpg)&quot;&gt;&lt;/span&gt;">Maryjo Lebarree</option>
                              <option value="7" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;EP&lt;/span&gt;">Egan Poetz</option>
                              <option value="8" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/002f.jpg)&quot;&gt;&lt;/span&gt;">Kellie Skingley</option>
                              <option value="9" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/003f.jpg)&quot;&gt;&lt;/span&gt;">Christabel Charlwood</option>
                              <option value="10" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;HS&lt;/span&gt;">Haskel Shelper</option>
                              <option value="11" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/006m.jpg)&quot;&gt;&lt;/span&gt;">Lorry Mion</option>
                              <option value="12" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/004f.jpg)&quot;&gt;&lt;/span&gt;">Leesa Beaty</option>
                              <option value="13" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/007m.jpg)&quot;&gt;&lt;/span&gt;">Perren Keemar</option>
                              <option value="14" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;SA&lt;/span&gt;">Sunny Airey</option>
                              <option value="15" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/009m.jpg)&quot;&gt;&lt;/span&gt;">Geoffry Flaunders</option>
                              <option value="16" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/010m.jpg)&quot;&gt;&lt;/span&gt;">Thatcher Keel</option>
                              <option value="17" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/005f.jpg)&quot;&gt;&lt;/span&gt;">Dyann Escala</option>
                              <option value="18" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/006f.jpg)&quot;&gt;&lt;/span&gt;">Avivah Mugleston</option>
                              <option value="19" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot;&gt;AA&lt;/span&gt;">Arlie Armstead</option>
                              <option value="20" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url(./static/avatars/008f.jpg)&quot;&gt;&lt;/span&gt;">Tessie Curzon</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Select with flags</label>
                            <select type="text" class="form-select" id="select-countries" value="">
                              <option value="pl" data-custom-properties="&lt;span class=&quot;flag flag-xs flag-country-pl&quot;&gt;&lt;/span&gt;">Poland</option>
                              <option value="de" data-custom-properties="&lt;span class=&quot;flag flag-xs flag-country-de&quot;&gt;&lt;/span&gt;">Germany</option>
                              <option value="cz" data-custom-properties="&lt;span class=&quot;flag flag-xs flag-country-cz&quot;&gt;&lt;/span&gt;">Czech Republic</option>
                              <option value="br" data-custom-properties="&lt;span class=&quot;flag flag-xs flag-country-br&quot;&gt;&lt;/span&gt;">Brazil</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Select with labels</label>
                            <select type="text" class="form-select" id="select-labels" value="">
                              <option value="copy" data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;cmd + C&lt;/span&gt;">Copy</option>
                              <option value="paste" data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;cmd + V&lt;/span&gt;">Paste</option>
                              <option value="cut" data-custom-properties="&lt;span class=&quot;badge bg-primary-lt&quot;&gt;cmd + X&lt;/span&gt;">Cut</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Advanced select with validation state</label>
                            <select type="text" class="form-select mb-3 is-valid" id="select-countries-valid" value="">
                              <option value="pl">Poland</option>
                              <option value="de">Germany</option>
                              <option value="cz">Czech Republic</option>
                              <option value="br">Brazil</option>
                            </select>
                            <select type="text" class="form-select is-invalid" id="select-countries-invalid" value="">
                              <option value="pl">Poland</option>
                              <option value="de">Germany</option>
                              <option value="cz">Czech Republic</option>
                              <option value="br">Brazil</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-end">
                  <div class="d-flex">
                    <a href="#" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Send data</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Project ID</h3>
                  <p class="card-subtitle">Used when interacting with the API.</p>
                  <div class="input-icon">
                    <input type="text" value="prj_5ae74426fe935327a8fa178b07d84ad9" class="form-control" placeholder="Search…" readonly>
                    <span class="input-icon-addon">
                      <!-- Download SVG icon from http://tabler-icons.io/i/files -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" /><path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
                    </span>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row align-items-center">
                    <div class="col">Learn more about <a href="#">Project ID</a></div>
                    <div class="col-auto">
                      <a href="#" class="btn btn-primary">
                        Save
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Node.js Version</h3>
                  <p class="card-subtitle">The version of Node.js that is used in the Build Step and for Serverless Functions.
                    A new Deployment is required for your changes to take effect.</p>
                  <select class="form-select">
                    <option>14.x</option>
                    <option>12.x</option>
                  </select>
                </div>
                <div class="card-footer">
                  Learn more about <a href="#">Node.js Version</a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <form class="card">
                <div class="card-header">
                  <h3 class="card-title">Basic form</h3>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label class="form-label required">Email address</label>
                    <div>
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                      <small class="form-hint">We'll never share your email with anyone else.</small>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label required">Password</label>
                    <div>
                      <input type="password" class="form-control" placeholder="Password">
                      <small class="form-hint">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                      </small>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Select</label>
                    <div>
                      <select class="form-select">
                        <option>Option 1</option>
                        <optgroup label="Optgroup 1">
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </optgroup>
                        <option>Option 2</option>
                        <optgroup label="Optgroup 2">
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </optgroup>
                        <optgroup label="Optgroup 3">
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </optgroup>
                        <option>Option 3</option>
                        <option>Option 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Checkboxes</label>
                    <div>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <span class="form-check-label">Option 1</span>
                      </label>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <span class="form-check-label">Option 2</span>
                      </label>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" disabled>
                        <span class="form-check-label">Option 3</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <form class="card">
                <div class="card-header">
                  <h3 class="card-title">Horizontal form</h3>
                </div>
                <div class="card-body">
                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Email address</label>
                    <div class="col">
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                      <small class="form-hint">We'll never share your email with anyone else.</small>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Password</label>
                    <div class="col">
                      <input type="password" class="form-control" placeholder="Password">
                      <small class="form-hint">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special characters, or emoji.
                      </small>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-3 col-form-label">Select</label>
                    <div class="col">
                      <select class="form-select">
                        <option>Option 1</option>
                        <optgroup label="Optgroup 1">
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </optgroup>
                        <option>Option 2</option>
                        <optgroup label="Optgroup 2">
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </optgroup>
                        <optgroup label="Optgroup 3">
                          <option>Option 1</option>
                          <option>Option 2</option>
                        </optgroup>
                        <option>Option 3</option>
                        <option>Option 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-3 col-form-label pt-0">Checkboxes</label>
                    <div class="col">
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <span class="form-check-label">Option 1</span>
                      </label>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <span class="form-check-label">Option 2</span>
                      </label>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" disabled>
                        <span class="form-check-label">Option 3</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <div class="col-lg-4">
              <div class="row row-cards">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Input mask</h3>
                    </div>
                    <div class="card-body">
                      <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000"autocomplete="off"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Hour</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="00:00:00" data-mask-visible="true" placeholder="00:00:00"autocomplete="off"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Date &amp; Hour</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="00/00/0000 00:00:00" data-mask-visible="true" placeholder="00/00/0000 00:00:00"autocomplete="off"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">ZIP Code</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="00000-000" data-mask-visible="true" placeholder="00000-000"autocomplete="off"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Money</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="000.000.000.000.000,00" data-mask-visible="true" placeholder="000.000.000.000.000,00" data-mask-reverse="true"autocomplete="off"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Telephone</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="0000-0000" data-mask-visible="true" placeholder="0000-0000"autocomplete="off"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Telephone with Code Area</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="(00) 0000-0000" data-mask-visible="true" placeholder="(00) 0000-0000"autocomplete="off"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">IP Address</label>
                        <input type="text" name="input-mask" class="form-control" data-mask="099.099.099.099" data-mask-visible="true" placeholder="000.000.000.000"autocomplete="off"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <form class="card">
                    <div class="card-header">
                      <h3 class="card-title">My Profile</h3>
                    </div>
                    <div class="card-body">
                      <div class="mb-3">
                        <div class="row">
                          <div class="col-auto">
                            <span class="avatar avatar-md" style="background-image: url(./static/avatars/002m.jpg)"></span>
                          </div>
                          <div class="col">
                            <div class="mb-3">
                              <label class="form-label">Email-Address</label>
                              <input class="form-control" placeholder="your-email@domain.com">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea class="form-control"
							          rows="5">Big belly rude boy, million dollar hustler. Unemployed.</textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Email-Address</label>
                        <input class="form-control" placeholder="your-email@domain.com">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" value="password">
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <a href="#" class="btn btn-primary">
                        Save
                      </a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="row row-cards">
                <div class="col-12">
                  <form class="card">
                    <div class="card-body">
                      <h3 class="card-title">Edit Profile</h3>
                      <div class="row row-cards">
                        <div class="col-md-5">
                          <div class="mb-3">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" disabled="" placeholder="Company"
									       value="Creative Code Inc.">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" value="michael23">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="Company" value="Chet">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" placeholder="Home Address"
									       value="Melbourne, Australia">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" placeholder="City" value="Melbourne">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                          <div class="mb-3">
                            <label class="form-label">Postal Code</label>
                            <input type="test" class="form-control" placeholder="ZIP Code">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="mb-3">
                            <label class="form-label">Country</label>
                            <select class="form-control form-select">
                              <option value="">Germany</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3 mb-0">
                            <label class="form-label">About Me</label>
                            <textarea rows="5" class="form-control" placeholder="Here can be your description"
									          value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                  </form>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">HTTP Request</h3>
                    </div>
                    <div class="card-body">
                      <div class="row row-cards">
                        <div class="mb-3 col-sm-4 col-md-2">
                          <label class="form-label required">Method</label>
                          <select class="form-select">
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                            <option value="PUT">PUT</option>
                            <option value="HEAD">HEAD</option>
                            <option value="DELETE">DELETE</option>
                            <option value="PATCH">PATCH</option>
                          </select>
                        </div>
                        <div class="mb-3 col-sm-8 col-md-10">
                          <label class="form-label required">URL</label>
                          <input name="url" type="text" class="form-control"
								       value="https://content.googleapis.com/discovery/v1/apis/surveys/v2/rest">
                        </div>
                      </div>
                      <div class="form-label">Assertions</div>
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <thead>
                            <tr>
                              <th>Source</th>
                              <th>Property</th>
                              <th>Comparison</th>
                              <th>Target</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <select class="form-select">
                                  <option value="STATUS_CODE" selected="">Status code</option>
                                  <option value="JSON_BODY">JSON body</option>
                                  <option value="HEADERS">Headers</option>
                                  <option value="TEXT_BODY">Text body</option>
                                  <option value="RESPONSE_TIME">Response time</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control"></td>
                              <td>
                                <select class="form-select">
                                  <option value="EQUALS" selected="">Equals</option>
                                  <option value="NOT_EQUALS">Not equals</option>
                                  <option value="HAS_KEY">Has key</option>
                                  <option value="NOT_HAS_KEY">Not has key</option>
                                  <option value="HAS_VALUE">Has value</option>
                                  <option value="NOT_HAS_VALUE">Not has value</option>
                                  <option value="IS_EMPTY">Is empty</option>
                                  <option value="NOT_EMPTY">Is not empty</option>
                                  <option value="GREATER_THAN">Greater than</option>
                                  <option value="LESS_THAN">Less than</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control" value="200">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <select class="form-select">
                                  <option value="STATUS_CODE">Status code</option>
                                  <option value="JSON_BODY" selected="">JSON body</option>
                                  <option value="HEADERS">Headers</option>
                                  <option value="TEXT_BODY">Text body</option>
                                  <option value="RESPONSE_TIME">Response time</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control" value="parameters.alt.type">
                              </td>
                              <td>
                                <select class="form-select">
                                  <option value="EQUALS">Equals</option>
                                  <option value="NOT_EQUALS">Not equals</option>
                                  <option value="HAS_KEY">Has key</option>
                                  <option value="NOT_HAS_KEY">Not has key</option>
                                  <option value="HAS_VALUE" selected="">Has value</option>
                                  <option value="NOT_HAS_VALUE">Not has value</option>
                                  <option value="IS_EMPTY">Is empty</option>
                                  <option value="NOT_EMPTY">Is not empty</option>
                                  <option value="GREATER_THAN">Greater than</option>
                                  <option value="LESS_THAN">Less than</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control" value="string">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <select class="form-select">
                                  <option value="STATUS_CODE">Status code</option>
                                  <option value="JSON_BODY">JSON body</option>
                                  <option value="HEADERS">Headers</option>
                                  <option value="TEXT_BODY">Text body</option>
                                  <option value="RESPONSE_TIME" selected="">Response time</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control"></td>
                              <td>
                                <select class="form-select">
                                  <option value="EQUALS">Equals</option>
                                  <option value="NOT_EQUALS">Not equals</option>
                                  <option value="HAS_KEY">Has key</option>
                                  <option value="NOT_HAS_KEY">Not has key</option>
                                  <option value="HAS_VALUE">Has value</option>
                                  <option value="NOT_HAS_VALUE">Not has value</option>
                                  <option value="IS_EMPTY">Is empty</option>
                                  <option value="NOT_EMPTY">Is not empty</option>
                                  <option value="GREATER_THAN">Greater than</option>
                                  <option value="LESS_THAN" selected="">Less than</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control" value="500">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <select class="form-select">
                                  <option value="STATUS_CODE">Status code</option>
                                  <option value="JSON_BODY">JSON body</option>
                                  <option value="HEADERS" selected="">Headers</option>
                                  <option value="TEXT_BODY">Text body</option>
                                  <option value="RESPONSE_TIME">Response time</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control" value="content-type">
                              </td>
                              <td>
                                <select class="form-select">
                                  <option value="EQUALS" selected="">Equals</option>
                                  <option value="NOT_EQUALS">Not equals</option>
                                  <option value="HAS_KEY">Has key</option>
                                  <option value="NOT_HAS_KEY">Not has key</option>
                                  <option value="HAS_VALUE">Has value</option>
                                  <option value="NOT_HAS_VALUE">Not has value</option>
                                  <option value="IS_EMPTY">Is empty</option>
                                  <option value="NOT_EMPTY">Is not empty</option>
                                  <option value="GREATER_THAN">Greater than</option>
                                  <option value="LESS_THAN">Less than</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control" value="application/json; charset=UTF-8">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button type="submit" class="btn btn-primary">Make request</button>
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
  <script src="./dist/libs/nouislider/dist/nouislider.min.js?1684106062" defer></script>
  <script src="./dist/libs/litepicker/dist/litepicker.js?1684106062" defer></script>
  <script src="./dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062" defer></script>
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js?1684106062" defer></script>
  <script src="./dist/js/demo.min.js?1684106062" defer></script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-states'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	 window.noUiSlider && (noUiSlider.create(document.getElementById('range-simple'), {
    			  start: 20,
    			  connect: [true, false],
    			  step: 10,
    			  range: {
    				  min: 0,
    				  max: 100
    			  }
    	 }));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	 window.noUiSlider && (noUiSlider.create(document.getElementById('range-connect'), {
    			  start: [60, 90],
    			  connect: [false, true, false],
    			  step: 10,
    			  range: {
    				  min: 0,
    				  max: 100
    			  }
    	 }));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	 window.noUiSlider && (noUiSlider.create(document.getElementById('range-color'), {
    			  start: 40,
    			  connect: [true, false],
    			  step: 10,
    			  range: {
    				  min: 0,
    				  max: 100
    			  }
    	 }));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-default'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-icon'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-icon-prepend'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-inline'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    		inlineMode: true,
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-tags'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-users'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-optgroups'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-people'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-countries'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-labels'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-countries-valid'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-countries-invalid'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
    // @formatter:on
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    	let sliderTriggerList = [].slice.call(document.querySelectorAll("[data-slider]"));
    	sliderTriggerList.map(function (sliderTriggerEl) {
    		let options = {};
    		if (sliderTriggerEl.getAttribute("data-slider")) {
    			options = JSON.parse(sliderTriggerEl.getAttribute("data-slider"));
    		}
    		let slider = noUiSlider.create(sliderTriggerEl, options);
    		if (options['js-name']) {
    			window[options['js-name']] = slider;
    		}
    	});
    });
  </script>
</body>
</html>