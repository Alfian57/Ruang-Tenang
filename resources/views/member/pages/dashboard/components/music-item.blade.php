@props([
    'image' => 'assets/member-dashboard/images/dummy-article-1.png',
    'title' => '',
    'subtitle' => '',
    'link' => '#',
])

<div class="flex items-center bg-white bg-opacity-10 p-2 md:p-3">
    <img src="{{ asset($image) }}" alt="Album"
        class="w-14 h-14 md:w-16 md:h-16 rounded mr-2 md:mr-3">
    <div class="flex-1 min-w-0 text-blue-dark">
        <p class="font-medium text-base md:text-lg truncate">{{ $title }}</p>
        <p class="text-base opacity-75">{{ $subtitle }}</p>
    </div>
    <a href="{{ $link ?? '#' }}"
        class="text-base md:text-lg bg-white bg-opacity-20 px-2 md:px-3 py-1 rounded whitespace-nowrap text-primary-400">
        Lihat Album
    </a>
</div>