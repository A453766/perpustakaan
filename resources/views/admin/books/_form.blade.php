<div class="space-y-4">
    <div>
        <label for="title" class="block font-semibold mb-1">Judul</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title ?? '') }}"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
        @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="author" class="block font-semibold mb-1">Penulis</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author ?? '') }}"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
        @error('author') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="year" class="block font-semibold mb-1">Tahun terbit</label>
        <input type="number" id="year" name="year" value="{{ old('year', $book->year ?? '') }}"
               class="w-full border border-gray-300 rounded px-3 py-2">
        @error('year') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="stock" class="block font-semibold mb-1">Stok</label>
        <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $book->stock ?? 1) }}"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
        @error('stock') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description" class="block font-semibold mb-1">Deskripsi</label>
        <textarea id="description" name="description" rows="4"
                  class="w-full border border-gray-300 rounded px-3 py-2">{{ old('description', $book->description ?? '') }}</textarea>
        @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
</div>