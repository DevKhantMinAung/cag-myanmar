<div x-data="{mobileMenu: false}" x-cloak>
    <div id="nav-bar" class="fixed w-full left-0 top-0 rounded-b-md transition-all duration-300 ease-linear z-40">
        <div class="d_container py-4 flex justify-between items-center">
            <div>
                <div class="w-[80px] sm:w-[100px] lg:w-[120px]">
                    <img class="w-full h-full bg-cover bg-center" src="/logo/logo.png" alt="logo">
                </div>
            </div>
            <nav class="hidden md:flex gap-4 font-semibold text-cag_dark">
                <div class="active_nav"><a href="#">Home</a></div>
                <div><a href="#about">About</a></div>
                <div><a href="#companies">Companies</a></div>
                <div><a href="#services">Services</a></div>
                <div><a href="#records">Records</a></div>
            </nav>
            <div class="block md:hidden">
                <button type="button" @click="mobileMenu = true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                      </svg>              
                </button>
            </div>  
        </div>
    </div>


    <div class="fixed top-0  w-full sm:w-1/2 h-screen bg-white rounded-s p-6 text-center shadow border border-slate-200 z-50 transition-all duration-300 ease-linear" :class="mobileMenu ? 'right-0': '-right-full'" id="mobile-menu">   
        <div class="flex justify-end">
            <button type="button" @click="mobileMenu = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75l10.5 10.5M17.25 6.75L6.75 17.25" />
                  </svg>              
            </button>
        </div>
        <nav class="flex flex-col gap-4 font-semibold text-cag_dark mt-4">
            <div class="active_nav
            "><a href="#" @click="mobileMenu = false">Home</a></div>
            <div><a href="#about" @click="mobileMenu = false">About</a></div>
            <div><a href="#companies" @click="mobileMenu = false">Companies</a></div>
            <div><a href="#services" @click="mobileMenu = false">Services</a></div>
            <div><a href="#records" @click="mobileMenu = false">Records</a></div>
        </nav>
    </div>



    <a href="#" id="go-top" class="hidden fixed bottom-6 right-6 p-3 rounded-full bg-cag_green text-white hover:bottom-7 transition-all duration-300 ease-linear">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
          </svg>          
    </a>
        

</div>