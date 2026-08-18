<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin CMS - STIKes Panti Waluya Malang</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-stikes-pantiwaluya.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-800 font-sans antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden border border-blue-900">
        <div class="bg-gradient-to-r from-blue-950 via-blue-900 to-navy-950 p-8 text-white text-center relative">
            <div class="w-20 h-20 rounded-2xl bg-white p-2 flex items-center justify-center mx-auto shadow-xl shadow-blue-500/30 mb-4 border border-blue-200">
                <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes Panti Waluya Malang" class="h-16 w-auto object-contain">
            </div>
            <h1 class="font-bold text-2xl tracking-tight">Admin CMS Portal</h1>
            <p class="text-xs text-sky-300 font-medium">STIKes Panti Waluya Malang</p>
        </div>

        <div class="p-8 space-y-6">
            @if($errors->any())
                <div class="bg-red-50 text-red-600 border border-red-200 text-xs rounded-xl p-3 font-semibold">
                    <i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Email Administrator</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email', 'admin@stikespantiwaluya.ac.id') }}" required placeholder="admin@stikespantiwaluya.ac.id" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                        <i class="fa-solid fa-envelope absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" value="password123" required placeholder="••••••••" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                        <i class="fa-solid fa-lock absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs text-slate-600 pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded text-blue-600">
                        <span>Ingat Saya</span>
                    </label>
                    <span class="text-slate-400">Default: password123</span>
                </div>

                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3.5 rounded-xl shadow-lg transition duration-200">
                    Masuk ke Dashboard CMS &rarr;
                </button>
            </form>

            <div class="text-center pt-4 border-t border-slate-100">
                <a href="{{ route('home') }}" class="text-xs text-blue-700 font-bold hover:underline">
                    &larr; Kembali ke Website Utama
                </a>
            </div>
        </div>
    </div>

</body>
</html>
