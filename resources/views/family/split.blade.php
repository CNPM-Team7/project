@extends('layouts.master')

@section('header')
    <div class="flex flex-col gap-y-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tách hộ khẩu') }}
        </h2>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center font-medium text-sm text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Trang chủ
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('families.index') }}"
                           class="inline-flex items-center font-medium text-sm text-gray-700 hover:text-gray-900">Hộ khẩu</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span
                            class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Tách hộ khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')

    <div class="overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg select-none">

        <div class="w-full flex flex-col space-y-10 items-center"
             x-data="{
                family_id: '',
                name: '',
                id_number: '',
                members: [],
                selecteds: [],
                getMemberByName() {
                    this.id_number = ''
                    this.family_id = ''
                    let url = '/person/get/name/' + this.name //TODO loc nhung nguoi dang tam tru ra
                    fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.members = data
                        //check xem da duoc chon hay chua
                        this.selecteds.forEach(selected_item =>{
                            this.members = this.members.filter(member_item =>{
                                return member_item.id !== selected_item.id
                            })
                        })
                    })
                },
                getMemberByIdNumber() {
                    this.name = ''
                    this.family_id = ''
                    let url = '/person/get/id_number/' + this.id_number //TODO loc nhung nguoi dang tam tru ra
                    fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.members = data
                        //check xem da duoc chon hay chua
                        this.selecteds.forEach(selected_item =>{
                            this.members = this.members.filter(member_item =>{
                                return member_item.id !== selected_item.id
                            })
                        })
                    })
                },
                getMembersByFamily() {
                    let url = '/families/members/' + this.family_id
                    fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.members = data
                        //check xem da duoc chon hay chua
                        this.selecteds.forEach(selected_item =>{
                            this.members = this.members.filter(member_item =>{
                                return member_item.id !== selected_item.id
                            })
                        })
                    })
                },
                select(item){
                    let index = this.members.indexOf(item)
                    if (index !== -1)
                        this.members.splice(index, 1)
                    this.selecteds.push(item)
                },
                unselect(item){
                    let index = this.selecteds.indexOf(item)
                        if (index !== -1){
                            this.selecteds.splice(index, 1)
                                if (this.family_id != '' && item.family_id == this.family_id){
                                    this.members.push(item)
                                }
                        }
                },
                submit(){
                    if (this.selecteds.length == 0){
                        return alert('selecteds is null')
                    }

                    send_request(this.selecteds)
                }
             }">
            {{--        <div class="flex flex-col w-80">--}}
            {{--            <x-input-text name="house_id" mandatory>--}}
            {{--                House ID--}}
            {{--            </x-input-text>--}}

            {{--            <x-input-text name="address" mandatory>--}}
            {{--                Address--}}
            {{--            </x-input-text>--}}

            {{--            <div>--}}
            {{--                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">--}}
            {{--                    <div class="flex w-full items-center justify-between">--}}
            {{--                        <label>--}}
            {{--                            Family ID--}}
            {{--                        </label>--}}
            {{--                        <input id="family_id" onchange="getMembers()"--}}
            {{--                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>--}}
            {{--                    </div>--}}
            {{--                    <span class="text-red-500">(*)</span>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{-- TODO tim theo ten thanh vien? --}}
            {{--            <div id="members"></div>--}}
            {{--            <br>--}}
            {{--            <div>SELECTED:</div> --}}
            {{--            <div id="selected"></div>--}}
            {{--            <br>--}}
            {{--            <x-input-text name="owner_id" mandatory>--}}
            {{--                Owner ID--}}
            {{--            </x-input-text>--}}
            {{--        </div>--}}


            <div class="flex flex-col justify-between space-y-8">

                <div class="flex flex-row space-x-6">
                    <div class="flex flex-row items-center gap-x-2">
                        <div class="flex items-center justify-between space-x-4">
                            <label for="family_id">
                                Họ tên
                            </label>
                            <input name="family_id" id="family_id" type="text"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2"
                                   x-model="name"
                                   @input.debounce="getMemberByName()"
                            >
                        </div>
                    </div>

                    <div class="flex flex-row items-center gap-x-2">
                        <div class="flex items-center justify-between space-x-4">
                            <label for="family_id">
                                Số MCND/CCCD
                            </label>
                            <input name="family_id" id="family_id" type="text"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2"
                                   x-model="id_number"
                                   @input.debounce="getMemberByIdNumber()"
                            >
                        </div>
                    </div>

                    <div class="flex flex-row items-center gap-x-2">
                        <div class="flex items-center justify-between space-x-4">
                            <label for="family_id">
                                Mã hộ khẩu
                            </label>
                            <input name="family_id" id="family_id" type="text" value="{{ old('family_id') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2"
                                   x-model="family_id"
                                   @input.debounce="getMembersByFamily()"
                            >
                        </div>
                    </div>

                </div>

                <div class="flex flex-col space-y-4 items-center">
                    <div class="overflow-auto h-56 w-3/4 bg-white rounded rounded-lg">
                        <table class="w-full divide-y divide-gray-200 overflow-auto relative">
                            <thead class="bg-gray-200 sticky top-0">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                    Số CMND/CCCD
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Họ tên
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Địa chỉ
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32">
                                    Quan hệ với chủ hộ
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">

                            <template x-if="members.length === 0">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap row-span-full" colspan="4">
                                        <div class="flex justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span class="font-medium py-8 text-gray-400">Không có thông tin</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </template>

                            <template x-if="members.length !== 0">
                                <template x-for="item in members" :key="item.id">
                                    <tr class="hover:bg-gray-100 cursor-pointer" @click="select(item)">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex justify-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span x-text="item.id_number"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span x-text="item.name" class="truncate"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span x-text="item.address" class="truncate"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span x-text="item.owner_relation" class="truncate"></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </template>

                            </template>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-center">
                        <div class="w-auto rounded-full p-1.5 bg-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="30" height="30"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                   stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                   stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none"
                                   style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#ffffff">
                                        <path
                                            d="M143.27734,34.32161c-1.51229,0.03575 -2.94918,0.66766 -3.99765,1.75807l-53.27969,53.27969l-53.27969,-53.27969c-1.07942,-1.10959 -2.56163,-1.73559 -4.10963,-1.73568c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l57.33333,57.33333c2.23904,2.23811 5.86825,2.23811 8.10729,0l57.33333,-57.33333c1.70419,-1.63875 2.22781,-4.1555 1.31865,-6.33798c-0.90916,-2.18248 -3.06468,-3.58317 -5.42829,-3.52739zM143.27734,74.45495c-1.51229,0.03575 -2.94918,0.66767 -3.99765,1.75808l-53.27969,53.27969l-53.27969,-53.27969c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568c-2.33303,0.00061 -4.43307,1.41473 -5.31097,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l57.33333,57.33333c2.23904,2.23811 5.86825,2.23811 8.10729,0l57.33333,-57.33333c1.70419,-1.63875 2.22781,-4.1555 1.31865,-6.33798c-0.90916,-2.18248 -3.06468,-3.58317 -5.42829,-3.52739z"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="overflow-auto h-52 w-3/4 bg-white rounded rounded-lg">
                        <table class="w-full divide-y divide-gray-200 overflow-auto relative">
                            <thead class="bg-gray-200 sticky top-0">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                    Số CMND/CCCD
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Họ tên
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Địa chỉ
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32">
                                    Quan hệ với chủ hộ
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">

                            <template x-if="selecteds.length === 0">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap row-span-full" colspan="4">
                                        <div class="flex justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span class="font-medium py-8 text-gray-400">Không có thông tin</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </template>

                            <template x-if="selecteds.length !== 0">
                                <template x-for="item in selecteds" :key="item.id">
                                    <tr class="hover:bg-gray-100 cursor-pointer" @click="unselect(item)">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex justify-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span x-text="item.id_number"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span x-text="item.name" class=""></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            a
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            b
                                        </td>
                                    </tr>
                                </template>

                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <x-button-default class="bg-green-400 hover:bg-green-500 focus:ring-green-300" @click="submit">
                Hoàn thành
            </x-button-default>
        </div>

        {{--        <div class="flex flex-col my-4">--}}
        {{--            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
        {{--                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">--}}
        {{--                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}
        {{--                        <table class="min-w-full divide-y divide-gray-200">--}}
        {{--                            <thead class="bg-gray-200">--}}
        {{--                            <tr>--}}
        {{--                                <th scope="col"--}}
        {{--                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
        {{--                                    Mã hộ khẩu--}}
        {{--                                </th>--}}
        {{--                                <th scope="col"--}}
        {{--                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
        {{--                                    Họ tên chủ hộ--}}
        {{--                                </th>--}}
        {{--                                <th scope="col"--}}
        {{--                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
        {{--                                    Địa chỉ--}}
        {{--                                </th>--}}
        {{--                            </tr>--}}
        {{--                            </thead>--}}

        {{--                            <tbody class="bg-white divide-y divide-gray-200">--}}
        {{--                            @foreach($families as $family)--}}
        {{--                                <tr>--}}
        {{--                                    <td class="px-6 py-4 whitespace-nowrap">--}}
        {{--                                        <div class="flex justify-center">--}}
        {{--                                            <div class="text-sm font-medium text-gray-900">--}}
        {{--                                                {{ $family->id }}--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </td>--}}
        {{--                                    <td class="px-6 py-4 whitespace-nowrap">--}}
        {{--                                        <div class="flex items-center">--}}
        {{--                                            <div class="text-sm font-medium text-gray-900">--}}
        {{--                                                {{ $family->owner->name ?? '' }}--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </td>--}}
        {{--                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
        {{--                                        {{ $family->address }}--}}
        {{--                                    </td>--}}
        {{--                                </tr>--}}
        {{--                            @endforeach--}}
        {{--                            </tbody>--}}
        {{--                        </table>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <br>--}}
        {{--            <div>{{ $families->links() }}</div>--}}
        {{--        </div>--}}
    </div>
@endsection
{{--<script>--}}
{{--    let selected = [];--}}
{{--    let selectedClass = 'text-red-500';--}}

{{--    function done() {--}}
{{--        if (selected.length == 0) return alert('Haven\'t select any one.')--}}
{{--        let data = {--}}
{{--            'house_id': document.querySelector('input[name=house_id]').value,--}}
{{--            'address': document.querySelector('input[name=address]').value,--}}
{{--            'owner_id': document.querySelector('input[name=owner_id]').value,--}}
{{--            'members': {},--}}
{{--        }--}}
{{--        if (!data.house_id || !data.address || !data.owner_id) return alert('Required field can\'t be blank.')--}}
{{--        selected.forEach(member => {--}}
{{--            data.members[member.id] = document.getElementById('memberRelationNo.' + member.id).value || 'Con'--}}
{{--        })--}}

{{--        fetch("/families/split", {--}}
{{--            method: 'POST',--}}
{{--            headers: {--}}
{{--                'Content-Type': 'application/json',--}}
{{--                "X-CSRF-TOKEN": "{{ csrf_token() }}",--}}
{{--            },--}}
{{--            body: JSON.stringify(data),--}}
{{--        }).then(response => { // TODO redirect to families index--}}
{{--            console.log(response)--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}

<script>
    function send_request(data) {
        fetch('/families/split', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json());
    }
</script>
