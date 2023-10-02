<nav
    class="
          flex flex-wrap
          items-center
          justify-between
          w-full
          py-4
          md:py-0
          px-4
          text-lg text-gray-700
          bg-white
        "
>
    <div>
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <svg
        xmlns="http://www.w3.org/2000/svg"
        id="menu-button"
        class="h-6 w-6 cursor-pointer md:hidden block"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
        />
    </svg>

    <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
        <ul
            class="
              pt-4
              text-base text-gray-700
              md:flex
              md:justify-between
              md:pt-0"
        >
            <li>
                <a class="md:p-4 py-2 block hover:text-purple-400" href="{{route('projects.index')}}"
                >Projects</a
                >
            </li>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="">
                        <a class="md:p-4 py-2 block hover:text-purple-400" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="">
                        <a class="md:p-4 py-2 block hover:text-purple-400" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="">
                    <a id="navbarDropdown" class="md:p-4 py-2 block hover:text-purple-400" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
