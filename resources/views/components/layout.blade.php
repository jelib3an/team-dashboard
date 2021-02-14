<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
    rel="stylesheet" />
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
