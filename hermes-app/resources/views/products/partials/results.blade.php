<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"><span class="guide-field">*</span>Modelo</th>
        <th scope="col"><span class="guide-field">*</span>Marca</th>
        <th scope="col"><span class="guide-field">*</span>Descripción</th>
        <th scope="col"><span class="guide-field">*</span>Categoria</th>
        <th scope="col">Precio ({{auth()->user()->company->currency}})</th>
        <!-- <th scope="col">Fecha de compra</th> -->
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $item)
      @if(!$item->deleted)
      <tr>
        <td>{{ $item->model }}</td>
        <td>{{ $item->brand }}</td>
        <!--Limita caracteres de la celda-->
        <td>{{\Illuminate\Support\Str::limit($item->description,50 , '...') }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->purchase_price ? $item->purchase_price : ''  }}</td>
        <!-- <td>{{ $item->purchase_date ? $item->purchase_date->format('d/m/Y') : ''}}</td> -->
        <td id="actions_td">
          <form action="{{ route('products.destroy',$item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas desactivar a este producto?');">
            @method('DELETE')
            @csrf
            <a href="{{route('products.show', $item->id)}}" class="btn btn-primary btn-sm" title="Mostrar producto"><i class="fas fa-eye"></i></a>
            <a href="{{route('products.edit', $item)}}" class="btn btn-success btn-sm" title="Editar producto"><i class="fas fa-edit"></i></a>
            <button type="submit" class="btn btn-danger btn-sm" title="Desactivar producto"><i class="fa fa-minus-circle"></i></button>
          </form>

        </td>
      </tr>
      @endif

      @endforeach
    </tbody>
  </table>
</div>
{{$products->links()}}