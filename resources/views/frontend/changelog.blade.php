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
    <title>Changelog - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
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
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row justify-content-center">
              <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                  <div class="card-body markdown">
                    <h1>Changelog</h1>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta19</span> –
                        <small>May 15, 2023</small>
                      </h2>
                      <ul>
                        <li>Add customizable Star Ratings component using <code class="language-plaintext highlighter-rouge">star-rating.js</code> library (<a href="https://github.com/tabler/tabler/issues/1571" target="_blank" rel="noopener">#1571</a>)</li>
                        <li>Add new “Filled” section to Icons page (<a href="https://github.com/tabler/tabler/issues/1574" target="_blank" rel="noopener">#1574</a>)</li>
                        <li>Fix form controls bugs in dark mode (<a href="https://github.com/tabler/tabler/issues/1573" target="_blank" rel="noopener">#1573</a>)</li>
                        <li>Fix text color in dark version of navbar (<a href="https://github.com/tabler/tabler/issues/1569" target="_blank" rel="noopener">#1569</a>)</li>
                        <li>Changelog update</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta18</span> –
                        <small>May 14, 2023</small>
                      </h2>
                      <ul>
                        <li>new page: Cookie banner</li>
                        <li>Unify dark mode with latest Bootstrap API and improve dark mode elements (<a href="https://github.com/tabler/tabler/issues/1561" target="_blank" rel="noopener">#1561</a>)</li>
                        <li>Update Tabler Icons to version 2.18 with 18 new icons added (<a href="https://github.com/tabler/tabler/issues/1560" target="_blank" rel="noopener">#1560</a>)</li>
                        <li>Switch from <code class="language-plaintext highlighter-rouge">npm</code> to <code class="language-plaintext highlighter-rouge">pnpm</code> for faster package installation (<a href="https://github.com/tabler/tabler/issues/1559" target="_blank" rel="noopener">#1559</a>)</li>
                        <li>Add Prettier to project for consistent code formatting (<a href="https://github.com/tabler/tabler/issues/1558" target="_blank" rel="noopener">#1558</a>)</li>
                        <li>Update required Node.js version to 18 and add <code class="language-plaintext highlighter-rouge">.nvmrc</code> file (<a href="https://github.com/tabler/tabler/issues/1555" target="_blank" rel="noopener">#1555</a>)</li>
                        <li>Add All Contributions package to project for easy contribution tracking (<a href="https://github.com/tabler/tabler/issues/1556" target="_blank" rel="noopener">#1556</a>)</li>
                        <li>Add support for changeset tool for more efficient and organized code changes (<a href="https://github.com/tabler/tabler/issues/1553" target="_blank" rel="noopener">#1553</a>)</li>
                        <li>Fix bug where <code class="language-plaintext highlighter-rouge">border-1</code>, <code class="language-plaintext highlighter-rouge">border-2</code>, etc don’t work (<a href="https://github.com/tabler/tabler/issues/1526" target="_blank" rel="noopener">#1526</a>)</li>
                        <li>Fix indeterminate input background color (<a href="https://github.com/tabler/tabler/issues/1536" target="_blank" rel="noopener">#1536</a>)</li>
                        <li>Update Bootstrap to <code class="language-plaintext highlighter-rouge">5.3.0-alpha3</code> (<a href="https://github.com/tabler/tabler/issues/1543" target="_blank" rel="noopener">#1543</a>)</li>
                        <li><code class="language-plaintext highlighter-rouge">tom-select</code> dark mode styling fixes</li>
                        <li>Advanced udage of <code class="language-plaintext highlighter-rouge">tom-select</code> (<a href="https://github.com/tabler/tabler/issues/1480" target="_blank" rel="noopener">#1480</a>)</li>
                        <li>Fix Dropdown menu in rtl mode (<a href="https://github.com/tabler/tabler/issues/801" target="_blank" rel="noopener">#801</a>)</li>
                        <li>Fix <code class="language-plaintext highlighter-rouge">tom-select</code> dropdown will be shaded in table-responsive (<a href="https://github.com/tabler/tabler/issues/1409" target="_blank" rel="noopener">#1409</a>)</li>
                        <li>Remove overflow scroll from body</li>
                        <li>Fix avatars overlap transparently (<a href="https://github.com/tabler/tabler/issues/1464" target="_blank" rel="noopener">#1464</a>)</li>
                        <li>Fix TinyMCE dropdown icon list transparent (<a href="https://github.com/tabler/tabler/issues/1426" target="_blank" rel="noopener">#1426</a>)</li>
                        <li>Dark mode lite colors improvement</li>
                        <li>Fix non full width selects (<a href="https://github.com/tabler/tabler/issues/1392" target="_blank" rel="noopener">#1392</a>)</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta17</span> –
                        <small>January 28, 2023</small>
                      </h2>
                      <ul>
                        <li>update <code class="language-plaintext highlighter-rouge">bootstrap</code> to v5.3.0</li>
                        <li>update icons to v2.1.2</li>
                        <li>add 72 new brands, browsers logos update</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Trial ended</code> page</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Page loader</code> page</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Profile</code> page</li>
                        <li>headings fix</li>
                        <li>dropdown background color fix</li>
                        <li>fix rgba conversion bug</li>
                        <li>fix autofill text color, not matching in dark mode</li>
                        <li>update license</li>
                        <li>header html5 tags</li>
                        <li>add input with appended <code class="language-plaintext highlighter-rouge">&lt;kbd&gt;</code></li>
                        <li><code class="language-plaintext highlighter-rouge">bootstrap</code> import fix</li>
                        <li>font improvements</li>
                        <li>change <code class="language-plaintext highlighter-rouge">$body-color</code> to CSS variable</li>
                        <li>scrollbars improvements</li>
                        <li>move <code class="language-plaintext highlighter-rouge">@tabler/icons</code> to <code class="language-plaintext highlighter-rouge">dev-dependencies</code></li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1370" target="_blank" rel="noopener">#1370</a>: avatar stacked list is not stacked anymore</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta16</span> –
                        <small>November 12, 2022</small>
                      </h2>
                      <ul>
                        <li>new <code class="language-plaintext highlighter-rouge">Photogrid</code> page</li>
                        <li><code class="language-plaintext highlighter-rouge">Steps</code> component improvements</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1348" target="_blank" rel="noopener">#1348</a>: Make job listing responsive for smaller devices</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1357" target="_blank" rel="noopener">#1357</a>: buttons group not active</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1352" target="_blank" rel="noopener">#1352</a>: fix deprecation warning</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1180" target="_blank" rel="noopener">#1180</a>: number input with <code class="language-plaintext highlighter-rouge">form-control-sm</code> looks weird</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1328" target="_blank" rel="noopener">#1328</a>: color input should show different color for inner check symbol on white ellipse</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1355" target="_blank" rel="noopener">#1355</a> - missing font sizes</li>
                        <li>update icons to v1.111.0</li>
                        <li>homepage navbar fix</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1262" target="_blank" rel="noopener">#1262</a> - <code class="language-plaintext highlighter-rouge">.bg-opacity-xx</code> class is not functioning properly</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta15</span> –
                        <small>November 01, 2022</small>
                      </h2>
                      <ul>
                        <li>new <code class="language-plaintext highlighter-rouge">badges</code> page</li>
                        <li><code class="language-plaintext highlighter-rouge">&lt;kbd&gt;</code> styling</li>
                        <li>update icons to v1.109.0</li>
                        <li><code class="language-plaintext highlighter-rouge">tom-select</code> border fix</li>
                        <li>exclude <code class="language-plaintext highlighter-rouge">playgrounds</code> from build</li>
                        <li>update jekyll to v4.3.1</li>
                        <li>fix: facebook color update</li>
                        <li>navbar aria atributes fixes</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/808" target="_blank" rel="noopener">#808</a> - <code class="language-plaintext highlighter-rouge">navbar-menu</code> and <code class="language-plaintext highlighter-rouge">sidebar-menu</code> has the same <code class="language-plaintext highlighter-rouge">id</code></li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1335" target="_blank" rel="noopener">#1335</a> - missing color variables usage in <code class="language-plaintext highlighter-rouge">alert</code> and <code class="language-plaintext highlighter-rouge">btn-ghost-*</code></li>
                        <li>move border style to CSS variables</li>
                        <li>add missing forms</li>
                        <li><code class="language-plaintext highlighter-rouge">btn-actions</code> fixes</li>
                        <li>replace <code class="language-plaintext highlighter-rouge">$text-muted</code> to css variable</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta14</span> –
                        <small>October 21, 2022</small>
                      </h2>
                      <ul>
                        <li>fix active items in dark mode</li>
                        <li>update Jekyll to newest version</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta13</span> –
                        <small>October 18, 2022</small>
                      </h2>
                      <ul>
                        <li>update Bootstrap to 5.2.1, update dependencies</li>
                        <li>new <code class="language-plaintext highlighter-rouge">tracking</code> component</li>
                        <li>new radio button version of <code class="language-plaintext highlighter-rouge">form-imagecheck</code></li>
                        <li>update icons to v1.105.0</li>
                        <li>dark mode improvements</li>
                        <li>corrects the spelling of New Zealand (<a href="https://github.com/tabler/tabler/issues/1318" target="_blank" rel="noopener">#1318</a>)</li>
                        <li>remove <code class="language-plaintext highlighter-rouge">$border-color-dark</code></li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1301" target="_blank" rel="noopener">#1301</a> - code snippets in docs look bad in dark mode</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1305" target="_blank" rel="noopener">#1305</a> - different default link color for dark mode</li>
                        <li>fix popover background in dark mode</li>
                        <li>fix button default border color</li>
                        <li>fix <code class="language-plaintext highlighter-rouge">form-imagecheck</code> bg in dark mode</li>
                        <li>navbar logo fix</li>
                        <li>move card ribbons config to variables</li>
                        <li>navbar border fix</li>
                        <li>dark mode active fix</li>
                        <li>using globalThis instead of window (<a href="https://github.com/tabler/tabler/issues/1315" target="_blank" rel="noopener">#1315</a>)</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1210" target="_blank" rel="noopener">#1210</a> - lastmod not generated for pages in <code class="language-plaintext highlighter-rouge">sitemap.xml</code></li>
                        <li>fix card border in dark mode</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/895" target="_blank" rel="noopener">#895</a> - background color overwrites background image</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1302" target="_blank" rel="noopener">#1302</a> - wrong card header in dark mode</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1303" target="_blank" rel="noopener">#1303</a> - wrong color when hovering over <code class="language-plaintext highlighter-rouge">selectgroup</code> in dark mode</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1308" target="_blank" rel="noopener">#1308</a> - bad coloring in table in dark mode</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1273" target="_blank" rel="noopener">#1273</a> - datepicker background color broken</li>
                        <li>fix <code class="language-plaintext highlighter-rouge">$prefix</code> hard coded <code class="language-plaintext highlighter-rouge">layout/_dark.scss</code></li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1275" target="_blank" rel="noopener">#1275</a> - remove last border-right on progress bar</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/1261" target="_blank" rel="noopener">#1261</a> - broken offcanvas bg</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta12</span> –
                        <small>September 19, 2022</small>
                      </h2>
                      <ul>
                        <li>new “Job listing” page</li>
                        <li>new “Sign in with cover” page</li>
                        <li>new “Logs” page</li>
                        <li>new <code class="language-plaintext highlighter-rouge">progressbg</code> component</li>
                        <li>add a lot of CSS variables</li>
                        <li>add Dockerfile with alpine base</li>
                        <li>add icon pulse/tada/rotate animations</li>
                        <li>use <code class="language-plaintext highlighter-rouge">:host</code> in selectors to support Web Components</li>
                        <li>use dark table variant colors in dark mode (<a href="https://github.com/tabler/tabler/issues/1200" target="_blank" rel="noopener">#1200</a>)</li>
                        <li>update Tabler Icons to v1.96</li>
                        <li>change <code class="language-plaintext highlighter-rouge">space-y</code> component</li>
                        <li>headings, shadows and borders unify</li>
                        <li>toggle TinyMCE dark mode and skin based on the set Tabler theme</li>
                        <li>fix <code class="language-plaintext highlighter-rouge">card-footer</code> background</li>
                        <li>fix headers weight</li>
                        <li>fix transparent hover background in pagination</li>
                        <li>fix dark mode card text color</li>
                        <li>fix <code class="language-plaintext highlighter-rouge">--#{$prefix}card-bg</code> is undefined</li>
                        <li>fix global variable for <code class="language-plaintext highlighter-rouge">.card</code> and <code class="language-plaintext highlighter-rouge">.btn</code></li>
                        <li>fix code sample in the customize tabler docs</li>
                        <li>fix form elements demo page radio buttons</li>
                        <li>replace <code class="language-plaintext highlighter-rouge">gulp-minify</code> with <code class="language-plaintext highlighter-rouge">gulp-terser</code></li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta11</span> –
                        <small>July 05, 2022</small>
                      </h2>
                      <ul>
                        <li>new <code class="language-plaintext highlighter-rouge">Dropzone</code> component</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Lightbox</code> component</li>
                        <li>new <code class="language-plaintext highlighter-rouge">TinyMCS</code> component</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Inline Player</code> component</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Pricing table</code> component</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Datagrid</code> component</li>
                        <li>new optgroup form examples</li>
                        <li>new settings page</li>
                        <li>update Tabler Icons to v1.78</li>
                        <li>added popover docs page</li>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1125" target="_blank" rel="noopener">#1125</a> incorrect chart display in the mobile version</li>
                        <li>update Bootstrap to 5.2.0</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta10</span> –
                        <small>April 29, 2022</small>
                      </h2>
                      <ul>
                        <li>new <code class="language-plaintext highlighter-rouge">datatable</code> component</li>
                        <li>update Tabler Icons to v1.67</li>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1024" target="_blank" rel="noopener">#1024</a> - fix Tom-select in dark mode</li>
                        <li>new carousel indicators: dots, vertical, thumbs (<a href="https://github.com/tabler/tabler/issues/1101" target="_blank" rel="noopener">#1101</a>)</li>
                        <li>replace !important modifier with more specific selectors (<a href="https://github.com/tabler/tabler/issues/1100" target="_blank" rel="noopener">#1100</a>)</li>
                        <li>new <code class="language-plaintext highlighter-rouge">FAQ</code> page</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta9</span> –
                        <small>February 26, 2022</small>
                      </h2>
                      <ul>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1061" target="_blank" rel="noopener">#1061</a> - list group item colors in light and dark modes</li>
                        <li>new <code class="language-plaintext highlighter-rouge">tasks</code> dashboard</li>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1059" target="_blank" rel="noopener">#1059</a> - upload button in form element in dark view has problem</li>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1052" target="_blank" rel="noopener">#1052</a> - card background icon is practically invisible</li>
                        <li>remove Inter font and use default font system stack</li>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1018" target="_blank" rel="noopener">#1018</a> - vector map not working</li>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1035" target="_blank" rel="noopener">#1035</a> - wrong background color of hovered list group items in dark mode</li>
                        <li>dependencies update</li>
                        <li>add <code class="language-plaintext highlighter-rouge">font-display: swap;</code> to improve font loading</li>
                        <li>new <code class="language-plaintext highlighter-rouge">Boxed</code> layout</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta8</span> –
                        <small>February 05, 2022</small>
                      </h2>
                      <ul>
                        <li>update dependencies</li>
                        <li>new vector maps demos</li>
                        <li>fixes update map on resize</li>
                        <li>docs improvement</li>
                        <li>replace <code class="language-plaintext highlighter-rouge">badge</code> with <code class="language-plaintext highlighter-rouge">status-dot</code> in <code class="language-plaintext highlighter-rouge">navbar-notifications.html</code></li>
                        <li>map tooltip fixes</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta7</span> –
                        <small>February 05, 2022</small>
                      </h2>
                      <ul>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1019" target="_blank" rel="noopener">#1019</a> - project-overview.html link not working</li>
                        <li>fix: <a href="https://github.com/tabler/tabler/issues/1010" target="_blank" rel="noopener">#1010</a> - card with bottom tabs has incorrect border radius</li>
                        <li>uptime monitor mobile fixes</li>
                        <li>navbar dark button fix</li>
                        <li><code class="language-plaintext highlighter-rouge">tabler-icons</code> link</li>
                        <li>autoloading webfonts</li>
                        <li>cards fixes, new cards demos</li>
                        <li>ruby dependencies update</li>
                        <li>RTL stylesheet fixes</li>
                        <li>new card action demos</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta6</span> –
                        <small>January 18, 2022</small>
                      </h2>
                      <ul>
                        <li>pricing cards fix</li>
                        <li>fix bug <code class="language-plaintext highlighter-rouge">fw-...</code>, <code class="language-plaintext highlighter-rouge">.fs-...</code> is missed (<a href="https://github.com/tabler/tabler/issues/987" target="_blank" rel="noopener">#987</a>)</li>
                        <li>avatar class fix</li>
                        <li>fix bug <a href="https://github.com/tabler/tabler/issues/903" target="_blank" rel="noopener">#903</a> <code class="language-plaintext highlighter-rouge">litepicker</code> with date range not having correct border</li>
                        <li>page wrapper fix</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/900" target="_blank" rel="noopener">#900</a> <code class="language-plaintext highlighter-rouge">is-invalid-lite</code> class is not working under <code class="language-plaintext highlighter-rouge">was-validated</code> form class</li>
                        <li>update <code class="language-plaintext highlighter-rouge">@tabler/icons</code> to version 1.48</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/960" target="_blank" rel="noopener">#960</a> - Badges not honoring font sizes</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/959" target="_blank" rel="noopener">#959</a> - <code class="language-plaintext highlighter-rouge">node-sass</code> does not properly compile nested media queries</li>
                        <li>update package dependencies to newest version</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta5</span> –
                        <small>December 07, 2021</small>
                      </h2>
                      <p class="strong">Tabler has finally lived to see dark mode! 🌝🌚</p>
                      <ul>
                        <li><strong>Dark mode enabled!</strong></li>
                        <li>add more cursors (<a href="https://github.com/tabler/tabler/issues/947" target="_blank" rel="noopener">#947</a>)</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/892" target="_blank" rel="noopener">#892</a> - media queries need to be nested when negating</li>
                        <li>update <code class="language-plaintext highlighter-rouge">@tabler/icons</code> to newest version</li>
                        <li>move optional dependencies to peerDependencies (<a href="https://github.com/tabler/tabler/issues/924" target="_blank" rel="noopener">#924</a>)</li>
                        <li>move deployment to Github Actions (<a href="https://github.com/tabler/tabler/issues/934" target="_blank" rel="noopener">#934</a>)</li>
                        <li>table border fixes</li>
                        <li>antialiased fix</li>
                        <li>update <code class="language-plaintext highlighter-rouge">@tabler/icons</code> to version 1.42</li>
                        <li>change default font to ‘Inter’</li>
                        <li>colors unify</li>
                        <li>add <code class="language-plaintext highlighter-rouge">tom-select</code> and remove <code class="language-plaintext highlighter-rouge">choices.js</code></li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta4</span> –
                        <small>October 24, 2021</small>
                      </h2>
                      <ul>
                        <li>upgrade required node.js version to 14</li>
                        <li>upgrade Bootstrap to 5.1</li>
                        <li>upgrade dependencies</li>
                        <li>fix <a href="https://github.com/tabler/tabler/issues/775" target="_blank" rel="noopener">#775</a> - litepicker not initializing</li>
                        <li>fix <code class="language-plaintext highlighter-rouge">nouislider</code> import in dev</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta3</span> –
                        <small>May 08, 2021</small>
                      </h2>
                      <ul>
                        <li>upgrade Bootstrap to 5.0</li>
                        <li>upgrade dependencies</li>
                        <li>change <code class="language-plaintext highlighter-rouge">$border-radius-pill</code> variable</li>
                        <li>badge vertical align fix</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta2</span> –
                        <small>March 29, 2021</small>
                      </h2>
                      <ul>
                        <li>update dependencies</li>
                        <li><code class="language-plaintext highlighter-rouge">li</code> marker fix</li>
                        <li>page wrapper, nav fixes</li>
                        <li>scripts optimize, remove <code class="language-plaintext highlighter-rouge">capture_once</code></li>
                        <li><code class="language-plaintext highlighter-rouge">page-body</code> fixes</li>
                        <li>layout navbar fix</li>
                        <li>typography fix</li>
                        <li>ribbon fix</li>
                        <li>charts label fixes</li>
                        <li>charts docs</li>
                      </ul>
                    </div>
                    <div class="mb-4">
                      <h2 class="mb-2">
                        <span>1.0.0-beta</span> –
                        <small>February 17, 2021</small>
                      </h2>
                      <p class="strong">Initial beta release of Tabler v1.0! Lots more coming soon though 😁</p>
                      <ul>
                        <li>update Bootstrap to 5.0.0-beta2</li>
                        <li>update other dependencies.</li>
                      </ul>
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