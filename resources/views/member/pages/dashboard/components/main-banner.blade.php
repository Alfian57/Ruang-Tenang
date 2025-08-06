<div class="text-white rounded-xl p-6 overflow-hidden mb-6 flex justify-between items-center"
    style="background: url('{{ asset('assets/member-dashboard/images/home-banner.png') }}'); background-size: cover;">
    <div>
        <h2 class="text-xl font-semibold mb-2">Hari ini kamu terlihat sedikit lelah,</h2>
        <p class="text-lg opacity-90">Ingin ngobrol sebentar?</p>
    </div>
    <div class="flex items-center space-x-4">
        <div class="text-6xl">😫</div>
        <a href="{{ route('member.ai-chat') }}"
            class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-2xl font-semibold transition-colors">
            Ngobrol Sekarang!
        </a>
    </div>
</div>