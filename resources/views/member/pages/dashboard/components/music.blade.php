@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/member-dashboard/css/music.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/member-dashboard/js/music.js') }}"></script>
@endpush

<div id="music-section"
    class="col-span-1 md:col-span-1 lg:col-span-1 gradient-red text-white pt-4 rounded-2xl relative overflow-hidden">

    <img src="{{ asset('assets/member-dashboard/images/music-vector.png') }}"
        class="absolute top-5 -right-3 w-24 h-24 md:w-32 md:h-32 opacity-75 pointer-events-none" alt="Music Vector"
        style="mask-image: linear-gradient(to bottom, white 70%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, white 70%, transparent 100%);">

    <div class="px-8">
        <h3 class="font-semibold mb-2 text-lg md:text-xl">
            Biarkan Musik Menenangkan Harimu
        </h3>
        <p class="text-base md:text-lg opacity-90 mb-4">
            Putar musik pilihan untuk bantu kamu melepas stres, mengatur napas, dan kembali fokus.
        </p>
    </div>

    {{-- Music Categories Container --}}
    <div class="bg-white h-full pb-6 pt-3 relative z-10 text-blue-dark overflow-y-auto max-h-110">
        @foreach ($songCategories as $category)
            @include('member.pages.dashboard.components.music-category', [
                'category' => $category
            ])
        @endforeach
    </div>

</div>