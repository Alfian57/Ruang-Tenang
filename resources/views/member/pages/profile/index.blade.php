@extends('member.layouts.main')

@push('scripts')
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }
    </script>
@endpush

@section('content')
    <div class="p-4 overflow-y-auto scroll-hidden">
        <div class="bg-white rounded-lg space-y-6">
            @include('member.pages.profile.components.update-profile-form')
            @include('member.pages.profile.components.update-password-form')
        </div>
    </div>
@endsection