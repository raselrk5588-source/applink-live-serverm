<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ config('app.site_name', 'Applink') }}">
    <meta name="author" content="{{ config('app.site_name', 'Applink') }}">
    
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">
    <title>Register - {{ config('app.name', 'Applink') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0f172a;
            background-image: 
                radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            padding: 2rem 0; /* padding so it scrolls nicely on mobile */
        }
        .bg-shapes { position: fixed; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: 1; pointer-events: none; }
        .shape { position: absolute; filter: blur(80px); opacity: 0.6; }
        .shape-1 { width: 400px; height: 400px; background: #4f46e5; top: -100px; left: -100px; border-radius: 50%; }
        .shape-2 { width: 500px; height: 500px; background: #ec4899; bottom: -150px; right: -100px; border-radius: 50%; }
        
        .login-container {
            position: relative; z-index: 10; width: 100%; max-width: 540px; padding: 2.5rem 2rem; margin: 1rem;
            background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        @keyframes slideUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }

        .login-header { text-align: center; margin-bottom: 2rem; }
        .login-header h2 { color: #ffffff; font-size: 1.85rem; font-weight: 700; letter-spacing: -0.025em; margin-bottom: 0.5rem; }
        .login-header p { color: #94a3b8; font-size: 0.95rem; }
        .login-header strong { color: #fff; font-weight: 600; }

        .form-row { display: flex; gap: 1rem; }
        .form-row .form-group { flex: 1; }
        @media (max-width: 480px) { .form-row { flex-direction: column; gap: 0; } }

        .form-group { margin-bottom: 1.25rem; position: relative; }
        .form-label { display: block; color: #cbd5e1; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem; }
        .input-group { position: relative; display: flex; align-items: center; }
        .input-group i { position: absolute; left: 1rem; color: #64748b; transition: color 0.3s ease; font-size: 1.1rem; z-index: 5;}
        
        .form-control, select.form-control {
            width: 100%; padding: 0.8rem 1rem 0.8rem 2.75rem; background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; color: #ffffff; font-size: 0.95rem;
            transition: all 0.3s ease; appearance: none;
        }
        select.form-control { padding-left: 1rem; cursor: pointer; }
        select.form-control option { background: #0f172a; color: #fff; }
        .form-control::placeholder { color: #64748b; }
        .form-control:focus { outline: none; border-color: #6366f1; background: rgba(15, 23, 42, 0.8); box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15); }
        .form-control:focus + i, .form-control:focus ~ i { color: #6366f1; }
        .form-control.is-invalid { border-color: #ef4444; }
        .invalid-feedback { color: #ef4444; font-size: 0.85rem; margin-top: 0.5rem; display: block; animation: fadeIn 0.3s ease; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        .btn-submit {
            width: 100%; padding: 0.875rem; background: linear-gradient(135deg, #ec4899 0%, #be185d 100%);
            color: #ffffff; border: none; border-radius: 12px; font-size: 1.05rem; font-weight: 600; cursor: pointer;
            transition: all 0.3s ease; box-shadow: 0 4px 14px 0 rgba(236, 72, 153, 0.39); display: flex; align-items: center; justify-content: center; gap: 0.5rem; margin-top: 1rem;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(236, 72, 153, 0.5); background: linear-gradient(135deg, #be185d 0%, #9f1239 100%); }
        .btn-submit:active { transform: translateY(1px); }
        
        .action-links { display: flex; flex-direction: column; align-items: center; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid rgba(255, 255, 255, 0.08); }
        .action-links a { color: #cbd5e1; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.3s ease; }
        .action-links a:hover { color: #ffffff; }
        .action-links .login-link { color: #38bdf8; }
        .action-links .login-link:hover { color: #7dd3fc; }
    </style>
</head>
<body>

    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="login-container">
        <div class="login-header">
            <h2>Create an Account</h2>
            <p>Register to <strong>{{ config('app.name', 'RTSquad') }}</strong></p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <div class="input-group">
                    <i class="fa-solid fa-user"></i>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your full name" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="phone">Phone</label>
                    <div class="input-group">
                        <i class="fa-solid fa-phone"></i>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone number" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="email">E-Mail Address</label>
                    <div class="input-group">
                        <i class="fa-solid fa-envelope"></i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="university_id">University Name</label>
                @php $university = \App\University::orderBy("name","asc")->get(); @endphp
                <div class="input-group">
                    <select name="university_id" id="university_id" required class="form-control @error('university_id') is-invalid @enderror">
                        <option value="">--Select University--</option> 
                        @foreach ($university as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option> 
                        @endforeach
                    </select>
                </div>
                @error('university_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    </div>
                    @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password-confirm">Confirm</label>
                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <span>Create Account</span>
                <i class="fa-solid fa-user-plus"></i>
            </button>

            <div class="action-links">
                <a href="{{ route('login') }}" class="login-link">
                    Already have an account? Sign in here <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </form>
    </div>

</body>
</html>
