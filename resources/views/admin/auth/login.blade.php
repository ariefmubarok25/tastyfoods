<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 sm:p-8">

        <h1 class="text-xl sm:text-2xl font-bold text-center text-gray-800 mb-6">
            Login Admin
        </h1>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            {{-- Username --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1 text-sm">
                    Username
                </label>
                <input
                    type="text"
                    name="username"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                >
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1 text-sm">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                >
            </div>

            {{-- Button --}}
            <button
                type="submit"
                class="w-full bg-gray-800 text-white py-2.5 rounded-lg hover:bg-gray-900 transition font-semibold"
            >
                Login
            </button>
        </form>

    </div>

</body>
</html>
