import './bootstrap';

import Alpine from 'alpinejs';


import Swal from 'sweetalert2';
import 'prismjs';
import 'prismjs/themes/prism-funky.css'; // You can change the theme here
import ClipboardJS from 'clipboard';

document.addEventListener("DOMContentLoaded", function () {
    // Initialize ClipboardJS for copy functionality
    var clipboard = new ClipboardJS('.copy-btn');

    // Success event listener to show SweetAlert on successful copy
    clipboard.on('success', function (e) {
        Swal.fire({
            title: 'Success!',
            text: 'Code successfully copied to clipboard!',
            icon: 'success',
            confirmButtonText: 'OK'
        });
        e.clearSelection(); // Clear selection after copying
    });

    // Error event listener (optional)
    clipboard.on('error', function (e) {
        Swal.fire({
            title: 'Error!',
            text: 'Failed to copy code. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});

window.Alpine = Alpine;

Alpine.start();
