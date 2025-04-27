<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://tailwindcss-3.4.1.js" rel="stylesheet">
</head>
<body class="bg-cover bg-center" style="background-image: url('{{ asset('images/gambar1.jpg') }}');">
    <div class="min-h-screen flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h2>
            <form method="POST" action="/login">
                @csrf
                <div class="mb-4">
                    <input type="text" name="username" placeholder="Username" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-6">
                    <input type="password" name="password" placeholder="Password" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full p-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Login</button>
            </form>
        </div>
    </div>
</body>
</html>