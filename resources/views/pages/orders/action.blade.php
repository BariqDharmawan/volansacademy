@if($order->pdf_url != "")
	<a class="btn btn-info pt-0 pb-0" target="_blank" href="{{ $order->pdf_url }}">PDF</a>
@endif
<a class="btn btn-info pt-0 pb-0" href="{{ route('orders.show',$order->id) }}">Detail</a>
@if($order->status == 'pending')
{!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
{!! Form::submit('Cancel', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk cancel ?");']) !!}
{!! Form::close() !!}
@endif
