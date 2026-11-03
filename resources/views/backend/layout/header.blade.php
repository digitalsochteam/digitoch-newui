  <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="flex items-center justify-between h-16 px-6">

          <!-- Left Side -->
          <div class="flex items-center">
              <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-600 hover:text-gray-900 mr-4">
                  <i class="fas fa-bars text-xl"></i>
              </button>
              <h2 class="text-xl font-semibold text-gray-800">Dashboard Overview</h2>
          </div>

          <!-- Right Side -->
          <div class="flex items-center space-x-4">


              <!-- Profile Dropdown -->
              <div class="relative" x-data="{ profileOpen: false }">
                  <button @click="profileOpen = !profileOpen"
                      class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                      <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/hero/profile.png') }}" alt="Profile">
                      <i class="fas fa-chevron-down text-sm"></i>
                  </button>

                  <!-- Dropdown Menu -->
                  <div x-show="profileOpen" @click.away="profileOpen = false"
                      x-transition:enter="transition ease-out duration-100"
                      x-transition:enter-start="transform opacity-0 scale-95"
                      x-transition:enter-end="transform opacity-100 scale-100"
                      x-transition:leave="transition ease-in duration-75"
                      x-transition:leave-start="transform opacity-100 scale-100"
                      x-transition:leave-end="transform opacity-0 scale-95"
                      class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">

                      <hr class="my-1">
                      <a href="{{ route('logout') }}"
                          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                  </div>
              </div>
          </div>
      </div>
  </header>
