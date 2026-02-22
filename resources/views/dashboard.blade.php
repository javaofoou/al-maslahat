<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-green-100 p-4 rounded-lg shadow text-center">
                    <h3 class="font-bold text-lg">Posts</h3>
                    <p class="text-2xl font-bold">{{ $posts_count }}</p>
                </div>
                <div class="bg-green-200 p-4 rounded-lg shadow text-center">
                    <h3 class="font-bold text-lg">Blogs</h3>
                    <p class="text-2xl font-bold">{{ $blogs_count }}</p>
                </div>
                <div class="bg-green-300 p-4 rounded-lg shadow text-center">
                    <h3 class="font-bold text-lg">Events</h3>
                    <p class="text-2xl font-bold">{{ $events_count }}</p>
                </div>
                <div class="bg-green-400 p-4 rounded-lg shadow text-center">
                    <h3 class="font-bold text-lg">Excos</h3>
                    <p class="text-2xl font-bold">{{ $excos_count }}</p>
                </div>
            </div>

            <!-- Latest Posts -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">Latest Posts</h3>
                <ul class="space-y-2">
                    @foreach($latest_posts as $post)
                        <li class="border-b pb-2">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-green-900 font-semibold">{{ $post->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Latest Blogs -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">Latest Blogs</h3>
                <ul class="space-y-2">
                    @foreach($latest_blogs as $blog)
                        <li class="border-b pb-2">
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="text-green-900 font-semibold">{{ $blog->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-white dark:bg-green-800 p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">Upcoming Events</h3>
                <ul class="space-y-2">
                    @foreach($upcoming_events as $event)
                        <li class="border-b pb-2">
                            {{ $event->title }} - {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
