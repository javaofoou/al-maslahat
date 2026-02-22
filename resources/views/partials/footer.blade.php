<footer class="bg-green-950 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- About -->
        <div>
            <h3 class="text-white font-semibold text-lg mb-3">About Us</h3>
            <p class="text-sm leading-relaxed">
                Halqatul Maslahatil Islammiyat is an Islamic organization dedicated to
                da’wah, knowledge dissemination, youth development, and community service,
                especially in the blessed month of Ramadan.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-white font-semibold text-lg mb-3">Quick Links</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-lime-300">Home</a></li>
                <li><a href="{{ route('posts.index') }}" class="hover:text-lime-300">Posts</a></li>
                <li><a href="{{ route('blogs.index') }}" class="hover:text-lime-300">Blogs</a></li>
                <li><a href="{{ route('events.index') }}" class="hover:text-lime-300">Events</a></li>
            </ul>
        </div>

        <!-- Donate -->
        <div>
            <h3 class="text-white font-semibold text-lg mb-3">Support the Cause</h3>
            <p class="text-sm mb-2">Donate to support our da’wah activities:</p>
            <p class="text-lime-400 font-semibold">
                Account Number: 1234567890
            </p>
            <p class="text-sm">Bank Name: XYZ Bank</p>
        </div>
    </div>

    <div class="border-t border-green-800 text-center py-4 text-sm">
        © {{ date('Y') }} Halqatul Maslahatil Islammiyat. All rights reserved.
    </div>
</footer>