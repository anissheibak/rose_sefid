@if (session('swal-error'))

    <script>
        $(document).ready(function(){
            Swal.fire({
                title: '!',
                text: '{{session('swal-error')}}',
                icon: 'error',
                confirmButtonText: 'باشه',
            });
        });
    </script>

@endif
