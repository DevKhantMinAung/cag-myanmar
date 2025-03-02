<div x-data="dropdown">
    <livewire:nav-bar />
    <livewire:hero lazy />

    {{-- Hero Section --}}
    <div class="wrapper h-[50vh] min-[1025px]:h-screen">
        <div class="swiper hero-swiper h-full w-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper ">
                <!-- Slides -->
                {{-- @if ($sliders)
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide" class="w-full h-full">
                            <img class=" bg-cover bg-center" src="/storage/{{ $slider->image }}" alt="bg-image">
                        </div>
                        @endforeach
                        @endif --}}
                        <div class="swiper-slide" class="w-full h-full">
                            <img class=" bg-cover bg-center" src="https://images.pexels.com/photos/433308/pexels-photo-433308.jpeg?auto=compress&cs=tinysrgb&w=1280" alt="bg-image">
                        </div>
                        <div class="swiper-slide" class="w-full h-full">
                            <img class=" bg-cover bg-center" src="https://images.pexels.com/photos/433308/pexels-photo-433308.jpeg?auto=compress&cs=tinysrgb&w=1280" alt="bg-image">
                        </div>
                        <div class="swiper-slide" class="w-full h-full">
                            <img class=" bg-cover bg-center" src="https://images.pexels.com/photos/433308/pexels-photo-433308.jpeg?auto=compress&cs=tinysrgb&w=1280" alt="bg-image">
                        </div>
                    </div>
        </div>
    </div>


    {{-- About Section --}}
    <section id="about" class="wrapper w-screen cag_container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 items-center">
            <div>
                <h1 class="section-title">About <span>Us</span></h1>
                <p class="text-dark_gray tracking-wide text-justify text-sm/6 lg:text-base/7">
                    {{ $about->desc }}
                </p>
            </div>
            <div class="aspect-[1/1] p-4 overflow-hidden">
                @if ($about->image)
                    <img class="w-full h-full bg-cover bg-center" src="/storage/{{ $about->image }}" alt="about-image">
                @else
                    <div class="w-full h-full bg-white"></div>
                @endif
            </div>
        </div>
    </section>

    {{-- Our Companies Section --}}
    <div id="companies" class="wrapper section text-center">
        <div>
            <h1 class="section-title"><span>Our</span> Companies</h1>
            <p class="section-intro">Lorem ipsum, dolor sit amet consectetur
                adipisicing elit.
                Eos in eum numquam! Iusto optio aliquam tenetur reiciendis aspernatur doloremque sed!</p>
        </div>


        <div class="flex flex-wrap gap-4 md:max-w-[900px] mx-auto justify-center items-center">
            @if ($companies)
                @foreach ($companies as $company)
                    <div class="w-[150px] md:w-[200px]">
                        <button
                            @click='openModal({name: "{{ $company->name }}", logo: "{{ $company->logo }}", desc: "{{ $company->desc }}", url: "{{ $company->url }}"})'
                            :disabled="modal">
                            <img class="bg-center" src={{ '/storage/' . $company->logo }} alt="logo">
                        </button>
                    </div>
                @endforeach
            @endif
        </div>

    </div>

    {{-- Our Services --}}
    @if ($services)
        <div id="services" class="section text-center">
            <h1 class="section-title"><span>Our</span> Services</h1>
            <p class="section-intro">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam quae earum
                odit,
                voluptate odio enim quia obcaecati qui iure facilis?</p>

            <div
                class="mx-auto min-w-[1281px]:px-[100px] flex justify-center items-center flex-wrap gap-6 md:gap-8 xl:gap-10 py-8">
                @foreach ($services as $service)
                    <div class="w-[150px] sm:w-[180px] md:[200px] lg:w-[270px] border border-slate-200 p-3 rounded-lg transition-all duration-150 ease-linear origin-top hover:border-cag_green hover:shadow-lg shadow-cag_green cursor-pointer"
                        @click="openServiceModal({name: '{{ $service->name }}', intro: '{{ $service->intro }}', icon: '{{ $service->icon }}'})">
                        <div class="div text-center w-[60px] sm:w-[80px] lg:w-[100px] mx-auto mb-6">
                            {!! $service->icon ? $service->icon : '' !!}
                        </div>
                        <h1
                            class="text-dark_gray text-base lg:text-lg font-semibold lg:font-bold text-wrap text-center min-h-[58px]">
                            {{ $service->name ? $service->name : '' }}
                        </h1>
                    </div>
                @endforeach
            </div>

        </div>
    @endif

    {{-- Profile Section --}}
    @if ($excutive_profile)
        <div id="profile" class="section text-center">
            <h1 class="section-title"><span>Excutive</span> Profile </h1>
            <p class="section-intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro libero</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-8 md:px-20 mt-8 lg:mt-16">
                <div class="w-full flex justify-center sm:justify-end items-center">
                    <div class="w-full max-w-[600px] rounded-lg overflow-hidden">
                        <img class="h-full w-full bg-cover bg-center"
                            src="{{ '/storage/' . $excutive_profile->image }}" alt="excutive_profile">
                    </div>
                </div>
                <div class="text-start space-y-4 sm:space-y-6 flex flex-col justify-center p-4">
                    <h3 class="text-xl sm:text-2xl xl:text-4xl text-slate-900 font-bold">{{ $excutive_profile->name }}</h3>
                    <div>
                        <h5 class="text-slate-600 text-sm sm:text-lg xl:text-xl font-bold">{{ $excutive_profile->title1 }}</h5>
                        <h5 class="text-slate-600 text-sm sm:text-lg xl:text-xl font-bold">{{ $excutive_profile->title2 }}</h5>
                    </div>
                    <p class="text-sm/6 sm:text-base/8 text-justify sm:text-start text-slate-800">{{ $excutive_profile->desc }}</p>
                </div>
            </div>
        </div>
    @endif

    {{-- Footer Section --}}
    
    <Footer class=" bg-white pt-4 sm:pt-6 md:pt-8 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] border border-slate-200 relative">
        <div class="cag_container py-4 sm:py-6 md:py-8">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-8 py-4">
                <div class="space-y-6 col-span-2 border-b sm:border-0 border-slate-200 py-6">
                    <div>
                        <a href="#"><img class="w-20 " src="/logo/logo.png" alt=""></a>
                    </div>

                    <ul class="space-y-4">
                        <li class="flex gap-6">
                            <div class="max-w-12 text-cag_green">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                  </svg>
                                  
                            </div>
                            <div>
                                <a href="">Building (2), SH-B6, Malikha Housing, Yadanar Road, Thingangyun Township, Yangon, Myanmar</a>
                            </div>
                        </li>
                        <li class="flex gap-6">
                            <div class="max-w-12 text-cag_green">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                  </svg>                                  
                                  
                            </div>
                            <div>
                                <a href="mailto:">info@cagengineering.com</a>
                            </div>
                        </li>
                        <li class="flex gap-6">
                            <div class="max-w-12 text-cag_green">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                  </svg>
                                  
                                  
                            </div>
                            <div>
                                <a tel="+95 9 257 070 200">+95 9 257 070 200</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="space-y-6 py-6">
                    <h3 class="text-lg font-semibold text-slate-900">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-800 hover:text-cag_green transition-colors">Home</a></li>
                        <li><a href="#about" class="text-slate-800 hover:text-cag_green transition-colors">About</a></li>
                        <li><a href="#companies" class="text-slate-800 hover:text-cag_green transition-colors">Companies</a></li>
                        <li><a href="#services" class="text-slate-800 hover:text-cag_green transition-colors">Services</a></li>
                        <li><a href="#records" class="text-slate-800 hover:text-cag_green transition-colors">Records</a></li>
                    </ul>
                </div>

                <div class="space-y-6 py-6">
                    <h3 class="text-lg font-semibold text-slate-900">Follow Us</h3>
                    <ul class="flex gap-4">
                        <li><a href="#" class="text-slate-800 hover:text-cag_green transition-colors">
                            <svg class="w-8 sm:w-10" fill="#1b25b6" viewBox="-5.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>facebook</title> <path d="M1.188 5.594h18.438c0.625 0 1.188 0.563 1.188 1.188v18.438c0 0.625-0.563 1.188-1.188 1.188h-18.438c-0.625 0-1.188-0.563-1.188-1.188v-18.438c0-0.625 0.563-1.188 1.188-1.188zM14.781 17.281h2.875l0.125-2.75h-3v-2.031c0-0.781 0.156-1.219 1.156-1.219h1.75l0.063-2.563s-0.781-0.125-1.906-0.125c-2.75 0-3.969 1.719-3.969 3.563v2.375h-2.031v2.75h2.031v7.625h2.906v-7.625z"></path> </g></svg>   
                        </a></li>
                        <li><a href="#" class="text-slate-800 hover:text-cag_green transition-colors">
                            <svg class="w-8 sm:w-10" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#0A66C2" d="M12.225 12.225h-1.778V9.44c0-.664-.012-1.519-.925-1.519-.926 0-1.068.724-1.068 1.47v2.834H6.676V6.498h1.707v.783h.024c.348-.594.996-.95 1.684-.925 1.802 0 2.135 1.185 2.135 2.728l-.001 3.14zM4.67 5.715a1.037 1.037 0 01-1.032-1.031c0-.566.466-1.032 1.032-1.032.566 0 1.031.466 1.032 1.032 0 .566-.466 1.032-1.032 1.032zm.889 6.51h-1.78V6.498h1.78v5.727zM13.11 2H2.885A.88.88 0 002 2.866v10.268a.88.88 0 00.885.866h10.226a.882.882 0 00.889-.866V2.865a.88.88 0 00-.889-.864z"></path></g></svg>    
                        </a></li>
                        <li><a href="#" class="text-slate-800 hover:text-cag_green transition-colors">
                            <svg class="w-8 sm:w-10" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint0_radial_87_7153)"></rect> <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint1_radial_87_7153)"></rect> <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint2_radial_87_7153)"></rect> <path d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z" fill="white"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z" fill="white"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z" fill="white"></path> <defs> <radialGradient id="paint0_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)"> <stop stop-color="#B13589"></stop> <stop offset="0.79309" stop-color="#C62F94"></stop> <stop offset="1" stop-color="#8A3AC8"></stop> </radialGradient> <radialGradient id="paint1_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)"> <stop stop-color="#E0E8B7"></stop> <stop offset="0.444662" stop-color="#FB8A2E"></stop> <stop offset="0.71474" stop-color="#E2425C"></stop> <stop offset="1" stop-color="#E2425C" stop-opacity="0"></stop> </radialGradient> <radialGradient id="paint2_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)"> <stop offset="0.156701" stop-color="#406ADC"></stop> <stop offset="0.467799" stop-color="#6A45BE"></stop> <stop offset="1" stop-color="#6A45BE" stop-opacity="0"></stop> </radialGradient> </defs> </g></svg>    
                        </a></li>
                        <li><a href="#" class="text-slate-800 hover:text-cag_green transition-colors"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-full text-center text-white text-sm/6 py-2 border-t border-slate-200 bg-cag_green">
            <p>CAG Myanmar &copy; 2025 All Rights Reserved</p>

        </div>

    </Footer>


    {{-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
    {{-- Modal List --}}

    {{-- Companies Popup --}}
    <div class="bg-white fixed w-full max-w-[90%] md:w-[600px] mx-auto left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 p-3 md:p-6 rounded shadow-lg border border-slate-200 text-start z-20 space-y-6"
        x-show="modal" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">

        <button type="button"
            class=" absolute top-3 right-3 p-1 rounded-full shadow border border-slate-200 text-slate-700 hover:scale-110 transition-transform ease-linear"
            @click="closeModal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>

        </button>


        <div class="text-center">
            <img class="w-[150px] md:w-[40%] mx-auto" :src="currentCompany.logo" :alt="currentCompany.name">
        </div>
        <h3 class="text-xl font-semibold mb-4" x-text="currentCompany.name"></h3>
        <p class="text-sm/6 md:text-base/7 text-gray-800 mb-8" x-text="currentCompany.desc"></p>
        <template x-if="currentCompany.url !== ''">
            <p class="text-sm">Visit to : <a class="text-blue-600 underline underline-offset-4"
                    :href="currentCompany.url" x-text="currentCompany.name"></a></p>
        </template>
    </div>


    {{-- Service Popup Modal --}}
    <div class="bg-white/80 fixed w-full h-full left-0 top-0 flex items-center justify-center" x-show="serviceModal"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

        <div
            class="bg-white relative w-full max-w-[90%] md:w-[600px] mx-auto p-3 md:p-6 rounded shadow-lg border-2 border-slate-200 text-start z-20 space-y-6">
            <button type="button"
                class=" absolute top-3 right-3 p-1 rounded-full shadow border border-slate-200 text-slate-700 hover:scale-110 transition-transform ease-linear"
                @click="closeServiceModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="text-center">
                {{-- <img class="w-[150px] md:w-[40%] mx-auto" :src="currentCompany.logo" :alt="currentCompany.name" /> --}}
                <div class="w-[100px] md:w-[40%] mx-auto px-8" x-html="currentService.icon"></div>
            </div>
            <h3 class="text-xl font-semibold mb-4" x-text="currentService.name"></h3>
            <p class="text-sm/6 md:text-base/7 text-gray-800 mb-8" x-text="currentService.intro"></p>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                // Companies Section
                modal: false,
                currentCompany: {
                    name: '',
                    logo: '',
                    desc: '',
                    url: '',
                },
                openModal(currentCompany) {
                    this.modal = true;
                    this.currentCompany = {
                        name: currentCompany.name,
                        logo: "/storage/" + currentCompany.logo,
                        desc: currentCompany.desc,
                        url: currentCompany.url
                    };
                },

                closeModal() {
                    this.modal = false;
                    setTimeout(() => {
                        this.currentCompany = {
                            name: '',
                            logo: '',
                            desc: '',
                            url: ''
                        };
                    }, 300);
                },
                serviceModal: false,
                currentService: {
                    name: '',
                    intro: '',
                    icon: '',
                },
                openServiceModal(currentService) {
                    this.currentService = currentService;
                    this.serviceModal = true;
                },
                closeServiceModal(currentService) {
                    this.serviceModal = false;
                    setTimeout(() => {
                        this.currentService = {
                            name: '',
                            intro: '',
                            icon: ''
                        }
                    }, 300);
                }
            }))
        })
    </script>
</div>
