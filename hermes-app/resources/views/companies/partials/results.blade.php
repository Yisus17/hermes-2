<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Sector</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->sector->name}}</td>
                <td>
                    <form action="{{ route('companies.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a este usuario?');">
                        @method('DELETE')
                        @csrf
                        <a href="{{route('companies.show', $item->id)}}" class="btn btn-primary btn-sm" title="Mostrar emprendimiento"><i class="fas fa-eye"></i></a>
                        <a href="{{route('companies.edit', $item)}}" class="btn btn-success btn-sm" title="Editar emprendimiento"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar emprendimiento"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$companies->links()}}