<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Компани үүсгэх</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Нэр</th>
                    <th>И-мэйл</th>
                    <th>Хаяг</th>
                    <th width="280px">Үйлдэл</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Засах</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Устгах</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $companies->links() !!}
    </div>
</body>
</html>