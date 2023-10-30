@if (session('toast-error'))

    <section class="toast" data-delay="5000">
        <section class="toast-body py-3 d-flex bg-danger text-white">
            <strong class="ml-auto">{{session('toast-error')}}</strong>
            <button class="ml-2 close" type="button" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </section>
    </section>

    <script>
        $(document).ready(function(){
            $('.toast').toast('show');
        })
    </script>
@endif
