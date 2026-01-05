<h1>Hello world</h1>

<form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit">Logout</button>
</form>