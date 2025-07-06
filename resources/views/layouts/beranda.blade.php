<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body style="background-color:rgb(127, 186, 241);" class="text-white">

    <!--<div class="flex pt-16">-->
        @yield('sidebar')
        <div class="ml-64 min-h-screen">
            <main class="p-6">
                @yield('content')
            </main>
        </div>
</body>
</html>
