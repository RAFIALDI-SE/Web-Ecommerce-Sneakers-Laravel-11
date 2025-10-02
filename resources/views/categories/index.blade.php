<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
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
            max-width: 900px;
            margin: auto;
        }


        .btn-custom-add {
            background-color: #1abc9c !important;
            border-color: #1abc9c !important;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn-custom-add:hover {
            background-color: #16a085 !important;
            border-color: #16a085 !important;
        }


        .table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .table thead th {
            background-color: #f1f5f9;
            color: #334155;
            font-weight: 600;
        }


        .table td:last-child {
            width: 150px;
            white-space: nowrap;
        }
    </style>
</head>
<body>

    <div class="form-container">

        <h2><i data-feather="tags"></i> Daftar Kategori</h2>

        <a href="{{ route('category_create') }}" class="btn btn-custom-add mb-3">
             <i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah Kategori
        </a>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('category_edit', $category->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="{{ route('category_delete', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        {{-- Mengaktifkan Feather Icons --}}
        feather.replace();
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>