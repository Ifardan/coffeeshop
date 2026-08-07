@extends('layouts.owner')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Kelola User
</h1>

<div class="bg-white rounded shadow overflow-hidden">

    <table class="w-full text-left">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-3 border">Nama</th>
                <th class="p-3 border">Email</th>
                <th class="p-3 border">Role</th>
                <th class="p-3 border">Tanggal Dibuat</th>
            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

            <tr>

                <td class="p-3 border">
                    {{ $user->name }}
                </td>

                <td class="p-3 border">
                    {{ $user->email }}
                </td>

                <td class="p-3 border">
                    {{ $user->role }}
                </td>

                <td class="p-3 border">
                    {{ $user->created_at }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection