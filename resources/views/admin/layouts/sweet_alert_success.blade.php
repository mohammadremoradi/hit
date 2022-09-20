@if (session('swal-success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: "{{ __('success message') }} ",
                // text: '{{ session('swal-success') }}',
                icon: 'success',
                confirmButtonText: " {{ __('okey') }}",
            });
        });
    </script>
@endif
