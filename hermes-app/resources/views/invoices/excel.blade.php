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
      <td colspan="3" style="text-align:left; vertical-align: top"><b>Factura #{{numerationReportFormat($invoice->secuence_number)}}</b></td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3" style="text-align:right;">Fecha de elaboración: {{ $invoice->created_at ? $invoice->created_at->format('d/m/Y') : ''}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- CLIENT DATA -->
    <tr>
      <td colspan="1">Contacto</td>
      <td colspan="8">{{$invoice->client->business_name}}</td>
    </tr>

    <tr>
      <td colspan="1">Direccion</td>
      <td colspan="8">{{$invoice->client->address}}</td>
    </tr>

    <tr>
      <td colspan="1">Teléfono</td>
      <td colspan="8" style="text-align:left;">{{$invoice->client->phone}}</td>
    </tr>

    <tr>
      <td colspan="1">Email</td>
      <td colspan="8">{{$invoice->client->email}}</td>
    </tr>

    <tr>
      <td colspan="1">ID Fiscal</td>
      <td colspan="8" style="text-align:left;">{{$invoice->client->fiscal_id}}</td>
    </tr>

    <tr>
      <td colspan="1">Supplier ID</td>
      <td colspan="8" style="text-align:left;">{{$invoice->client->supplier_id}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!--MAIN TEXT INFORMATION-->
    <tr>
      <td colspan="9">{{getInvoiceMainTextLine1()}}</td>
    </tr>
    <tr>
      <td colspan="9">{{getInvoiceMainTextLine2()}}</td>
    </tr>
    <tr>
      <td colspan="9">{{getInvoiceMainTextLine3()}}</td>
    </tr>

    <!-- SEPARATOR -->
    <tr>
      <td colspan="9"></td>
    </tr>

    <!-- PRODUCTS -->

    @if($invoice->products)
      @foreach($invoice->products->groupBy('category_id') as $products)
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


    @if($invoice->notes)
      <!-- SEPARATOR -->
      <tr>
        <td colspan="9"></td>
      </tr>
      <!-- NOTES -->
      <tr>
        <td colspan="9">{{$invoice->notes}}</td>
      </tr>
    @endif
    <!-- TOTAL PRICES -->

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">TOTAL (BASE IMPONIBLE)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($invoice->total)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">IVA ({{$invoice->tax_percentage}}%)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($invoice->tax_amount)}}€</td>
    </tr>

    <tr>
      <td colspan="1">&nbsp;</td>
      <td colspan="7" style="font-weight: bold;text-align:left;">TOTAL (IVA INCLUIDO)</td>
      <td colspan="1" style="font-weight: bold;text-align:right;">{{getFormattedPrice($invoice->total_with_tax)}}€</td>
    </tr>

  </tbody>
</table>