<!DOCTYPE html>
<html lang="ar">
<head>
    
    @include('layout.head')
    @include('layout.style')
    <title>@yield('title')</title>

</head>
<body>    
    @include('layout.header') 
   
    
    @include('layout.sidebar') 
    <div class="content">
        @yield('content')  
    </div>

    @include('layout.footer') 

    @include('layout.script') 
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('active');
});
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");
    const closeSidebar = document.getElementById("close-sidebar");

    menuToggle.addEventListener("click", function () {
        sidebar.classList.add("active");
    });

    closeSidebar.addEventListener("click", function () {
        sidebar.classList.remove("active");
    });
});

</script>
</body>
</html>



