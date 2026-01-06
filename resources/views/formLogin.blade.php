<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow">
            <h3 class="text-center mb-4">Login</h3>
            
            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn w-100">Login</button>
            </form>
            
            <div class="mt-3 text-center">
                <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
            </div>
        </div>
    </div>
    <style>
        .card{
            width: 400px;
            border-radius: 20px;
        }
        .btn{
            background-color: oklch(0.550 0.170 149.214);
            border: none;
        }
        .btn:hover {
        background-color: oklch(0.500 0.170 149.214); /* Sedikit lebih gelap */
        color: white;
    }
    </style>
</body>
</html>