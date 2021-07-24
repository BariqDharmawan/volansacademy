<a class="btn btn-info pt-0 pb-0" href="{{ route('subclasses.photos.show', [$subclass->id, $photo->id]) }}">Detail</a>
@can('subclassalumniphoto-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('subclasses.photos.edit',[$subclass->id, $photo->id]) }}">Edit</a>
@endcan
@can('subclassalumniphoto-delete')
{!! Form::open(['method' => 'DELETE','route' => ['subclasses.photos.destroy', [$subclass->id, $photo->id]],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}
@endcan