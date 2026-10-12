<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | HOK Academy</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #071d3a 0%, #0a2e5c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            max-width: 440px;
            width: 100%;
            padding: 2.5rem;
        }

        .login-brand {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-brand img {
            height: 60px;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .login-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #071d3a;
            margin-bottom: 4px;
        }

        .login-sub {
            color: #64748b;
            font-size: 0.9rem;
        }

        .btn-hok-login {
            background: #071d3a;
            color: #fff;
            font-weight: 700;
            padding: 0.8rem;
            border-radius: 10px;
            border: none;
            width: 100%;
            transition: all 0.2s;
        }

        .btn-hok-login:hover {
            background: #0f3d7a;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-brand">
        <div class="d-inline-block p-2 rounded-3 bg-white shadow-sm border mb-3" style="border-color: rgba(212, 175, 55, 0.4) !important;">
            <img src="{{ asset('assets/img/hok-logo-hq.png') }}" alt="HOK Logo" style="height: 52px; width: auto; object-fit: contain;">
        </div>
        <h1 class="login-title" style="letter-spacing: -0.5px;">HOK <span style="color: #c59b27; font-family: Georgia, serif; font-style: italic;">Academy</span></h1>
        <p class="login-sub">Executive Administration Portal</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success py-2 small rounded-3 mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger py-2 small rounded-3 mb-3">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label small fw-bold text-navy">Email Address</label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control form-control-lg fs-6 @error('email') is-invalid @enderror" 
                       placeholder="admin@hokacademy.com" value="{{ old('email', 'admin@hokacademy.com') }}" required autofocus>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label small fw-bold text-navy">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control form-control-lg fs-6 @error('password') is-invalid @enderror" 
                       placeholder="••••••••" value="admin123" required>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                <label class="form-check-label small text-muted" for="remember">Remember me</label>
            </div>
            <a href="{{ route('home') }}" class="small text-decoration-none text-muted">Back to site</a>
        </div>

        <button type="submit" class="btn-hok-login">
            Sign In to Dashboard <i class="bi bi-arrow-right ms-2"></i>
        </button>
    </form>

    <div class="mt-4 pt-3 border-top text-center text-muted small">
        Default credentials: <code>admin@hokacademy.com</code> / <code>admin123</code>
    </div>
</div>

</body>
</html>

