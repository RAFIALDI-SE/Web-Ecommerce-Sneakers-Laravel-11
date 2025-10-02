<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #a0c4ff, #4dabf7);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #1e3a8a;
            font-weight: 600;
            margin-bottom: 40px;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            /* Lebar diperbesar untuk layout 2 kolom */
            max-width: 800px;
            margin: auto;
        }

        label {
            color: #34495e;
            font-weight: bold;
        }

        /* Menambahkan selector untuk <select> */
        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="file"],
        textarea,
        select.form-control { /* Ditambahkan untuk select */
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        /* Gambar produk yang sedang diedit */
        .current-image {
            display: block;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #bdc3c7;
            padding: 5px;
        }

        button {
            background-color: #1abc9c;
            color: white;
            border: none;
            padding: 14px 22px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2><i data-feather="edit"></i> Edit Data Product</h2>

        <form action="{{route('edit_data', $products->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            @method('PATCH')


            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $products->name) }}" required>
                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price">Harga:</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $products->price) }}" required>
                        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Kategori:</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $products->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="stock">Kuantitas (Stok):</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $products->stock) }}" required>
                        @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Gambar (upload baru jika ingin mengganti):</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image') <div class="text-danger">{{ $message }}</div> @enderror


                        <label class="mt-3">Gambar Saat Ini:</label>
                        <img src="/gambar/{{$products->image}}" alt="Product Image" class="current-image" width="100%">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $products->description) }}</textarea>
                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit">Update Product</button>
        </form>
    </div>

    <script>
        feather.replace();  
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>