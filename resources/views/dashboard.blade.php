<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Button to Create Form API -->
                    <a href="{{ route('form-api.create') }}" class="btn btn-primary">
                        Buat Form API
                    </a>

                    <hr class="my-6">

                    <h3 class="mb-4">Daftar Form API yang Anda Buat</h3>

                    <!-- Tampilkan pesan sukses jika ada -->
                    @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif

                    <!-- Tabel API yang sudah dibuat -->
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Nama Form</th>
                                <th scope="col">API Key</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formApis as $formApi)
                            <tr>
                                <td>{{ $formApi->name }}</td>
                                <td>
                                    <!-- Tampilkan URL lengkap API key -->
                                    <span id="api-url-{{ $formApi->id }}">
                                        {{ env('APP_URL') . '/form/' . $formApi->api_key }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Button Salin -->
                                    <button onclick="copyToClipboard('{{ env('APP_URL') . '/form/' . $formApi->api_key }}')" class="btn btn-sm btn-secondary ms-2">Salin</button>
                                    <form action="{{ route('form-api.delete', $formApi->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($formApis->isEmpty())
                    <p class="text-center">Tidak ada form API yang dibuat.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk menyalin ke clipboard -->
    <script>
        function copyToClipboard(text) {
            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = text;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert('URL berhasil disalin ke clipboard!');
        }
    </script>

</x-app-layout>