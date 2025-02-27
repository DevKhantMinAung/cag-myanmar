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
        <div class="swiper-wrapper ">
          <!-- Slides -->
          <div class="swiper-slide" class="w-full h-full">
            <img class=" bg-cover bg-center"
            src="/Banner/banner1.jpg" alt="bg-image">
          </div>
          <div class="swiper-slide" class="w-full h-full">
            <img class="bg-cover bg-center"
            src="/Banner/banner2.jpg" alt="bg-image">
          </div>
          <div class="swiper-slide" class="w-full h-full">
            <img class="bg-cover bg-center"
            src="/Banner/banner3.jpg" alt="bg-image">
          </div>
        </div>
    
      </div>
        
    </div>

    

    {{ $slot }}

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,
            autoplay: true,

            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    </script>
</body>

</html>
