@php
    use App\Models\User;
    use App\Models\Article;
    use App\Models\ChatSession;
    use App\Models\ChatMessage;

    // Get recent activity
    $recentArticles = Article::with('category')->latest()->take(5)->get();
    $recentChatSessions = ChatSession::with(['user', 'messages'])->latest()->take(5)->get();
    $recentUsers = User::latest()->take(5)->get();
@endphp

<x-filament-panels::page>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/filament/css/custom-dashboard.css') }}">
        <style>
            .dashboard-card {
                background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
                border: 1px solid #e2e8f0;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
                transition: all 0.3s ease;
            }

            .dashboard-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 1.5rem;
                margin-bottom: 2rem;
            }

            .activity-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
                gap: 1.5rem;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fadeIn 0.6s ease-out;
            }

            @media (max-width: 768px) {
                .stats-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }

                .activity-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/filament/js/dashboard-interactions.js') }}"></script>
    @endpush

    <!-- Statistics Overview using Filament Widgets -->
    <div class="mb-8">
        @livewire(App\Filament\Widgets\PlatformStatsOverview::class)
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
        <div>
            @livewire(App\Filament\Widgets\UserRegistrationChart::class)
        </div>
        <div>
            @livewire(App\Filament\Widgets\AiChatActivityChart::class)
        </div>
    </div>
</x-filament-panels::page>