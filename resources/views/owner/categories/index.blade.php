@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Kelola Kategori
</h1>

<a href="{{ route('categories.create') }}"
   class="bg-blue-500 text-white px-4 py-2 rounded">

   + Tambah Kategori

</a>

<div class="bg-white mt-5 rounded shadow overflow-hidden">

    <table class="w-full text-left">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">Nama Kategori</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($categories as $category)
            <tr>

                <td class="p-3 border">
                    {{ $category->name }}
                </td>

                <td class="p-3 border flex gap-2">

                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="bg-blue-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin hapus?')">

                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 text-white px-3 py-1 rounded">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

</div>

@endsection