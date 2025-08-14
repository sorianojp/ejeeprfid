<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="pageBody"
    class="font-sans text-gray-900 antialiased 
    @if (session('status')) bg-green-500 
    @elseif($errors->any()) bg-red-500 
    @else bg-gray-100 @endif">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-lg my-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div id="statusBox" class="text-xl">
                <x-auth-session-status :status="session('status')" />
                <x-auth-validation-errors />
            </div>

            <form method="POST" action="{{ route('attendances.store') }}" class="w-full my-2">
                @csrf
                <x-text-input type="text" id="student_no" name="rfid" placeholder="Scan your RFID" autofocus
                    autocomplete="off" />
            </form>
        </div>
    </div>

    @if (session('status') || $errors->any())
        <script>
            setTimeout(() => {
                // Restore background
                const body = document.getElementById('pageBody');
                body.classList.remove('bg-green-500', 'bg-red-500');
                body.classList.add('bg-gray-100');

                // Remove status box
                const statusBox = document.getElementById('statusBox');
                if (statusBox) {
                    statusBox.remove();
                }
            }, 3000);
        </script>
    @endif
</body>




</html>
