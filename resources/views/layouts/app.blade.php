<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
        <script src="https://18a0-125-160-113-63.ngrok.io/assets/js/push.min.js"></script>
        
        <script>
            var pusher = new Pusher("146f3be07f94ee991506", {
                cluster: "ap1",
                encrypted: true
            });

            // Subscribe to the channel we specified in our Laravel Event
            var channel = pusher.subscribe('manipulation-data');

            // Bind a function to a Event (the full Laravel class)
            channel.bind('App\\Events\\DataManipulation', function(data) {
                
                const tableMahasiswa = document.getElementById('tbody-mahasiswa');
                if (tableMahasiswa) {
                    tableMahasiswa.innerHTML = data.data_mahasiswa;
                }

                Push.create("Tugas Framework", {
                    body: data.message,
                    timeout: 9000,
                });
            });
        </script>
        @stack('javascript')

        @livewireScripts
    </body>
</html>
