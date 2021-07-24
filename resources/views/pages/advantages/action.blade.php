<a class="btn btn-info pt-0 pb-0" href="{{ route('advantages.show',$advantage->id) }}">Detail</a>
@can('advantage-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('advantages.edit',$advantage->id) }}">Edit</a>
@endcan
@can('advantage-delete')
{!! Form::open(['method' => 'DELETE','route' => ['advantages.destroy', $advantage->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}
@endcan