@extends('layouts.master')

@section('content')
    <div>House ID</div>
    <input id="house_id"/>
    <div>Address</div>
    <input id="address"/>

    <div>Family ID</div>
    <input id="family_id" onchange="getMembers()"/> {{-- TODO tim theo ten thanh vien? --}}
    <div id="members"></div>
    <br>
    <div>SELECTED:</div>
    <div id="selected"></div>
    <br>
    <button onclick="done()">Done</button>
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
                    <div>${element.name}</div>
                `
            }); // TODO chon chu ho, set quan he voi chu ho
        }

        function done() {
            if (selected.length == 0) return // alert chua chon ai
            let data = {
                'house_id': document.getElementById('house_id').value, // TODO check required
                'address': document.getElementById('address').value, // TODO check required
                'owner_id': '1',
                'members': {},
            }
            selected.forEach(member => {
                data.members[member.id] = 'Con'
            })
            // TODO set dung chu ho, dung quan he
            fetch("/families/split", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify(data),
            }).then(response => {
                console.log(response)
            });
        }
    </script>
@endsection
