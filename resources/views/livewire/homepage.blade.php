<div>
    <section id="home" class="section-hero bg-[#f6f8ff] relative">
        <img class="shape1 absolute w-12 left-72 bottom-36 parallax sm:block hidden"
             src="{{asset('assets/borox')}}/assets/img/shape/shape-1.png" alt="shape-1">
        <img class="shape2 absolute w-12 top-72 right-32 parallax top sm:block hidden"
             src="{{asset('assets/borox')}}/assets/img/shape/shape-2.png" alt="shape-2">
        <img class="shape3 absolute w-12 top-48	left-96 parallax left top sm:block hidden"
             src="{{asset('assets/borox')}}/assets/img/shape/shape-3.png"
             alt="shape-3">
        <img class="shape4 absolute w-6 bottom-72 left-24 parallax left sm:block hidden"
             src="{{asset('assets/borox')}}/assets/img/shape/shape-4.png"
             alt="shape-4">
        <img class="shape5 absolute w-12 bottom-48 right-12 parallax bottom sm:block hidden"
             src="{{asset('assets/borox')}}/assets/img/shape/shape-5.png"
             alt="shape-5">
        <div
            class="flex flex-wrap justify-between items-center mx-auto mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] md:max-w-[720px] sm:max-w-[540px] py-[80px] px-4">
            <div
                class="w-full 2xl:h-[90vh] lg:h-[80vh] h-[70vh] max-[320px]:h-[50vh] flex items-center px-2 2xl:max-w-lg xl:max-w-lg lg:max-w-lg lg:w-1/2 lg:mx-0 md:max-w-lg md:w-1/2 md:mx-0 2xl:w-1/2 xl:w-1/2 sm:items-center"
                data-aos="fade-up" data-aos-duration="2000">
                <div class="text-center 2xl:text-left xl:text-left lg:text-left md:text-left h-72">
                    <span class="text-[#7963e0] text-[18px] font-bold">ORGANISASI</span>
                    @php($homepage = \App\Helpers\Homepage::homepage())
                    <h1
                        class="text-dark-800 2xl:text-[60px] xl:text-[55px] lg:text-[50px] md:text-[45px] text-[40px] font-bold">
                        {{$homepage['nama_organisasi']}}
                    </h1>
                    <h2 class="py-2 mt-2 text-dark-800 text-[20px] font-bold">
                        <smal>SEJAK TAHUN</smal>
                        <p>
                            {{$homepage['tahun_berdiri']}}
                        </p>
                    </h2>
                    <p class="pt-2 text-gray-500 text-base">
                        {{$homepage['deskripsi']}}
                    </p>
                </div>
            </div>
            <div class="w-1/2 hidden px-2 2xl:block xl:block lg:block md:block z-10">
                <img src="{{asset('banner.png')}}" alt="girl" class="max-h-full">
            </div>
        </div>
        <div class="relative">
            <img src="{{asset('assets/borox')}}/assets/img/shape/hero-shape.png" alt="hero-shape"
                 class="absolute bottom-0 left-0 right-0 w-full z-10 bg-center bg-cover">
        </div>
    </section>

    <!-- service -->
    <section id="organisasi" class="2xl:py-[80px] py-[70px] bg-white relative">
        <div data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
            <img src="{{asset('assets/borox')}}/assets/img/shape/shape-6.png" alt="shape"
                 class="absolute w-12 h-12 top-28 right-40">
        </div>
        <div class="banner text-center mb-[30px] px-6" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
            <h2
                class="text-center mt-[5px] 2xl:text-[35px] xl:text-[33px] lg:text-[30px] md:text-[26px] sm:text-[24px] text-[22px] font-bold">
                Daftar <span class="text-[#7963e0]">Organisasi</span></h2>
        </div>
        <div
            class="flex flex-wrap justify-between items-center mx-auto mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] md:max-w-[720px] sm:max-w-[540px] max-[320px]:px-[12px] px-6">
            <div class="grid lg:grid-cols-3 md:grid-cols-1 gap-[30px] w-full">
                @forelse(\App\Helpers\Homepage::getOrganisasi() as $key => $organisasi)
                    <div class="transition-all rounded flex justify-start items-start" data-aos="fade-up"
                         data-aos-duration="2000" data-aos-delay="300">
                        <div class="pr-6 border-r border-[#7963e0] max-[480px]:hidden">
                            <h6 class="2xl:text-[50px] lg:text-[40px] text-[35px] font-bold text-[#7963e0] 2xl:w-[60px] xl:w-[60px] lg:w-[50px] w-[40px] opacity-50">
                                {{ str_pad($key + 1, 3, '0', STR_PAD_LEFT) }}
                            </h6>
                        </div>
                        <div class="pl-6 border-l">
                            <div class="flex">
                                <img src="{{asset('assets/borox')}}/assets/img/service/icon-1.png" alt="service-1">
                            </div>
                            <h4 class="text-[20px] pt-6 font-bold">{{$organisasi->nama_organisasi}}</h4>
                            <p class="pt-2 text-[#777] text-[15px] leading-[28px]">
                                Jumlah Anggota : {{$organisasi->jumlah_anggota}}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center w-full lg:col-span-3 py-[20em] md:col-span-1">
                        <p class="text-gray-500">Tidak ada organisasi yang terdaftar.</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div
            class="2xl:border-b 2xl:pt-24 lg:border-b lg:pt-12 pt-0 flex flex-wrap justify-between items-center mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] md:max-w-[720px] sm:max-w-[540px] px-6"
            data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300"></div>
    </section>

    <!-- about -->
    <section id="about" class="bg-white 2xl:pb-[80px] pb-[70px]">
        <div
            class="flex flex-wrap justify-between items-center mx-auto mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] md:max-w-[720px] sm:max-w-[540px] max-[320px]:px-[12px]">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] px-6 max-[320px]:px-[0px]">
                <div class="transition-all relative" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                    <img src="{{asset('assets/borox')}}/assets/img/shape/shape-6.png" alt="shape-6"
                         class="absolute w-12 top-2.5 left-2.5">
                    <img src="{{asset('homepage.png')}}" alt="about-img-1"
                         class="w-full rounded-lg">
                    <img src="{{asset('assets/borox')}}/assets/img/shape/shape-7.png" alt="shape-7"
                         class="absolute w-12 bottom-5 right-2.5">
                </div>
                <div class="transition-all" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                    <div class="banner mb-[30px]">
                        <span class="text-[14px] text-[#777]">TENTANG KAMI</span>
                        <h2
                            class="mt-[5px] 2xl:text-[35px] xl:text-[33px] lg:text-[30px] md:text-[26px] sm:text-[24px] text-[22px] font-bold">
                            Organisasi <span class="text-[#7963e0]">{{$homepage['nama_organisasi']}}</span></h2>
                    </div>
                    <p class="text-[16px] text-[#777] mb-[30px]">
                        {{$homepage['deskripsi']}}
                    </p>
                    @php($ketua = $homepage['ketua'])
                    <div class="border p-[24px] rounded-lg">
                        <div class="box-border flex justify-between max-[400px]:block">
                            <div class="left">
                                <div class="name">
                                    <span class="text-[16px] leading-[28px] font-bold">Ketua Umum :</span><br>
                                    <span
                                        class="detail text-[14px] leading-[28px] text-[#777]">{{$ketua['nama_anggota']}} </span>
                                </div>
                                <div class="age pt-[20px]">
                                    <span class="text-[16px] leading-[28px] font-bold">Tahun Berdiri :</span><br>
                                    <span
                                        class="detail text-[14px] leading-[28px] text-[#777]">{{$homepage['tahun_berdiri']}}</span>
                                </div>
                                <div class="age pt-[20px]">
                                    <span
                                        class="text-[16px] leading-[28px] font-bold">Jumlah Organisasi yang dinaungi :</span><br>
                                    <span
                                        class="detail text-[14px] leading-[28px] text-[#777]">{{$homepage['jumlah_organisasi']}}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="ph">
                                    <span class="text-[16px] leading-[28px] font-bold">No. HP:</span><br>
                                    <span
                                        class="detail text-[14px] leading-[28px] text-[#777]">{{$ketua['no_hp']}}</span>
                                </div>
                                <div class="email pt-[20px]">
                                    <span class="text-[16px] leading-[28px] font-bold">Email :</span><br>
                                    <span
                                        class="detail text-[14px] leading-[28px] text-[#777]">
                                        {{$ketua['email']}}
                                    </span>
                                </div>
                                <div class="email pt-[20px]">
                                    <span class="text-[16px] leading-[28px] font-bold">Jumlah Anggota :</span><br>
                                    <span class="detail text-[14px] leading-[28px] text-[#777]">
                                        {{$homepage['jumlah_anggota']}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bottom pt-[20px]">
                            <p class="text-[16px] leading-[28px] font-bold">Address :</p>
                            <span
                                class="detail text-[14px] leading-[28px] text-[#777]">{{$ketua['alamat_kantor']}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience and Education -->
    <section id="experience" class="section-experience bg-[#f6f8ff] relative">
        <div class="relative pt-[60px]">
            <img src="{{asset('assets/borox')}}/assets/img/shape/bg-shape.png" alt="bg-shape"
                 class="absolute top-0 left-0 right-0 w-full bg-center bg-cover">
        </div>
        <div class="2xl:pb-[80px] pb-[70px] 2xl:pt-[80px] md:pt-[70px] pt-[20px]">
            <div class="banner text-center mb-[30px]" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                <span class="text-[14px] text-[#777]">Cakupan Wilayah Organisasi</span>
                <h2
                    class="text-center mt-[5px] 2xl:text-[35px] xl:text-[33px] lg:text-[30px] md:text-[26px] sm:text-[24px] text-[22px] font-bold">
                    Daftar Cakupan wilayah <span class="text-[#7963e0]"> Organisasi</span></h2>
            </div>
            <div
                class="flex flex-wrap justify-between items-center mx-auto mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] md:max-w-[720px] sm:max-w-[540px] max-[320px]:px-[12px] px-6 relative">
                <img src="{{asset('assets/borox')}}/assets/img/shape/shape-8.png" alt="shape-8"
                     class="absolute w-12 -top-10 right-10">
                <div class="absolute -top-10 left-10 h-12 w-12 bg-[#f1c7a1] rounded-full"></div>
                <div class="grid lg:grid-cols-1 grid-cols-1 gap-[30px]">
                    <div class="transition-all justify-start items-start col-span-1">
                        <div
                            class="{{\App\Helpers\Homepage::cakupanWilayah()->count() >= 1 ? 'border-l-2 border-gray-300' : ''}}  pl-6">
                            @forelse(\App\Helpers\Homepage::cakupanWilayah() as $cakupanWilayah)
                                <div class="p-[30px] bg-white rounded-3xl mt-8 relative" data-aos="fade-up"
                                     data-aos-duration="2000" data-aos-delay="400">
                                    <div class="absolute top-0 bottom-0 -left-6 w-4">
                                    <span
                                        class="w-4 h-4 border-2 border-[#7963e0] rounded-full block bg-[#f6f8ff] absolute top-28 -left-2.5"></span>
                                        <span
                                            class="w-5 border border-[#7963e0] block bg-[#f6f8ff] absolute top-28 my-1.5 left-1.5"></span>
                                    </div>
                                    <span class="text-[#777] text-[12px] font-medium">Wilayah</span>
                                    <h4 class="text-[16px] leading-[22px] font-semibold mt-[15px] mb-[6px] text-[#7963e0]">
                                        @if($cakupanWilayah->type == \App\Models\AlamatKantor::KAB)
                                            {{$cakupanWilayah->kabupatenKota->nama_kabupaten}}
                                        @elseif($cakupanWilayah->type == \App\Models\AlamatKantor::PROV)
                                            {{$cakupanWilayah->provinsi->nama_provinsi}}
                                        @elseif($cakupanWilayah->type == \App\Models\AlamatKantor::PUSAT)
                                            Kantor Pusat
                                        @endif
                                        <span class="ml-[15px] text-[#999] text-[14px]">
                                        {{$cakupanWilayah->type}}</span></h4>
                                    <p class="text-[13px] text-[#777] mb-0 leading-[28px]">
                                        ketua umum : {{$cakupanWilayah->ketuaUmum()}} <br>
                                        {{$cakupanWilayah->alamat}}
                                    </p>
                                </div>
                            @empty
                                <div class="text-center w-full py-[20em] relative border flex-grow-1">
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section id="anggota" class="section-Portfolio 2xl:py-[80px] py-[70px]">
        <div class="banner text-center mb-[30px]" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
            <span class="text-[14px] text-[#777]">JAJARAN STAFF PUSAT</span>
            <h2
                class="text-center mt-[5px] 2xl:text-[35px] xl:text-[33px] lg:text-[30px] md:text-[26px] sm:text-[24px] text-[22px] font-bold">
                Organisasi <span class="text-[#7963e0]"> {{$homepage['nama_organisasi']}}</span></h2>
        </div>
        <div
            class="flex flex-wrap justify-between items-center mx-auto mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] md:max-w-[720px] sm:max-w-[540px] max-[320px]:px-[12px] px-6">
            <div class="m-b-minus-24px w-full">
                <div class="portfolio-content" id="MixItUpDA2FB7" data-aos="fade-up" data-aos-duration="2000"
                     data-aos-delay="600">
                    <div class="portfolio-tabs mb-[30px]">
                        <ul
                            class="2xl:flex xl:flex md:flex sm:block place-content-center text-center">
                            <li class="text-[14px] text-[#17181c] 2xl:mx-[10px] sm:mx-[0px] px-[10px] leading-[11px] font-semibold hover:text-[#7963e0] cursor-pointer inline-block active"
                                data-filter="all">
                                ALL
                            </li>
                            @foreach(\App\Models\Jabatan::JABATAN_OPTIONS as $jabatan_option)
                                <li class="text-[14px] text-[#17181c] 2xl:mx-[10px] sm:mx-[0px] px-[10px] leading-[11px] font-semibold hover:text-[#7963e0] cursor-pointer inline-block"
                                    data-filter=".{{str_replace(' ','_',$jabatan_option)}}">
                                    {{strtoupper($jabatan_option)}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="portfolio-content-items">
                        <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-[30px]">
                            @forelse(\App\Models\Anggota::all() as $anggota)
                                <div
                                    class="mix {{$anggota->jabatans->pluck('jabatan')->map(fn($jabatan) => str_replace(' ', '_', $jabatan))->implode(' ')}} "
                                    data-myorder="1">
                                    <div class="portfolio-img truncate rounded-2xl relative">
                                        <img src="{{asset('storage/'.$anggota->foto)}}"
                                             alt="graphics"
                                             class="w-full transform hover:bg-blue-600 transition duration-500 hover:-rotate-12 hover:scale-125">
                                        <h3 class="top-contain absolute top-[15px] right-[15px]">
                                            @foreach($anggota->jabatans as $jabatan)
                                                <span
                                                    class="bg-black rounded-full text-white font-normal text-[12px] px-2 py-1">
                                            {{$jabatan->jabatan}}</span>
                                            @endforeach
                                        </h3>
                                        <div class="bottom-contain absolute bottom-4 left-4 right-4">
                                            <div
                                                class="overlay-info px-4 py-2 bg-black bg-opacity-60 rounded-xl grid grid-cols-2 gap-[30px] place-content-between">
                                                <a href="#"
                                                   class="text-white text-sm flex items-center">{{$anggota->nama_anggota}}</a>
                                                <a href="{{asset('storage/'.$anggota->foto)}}" data-fancybox="gallery"
                                                   class="text-white text-sm grid justify-items-end">
                                                    <p class="hidden">.</p>
                                                    <span
                                                        class="bg-[#7963e0] h-8 w-8 flex justify-center items-center rounded-md">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center w-full lg:col-span-3 py-[20em] md:col-span-1">
                                    <p class="text-gray-500">Tidak ada anggota yang terdaftar.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <footer class="bg-[#070415]">
        <div
            class="flex justify-center mx-auto mx-auto 2xl:max-w-[1320px] xl:max-w-[1140px] lg:max-w-[960px] 2xl:flex-row xl:flex-row lg:flex-row flex-col md:max-w-[720px] max-[320px]:px-[12px] sm:max-w-[540px] gap-[30px] px-6 py-8">
            <div class="lg:w-1/2 text-white text-[12px] font-normal 2xl:text-left xl:text-left text-center">
                Copyright ©
            </div>
            <div
                class="lg:w-1/2 text-white font-normal text-[12px] flex 2xl:justify-end xl:justify-end lg:justify-end justify-between">
                <a href="javascript:void(0)" class="pr-10 hover:text-white">Privacy Policy</a>
                <a href="javascript:void(0)" class="hover:text-white">Terms and Conditions</a>
            </div>
        </div>
    </footer>

    <!-- scroll Top -->
    <div id="scrollup"
         class="fixed bg-[#7963e0] text-white rounded-full flex justify-center text-center items-center p-2 right-6 cursor-pointer bottom-6 h-10 w-10 z-20">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </div>
</div>
