<nav class="navbar fixed-top navbar-light bg-light">
  <div class="container-fluid">
    <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div>
      {{ Auth::user()->name }}
    </div>
  </div>
</nav>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas">
  <div class="offcanvas-header">
    <h5 class="fs-4"><x-application-logo width=32 height=32 />{{ config('app.name') }}</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column ">

      <ul class="nav nav-pills flex-column">

          @role('admin')
              <li>
                  <x-menu-link :href="route('technologies.index')">
                      <i class="bi bi-braces-asterisk pe-2"></i>{{ __('translations.menu.technologies') }}
                  </x-menu-link>
              </li>

              <li>
                  <x-menu-link :href="route('languages.index')">
                      <i class="bi bi-translate pe-2"></i>{{ __('translations.menu.languages') }}
                  </x-menu-link>
              </li>

              <li>
                  <x-menu-link :href="route('levels.index')">
                      <i class="bi bi-bar-chart pe-2"></i>{{ __('translations.menu.levels') }}
                  </x-menu-link>
              </li>

              <li>
                  <x-menu-link :href="route('certificates.index')">
                      <i class="bi bi-bar-chart pe-2"></i>{{ __('translations.menu.certificates') }}
                  </x-menu-link>
              </li>

              <li>
                  <x-menu-link :href="route('school_types.index')">
                      <i class="bi bi-stack"></i>{{ __('translations.menu.school_types') }}
                  </x-menu-link>
              </li>
          @endrole
      </ul>

    <div class="mt-auto p-2 border-top">
      <ul class="nav nav-pills flex-column">
        <li>
          <x-menu-link :href="route('logout')" class="disabled">
            <i class="bi bi-person pe-2"></i>{{ __('translations.menu.profile') }}
          </x-menu-link>
        </li>
        <li>
          <x-menu-link :href="route('logout')" class="disabled">
            <i class="bi bi-gear pe-2"></i>{{ __('translations.menu.settings') }}
          </x-menu-link>
        </li>
        <li>
          <x-menu-link :href="route('logout')">
            <i class="bi bi-box-arrow-right pe-2"></i>{{ __('translations.menu.logout') }}
          </x-menu-link>
        </li>
      </ul>
    </div>
  </div>
</div>

