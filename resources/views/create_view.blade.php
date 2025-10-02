<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Product</title>
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

            max-width: 800px;
            margin: auto;
        }

        label {
            color: #34495e;
            font-weight: bold;
        }


        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="file"],
        textarea,
        select.form-control {
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
        <h2><i data-feather="box"></i> Tambah Data Product</h2>

        <form action="{{route('add_product')}}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price">Harga:</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>


                    <div class="mb-3">
                        <label for="category_id">Kategori:</label>

                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="stock">Kuantitas (Stok):</label>
                        <input type="number" name="stock" id="stock" class="form-control" required>
                        @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Gambar:</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit">Tambah Product</button>
        </form>
    </div>

    <script>
        feather.replace();  
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>