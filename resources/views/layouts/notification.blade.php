@if (session('userLoggedIn'))
    <script>
        swal('You are logged in!');
    </script>
@endif