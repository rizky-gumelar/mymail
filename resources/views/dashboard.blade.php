<x-app-layout>
    <div class="pt-12 bg-gradient-to-r from-blue-50 to-green-50">
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
                                    <button class="btn btn-sm btn-secondary ms-2 copy-btn" data-clipboard-target="#api-url-{{ $formApi->id }}">Salin</button>
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

    <!-- Code Tutorial Section in a Separate Div -->
    <div class="py-6 bg-gradient-to-r from-blue-50 to-green-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="mb-4 text-2xl font-semibold text-gray-800 dark:text-gray-100">HTML Form Tutorial</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    Here’s an example of how to create a simple form with API integration:
                </p>

                <!-- Code Block with Syntax Highlighting -->
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md overflow-x-auto">
                    <pre><code class="language-html" id="codeBlock">
&lt;form action="https://formspree.io/f/{FORM_ID}" method="POST"&gt;
    &lt;fieldset&gt;
        &lt;div class="fs-field"&gt;
            &lt;label for="name"&gt;Full Name&lt;/label&gt;
            &lt;input type="text" id="name" name="name" required /&gt;
        &lt;/div&gt;
        &lt;div class="fs-field"&gt;
            &lt;label for="dob"&gt;Date of Birth&lt;/label&gt;
            &lt;input type="date" id="dob" name="dob" required /&gt;
        &lt;/div&gt;
    &lt;/fieldset&gt;
&lt;/form&gt;
                    </code></pre>
                </div>

                <button class="copy-btn mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:outline-none" data-clipboard-target="#codeBlock">Copy Code</button>
            </div>
        </div>
    </div>

    <!-- Include PrismJS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js"></script>

    <!-- Include Clipboard.js JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <!-- Script for copying to clipboard with SweetAlert -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize ClipboardJS for copy functionality
            var clipboard = new ClipboardJS('.copy-btn');

            // Success event listener to show SweetAlert on successful copy
            clipboard.on('success', function(e) {
                // Show SweetAlert success message
                Swal.fire({
                    title: 'Success!',
                    text: 'Code successfully copied to clipboard!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                e.clearSelection(); // Clear selection after copying
            });

            // Error event listener (optional)
            clipboard.on('error', function(e) {
                // Show SweetAlert error message
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to copy code. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
</x-app-layout>