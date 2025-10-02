<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
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
            max-width: 600px;
            margin: auto;
        }

        label {
            color: #34495e;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            font-size: 16px;
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

        <h2><i data-feather="edit"></i> Edit Kategori</h2>

        <form action="{{ route('category_update', $category->id) }}" method="POST">
            @csrf

            @method('PATCH')

            <div class="mb-3">
                <label for="category-name">Nama Kategori:</label>

                <input type="text"
                       name="name"
                       id="category-name"
                       class="form-control"
                       value="{{ old('name', $category->name) }}"
                       required>
            </div>


            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <button type="submit">Update Kategori</button>
        </form>
    </div>

    <script>
        {{-- Mengaktifkan Feather Icons --}}
        feather.replace();
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>