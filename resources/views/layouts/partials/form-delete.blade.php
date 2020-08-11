<form action="@yield('action')" method="POST">
    <input type="hidden" name="_method" value="DELETE" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <button type="submit" class="btn btn-primary btn-table"><i class="fas fa-trash-alt"></i></button>
</form>
