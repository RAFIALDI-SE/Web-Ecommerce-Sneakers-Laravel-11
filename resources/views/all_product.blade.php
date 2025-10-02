<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Product</title>
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


        .main-container {
            max-width: 1200px;
            margin: auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;

        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            border-radius: 5px;
            width: 100%;
            max-width: 100px;
            height: auto;
            object-fit: cover;
            margin: 0;
        }

        .btn {
            padding: 8px 12px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn i {
            width: 14px;
            height: 14px;
        }

        .btn-update {
            background-color: #1abc9c;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-update:hover {
            background-color: #16a085;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .btn-add {
            background-color: #1abc9c !important;
            border-color: #1abc9c !important;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            transition: background-color 0.3s;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #16a085 !important;
            border-color: #16a085 !important;
        }
    </style>
</head>
<body>

    <div class="main-container">
        <h2><i data-feather="box"></i> Daftar Product</h2>


        <a href="{{ route('create_view') }}" class="btn btn-add">
             <i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah Product
        </a>

        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>

                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                            <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>
                                <img src="/gambar/{{$product->image}}" alt="{{$product->name}} Image">
                            </td>
                            <td style="white-space: nowrap;">
                                <a href="{{route('edit_view', $product->id)}}" class="btn btn-update">
                                    <i data-feather="edit"></i> Update
                                </a>
                                <form action="{{route('delete_product', $product->id)}}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i data-feather="trash-2"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        feather.replace();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>