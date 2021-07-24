<a class="btn btn-info pt-0 pb-0" href="{{ route('coupons.show',$coupon->id) }}">Detail</a>
@can('coupon-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('coupons.edit',$coupon->id) }}">Edit</a>
@endcan
@can('coupon-delete')
{!! Form::open(['method' => 'DELETE','route' => ['coupons.destroy', $coupon->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}
@endcan