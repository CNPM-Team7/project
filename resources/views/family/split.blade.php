@extends('layouts.master')

@section('header')
<div class="flex flex-col gap-y-4">
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
                           class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Hộ khẩu</a>
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
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Tach hộ khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <x-input-text name="house_id" mandatory>
        House ID
    </x-input-text>

    <x-input-text name="address" mandatory>
        Address
    </x-input-text>

    <div>
        <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
            <div class="flex w-full items-center justify-between">
                <label>
                    Family ID
                </label>
                <input id="family_id" onchange="getMembers()" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" /> 
            </div>
            <span class="text-red-500">(*)</span>
        </div>
    </div>

    {{-- TODO tim theo ten thanh vien? --}}
    <div id="members"></div>
    <br>
    <div>SELECTED:</div>
    <div id="selected"></div>
    <br>
    <x-input-text name="owner_id" mandatory>
        Owner ID
    </x-input-text>
    <br>
    <button onclick="done()" class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button> {{-- TODO make it center --}}

    <script>
        let members = [];
        let selected = [];
        let selectedClass = 'text-red-500';

        function getMembers() {
            let familyId = document.getElementById('family_id').value
            fetch("/families/members/" + familyId)
                .then(response => response.json())
                .then(data => {
                    members = data
                    const membersDiv = document.getElementById('members')
                    membersDiv.innerHTML = ''

                    members.forEach((element, index) => {
                        let isSelected = false
                        for (let i in selected) {
                            if (selected[i].id == element.id) {
                                isSelected = true
                                break
                            }
                        }
                        membersDiv.innerHTML += `
                        <div id="memberNo.${index}" onclick="select(${index})" class="${isSelected ? 'text-red-500' : ''}">
                            ${element.name}
                        </div>
                    `
                    }); // TODO show more imprtant data of each member
                })
        }

        function select(memberIndex) {
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
                    <x-input-text name="memberRelationNo.${ element.id }" value="${ element.owner_relation }" placeholder="Con">
                        ${ element.name } (ID: ${ element.id })
                    </x-input-text>
                `
            }); // TODO css cho dep hon
        }

        function done(){
            if(selected.length == 0) return alert('Haven\'t select any one.')
            let data = {
                'house_id': document.querySelector('input[name=house_id]').value,
                'address': document.querySelector('input[name=address]').value,
                'owner_id': document.querySelector('input[name=owner_id]').value,
                'members': {},
            }
            if(!data.house_id || !data.address || !data.owner_id) return alert('Required field can\'t be blank.')
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
@endsection
