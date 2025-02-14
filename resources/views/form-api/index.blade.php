<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Form API') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
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
                    <td>{{ $formApi->api_key }}</td>
                    <td>
                        <a href="{{ route('form-api.edit', $formApi->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
</x-app-layout>