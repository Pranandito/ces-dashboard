<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- @vite('resources/css/app.css') -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="lg:px-28 px-6 lg:pt-12 pt-8 bg-[#F4F7F3]">

    <section class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-4">
                <img src="{{ asset('assets/logo/logo-air.webp') }}" alt="Logo" class="h-13 w-11">
                <div>
                    <h1 class="text-2xl">Dashboard Monitoring <span class="hidden lg:inline-block">Pompa Submersible Sragen-1</span></h1>
                    <h2 class="text-sm text-gray-500 inline-block lg:hidden">Pemantauan operasional pompa Sragen-1</h2>
                </div>
            </div>
            <h2 class="text-xl text-gray-500 hidden lg:inline-block">Pantau status operasional, debit air, dan konsumsi daya pompa air secara akurat.
            </h2>
        </div>

        <a class="text-[#FFFFF0] text-xl px-4 py-2 bg-[#4CAF50] rounded-2xl hidden lg:inline-block" href="{{ route('exportCsv') }}">
            <div class="flex items-center gap-3">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.5 18L7.875 12.375L9.45 10.7437L12.375 13.6687V4.5H14.625V13.6687L17.55 10.7437L19.125 12.375L13.5 18ZM6.75 22.5C6.13125 22.5 5.60175 22.2799 5.1615 21.8396C4.72125 21.3994 4.50075 20.8695 4.5 20.25V16.875H6.75V20.25H20.25V16.875H22.5V20.25C22.5 20.8687 22.2799 21.3986 21.8396 21.8396C21.3994 22.2806 20.8695 22.5007 20.25 22.5H6.75Z"
                        fill="white" />
                </svg>
                <h1>Export</h1>
            </div>
        </a>
    </section>

    <section class="my-7 py-5 px-8 rounded-2xl bg-[url('/assets/horizontal-bar.png')] bg-cover">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-5">
                <img src="{{ asset('assets/logo/logo-air.webp') }}" alt="Logo" class="h-13 w-11">
                <div>
                    <h1 class="text-xl">{{ $latest->active_message_title }}</h1>
                    <p class="text-gray-500">{{ $latest->active_message_subtitle }}</p>
                </div>
            </div>
            <a class="text-lg px-4 py-2 bg-[#FFFFF0] text-[#10A7E8] rounded-2xl hidden lg:inline-block" href="{{ route('pumpActivation') }}">
                <h1>{{ $latest->active_message_button }}</h1>
            </a>
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-5 text-[#979797]">
        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.08325 15.9576C4.08325 11.0763 8.25992 6.25214 11.1929 3.46731C11.9462 2.73965 12.9526 2.33295 13.9999 2.33295C15.0472 2.33295 16.0537 2.73965 16.8069 3.46731C19.7388 6.25331 23.9166 11.0763 23.9166 15.9576C23.9166 20.7433 20.1611 25.6666 13.9999 25.6666C7.83875 25.6666 4.08325 20.7433 4.08325 15.9576Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.6665 14.3313C6.37567 13.8016 9.7905 13.6313 13.9812 15.9856C18.1648 18.3353 21.6018 17.4976 23.3332 16.4908"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                    <h1>Volume Air <br> yang Dipompa</h1>
                </div>
                <h1 class="text-4xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0">{{ $latest->volume_harian }} <span class="text-xl">L</span></h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Debit air</h1>
                <h1>{{ $latest->debit }} L/min</h1>
            </div>
            <div class="flex justify-between">
                <h1>Kecepatan aliran</h1>
                <h1>{{ number_format($latest->v_water, 2) }} km/j</h1>
            </div>
            <div class="flex justify-between">
                <h1>Status operasional</h1>
                <h1>{{ $latest->status }}</h1>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                            class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                        </svg>
                    </div>
                    <h1>Daya Listrik <br> Panel Surya</h1>
                </div>
                <h1 class="text-4xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0">{{ $latest->daya }} <span class="text-xl">W</span></h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Tegangan</h1>
                <h1>{{ $latest->tegangan }} Volt</h1>
            </div>
            <div class="flex justify-between">
                <h1>Arus</h1>
                <h1>{{ number_format($latest->arus, 2) }} Amp</h1>
            </div>
            <div class="flex justify-between">
                <h1>Daya puncak</h1>
                <h1>{{ $latest->max_power }} Wp</h1>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                            class="bi bi-lightning-fill" viewBox="0 0 16 16">
                            <path
                                d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641z" />
                        </svg>
                    </div>
                    <h1>Penggunaan <br> Energi Listrik</h1>
                </div>
                <h1 class="text-4xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0">{{ number_format(($latest->energi_harian / 1000), 2) }} <span class="text-xl">kWh</span></h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Penghematan biaya</h1>
                <h1>Rp. {{ number_format($latest->biaya, 0, ',', '.') }}</h1>
            </div>
            <div class="flex justify-between">
                <h1>Reduksi emisi</h1>
                <h1>{{ number_format($latest->emisi, 2) }} kg CO²</h1>
            </div>
            <div class="flex justify-between">
                <h1>Durasi operasional</h1>
                <h1>{{ $latest->durasi_pemakaian_harian }} menit</h1>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-11 lg:col-span-2 text-gray-900">
            <div class="flex items-center justify-between mb-8 lg:ml-5">
                <div class="flex items-center justify-between">
                    <div class="flex gap-4 items-center">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6C8.93913 6 7.92172 6.42143 7.17157 7.17157C6.42143 7.92172 6 8.93913 6 10V30C6 31.0609 6.42143 32.0783 7.17157 32.8284C7.92172 33.5786 8.93913 34 10 34H30C31.0609 34 32.0783 33.5786 32.8284 32.8284C33.5786 32.0783 34 31.0609 34 30V10C34 8.93913 33.5786 7.92172 32.8284 7.17157C32.0783 6.42143 31.0609 6 30 6H10ZM20 20C20.2652 20 20.5196 20.1054 20.7071 20.2929C20.8946 20.4804 21 20.7348 21 21V27C21 27.2652 20.8946 27.5196 20.7071 27.7071C20.5196 27.8946 20.2652 28 20 28C19.7348 28 19.4804 27.8946 19.2929 27.7071C19.1054 27.5196 19 27.2652 19 27V21C19 20.7348 19.1054 20.4804 19.2929 20.2929C19.4804 20.1054 19.7348 20 20 20ZM12 17C12 16.7348 12.1054 16.4804 12.2929 16.2929C12.4804 16.1054 12.7348 16 13 16C13.2652 16 13.5196 16.1054 13.7071 16.2929C13.8946 16.4804 14 16.7348 14 17V27C14 27.2652 13.8946 27.5196 13.7071 27.7071C13.5196 27.8946 13.2652 28 13 28C12.7348 28 12.4804 27.8946 12.2929 27.7071C12.1054 27.5196 12 27.2652 12 27V17ZM27 12C27.2652 12 27.5196 12.1054 27.7071 12.2929C27.8946 12.4804 28 12.7348 28 13V27C28 27.2652 27.8946 27.5196 27.7071 27.7071C27.5196 27.8946 27.2652 28 27 28C26.7348 28 26.4804 27.8946 26.2929 27.7071C26.1054 27.5196 26 27.2652 26 27V13C26 12.7348 26.1054 12.4804 26.2929 12.2929C26.4804 12.1054 26.7348 12 27 12Z" fill="black" />
                        </svg>
                        <div class="relative inline-block">
                            <button id="dropdownNavbarLink" class="flex items-center justify-between text-2xl">
                                <span id="selectedMode">Produksi Energi</span>
                                <svg id="caretIcon" class="ms-3 transition-transform duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="hidden absolute -left-22 z-20 bg-[#FFFFF0] rounded-base shadow-xl w-80 mt-2">
                                <ul class="p-2 text-sm text-body font-medium">
                                    <li>
                                        <div class="flex p-2 rounded-sm hover:bg-gray-100">
                                            <div class="flex items-center h-5">
                                                <input id="helper-radio-1" type="radio" name="mode" value="power" class="w-4 h-4 text-gray-800 bg-[#FFFFF0] border-gray-300" checked>
                                            </div>
                                            <div class="ms-2 text-sm">
                                                <label for="helper-radio-1" class="font-medium text-gray-900 cursor-pointer">
                                                    <div>Produksi Energi</div>
                                                    <p class="text-xs font-normal text-gray-500">Daya dan energi listrik yang dihasilkan panel surya</p>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex p-2 rounded-sm hover:bg-gray-100">
                                            <div class="flex items-center h-5">
                                                <input id="helper-radio-2" type="radio" name="mode" value="pump" class="w-4 h-4 text-gray-800 bg-[#FFFFF0] border-gray-300">
                                            </div>
                                            <div class="ms-2 text-sm">
                                                <label for="helper-radio-2" class="font-medium text-gray-900 cursor-pointer">
                                                    <div>Operasional Pompa</div>
                                                    <p class="text-xs font-normal text-gray-500">Debit dan volume air yang dipompa</p>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex p-2 rounded-sm hover:bg-gray-100">
                                            <div class="flex items-center h-5">
                                                <input id="helper-radio-3" type="radio" name="mode" value="environment" class="w-4 h-4 text-gray-800 bg-[#FFFFF0] border-gray-300">
                                            </div>
                                            <div class="ms-2 text-sm">
                                                <label for="helper-radio-3" class="font-medium text-gray-900 cursor-pointer">
                                                    <div>Kondisi Lingkungan</div>
                                                    <p class="text-xs font-normal text-gray-500">Suhu dan intensitas cahaya lingkungan</p>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative" style="height: 400px;">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-asterisk"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-gray-900">Riwayat Aktivitas Terakhir</h1>
                    <h2 class="text-base">4 aktivitas terakhir</h2>
                </div>
            </div>

            @foreach ($logs->take(4) as $log)
            <hr class="my-4">
            <div class="flex items-center gap-5">
                <h1 class="px-2 py-4 text-white font-semibold rounded-full bg-yellow-500">{{ \Carbon\Carbon::parse($log->date)->format('d/m') }}</h1>
                <div class="w-full">
                    <h1 class="text-gray-900 text-xl lg:text-base">{{ \Carbon\Carbon::parse($log->date)->translatedFormat('d F Y') }}</h1>
                    <div class=" items-center justify-between hidden lg:flex">
                        <h1>{{ $log->volume_harian }} L</h1>
                        <h1>•</h1>
                        <h1>{{ $log->durasi_harian ?? 0 }} menit</h1>
                        <h1>•</h1>
                        <h1>{{ $log->energi_harian }} kWh</h1>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between lg:hidden mt-3">
                <h1>{{ $log->volume_harian }} L</h1>
                <h1>•</h1>
                <h1>{{ $log->durasi_harian ?? 0 }} menit</h1>
                <h1>•</h1>
                <h1>{{ $log->energi_harian }} kWh</h1>
            </div>
            @endforeach
            <hr class="my-4">

        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                        class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                        <path
                            d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                    </svg>
                </div>
                <h1 class="text-gray-900">Intensitas Cahaya Lingkungan</h1>
            </div>

            <!-- Gauge Chart Container -->
            <div class="relative flex justify-center items-center pt-3">
                <canvas id="gaugeChart" width="250" height="150" class="block"></canvas>

                <!-- Value Display -->
                <div class="absolute inset-0 flex flex-col items-center justify-center" style="margin-top: 25px;">
                    <div class="text-5xl font-semibold text-gray-900" id="valueDisplay">{{ number_format(($latest->intensitas_cahaya/1000), 1) }}<span class="text-xl text-gray-900">k</span></div>
                    <span class="text-xl text-gray-900">Lux</span>
                </div>
            </div>
            <h1 class="text-center mt-4">Intensitas cahaya saat ini cukup baik untuk menyalakan pompa</h1>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="block lg:flex items-center justify-between mb-6 text-gray-800">
                <div class="flex items-center gap-4 text-xl">
                    <div class="p-3 bg-[#62A19E] rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white"
                            class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                        </svg>
                    </div>
                    <h1>Suhu Udara <br> Lingkungan</h1>
                </div>
                <h1 class="text-4xl mx-auto w-fit mt-4 lg:mt-0 lg:mx-0">{{ $latest->suhu }} <span class="text-xl">°C</span></h1>
            </div>
            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Rata-rata hari ini</h1>
                <h1>{{ $latest->suhu_harian }} °C</h1>
            </div>
            <div class="flex justify-between">
                <h1>Rata-rata minggu ini</h1>
                <h1>{{ $latest->suhu_mingguan }} °C</h1>
            </div>
            <hr class="my-4">

            <div id="heatmap-container" class="grid grid-cols-8 gap-2 lg:px-4">
                <!-- Dots akan diisi oleh JavaScript -->
            </div>

            <div class="flex items-center justify-center gap-5 pt-4">
                <div class="flex items-center gap-2">
                    <div class="size-3 rounded-full bg-[#e5e7eb]"></div>
                    <h1>Dingin</h1>
                </div>
                <div class="flex items-center gap-2">
                    <div class="size-3 rounded-full bg-[#22c55e]"></div>
                    <h1>Panas</h1>
                </div>
            </div>

        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_3350_6)">
                            <path
                                d="M14 24.5C13.1833 24.5 12.4931 24.218 11.9292 23.6541C11.3653 23.0902 11.0833 22.4 11.0833 21.5833C11.0833 20.7666 11.3653 20.0764 11.9292 19.5125C12.4931 18.9486 13.1833 18.6666 14 18.6666C14.8167 18.6666 15.5069 18.9486 16.0708 19.5125C16.6347 20.0764 16.9167 20.7666 16.9167 21.5833C16.9167 22.4 16.6347 23.0902 16.0708 23.6541C15.5069 24.218 14.8167 24.5 14 24.5ZM7.40833 17.9083L4.95833 15.4C6.10556 14.2527 7.45228 13.3439 8.9985 12.6735C10.5447 12.003 12.2119 11.6674 14 11.6666C15.7881 11.6658 17.4557 12.0061 19.0027 12.6875C20.5497 13.3688 21.896 14.2924 23.0417 15.4583L20.5917 17.9083C19.7361 17.0527 18.7444 16.3819 17.6167 15.8958C16.4889 15.4097 15.2833 15.1666 14 15.1666C12.7167 15.1666 11.5111 15.4097 10.3833 15.8958C9.25555 16.3819 8.26389 17.0527 7.40833 17.9083ZM2.45 12.95L0 10.5C1.78889 8.67218 3.87917 7.24302 6.27083 6.21246C8.6625 5.1819 11.2389 4.66663 14 4.66663C16.7611 4.66663 19.3375 5.1819 21.7292 6.21246C24.1208 7.24302 26.2111 8.67218 28 10.5L25.55 12.95C24.0528 11.4527 22.3176 10.2814 20.3443 9.43596C18.3711 8.59052 16.2563 8.1674 14 8.16663C11.7437 8.16585 9.62928 8.58896 7.65683 9.43596C5.68439 10.283 3.94878 11.4543 2.45 12.95Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_3350_6">
                                <rect width="28" height="28" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <h1 class="text-gray-900">Konektivitas Perangkat IoT</h1>
            </div>

            <h1 class="text-gray-900 text-4xl my-6 text-center">{{ $latest->online_status }}</h1>
            <h2 class="text-center">{{ $latest->status_message }}</h2>

            <hr class="my-4">
            <div class="flex justify-between">
                <h1>Update data terakhir</h1>
                <h1 class="lg:inline-block hidden">{{ \Carbon\Carbon::parse($latest->created_at)->format('H:i:s d/m/Y') }}</h1>
                <h1 class="block lg:hidden">{{ \Carbon\Carbon::parse($latest->created_at)->format('H:i d/m') }}</h1>
            </div>
            <div class="flex justify-between">
                <h1>Durasi terhubung</h1>
                <h1>{{ $latest->durasi_koneksi_j }} jam - {{ $latest->durasi_koneksi_m }} menit</h1>
            </div>
        </div>

        <div class="bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="flex items-center gap-4 text-xl">
                <div class="p-3 bg-[#62A19E] rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-asterisk"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-gray-900">Statistik Total Penggunaan</h1>
                    <h2 class="text-base hidden lg:inline-block">Jan 2026 - {{ \Carbon\Carbon::parse($latest->created_at)->translatedFormat('M Y') }}</h2>
                </div>
            </div>

            <h1 class="text-5xl text-gray-900 my-10 text-center"> {{ number_format($latest->volume_total/1000, 2) }} <span class="text-3xl">m³</span></h1>

            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797"
                        class="bi bi-stopwatch" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z" />
                        <path
                            d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3" />
                    </svg>
                    <h1>Durasi operasional</h1>
                </div>
                <h1>{{ $latest->durasi_pemakaian_total }} jam</h1>
            </div>
            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797" class="bi bi-fire"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>
                    <h1>Reduksi emisi</h1>
                </div>
                <h1>{{ number_format($latest->total_emisi, 2) }} kg CO²</h1>
            </div>
            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797" class="bi bi-cash"
                        viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                        <path
                            d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                    </svg>
                    <h1>Penghematan <span class="hidden lg:inline-block">biaya</span></h1>
                </div>
                <h1>Rp. {{ number_format($latest->total_biaya, 0, ',', '.') }}</h1>
            </div>
            <hr class="my-3">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#979797"
                        class="bi bi-lightning" viewBox="0 0 16 16">
                        <path
                            d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1z" />
                    </svg>
                    <h1>Produksi energi</h1>
                </div>
                <h1>{{ number_format(($latest->energi_total / 1000), 2) }} kWh</h1>
            </div>
            <hr class="my-3">
        </div>

        <div class="lg:col-span-2 bg-[#FFFFF0] rounded-[20px] p-10">
            <div class="flex items-center gap-5 mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-geo-alt-fill"
                    viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>
                <h1 class="text-gray-900 text-2xl">Lokasi Pompa</h1>
            </div>
            <div class="w-full">
                <iframe id="maps" src="https://www.google.com/maps?q=-7.8329,110.9247&z=15&output=embed" width="100%"
                    height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <footer class="mt-12 lg:-mx-24 -mx-12 lg:mb-4 bg-[#121212] rounded-2xl text-[#FFFFF0]">
        <div class="lg:flex block justify-between mx-16 pt-10">
            <div>
                <div class="flex items-center gap-5">
                    <img src="{{ asset('assets/logo/logo-air.webp') }}" alt="Logo" class="h-13 w-11">
                    <h1 class="text-2xl lg:text-4xl"> Dashboard Monitoring</h1>
                </div>
                <h2 class="text-[#979797] hidden lg:block mt-3 text-lg">Platform pemantauan kinerja operasional <br> pompa air tenaga
                    surya
                    sragen
                </h2>
            </div>
            <div class="mt-8 lg:mt-0 lg:text-end text-xl">
                <h1>Teknik Elektro</h1>
                <h1>Universitas Sebelas Maret</h1>
                <div class="flex items-center lg:justify-end mt-3 gap-7">
                    <a href="https://mail.google.com/mail/u/0/?to=ditopranandito@student.uns.ac.id&fs=1&tf=cm" target="_blank" rel="noopener noreferrer">
                        <div class="flex items-center gap-3 py-2 px-7 rounded-3xl border border-[#979797]">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_3388_220)">
                                    <path
                                        d="M22.3863 20.1704H19.7726V8.98435L11.9317 13.7784L4.0908 8.98435V20.1704H1.47716V4.82952H3.04534L11.9317 10.2628L20.8181 4.82952H22.3863M22.3863 2.27271H1.47716C0.0265936 2.27271 -1.13647 3.41049 -1.13647 4.82952V20.1704C-1.13647 20.8485 -0.86111 21.4989 -0.370958 21.9784C0.119194 22.4579 0.783982 22.7273 1.47716 22.7273H22.3863C23.0794 22.7273 23.7442 22.4579 24.2344 21.9784C24.7245 21.4989 24.9999 20.8485 24.9999 20.1704V4.82952C24.9999 4.15141 24.7245 3.50108 24.2344 3.02158C23.7442 2.54208 23.0794 2.27271 22.3863 2.27271Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3388_220">
                                        <rect width="25" height="25" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <h1>Email</h1>
                        </div>
                    </a>
                    <a href="https://id.linkedin.com/in/hari-maghfiroh-6271a363" target="_blank" rel="noopener noreferrer">
                        <div class="flex items-center gap-3 py-2 px-6 rounded-3xl border border-[#979797]">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.0197 4.1084C26.7461 4.1084 27.4427 4.39696 27.9564 4.91061C28.47 5.42425 28.7586 6.1209 28.7586 6.84731V26.0197C28.7586 26.7461 28.47 27.4427 27.9564 27.9564C27.4427 28.47 26.7461 28.7586 26.0197 28.7586H6.84731C6.1209 28.7586 5.42425 28.47 4.91061 27.9564C4.39696 27.4427 4.1084 26.7461 4.1084 26.0197V6.84731C4.1084 6.1209 4.39696 5.42425 4.91061 4.91061C5.42425 4.39696 6.1209 4.1084 6.84731 4.1084H26.0197ZM25.3349 25.3349V18.0768C25.3349 16.8928 24.8646 15.7572 24.0273 14.92C23.1901 14.0828 22.0545 13.6124 20.8705 13.6124C19.7065 13.6124 18.3507 14.3245 17.6934 15.3927V13.8726H13.8726V25.3349H17.6934V18.5835C17.6934 17.529 18.5424 16.6663 19.5969 16.6663C20.1054 16.6663 20.5931 16.8683 20.9526 17.2278C21.3122 17.5874 21.5142 18.075 21.5142 18.5835V25.3349H25.3349ZM9.42188 11.7226C10.0321 11.7226 10.6172 11.4802 11.0487 11.0487C11.4802 10.6172 11.7226 10.0321 11.7226 9.42188C11.7226 8.14829 10.6955 7.1075 9.42188 7.1075C8.80807 7.1075 8.2194 7.35134 7.78537 7.78537C7.35134 8.2194 7.1075 8.80807 7.1075 9.42188C7.1075 10.6955 8.14829 11.7226 9.42188 11.7226ZM11.3254 25.3349V13.8726H7.53203V25.3349H11.3254Z"
                                    fill="white" />
                            </svg>
                            <h1>LinkedIn</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <hr class="text-[#979797] mx-8 mt-9 p-5">
    </footer>



</body>

<script>
    // Konfigurasi Chart.js untuk Gauge Chart
    const ctxg = document.getElementById('gaugeChart').getContext('2d');

    const value = 1235; // Nilai yang ingin ditampilkan
    const maxValue = 65535; // Nilai maksimum

    // Plugin untuk membuat gauge chart
    const gaugeChartText = {
        id: 'gaugeChartText',
        afterDatasetsDraw(chart) {
            // Plugin ini bisa digunakan untuk customisasi tambahan jika diperlukan
        }
    };

    // Membuat segments untuk efek terpotong-potong
    const tickPositions = [0, 26214, 36044, 45874, 55704, 65535]; // Posisi tick marks
    const segments = tickPositions.length - 1; // Jumlah segmen antar tick

    const dataArray = [];
    const colorArray = [];

    // Hitung segment mana yang terisi berdasarkan nilai
    for (let i = 0; i < segments; i++) {
        const segmentStart = tickPositions[i];
        const segmentEnd = tickPositions[i + 1];
        const segmentSize = segmentEnd - segmentStart;

        dataArray.push(segmentSize); // Ukuran segment berdasarkan jarak tick

        // Tentukan warna berdasarkan apakah nilai berada di segment ini
        if (value >= segmentEnd) {
            colorArray.push('#f97316'); // Orange penuh jika nilai melebihi segment
        } else if (value > segmentStart) {
            colorArray.push('#f97316'); // Orange jika nilai di dalam segment ini
        } else {
            colorArray.push('#f3f4f6'); // Abu-abu untuk segment kosong
        }
    }

    const data = {
        datasets: [{
            data: dataArray,
            backgroundColor: colorArray,
            borderWidth: 6, // Jarak antar segment
            borderColor: '#ffffff', // Warna pemisah (putih)
            circumference: 270, // 75% lingkaran (270 derajat)
            rotation: 225, // Mulai dari kiri bawah (225 derajat)
            cutout: '85%', // Ketebalan ring
            borderRadius: 15 // Lebih rounded
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            aspectRatio: 2,
            animation: {
                animateRotate: true,
                animateScale: false,
                onComplete: function() {}
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            },
            layout: {
                padding: 0
            }
        },
        plugins: [gaugeChartText]
    };

    // Render chart
    const gaugeChart = new Chart(ctxg, config);

    // Fungsi untuk update nilai (opsional, bisa digunakan untuk data dinamis)
    function updateGaugeValue(newValue) {
        // Update warna segments berdasarkan nilai baru
        const newColors = [];
        for (let i = 0; i < segments; i++) {
            const segmentStart = tickPositions[i];
            const segmentEnd = tickPositions[i + 1];

            if (newValue >= segmentEnd) {
                newColors.push('#f97316'); // Orange penuh
            } else if (newValue > segmentStart) {
                newColors.push('#f97316'); // Orange jika di segment ini
            } else {
                newColors.push('#f3f4f6'); // Abu-abu
            }
        }

        gaugeChart.data.datasets[0].backgroundColor = newColors;
        gaugeChart.update();

        // Update text
        document.getElementById('valueDisplay').textContent = newValue;

        // Update label berdasarkan nilai
        const label = document.querySelector('.text-lg.text-gray-600');
        if (newValue >= 70) {
            label.textContent = 'Excellent';
        } else if (newValue >= 40) {
            label.textContent = 'Good';
        } else if (newValue >= 20) {
            label.textContent = 'Fair';
        } else {
            label.textContent = 'Poor';
        }
    }

    // Contoh: Update nilai setiap 3 detik (hapus jika tidak diperlukan)
    // setInterval(() => {
    //     const randomValue = Math.floor(Math.random() * 100);
    //     updateGaugeValue(randomValue);
    // }, 3000);
</script>

<script>
    // Fetch data dari API
    async function fetchHeatmapData() {
        try {
            const response = await fetch('http://127.0.0.1:8000/dashboard/heatMap'); // Ganti dengan URL API Anda
            const result = await response.json();

            // Transform data dari API ke format yang dibutuhkan
            const data = result.data.map(item => ({
                date: new Date(item.date),
                temp: parseFloat(item.suhu_harian),
                value: item.value
            }));

            return data;
        } catch (error) {
            console.error('Error fetching heatmap data:', error);
            return [];
        }
    }

    // Fungsi untuk mendapatkan warna berdasarkan suhu
    function getColorByValue(value) {
        if (value === 0) return '#e5e7eb'; // Gray - tidak ada aktivitas
        if (value < 25) return '#86efac'; // Light green
        if (value < 50) return '#4ade80'; // Medium green
        if (value < 75) return '#22c55e'; // Green
        return '#16a34a'; // Dark green
    }

    // Format tanggal ke bahasa Indonesia
    function formatDate(date) {
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        return date.toLocaleDateString('id-ID', options);
    }

    // Render heatmap dots
    async function renderHeatmap() {
        const container = document.getElementById('heatmap-container');

        // Tampilkan loading
        container.innerHTML = '<div class="text-gray-500">Loading data...</div>';

        const data = await fetchHeatmapData();

        if (data.length === 0) {
            container.innerHTML = '<div class="text-red-500">Gagal memuat data</div>';
            return;
        }

        container.innerHTML = data.map((item, index) => {
            const color = getColorByValue(item.value);
            const dateStr = formatDate(item.date);

            return `
                <div 
                    class="w-7 h-7 rounded-full transition-all duration-300 hover:scale-125 cursor-pointer relative group" 
                    style="background-color: ${color}"
                >
                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block z-10 w-48">
                        <div class="bg-gray-900 text-white text-xs rounded-lg py-2 px-3 shadow-lg">
                            <div class="font-semibold mb-1">${item.date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })}</div>
                            <div>Suhu rata-rata: <span class="font-bold">${item.temp}°C</span></div>
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                <div class="border-4 border-transparent border-t-gray-900"></div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    // Render saat halaman dimuat
    renderHeatmap();

    // Update heatmap setiap 60 detik (opsional)
    // setInterval(renderHeatmap, 60000);
</script>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const dropdownButton = document.getElementById('dropdownNavbarLink');
    const dropdownMenu = document.getElementById('dropdownNavbar');
    const caretIcon = document.getElementById('caretIcon');
    let myChart;

    // Konfigurasi untuk setiap mode
    const modeConfigs = {
        power: {
            title: 'Produksi Energi',
            datasets: [{
                    key: 'daya',
                    label: 'Daya (W)',
                    color: '#03D076'
                },
                {
                    key: 'energi_harian',
                    label: 'Energi (Wh)',
                    color: '#FFC42E'
                }
            ],
            yAxisLabel: 'Daya dan Energi'
        },
        pump: {
            title: 'Operasional Pompa',
            datasets: [{
                    key: 'debit',
                    label: 'Debit (L/min)',
                    color: '#03D076'
                },
                {
                    key: 'volume_harian',
                    label: 'Volume (L)',
                    color: '#FFC42E'
                }
            ],
            yAxisLabel: 'Debit dan Volume'
        },
        environment: {
            title: 'Kondisi Lingkungan',
            datasets: [{
                    key: 'suhu',
                    label: 'Suhu (°C)',
                    color: '#FFC42E'
                },
                {
                    key: 'intensitas_cahaya',
                    label: 'Intensitas Cahaya (lux)',
                    color: '#03D076'
                }
            ],
            yAxisLabel: 'Suhu dan Intensitas Cahaya'
        }
    };

    // Fungsi untuk format tanggal
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const month = date.toLocaleString('id-ID', {
            month: 'short'
        });
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${day} ${month} ${hours}:${minutes}`;
    }

    // Fungsi untuk load data dari API
    async function loadChartData(mode) {
        try {
            const response = await fetch(`http://127.0.0.1:8000/dashboard/chart/${mode}`);
            const result = await response.json();

            if (!result.data || result.data.length === 0) {
                console.warn('No data available');
                return;
            }

            const config = modeConfigs[mode];
            const labels = result.data.map(item => formatDate(item.created_at));

            const datasets = config.datasets.map(ds => ({
                label: ds.label,
                data: result.data.map(item => parseFloat(item[ds.key]) || 0),
                backgroundColor: ds.color,
                pointBackgroundColor: 'rgb(255,255,255)',
                pointRadius: 5,
                pointHoverRadius: 7,
                borderColor: ds.color,
                borderWidth: 2,
                tension: 0.3
            }));

            updateChart(labels, datasets, config.yAxisLabel);
        } catch (error) {
            console.error('Error loading chart data:', error);
        }
    }

    // Fungsi untuk update chart
    function updateChart(labels, datasets, yAxisLabel) {
        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 8,
                            boxHeight: 8,
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                        ticks: {
                            callback: function(val, index) {
                                const maxLabels = 6;
                                const step = Math.ceil(this.getLabels().length / maxLabels);
                                return index % step === 0 ? this.getLabelForValue(val) : '';
                            }
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: yAxisLabel
                        }
                    }
                }
            }
        });
    }

    // Toggle dropdown (menggunakan logika Anda)
    dropdownButton.addEventListener('click', function(e) {
        e.stopPropagation();
        // Toggle dropdown visibility
        dropdownMenu.classList.toggle('hidden');

        // Toggle caret rotation
        if (dropdownMenu.classList.contains('hidden')) {
            caretIcon.style.transform = 'rotate(0deg)';
        } else {
            caretIcon.style.transform = 'rotate(180deg)';
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            caretIcon.style.transform = 'rotate(0deg)';
        }
    });

    // Handle radio button change
    document.querySelectorAll('input[name="mode"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const mode = this.value;
            const config = modeConfigs[mode];

            // Update judul
            document.getElementById('selectedMode').textContent = config.title;

            // Tutup dropdown
            dropdownMenu.classList.add('hidden');
            caretIcon.style.transform = 'rotate(0deg)';

            // Load data baru
            loadChartData(mode);
        });
    });

    // Load initial data (power mode)
    loadChartData('power');
</script>


</html>