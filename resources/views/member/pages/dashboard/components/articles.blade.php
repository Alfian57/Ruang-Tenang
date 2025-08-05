<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 pb-20">
    @include('member.pages.dashboard.components.articles-item', [
        'background' => 'assets/member-dashboard/images/dummy-article-1.png',
        'title' => 'Kenali 7 Masalah Mental pada Mahasiswa Cara Mengatasinya',
        'url' => '#'
    ])

    @include('member.pages.dashboard.components.articles-item', [
        'background' => 'assets/member-dashboard/images/dummy-article-2.png',
        'title' => 'Kelola Stres, Janjangan sekaligus Jawaban Permasalahan Kesehatan Mental Mahasiswa',
        'url' => '#'
    ])

     @include('member.pages.dashboard.components.articles-item', [
        'background' => 'assets/member-dashboard/images/dummy-article-3.png',
        'title' => 'Kembalikan Fokusmu di Tengah Gangguan dan Tekanan',
        'url' => '#'
    ])

    @include('member.pages.dashboard.components.articles-item', [
        'background' => 'assets/member-dashboard/images/dummy-article-4.png',
        'title' => 'Cemas Soal Masa Depan? Kamu Gak Sendiri',
        'url' => '#'
    ])


    @include('member.pages.dashboard.components.articles-item', [
        'background' => 'assets/member-dashboard/images/dummy-article-5.png',
        'title' => 'Tidur Nyenyak, Pikiran Lebih Tenang',
        'url' => '#'
    ])
</div>