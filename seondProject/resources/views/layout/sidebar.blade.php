 <!-- Sidebar -->

<div class="sidebar" id="sidebar">
    <button class="back-btn" id="close-sidebar">←</button>
    <ul>
        <li><a href="/">🏠 Home</a></li>
        <li><a href="/books/create">➕ Add Book</a></li>
        <li><a href="/books">📚 All Books</a></li>
        <li><a href="/author/createe">➕ Add Author</a></li>  
        <li><a href="/author/index">📚 All Authors</a></li>
        <li><a href="/student/createe">➕ Add Student</a></li>
        <li><a href="/student/index">📚 All Student</a></li>
        <li><a href="/categories">📂 Categories</a></li>
        <li><a href="/reports">📊 Reports</a></li>
        <li><a href="/settings">⚙️ Settings</a></li>
        <li>@if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
            </form>
        @endif
        </li>
        
    </ul>
</div>