<div x-data="dropdown">
    <livewire:nav-bar />
    <livewire:hero lazy />

    {{-- Hero Section --}}
    <div class="h-[50vh] min-[1025px]:h-screen">
        <div class="swiper hero-swiper h-full w-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper ">
                <!-- Slides -->
                @if ($sliders)
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide" class="w-full h-full">
                            <img class=" bg-cover bg-center" src="/storage/{{ $slider->image }}" alt="bg-image">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    {{-- About Section --}}
    <section id="about" class="w-screen d_container">
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
    <div id="companies" class="section text-center">
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
