<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Rol</th>
        <th scope="col">Emprendimiento</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->name }} {{ $item->last_name }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->role->name }}</td>
          <td>{{ $item->company->name }}</td>
          <td>
            <form action="{{ route('users.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar a este usuario?');">
              @method('DELETE')
              @csrf
              <a href="{{route('users.show', $item->id)}}" class="btn btn-primary btn-sm" title="Mostrar usuario"><i class="fas fa-eye" ></i></a>
              <a href="{{route('users.edit', $item)}}" class="btn btn-success btn-sm" title="Editar usuario"><i class="fas fa-edit"></i></a>
              <button type="submit" class="btn btn-danger btn-sm" title="Eliminar usuario"><i class="fa fa-trash" ></i></button>
            </form> 
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div> 
{{$users->links()}}  

