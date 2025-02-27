<div>
    <livewire:nav-bar />
    <livewire:hero lazy />

    {{-- About Section --}}
    <section id="about" class="w-screen d_container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 items-center">
            <div>
                <h1 class="section-title">About <span>Us</span></h1>
                <p class="text-dark_gray tracking-wide text-justify text-sm/6 lg:text-base/7">Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Ab, magnam! Perspiciatis sapiente ea non quis quasi sed quaerat hic
                    veniam asperiores dolorem eum ad est exercitationem beatae odio, eaque quas placeat tempore ratione
                    error voluptatem maxime harum. Earum labore iusto porro, quo harum vel voluptas reiciendis eligendi
                    quam. Praesentium voluptatem aliquid, eaque odit omnis modi nisi quas perspiciatis facilis earum
                    quibusdam quae accusantium possimus eum perferendis velit, animi deleniti tenetur, corrupti et!
                    Corporis accusantium consectetur sit, ipsum quibusdam ea porro beatae dolorum quidem adipisci ab
                    impedit culpa ipsam perferendis suscipit, praesentium vitae eum, aut nemo minima laboriosam.
                    Officia, nostrum ab.</p>
            </div>
            <div class="aspect-[1/1] p-4 overflow-hidden">
                <img class="w-full h-full bg-cover bg-center"
                    src="https://img.freepik.com/free-vector/butterfly-colorful-logo-template_361591-1587.jpg?semt=ais_hybrid"
                    alt="about-image">
            </div>
        </div>
    </section>

    {{-- Our Companies Section --}}
    <div id="companies" class="section text-center" x-data="{ openPopUp: false }">
        <div>
            <h1 class="section-title"><span>Our</span> Companies</h1>
            <p class="w-[80%] sm:w-[70%] md:w-[60%] mx-auto">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Eos in eum numquam! Iusto optio aliquam tenetur reiciendis aspernatur doloremque sed!</p>
        </div>


        {{-- Detail Popup --}}
        <div class="bg-white fixed w-[600px] left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 px-6 py-6 rounded shadow-lg border border-slate-200 text-start z-20 space-y-6"
            x-show="openPopUp" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">

            <button type="button"
                class=" absolute top-3 right-3 p-1 rounded-full shadow border border-slate-200 text-slate-700 hover:scale-110 transition-transform ease-linear"
                @click="openPopUp = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>

            </button>


            <div class="text-center">
                <img class="w-[40%] mx-auto" src="/com_logo/cag_group_of_companies.png" alt="cag">
            </div>
            <h3 class="text-xl font-semibold mb-4">CAG Group of Companies Co.,Ltd</h3>
            <p class="text-sm/6 md:text-base/7 text-gray-800 mb-8">Lorem ipsum, dolor sit amet consectetur adipisicing
                elit. Est, necessitatibus sunt consectetur quo non natus sed similique quod provident aut vitae iure?
                Quibusdam molestias nam labore, reiciendis illo impedit neque.</p>
            <p class="text-sm">Visit to : <a class="text-blue-600 underline underline-offset-4"
                    href="https://cagenginnering.com"> CAG
                    Group of Companies Co.,Ltd</a></p>
        </div>

        <div class="flex flex-wrap gap-4 md:max-w-[900px] mx-auto justify-center items-center">
            @if ($companies)
                @foreach ($companies as $company)
                    <div class="w-[200px]">
                        <button @click="openPopUp = true; $nextTick(() => { console.log('log') }) "  :disabled="openPopUp">
                            <img class="bg-center" src={{ '/storage/' . $company->logo }} alt="logo">
                        </button>
                    </div>
                @endforeach
            @endif
            <div class="w-[200px]">
                <img class="bg-center" src="/com_logo/cag_engineering.png" alt="logo">
            </div>
            <div class="w-[200px]">
                <img class="bg-center w-full h-full" src="/com_logo/cag_event_managment.png" alt="logo">
            </div>
            <div class="w-[200px]">
                <img class="bg-center w-full h-full" src="/com_logo/cag_marketing.png" alt="logo">
            </div>
            <div class="w-[200px]">
                <img class="bg-center w-full h-full" src="/com_logo/cag_media_house.png" alt="logo">
            </div>
            <div class="w-[200px]">
                <img class="bg-center w-full h-full" src="/com_logo/cag_medical.png" alt="logo">
            </div>
            <div class="w-[200px]">
                <img class="bg-center w-full h-full" src="/com_logo/myanmar_may.png" alt="logo">
            </div>
            <div class="w-[200px]">
                <img class="bg-center w-full h-full" src="/com_logo/shwe_myoh.png" alt="logo">
            </div>
            <div class="w-[200px]">
                <img class="bg-center w-full h-full" src="/com_logo/shwe_zay_zay.png" alt="logo">
            </div>
        </div>

    </div>
</div>
