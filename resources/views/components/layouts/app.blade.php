<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/logo/logo.png">
    <title>{{ $title ?? 'CAG Myanmar' }}</title>
    <!-- Swiper CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

</head>

<body>

    <div class="swiper h-[50vh] md:h-screen">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide"><img class="w-full h-full bg-cover bg-center"
            src="https://cdn.pixabay.com/photo/2017/08/01/00/23/panel-2562239_1280.jpg" alt="bg-image"></div>
          <div class="swiper-slide"><img class="w-full h-full bg-cover bg-center"
            src="https://images.pexels.com/photos/9799706/pexels-photo-9799706.jpeg?auto=compress&cs=tinysrgb&w=1280" alt="bg-image"></div>
          <div class="swiper-slide"><img class="w-full h-full bg-cover bg-center"
            src="https://images.pexels.com/photos/137602/pexels-photo-137602.jpeg?auto=compress&cs=tinysrgb&w=1280" alt="bg-image"></div>
          ...
        </div>
        <!-- If we need pagination -->
        {{-- <div class="swiper-pagination"></div> --}}
      
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    
      </div>
        
    </div>

    

    {{ $slot }}

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            autoplay: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    </script>
</body>

</html>
