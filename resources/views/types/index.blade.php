@include('partitions.sidebar')
@extends('app.layout')
@section('models')
<body>
    <div class="container my-5">
        <h1 class="mb-4">Type List</h1>
        <a href="{{ route('types.create') }}" class="btn btn-primary btn-lg mb-3">
          <i class="fas fa-plus-circle"></i> Add New Types
        </a>
        <div class="card-body">
            <table id="datatablesSimple">
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

            @foreach ($types as $model)
            <tr>
              <td>{{ $model->name }}</td>

              <td>
                <div class="btn-group">
                  <a href="{{ route('types.show', $model->id) }}"
                    class="btn btn-primary btn-sm mr-2">
                    <i class="fas fa-eye"></i> View
                  </a>
                  <a href="{{ route('types.edit', $model->id) }}"
                    class="btn btn-secondary btn-sm mr-2">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form action="{{ route('types.destroy', $model->id) }}"
                    method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash-alt"></i> Delete
                    </button>

                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </body>
  @include('partitions.sidebut')
@endsection
