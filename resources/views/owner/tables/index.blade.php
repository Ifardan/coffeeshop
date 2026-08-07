@extends('layouts.owner')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Kelola Meja
</h1>

<a href="{{ route('tables.create') }}"
   class="bg-green-500 text-white px-4 py-2 rounded">

   Tambah Meja

</a>

<table class="w-full border mt-5">

    <thead>
        <tr>
            <th class="border p-2">Nomor Meja</th>
            <th class="border p-2">Kapasitas</th>
            <th class="border p-2">Status</th>

            <th class="border p-2">Aksi</th>
        </tr>
    </thead>

    <tbody>

    @foreach($tables as $table)

    <tr>

        <td class="border p-2">
            {{ $table->table_number }}
        </td>

        <td class="border p-2">
            {{ $table->capacity }}
        </td>

        <td class="border p-2">
            {{ $table->status }}
        </td>

        <td class="border p-2">
        <a href="{{ route('tables.edit', $table->id) }}"
           class="bg-blue-500 text-white px-2 py-1 rounded">
            Edit
        </a>

        <form action="{{ route('tables.destroy', $table->id) }}"
              method="POST"
              class="inline">
            @csrf
            @method('DELETE')

            <button class="bg-red-500 text-white px-2 py-1 rounded">
                Hapus
            </button>
        </form>
    </td>

    </tr>

    @endforeach

    </tbody>

</table>

@endsection