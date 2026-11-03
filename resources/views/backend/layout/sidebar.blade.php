<div class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-900"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Sidebar Header -->
    <div class="flex items-center justify-between h-16 px-6 bg-gray-800">
        <h1 class="text-xl font-bold text-white">Dashboard</h1>
        <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="mt-8">
        <div class="px-4 space-y-2 pb-20"> <!-- Added bottom padding for better scroll spacing -->
            <a href="{{ route('dashboard.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('slider-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-image mr-3"></i>
                <span>Add Slider</span>
            </a>

            <a href="{{ route('product-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-box mr-3"></i>
                <span>Add Product</span>
            </a>

            <a href="{{ route('testimonial-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-star mr-3"></i>
                <span>Add Testimonial</span>
            </a>

            <a href="{{ route('blog-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-blog mr-3"></i>
                <span>Add Blog</span>
            </a>

            <a href="{{ route('package-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-box mr-3"></i>
                <span>Add Package</span>
            </a>

            <a href="{{ route('package-subscription-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-cubes mr-3"></i>
                <span>Add Package Subscription</span>
            </a>

            <a href="{{ route('company-logo-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-image mr-3"></i>
                <span>Add Portfolio Logo</span>
            </a>

            <a href="{{ route('portfolio-website-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-globe mr-3"></i>
                <span>Add Portfolio Website</span>
            </a>

            <a href="{{ route('portfolio-video-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-video mr-3"></i>
                <span>Add Portfolio Videos</span>
            </a>

            <a href="{{ route('portfolio-post-details.index') }}"
                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors">
                <i class="fas fa-image mr-3"></i>
                <span>Add Portfolio Post</span>
            </a>
        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="sticky bottom-0 w-full p-4 bg-gray-800">
        <div class="flex items-center p-3 bg-gray-700 rounded-lg">
            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/hero/profile.png') }}" alt="User Image">
            <div class="ml-3">
                <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-400">Admin</p>
            </div>
        </div>
    </div>
</div>

<!-- Overlay for mobile -->
<div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"
    x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
</div>
