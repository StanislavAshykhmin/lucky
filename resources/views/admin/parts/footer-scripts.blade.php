<script src="{{asset('assets/admin/js/app.js')}}"></script>
<script src="{{mix('js/admin/app.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('toast'))
            window.toastSwal('{{session('toast.type')}}', '{{session('toast.text')}}')
        @endif
    });
</script>
