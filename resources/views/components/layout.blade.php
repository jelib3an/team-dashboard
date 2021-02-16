<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
  <title>Team Dashboard</title>
  @livewireStyles
</head>

<body>
  {{ $slot }}
  @livewireScripts
  <script
    src="https://cdn.jsdelivr.net/combine/npm/alpinejs@2.8.0,npm/jquery@3.5.1,npm/select2@4.1.0-rc.0"
    defer>
  </script>
  @stack('scripts')
</body>

</html>
