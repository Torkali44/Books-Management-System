
 <!-- Navbar -->
 <div class="navbar">
    <i class="fas fa-bars menu-icon" id="menu-toggle"></i>
    <h1>Book Management System</h1>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('books.create') }}">Add Book</a></li>
            <li><a href="{{ route('books.index') }}">All Books</a></li>
            <li><a href="{{ route('author.create') }}">Add Author</a></li>
            <li><a href="{{ route('author.index') }}">All Author</a></li>
            <li><a href="{{ route('student.create') }}">Add Student</a></li>
            <li><a href="{{ route('student.index') }}">All Student</a></li>
            <li>@if(Auth::check())
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">logout </button>
                </form>
            @endif
            </li>

            
        </ul>
    </nav>
</div>
    