@extends('layouts.app')

@section('content')

<!-- HERO SLIDER -->
<section class="relative">
    <div class="swiper-container">
        <div class="swiper-wrapper">
    @foreach($posts as $post)
        <div class="swiper-slide">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                @php
                    $embed_url = null;

                    // YouTube embed
                    if($post->youtube_url) {
                        if(str_contains($post->youtube_url, 'watch?v=')) {
                            $embed_url = str_replace('watch?v=', 'embed/', $post->youtube_url);
                        } elseif(str_contains($post->youtube_url, 'youtu.be')) {
                            $video_id = last(explode('/', $post->youtube_url));
                            $embed_url = 'https://www.youtube.com/embed/' . $video_id;
                        }
                    }
                    // Facebook embed
                    elseif($post->facebook_url) {
                        $embed_url = 'https://www.facebook.com/plugins/video.php?href=' . urlencode($post->facebook_url) . '&show_text=0&width=560';
                    }
                @endphp

                {{-- Responsive video or image container --}}
                @if($embed_url)
                    <div class="relative w-full aspect-video mb-4">
                        <iframe class="absolute inset-0 w-full h-full" 
                                src="{{ $embed_url }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                        </iframe>
                    </div>
                @elseif($post->image_url)
                    <div class="w-full mb-4">
                        <img src="{{ $post->image_url }}" 
                             class="w-full h-auto max-h-[400px] object-contain rounded-lg shadow-md">
                    </div>
                @endif

                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-700 mb-2">{{ Str::limit(strip_tags($post->content), 80) }}</p>
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-green-900 font-semibold hover:underline">Read More</a>
                </div>
            </div>

            <div class="flex justify-between items-center mt-3">
                <!-- Quick Comments Preview -->
                <div class="text-gray-600 text-sm">
                    <span>{{ $post->comments()->count() }} comments</span>
                </div>
                <!-- Social Share -->
                <div class="flex gap-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('posts.show', $post->slug)) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook-square text-xl"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('posts.show', $post->slug)) }}&text={{ urlencode($post->title) }}" target="_blank" class="text-blue-400 hover:text-blue-600">
                        <i class="fab fa-twitter-square text-xl"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('posts.show', $post->slug)) }}" target="_blank" class="text-green-500 hover:text-green-700">
                        <i class="fab fa-whatsapp-square text-xl"></i>
                    </a>
                </div>
            </div>

        </div>
    @endforeach
</div>

            <!-- Navigation -->
            <div class="swiper-button-next text-green-900"></div>
            <div class="swiper-button-prev text-green-900"></div>
        </div>
    </div>
</section>

<!-- LATEST BLOGS -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-green-900">Latest Blogs</h2>

        <div class="swiper-blogs">
            <div class="swiper-wrapper">
    @foreach($blogs as $blog)
        <div class="swiper-slide">
            <div class="bg-green-50 rounded-xl shadow-lg overflow-hidden">

                {{-- Responsive image --}}
                @if($blog->image_url)
                    <div class="w-full mb-4">
                        <img src="{{ $blog->image_url }}" 
                             class="w-full h-auto max-h-[400px] object-contain rounded-t-xl">
                    </div>
                @endif

                {{-- Blog content --}}
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">{{ $blog->title }}</h3>
                    <p class="text-gray-700 mb-2">{{ $blog->excerpt }}</p>
                    <a href="{{ route('blogs.show', $blog->slug) }}" 
                       class="text-green-900 font-semibold hover:underline">
                       Read More
                    </a>
                </div>

                {{-- Comments count & social share --}}
                <div class="flex justify-between items-center mt-3 px-4 pb-4">
                    <div class="text-gray-600 text-sm">
                        <span>{{ $blog->comments()->count() }} comments</span>
                    </div>

                    <div class="flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blogs.show', $blog->slug)) }}" 
                           target="_blank" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-facebook-square text-xl"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blogs.show', $blog->slug)) }}&text={{ urlencode($blog->title) }}" 
                           target="_blank" class="text-blue-400 hover:text-blue-600">
                            <i class="fab fa-twitter-square text-xl"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . route('blogs.show', $blog->slug)) }}" 
                           target="_blank" class="text-green-500 hover:text-green-700">
                            <i class="fab fa-whatsapp-square text-xl"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

            <!-- Navigation -->
            <div class="swiper-button-next text-green-900"></div>
            <div class="swiper-button-prev text-green-900"></div>
        </div>
    </div>
</section>

<!-- MEET OUR EXCOS -->
<section class="py-12 bg-green-100">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-8 text-green-900">Meet Our Excos</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach($excos as $exco)
            <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
                <img src="{{ $exco->image_url }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-2">
                <h3 class="font-semibold text-green-900">{{ $exco->name }}</h3>
                <p class="text-gray-600">{{ $exco->position }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- UPCOMING EVENTS -->
<section class="py-12 bg-green-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-8 text-green-900">Upcoming Events</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($events as $event)
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="font-bold text-lg mb-2">{{ $event->title }}</h3>
                <p class="text-gray-700 mb-2">{{ $event->description }}</p>
                <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($event->date)->format('F j, Y, g:i a') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- DONATE SECTION -->
<section class="py-12 bg-green-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-6">Donate to Al Maslaha</h2>
        <p class="text-lg md:text-xl mb-4">Your support helps us spread knowledge and serve the community.</p>
        <p class="text-lg font-semibold mb-6">Account Number: <span class="text-lime-400">{{ $donate_account }}</span></p>
        <a href="#donate" class="bg-lime-400 text-green-900 font-bold px-6 py-3 rounded hover:bg-lime-500 transition">Donate Now</a>
    </div>
</section>

@endsection