@if (session('message'))
    <div id="message">
        <br />
        <div class="message msg_{{ session('type_message') }}">
            {{ session('message') }}
        </div>
    </div>
    <script>
        setTimeout(() => {
            $("#message").hide();
        }, 5000);
    </script>
@endif
