<header>
    <div class="container">
        <h1>Book Management System</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('books.create') }}">Add Book</a></li>
                <li><a href="{{ route('books.index') }}">All Books</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
