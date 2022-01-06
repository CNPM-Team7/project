@extends('layouts.master')
@section('header')


    <div class="flex flex-col gap-y-4">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thống kê') }}
        </h2>

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>

                        <span class="ml-1 text-sm text-gray-400 md:ml-2 dark:text-gray-500">Trang chủ</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg">

        <div class="w-full flex flex-col select-none my-4">

            <div class="w-full px-24 py-2 flex flex-row gap-x-5 justify-between">
                <div class="flex flex-col gap-y-3">
                        <span class="font-bold">
                            Tổng số nhân khẩu
                        </span>
                    <div>
                        <span class="text-5xl font-bold select-text">9999</span>
                    </div>
                </div>

                <div class="flex flex-col gap-y-3">
                        <span class="font-bold">
                            Tỉ lệ nam nữ
                        </span>
                    <div class="flex flex-row gap-x-10">
                        <div class="flex flex-row gap-x-2">
                            <svg class="fill-current text-blue-500"
                                 width="50" height="50"
                                 viewBox="0 0 50 50">
                                <path
                                    d="M 25.875 3.40625 C 21.203125 3.492188 18.21875 5.378906 16.9375 8.3125 C 15.714844 11.105469 15.988281 14.632813 16.875 18.28125 C 16.398438 18.839844 16.019531 19.589844 16.15625 20.71875 C 16.304688 21.949219 16.644531 22.824219 17.125 23.4375 C 17.390625 23.773438 17.738281 23.804688 18.0625 23.96875 C 18.238281 25.015625 18.53125 26.0625 18.96875 26.9375 C 19.21875 27.441406 19.503906 27.90625 19.78125 28.28125 C 19.90625 28.449219 20.085938 28.546875 20.21875 28.6875 C 20.226563 29.921875 20.230469 30.949219 20.125 32.25 C 19.800781 33.035156 19.042969 33.667969 17.8125 34.28125 C 16.542969 34.914063 14.890625 35.5 13.21875 36.21875 C 11.546875 36.9375 9.828125 37.8125 8.46875 39.1875 C 7.109375 40.5625 6.148438 42.449219 6 44.9375 L 5.9375 46 L 46.0625 46 L 46 44.9375 C 45.851563 42.449219 44.886719 40.5625 43.53125 39.1875 C 42.175781 37.8125 40.476563 36.9375 38.8125 36.21875 C 37.148438 35.5 35.515625 34.914063 34.25 34.28125 C 33.035156 33.671875 32.269531 33.054688 31.9375 32.28125 C 31.828125 30.964844 31.835938 29.933594 31.84375 28.6875 C 31.976563 28.542969 32.15625 28.449219 32.28125 28.28125 C 32.554688 27.902344 32.816406 27.4375 33.0625 26.9375 C 33.488281 26.0625 33.796875 25.011719 33.96875 23.96875 C 34.28125 23.804688 34.617188 23.765625 34.875 23.4375 C 35.355469 22.824219 35.695313 21.949219 35.84375 20.71875 C 35.976563 19.625 35.609375 18.902344 35.15625 18.34375 C 35.644531 16.757813 36.269531 14.195313 36.0625 11.5625 C 35.949219 10.125 35.582031 8.691406 34.71875 7.5 C 33.929688 6.40625 32.648438 5.609375 31.03125 5.28125 C 29.980469 3.917969 28.089844 3.40625 25.90625 3.40625 Z M 25.90625 5.40625 C 25.917969 5.40625 25.925781 5.40625 25.9375 5.40625 C 27.949219 5.414063 29.253906 6.003906 29.625 6.65625 L 29.875 7.0625 L 30.34375 7.125 C 31.734375 7.316406 32.53125 7.878906 33.09375 8.65625 C 33.65625 9.433594 33.96875 10.519531 34.0625 11.71875 C 34.25 14.117188 33.558594 16.910156 33.125 18.21875 L 32.875 19 L 33.5625 19.40625 C 33.519531 19.378906 33.945313 19.667969 33.84375 20.5 C 33.726563 21.480469 33.492188 21.988281 33.3125 22.21875 C 33.132813 22.449219 33.039063 22.4375 33.03125 22.4375 L 32.1875 22.5 L 32.09375 23.3125 C 32 24.175781 31.652344 25.234375 31.25 26.0625 C 31.046875 26.476563 30.839844 26.839844 30.65625 27.09375 C 30.472656 27.347656 30.28125 27.488281 30.375 27.4375 L 29.84375 27.71875 L 29.84375 28.3125 C 29.84375 29.761719 29.785156 30.949219 29.9375 32.625 L 29.9375 32.75 L 30 32.875 C 30.570313 34.410156 31.890625 35.367188 33.34375 36.09375 C 34.796875 36.820313 36.464844 37.355469 38.03125 38.03125 C 39.597656 38.707031 41.03125 39.515625 42.09375 40.59375 C 42.9375 41.449219 43.46875 42.582031 43.75 44 L 8.25 44 C 8.53125 42.585938 9.058594 41.449219 9.90625 40.59375 C 10.972656 39.515625 12.425781 38.707031 14 38.03125 C 15.574219 37.355469 17.230469 36.820313 18.6875 36.09375 C 20.144531 35.367188 21.492188 34.410156 22.0625 32.875 L 22.125 32.625 C 22.277344 30.949219 22.21875 29.761719 22.21875 28.3125 L 22.21875 27.71875 L 21.6875 27.4375 C 21.777344 27.484375 21.5625 27.347656 21.375 27.09375 C 21.1875 26.839844 20.957031 26.476563 20.75 26.0625 C 20.335938 25.234375 19.996094 24.167969 19.90625 23.3125 L 19.8125 22.5 L 18.96875 22.4375 C 18.960938 22.4375 18.867188 22.449219 18.6875 22.21875 C 18.507813 21.988281 18.273438 21.480469 18.15625 20.5 C 18.058594 19.667969 18.480469 19.378906 18.4375 19.40625 L 19.09375 19 L 18.90625 18.28125 C 17.964844 14.65625 17.800781 11.363281 18.78125 9.125 C 19.757813 6.894531 21.75 5.492188 25.90625 5.40625 Z"></path>
                            </svg>
                            <div class="flex flex-col">
                                <span>Nam</span>
                                <span class="select-text">2342</span>
                            </div>
                        </div>
                        <div class="flex flex-row gap-x-2">
                            <svg class="fill-current text-pink-500"
                                 width="50" height="50"
                                 viewBox="0 0 50 50">
                                <path
                                    d="M 25.099609 4 C 21.187648 4 18.442055 5.4726727 16.738281 7.7089844 C 15.034508 9.9452961 14.32484 12.825753 13.970703 15.716797 C 13.616566 18.60784 13.626852 21.539254 13.511719 23.892578 C 13.454149 25.06924 13.362796 26.101381 13.201172 26.873047 C 13.039547 27.644713 12.788443 28.114478 12.626953 28.261719 A 1.0001 1.0001 0 0 0 12.300781 29 C 12.300781 29.697222 12.684708 30.336276 13.173828 30.748047 C 13.662948 31.159818 14.255651 31.432222 14.945312 31.662109 C 16.069509 32.036842 17.623189 32.234351 19.230469 32.423828 C 19.225969 32.457098 19.230095 32.469069 19.224609 32.505859 C 18.912521 33.285288 18.184953 33.907381 17.029297 34.507812 C 15.845366 35.122937 14.303273 35.670987 12.740234 36.375 C 11.177196 37.079013 9.5759657 37.946747 8.3046875 39.300781 C 7.0334093 40.654816 6.1385476 42.511977 6.0019531 44.943359 A 1.0001 1.0001 0 0 0 7 46 L 24 46 L 30.800781 46 L 43 46 A 1.0001 1.0001 0 0 0 43.998047 44.943359 C 43.861452 42.511977 42.966592 40.654816 41.695312 39.300781 C 40.424034 37.946747 38.822804 37.079013 37.259766 36.375 C 35.696727 35.670987 34.154634 35.122937 32.970703 34.507812 C 31.810766 33.905156 31.079575 33.281571 30.769531 32.498047 C 30.765931 32.454547 30.765819 32.451099 30.761719 32.412109 C 32.501963 32.186011 34.157165 31.896479 35.332031 31.447266 C 36.03094 31.180036 36.612885 30.886987 37.083984 30.515625 C 37.555072 30.144265 38 29.629936 38 28.900391 A 1.0001 1.0001 0 0 0 37.671875 28.158203 C 37.537048 28.036016 37.306541 27.618928 37.166016 26.910156 C 37.025491 26.201385 36.955277 25.245365 36.931641 24.154297 C 36.884371 21.97216 37.008279 19.247268 36.886719 16.566406 C 36.76515 13.885545 36.421748 11.234341 35.279297 9.1171875 C 34.186364 7.0917993 32.179812 5.6696953 29.363281 5.546875 C 28.933783 5.153761 27.566089 4 25.099609 4 z M 25.099609 6 C 27.199609 6 28.269531 7.1816406 28.269531 7.1816406 A 1.0001 1.0001 0 0 0 29 7.5 C 31.426835 7.5 32.638154 8.4366853 33.517578 10.066406 C 34.397002 11.696128 34.772738 14.101565 34.888672 16.658203 C 35.004605 19.214842 34.883974 21.907528 34.933594 24.197266 C 34.958394 25.342135 35.022164 26.386115 35.203125 27.298828 C 35.324752 27.912281 35.542247 28.455518 35.839844 28.949219 C 35.616233 29.124474 35.190361 29.35897 34.617188 29.578125 C 33.465004 30.018666 31.733492 30.412286 29.705078 30.605469 A 1.0001 1.0001 0 0 0 28.802734 31.558594 C 28.762054 31.665794 28.699219 31.685871 28.699219 31.800781 C 28.699219 32.334115 28.800781 32.434115 28.800781 32.800781 A 1.0001 1.0001 0 0 0 28.861328 33.146484 C 29.413193 34.639766 30.676509 35.570201 32.048828 36.283203 C 33.421147 36.996205 34.977492 37.540732 36.439453 38.199219 C 37.901414 38.857705 39.251356 39.620831 40.236328 40.669922 C 41.017743 41.502204 41.508074 42.613674 41.771484 44 L 30.800781 44 L 24 44 L 8.2285156 44 C 8.4919259 42.613674 8.9822574 41.502204 9.7636719 40.669922 C 10.748644 39.620831 12.098586 38.857705 13.560547 38.199219 C 15.022508 37.540732 16.578853 36.996205 17.951172 36.283203 C 19.323491 35.570201 20.586807 34.639766 21.138672 33.146484 A 1.0001 1.0001 0 0 0 21.185547 32.964844 C 21.294433 32.311525 21.300781 31.899609 21.300781 31.599609 A 1.0001 1.0001 0 0 0 20.396484 30.605469 C 18.379914 30.40873 16.673802 30.128897 15.578125 29.763672 C 15.030287 29.581059 14.643691 29.372604 14.460938 29.21875 C 14.390367 29.15934 14.421087 29.162236 14.398438 29.134766 C 14.758083 28.592733 15.011507 27.983592 15.158203 27.283203 C 15.36025 26.318541 15.450145 25.208885 15.509766 23.990234 C 15.629007 21.552933 15.621715 18.680441 15.955078 15.958984 C 16.288441 13.237528 16.972524 10.699235 18.328125 8.9199219 C 19.683731 7.1406046 21.661571 6 25.099609 6 z"></path>
                            </svg>
                            <div class="flex flex-col">
                                <span class="select-text">Nữ</span>
                                <span>32423</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-24 h-full container">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>

            <hr>

            <div class="w-full flex flex-col gap-y-3 px-24 py-2">
                <span class="font-bold">Thống kê theo độ tuổi</span>
                <div class="container w-8/12 self-center">
                    <canvas id="ageChart"></canvas>
                </div>
            </div>

            <hr>

            <div class="w-full px-24 py-2 flex flex-col gap-x-5 gap-y-3 justify-between">
                <span class="font-bold">Thống kê tạm trú/tạm vắng</span>


                <div class="flex flex-col my-4">

                    <span class="text-yellow-500">Tạm trú: 999</span>
                    <span class="text-green-500">Tạm vắng: 999</span>


                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-200">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            ID Number {{--hover will show register date, place, recieve date, place--}}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Ngày chuyển tới/chuyển đi {{--hover will show birth place--}}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Gender
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Race
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Job {{--hover will show work place--}}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Owner Relation
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Family Owner
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Note
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Move to
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200">


                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap select-text">
                                            <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-500">
                                            132
                                        </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap select-text">
                                            <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-500">
                                            abc
                                        </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm text-gray-500">1231
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                            ád {{--set length--}}
                                        </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">abc</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">abc</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm text-gray-500">abc
                                            </div> {{--qua dai, rut gon bang '...'--}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm text-gray-500">abc
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm text-gray-500">abc
                                            </div> {{--nhan vao se ra trang info famliy--}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">abc</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">abc</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">{{--show, edit and delete--}}
                                            <a href=""
                                               class="text-indigo-600 hover:text-indigo-500">Edit</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <br>

                </div>


            </div>

        </div>
    </div>

    <script src="{{ asset('js/chart.js') }}"></script>
    <script>

        const data1 = [{
            data: [30, 70], // TODO chart
            labels: ['Nam', 'Nữ'],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1,
        }];

        const options1 = {
            tooltips: {
                enabled: false
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let percentage = (value * 100 / sum).toFixed(2) + "%";
                        return percentage;
                    },
                    color: '#fff',
                },
                legend: {
                    enabled: false,
                }
            }
        };

        const myChart = new Chart(document.getElementById("genderChart").getContext('2d'), {
            type: 'pie',
            data: {
                datasets: data1
            },
            // plugins: [ChartDataLabels],
            options: options1
        });

    </script>

    @php($data = [1, 2, 3, 4, 5, 6])
    <script>
        const maleData = [];
        const male = {!! json_encode($data, JSON_HEX_TAG) !!};
        male.forEach(element => maleData.push(element * (-1)));

        const data = {
            labels: ['Nghỉ hưu', 'Độ tuổi lao động', 'Cấp 3', 'Cấp 2', 'Cấp 1', 'Mẫu giáo'],
            datasets: [
                {
                    label: 'Nam',
                    data: maleData,
                    backgroundColor: 'rgba(54, 162, 235, 1)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                },
                {
                    label: 'Nữ',
                    data: [1, 2, 3, 4, 5, 6],
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                }
            ]
        };

        const tooltip = {
            yAlign: 'bottom',
            titleAlign: 'center',
            bodyAlign: 'center',
            callbacks: {
                label: function (context) {
                    return `${context.dataset.label} ${Math.abs(context.raw)}`;
                }
            }
        }

        const config = {
            type: 'bar',
            data,
            options: {
                indexAxis: 'y',
                scales: {
                    x: {

                        ticks: {
                            callback: function (value, index, values) {
                                return Math.abs(value);
                            }
                        },
                        stacked: true,
                    },
                    y: {
                        beginAtZero: true,
                        stacked: true,
                    }
                },
                responsive: true,
                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: ['green', 'white', 'red'],
                        precision: 2,
                    },
                    legend: {
                        position: 'bottom',
                        align: 'start',
                    },
                    tooltip: tooltip,
                }
            }
        }

        const ageChart = new Chart(
            document.getElementById('ageChart'),
            config
        );
    </script>


@endsection
