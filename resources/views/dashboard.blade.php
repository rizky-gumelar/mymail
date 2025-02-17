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
                <h3 class="mb-4 text-2xl font-semibold text-gray-800 dark:text-gray-100">HTML & CSS Form Tutorial</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    Here’s an example of how to create a simple form with API integration:
                </p>

                <!-- Language Toggle Buttons -->
                <div class="flex justify-end space-x-4 mb-4">
                    <button id="htmlBtn" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">HTML</button>
                    <button id="cssBtn" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">CSS</button>
                </div>

                <!-- Code Block with Syntax Highlighting -->
                <div class="relative bg-black p-4 rounded-lg shadow-md overflow-x-auto max-h-80">
                    <!-- Copy button positioned at top-right -->
                    <button class="copy-btn absolute top-2 right-2 px-3 py-1 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:outline-none" data-clipboard-target="#codeBlockHtml">Copy Code</button>

                    <pre><code class="language-html" id="codeBlockHtml">
&lt;form action="http://127.0.0.1:8000/form/{{$formApi->api_key}}" method="POST"&gt;
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
                    </code><code class="hidden language-css" id="codeBlockCss">
/* General styling */
body {
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
  margin: 0;
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.fs-form {
  background-color: white;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  max-width: 600px;
  width: 100%;
  box-sizing: border-box;
}

/* Field styling */
.fs-field {
  margin-bottom: 20px;
}

.fs-label {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 8px;
  color: #333;
}

.fs-input, .fs-textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
  box-sizing: border-box;
}

.fs-input:focus, .fs-textarea:focus {
  border-color: #007BFF;
  outline: none;
}

.fs-textarea {
  height: 150px;
  resize: vertical;
}

/* Description styling */
.fs-description {
  font-size: 12px;
  color: #777;
  margin-top: 5px;
  font-style: italic;
}

/* Button styling */
.fs-button-group {
  text-align: center;
}

.fs-button {
  background-color: #007BFF;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 6px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.fs-button:hover {
  background-color: #0056b3;
}

.fs-button:focus {
  outline: none;
}
</code>
                    </pre>
                </div>

            </div>
        </div>
    </div>

    <!-- Include the compiled app.js -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- ClipboardJS Initialization Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize ClipboardJS for copy functionality
            var clipboard = new ClipboardJS('.copy-btn');

            // Success event listener to show SweetAlert on successful copy
            clipboard.on('success', function(e) {
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
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to copy code. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });

            // Toggle between HTML and CSS code
            const htmlBtn = document.getElementById('htmlBtn');
            const cssBtn = document.getElementById('cssBtn');
            const htmlCode = document.getElementById('codeBlockHtml');
            const cssCode = document.getElementById('codeBlockCss');

            htmlBtn.addEventListener('click', () => {
                htmlCode.classList.remove('hidden');
                cssCode.classList.add('hidden');
            });

            cssBtn.addEventListener('click', () => {
                htmlCode.classList.add('hidden');
                cssCode.classList.remove('hidden');
            });

            // Default to showing HTML
            htmlCode.classList.remove('hidden');
            cssCode.classList.add('hidden');
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <script>
        // Your custom JS here
        var clipboard = new ClipboardJS('.btn');
    </script>
</x-app-layout>