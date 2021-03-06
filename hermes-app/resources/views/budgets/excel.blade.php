<table>
  <tbody>
    <!-- HEADER -->
    <tr>
      <td colspan="9" style="text-align:center; height: 60px">
      </td>
    </tr>
    <tr>
      <th colspan="9" style="text-align:center; font-size: 16px">{{getOnyxBusinessName()}}</th>
    </tr>
    <tr>
      <td colspan="9" style="text-align:center;font-size: 8px">{{getOnyxAddress()}}</td>
    </tr>
    <tr>
      <td colspan="9" style="text-align:center;font-size: 8px">{{getOnyxInfo()}}</td>
    </tr>

    <tr>
      <td colspan="3" style="text-align:left; vertical-align: top"><b>Presupuesto #{{numerationReportFormat($budget->id)}}</b></td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3" style="text-align:right;">Fecha de elaboración: {{ $budget->created_at ? $budget->created_at->format('d/m/Y') : ''}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- CLIENT DATA -->
    <tr>
      <td colspan="1">Contacto</td>
      <td colspan="8">{{$budget->client->business_name}}</td>
    </tr>

    <tr>
      <td colspan="1">Direccion</td>
      <td colspan="8">{{$budget->client->address}}</td>
    </tr>

    <tr>
      <td colspan="1">Teléfono</td>
      <td colspan="8" style="text-align:left;">{{$budget->client->phone}}</td>
    </tr>

    <tr>
      <td colspan="1">Email</td>
      <td colspan="8">{{$budget->client->email}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- BUDGET DATES AND LOCATION -->

    <tr>
      <td colspan="1" style="border: 1px solid black;">Entrega</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->delivery_date) ? $budget->delivery_date->format('d/m/Y') : 'N/A'}}</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->delivery_date) ? $budget->delivery_date->format('H:m') : 'N/A'}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Fin evento</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->end_date) ? $budget->end_date->format('d/m/Y') : 'N/A'}}</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->end_date) ? $budget->end_date->format('H:m') : 'N/A'}}</td>
    </tr>

    <tr>
      <td colspan="1" style="border: 1px solid black;">Montaje</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->instalation_date) ? $budget->instalation_date->format('d/m/Y') : 'N/A'}}</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->instalation_date) ? $budget->instalation_date->format('H:m') : 'N/A'}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Desmontaje</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->uninstalation_date) ? $budget->uninstalation_date->format('d/m/Y') : 'N/A'}}</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->uninstalation_date) ?  $budget->uninstalation_date->format('H:m') : 'N/A'}}</td>
    </tr>

    <tr>
      <td colspan="1" style="border: 1px solid black;">Inicio evento</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->start_date) ? $budget->start_date->format('d/m/Y') : 'N/A'}}</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->start_date) ? $budget->start_date->format('H:m') : 'N/A'}}</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="1" style="border: 1px solid black;">Devolución</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->return_date) ? $budget->return_date->format('d/m/Y') : 'N/A'}}</td>
      <td colspan="1" style="border: 1px solid black;">{{isset($budget->return_date) ? $budget->return_date->format('H:m') : 'N/A'}}</td>
    </tr>

    <tr>
      <td colspan="9" style="border: 1px solid black;">Locación: {{$budget->address}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- PRODUCTS -->

    @if($budget->products)
    @foreach($budget->products->groupBy('category_id') as $products)
    @foreach($products as $key => $product)
    @if($key == 0)
    <tr>
      <td colspan="9" style="font-weight: bold;">{{$product->category->name}}</td>
    </tr>
    <tr>
      <td colspan="1">Cantidad</td>
      <td colspan="6">Descripción</td>
      
      <td colspan="1">P/Unitario</td>
      <td colspan="1">P/Total</td>
    </tr>
    @endif
    <tr>
      <td colspan="1" style="text-align:right;">{{$product->pivot->quantity}}</td>
      <td colspan="6">{{$product->pivot->description}}</td>
      <td colspan="1" style="text-align:right;">{{getFormattedPrice($product->pivot->unit_price)}}€</td>
      <td colspan="1" style="text-align:right;">{{getFormattedPrice($product->pivot->total_price)}}€</td>
    </tr>
    @endforeach
    @endforeach
    @endif
    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- TOTAL PRICES -->

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">TOTAL (BASE IMPONIBLE)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($budget->total)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">IVA ({{$budget->tax_percentage}}%)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($budget->tax_amount)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">TOTAL (IVA INCLUIDO)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($budget->total_with_tax)}}€</td>
    </tr>


    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <tr>
      <td colspan="1">Validez</td>
      <td colspan="8">{{$budget->validity ? findValue(getValidityOptions(), $budget->validity): ''}}</td>
    </tr>
    <tr>
      <td colspan="1">Condiciones de Pago</td>
      <td colspan="8">{{$budget->payment_conditions}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!--BUDGET DEFAULT INFORMATION-->
    <tr>
      <td colspan="9">{{getBudgetMainTextLine1()}}</td>
    </tr>
    <tr>
      <td colspan="9">{{getBudgetMainTextLine2()}}</td>
    </tr>
    <tr>
      <td colspan="9">{{getBudgetMainTextLine3()}}</td>
    </tr>
    @if($budget->notes)
    <!-- NOTES -->
    <tr>
      <td colspan="9">{{$budget->notes}}</td>
    </tr>
    @endif
  </tbody>
</table>