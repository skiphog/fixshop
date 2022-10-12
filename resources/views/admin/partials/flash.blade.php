@if(session('success'))
    <div class="toast-container position-fixed top-50 start-50 translate-middle">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="green"></rect></svg>
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">{{ session('success') }}</div>
        </div>
    </div>
    @push('scripts')
        <script>
          const toastLive = document.getElementById('liveToast');
          const toast = new bootstrap.Toast(toastLive);
          setTimeout(function () {toast.show();}, 300);
        </script>
    @endpush
@endif