<h1>Login</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>

    @if(session('errors'))
        <div>
            @foreach(session(key: 'errors') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <button type="submit">Login</button>
</form>