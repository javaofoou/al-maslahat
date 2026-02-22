<header class="bg-green-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

        <!-- Logo / Name -->
    <img src="https://res.cloudinary.com/dthrnzfj7/image/upload/v1771735402/almaslaha_logo_iydsxo.jpg"
     alt="Al Maslaha"
     class="h-20 mx-2 w-20 rounded-2xl">
        <a href="{{ route('home') }}" class="text-xl md:text-2xl font-bold tracking-wide">
            Halqatul Maslahatil Islammiyat
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center space-x-6">
            <a href="{{ route('home') }}" class="hover:text-lime-300 transition">Home</a>
            <a href="{{ route('posts.index') }}" class="hover:text-lime-300 transition">Posts</a>
            <a href="{{ route('blogs.index') }}" class="hover:text-lime-300 transition">Blogs</a>
            <a href="{{ route('events.index') }}" class="hover:text-lime-300 transition">Events</a>
            <a href="{{ route('excos.index') }}" class="hover:text-lime-300 transition">Excos</a>

            @auth
                <a href="{{ route('dashboard') }}" class="text-lime-300 font-semibold">Dashboard</a>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-2 bg-lime-400 hover:bg-green-900 px-3 py-1 rounded text-white transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-lime-300 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-lime-400 text-green-900 px-4 py-1 rounded hover:bg-lime-300 transition">
                    Register
                </a>
            @endauth
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menuBtn" class="md:hidden focus:outline-none">
            ☰
        </button>
    </div>

    <!-- Mobile Nav -->
    <div id="mobileMenu" class="hidden md:hidden bg-green-800 px-4 pb-4">
        <a href="{{ route('home') }}" class="block py-2 font-bold hover:text-lime-300">Home</a>
        <a href="{{ route('posts.index') }}" class="block py-2 font-bold hover:text-lime-300">Posts</a>
        <a href="{{ route('blogs.index') }}" class="block py-2 font-bold hover:text-lime-300">Blogs</a>
        <a href="{{ route('events.index') }}" class="block py-2 font-bold hover:text-lime-300">Events</a>
        <a href="{{ route('excos.index') }}" class="block py-2 font-bold hover:text-lime-300">Excos</a>

        @auth
            <a href="{{ route('dashboard') }}" class="block py-2 text-lime-300">Dashboard</a>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="block py-2">
                @csrf
                <button type="submit" class="w-full text-left text-lime-400 hover:text-green-700">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block py-2 hover:text-lime-300">Login</a>
            <a href="{{ route('register') }}" class="block py-2 hover:text-lime-300">Register</a>
        @endauth
    </div>
</header>

<script>
    document.getElementById('menuBtn').addEventListener('click', function () {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>