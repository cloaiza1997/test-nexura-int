<!DOCTYPE html>
<html lang="es">

@include("layouts.partials.header")

<body>

    <header class="content">
        <h1>CRUD de Empleados</h1>
    </header>

    <br/>

    <div class="content">
        @yield("content")
    </div>

    <br/>

    <footer class="content">
        Prueba de Desarrollo - Nexura Internacional S.A.S
        <br/>
        Desarrollado por Cristian Loaiza
        <br/>
        &copy; 2020
    </footer>

    @include("layouts.partials.scripts")

</body>
</html>
