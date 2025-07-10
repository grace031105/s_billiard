<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
   <!-- Flowbite CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#D7E6F4] font-sans text-[#1F3C5A]">
  @include('components.header-resi')

  <main class="max-w-xl mx-auto py-10">
    @yield('content')
  </main>

  @include('components.footer-resi')
  @stack('scripts')

</body>
</html>
