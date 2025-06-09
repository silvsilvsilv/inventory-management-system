<div id="toast" class="hidden fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-100 border border-red-300 text-red-800 px-5 py-3 rounded-lg shadow-lg z-50 max-w-xs w-full opacity-0 transition-all duration-300 ease-in-out">
    <div class="flex items-center justify-between gap-4">
        <span id="toast-message" class="text-sm font-medium">Default message</span>
        <button onclick="hideToast()" class="bg-white text-black px-3 py-1 text-xs font-semibold rounded hover:bg-gray-100 transition">
            Okay
        </button>
    </div>
</div>
<script>
    function showToast(message, type = 'error') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');

            toastMessage.textContent = message;

            toast.className = "fixed top-5 left-1/2 transform -translate-x-1/2 px-5 py-3 rounded-lg shadow-lg z-50 max-w-xs w-full flex items-center justify-between gap-4 opacity-0 transition-all duration-300 ease-in-out";

            if (type === 'success') {
                toast.classList.add("bg-green-100", "text-green-800", "border", "border-green-300");
            } else {
                toast.classList.add("bg-red-100", "text-red-800", "border", "border-red-300");
            }

            toast.classList.remove('hidden');
            setTimeout(() => toast.classList.add('opacity-100'), 10); // Fade in
        }

        function hideToast() {
            const toast = document.getElementById('toast');
            toast.classList.remove('opacity-100'); // Fade out
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 300);
        }
</script>

@if(session('status') === 'logged_in')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            showToast('Logged in successfully!', 'success');
        });
    </script>
@endif