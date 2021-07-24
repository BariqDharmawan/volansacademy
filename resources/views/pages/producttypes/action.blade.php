<a class="btn btn-info pt-0 pb-0" href="{{ route('producttypes.show',$producttype->id) }}">Detail</a>
@can('producttype-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('producttypes.edit',$producttype->id) }}">Edit</a>
@endcan
@can('producttype-delete')
{!! Form::open(['method' => 'DELETE','route' => ['producttypes.destroy', $producttype->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}
@endcan