@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Tambah Kategori
</h1>

<form method="POST"
      action="{{ route('categories.store') }}"
      class="bg-white p-6 rounded shadow space-y-4">

    @csrf

    <div>
        <label>Nama Kategori</label>
        <input type="text"
               name="name"
               class="border p-2 w-full"
               placeholder="Masukkan nama kategori"
               required>
    </div>

    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan Kategori
    </button>

</form>

@endsection