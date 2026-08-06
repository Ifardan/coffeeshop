@extends('layouts.owner')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Tambah Meja
</h1>

<form method="POST" action="{{ route('tables.store') }}">
    @csrf

    <div class="mb-4">
        <label>Nomor Meja</label>
        <input type="number"
               name="table_number"
               class="border p-2 w-full"
               placeholder="Contoh: 1">
    </div>

    <div class="mb-4">
        <label>Kapasitas</label>
        <input type="number"
               name="capacity"
               class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label>Status</label>
        <select name="status" class="border p-2 w-full rounded">

            <option value="active">
               Aktif
            </option>

            <option value="inactive">
                Nonaktif
            </option>

        </select>
    </div>

    <div class="mb-4">
        <label>Deskripsi</label>
        <textarea name="description" class="border p-2 w-full"></textarea>
    </div>

    <button class="bg-green-500 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection