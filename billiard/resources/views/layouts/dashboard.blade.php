<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FORCUE - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fadeInLeft {
            animation: fadeInLeft 1s ease-out forwards;
        }
        .slider-track {
            display: flex;
            justify-content: space-between;
        }
        .slider-item {
            flex: 0 0 auto;
            width: 270px;
            margin: 0 1.25rem;
            border-radius: 12px;
            background-color: #1f2937;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .slider-item:hover {
            transform: translateY(-5px);
        }
        .slider-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-slate-200 font-sans text-slate-800">

    @include('components.header-dashboard')

    @yield('content')

    @include('components.footer-dashboard')

</body>
</html>
