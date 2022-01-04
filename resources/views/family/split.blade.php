@extends('layouts.master')

@section('header')
    <div class="flex flex-col gap-y-4">
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
                           class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Hộ
                            khẩu</a>
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
    <div class="flex flex-col space-y-10 items-center">
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
        {{--            <div>SELECTED:</div> --}}{{-- TODO FE css these, pretify button --}}
        {{--            <div id="selected"></div>--}}
        {{--            <br>--}}
        {{--            <x-input-text name="owner_id" mandatory>--}}
        {{--                Owner ID--}}
        {{--            </x-input-text>--}}
        {{--        </div>--}}

        <div class="flex flex-col w-80"
             x-data="{
                family_id: '',
                members: {},
                getMembers() {
                    let url = '/families/members/' + this.family_id
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                        console.log(data)
                            this.members = data
                        })
                }
             }"
        >
            <div class="flex flex-row space-x-8">
                <div class="w-auto flex flex-row items-center gap-x-2">
                    <div class="flex w-full items-center justify-between">
                        <label for="family_id">
                            Mã hộ khẩu
                        </label>
                        <input name="family_id" id="family_id" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2"
                               x-model="family_id"
                               @input.debounce="getMembers()"
                        >
                    </div>
                </div>

                <div class="flex flex-col">
                    <div></div>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="40" height="40"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><path d="M86,172c-47.49649,0 -86,-38.50351 -86,-86v0c0,-47.49649 38.50351,-86 86,-86v0c47.49649,0 86,38.50351 86,86v0c0,47.49649 -38.50351,86 -86,86z" fill="#ffffff"></path><g id="original-icon" fill="#2ecc71"><path d="M138.44938,41.9223c-0.68674,0.0205 -1.34272,0.3075 -1.82447,0.80974l-50.62386,50.62386l-50.62386,-50.62386c-0.49199,-0.51249 -1.16848,-0.78924 -1.87572,-0.78924c-1.07623,0 -2.02947,0.64574 -2.43946,1.62972c-0.39974,0.99423 -0.164,2.12171 0.60474,2.86995l54.3343,54.3343l54.3343,-54.3343c0.77899,-0.74824 1.01473,-1.90647 0.60474,-2.9007c-0.42024,-0.99423 -1.40422,-1.63997 -2.49071,-1.61947zM138.44938,76.03371c-0.68674,0.0205 -1.34272,0.3075 -1.82447,0.80974l-50.62386,50.62386l-50.62386,-50.62386c-0.49199,-0.51249 -1.16848,-0.78924 -1.87572,-0.79949c-1.07623,0.01025 -2.02947,0.65599 -2.43946,1.63997c-0.39974,0.99423 -0.164,2.12171 0.60474,2.86995l54.3343,54.3343l54.3343,-54.3343c0.77899,-0.74824 1.01473,-1.90647 0.60474,-2.9007c-0.42024,-0.99423 -1.40422,-1.63997 -2.49071,-1.61947z"></path></g></g>
                        </svg>
                    </button>
                    <div>

                    </div>
                </div>
            </div>
        </div>

        <x-button-default class="bg-green-400 hover:bg-green-500 focus:ring-green-300">
            Hoàn thành
        </x-button-default>
    </div>

    <div class="flex flex-col my-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mã hộ khẩu
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Họ tên chủ hộ
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Địa chỉ
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($families as $family)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $family->id }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $family->owner->name ?? '' }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $family->address }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div>{{ $families->links() }}</div>
    </div>
@endsection
<script>
    let selected = [];
    let selectedClass = 'text-red-500';

    // function getMembers(familyId, members) {
    //     console.log(familyId)
    //     fetch("/families/members/" + familyId)
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log(data.items.map(item => item))
    //             members = data.items.map(item => item)
    //         })
    //
    //     console.log(members)
    //         //     members = data
    //         //     const membersDiv = document.getElementById('members')
    //         //     membersDiv.innerHTML = ''
    //         //
    //         //     members.forEach((element, index) => {
    //         //         let isSelected = false
    //         //         for (let i in selected) {
    //         //             if (selected[i].id == element.id) {
    //         //                 isSelected = true
    //         //                 break
    //         //             }
    //         //         }
    //         //         membersDiv.innerHTML += `
    //         //             <div id="memberNo.${index}" onclick="select(${index})" class="${isSelected ? 'text-red-500' : ''}">
    //         //                 ${element.name}
    //         //             </div>
    //         //         `
    //         //     });
    //         // })
    // }

    function select({ memberIndex }) {
        const memberDiv = document.getElementById('memberNo.' + memberIndex)
        if (memberDiv.classList.contains('text-red-500')) {
            for (let i in selected) {
                if (selected[i].id == members[memberIndex].id) {
                    selected.splice(i, 1)
                    break
                }
            }
            memberDiv.classList.remove(selectedClass)
        } else {
            selected.push(members[memberIndex])
            memberDiv.classList.add(selectedClass)
        }

        const selectedDiv = document.getElementById('selected')
        selectedDiv.innerHTML = ''

        selected.forEach((element, index) => {
            selectedDiv.innerHTML += `
                    <x-input-text name="memberRelationNo.${element.id}" value="${element.owner_relation}" placeholder="Con">
                        ${element.name} (ID: ${element.id})
                    </x-input-text>
                `
        }); // TODO FE css cho dep hon
    }

    function done() {
        if (selected.length == 0) return alert('Haven\'t select any one.')
        let data = {
            'house_id': document.querySelector('input[name=house_id]').value,
            'address': document.querySelector('input[name=address]').value,
            'owner_id': document.querySelector('input[name=owner_id]').value,
            'members': {},
        }
        if (!data.house_id || !data.address || !data.owner_id) return alert('Required field can\'t be blank.')
        selected.forEach(member => {
            data.members[member.id] = document.getElementById('memberRelationNo.' + member.id).value || 'Con'
        })

        fetch("/families/split", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify(data),
        }).then(response => { // TODO redirect to families index
            console.log(response)
        });
    }
</script>
