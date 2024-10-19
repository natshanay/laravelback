@include('partitions.sidebar')
@extends('app.layout')
@section('models')
<body>
    <div class="container my-5">
        <h1 class="mb-4">Model List</h1>
        <a href="{{ route('models.create') }}" class="btn btn-primary btn-lg mb-3">
            <i class="fas fa-plus-circle"></i> Add New Model
        </a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                <td>{{ $model->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('models.show', $model->id) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('models.edit', $model->id) }}" class="btn btn-secondary btn-sm me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('models.destroy', $model->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this model?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

  @include('partitions.sidebut')
@endsection
