<x-app-layout>
    <div class="bg-gradient-to-r from-blue-50 to-green-50 min-h-screen">

        <div class="flex items-center space-x-2 sm:px-6 lg:px-8 max-w-7xl mx-auto py-6">
            <a href="{{ route('dashboard') }}" class="flex items-center text-gray-600 hover:text-gray-900">
                <!-- Arrow Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Kembali') }}
                </h2>
            </a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('form-api.store') }}" method="POST" id="apiForm">
                        @csrf

                        <!-- Nama Form -->
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Nama Form')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit">
                                {{ __('Buat API') }}
                            </x-primary-button>
                        </div>
                    </form>

                    @if(session('success'))
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                title: "Sukses!",
                                text: "{{ session('success') }}",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {
                                window.location.href = "{{ route('dashboard') }}";
                            });
                        });
                    </script>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>