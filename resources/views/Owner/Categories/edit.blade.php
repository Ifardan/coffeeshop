@extends('layouts.owner')

@section('content')

<h1>Edit Kategori</h1>

<form method="POST"
      action="{{ route('categories.update', $category->id) }}"
      class="bg-white p-6 rounded shadow">

    @csrf
    @method('PUT')

    <div>
        <label>Nama Kategori</label>
        <input type="text"
               name="name"
               value="{{ $category->name }}"
               class="border p-2 w-full">
    </div>

    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Update
    </button>

</form>

@endsection