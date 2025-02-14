<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Form API') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('form-api.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Form</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Buat API</button>
        </form>

        @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
    </div>
</x-app-layout>