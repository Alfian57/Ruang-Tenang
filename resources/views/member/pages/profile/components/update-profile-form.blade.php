<div class="p-6">
    <div class="border-b border-gray-200 pb-4 mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Informasi Profil</h2>
        <p class="text-sm text-gray-600 mt-1">Ubah nama dan email Anda</p>
    </div>

    <form action="{{ route('member.profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap
                </label>
                <input type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', auth()->user()->name) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-primary-400 @error('name') @enderror"
                        placeholder="Masukkan nama lengkap">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', auth()->user()->email) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-primary-400 @error('email') @enderror"
                        placeholder="Masukkan alamat email">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-6 py-2 bg-primary-400 text-white font-medium rounded-md hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2 transition duration-150 ease-in-out">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>