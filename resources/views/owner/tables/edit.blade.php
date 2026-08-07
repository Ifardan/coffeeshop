@extends('layouts.owner')

@section('content')

<h1 class="text-2xl font-bold mb-5">
    Edit Meja
</h1>

<form method="POST"
      action="{{ route('tables.update', $table->id) }}"
      class="bg-white p-6 rounded shadow space-y-4">

    @csrf
    @method('PUT')

    <div>
        <label>Nomor Meja</label>
        <input type="text"
               name="table_number"
               value="{{ $table->table_number }}"
               class="border p-2 w-full">
    </div>

    <div>
        <label>Kapasitas</label>
        <input type="number"
               name="capacity"
               value="{{ $table->capacity }}"
               class="border p-2 w-full">
    </div>

    <div>
        <label>Status</label>

        <select name="status" class="border p-2 w-full">

           <option value="active"
               {{ $table->status == 'active' ? 'selected' : '' }}>
               Aktif
           </option>

           <option value="inactive"
               {{ $table->status == 'inactive' ? 'selected' : '' }}>
               Nonaktif
           </option>

        </select>
    </div>

    <div>
        <label>Deskripsi</label>
        <textarea name="description" class="border p-2 w-full">{{ $table->description }}</textarea>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>

</form>

@endsection