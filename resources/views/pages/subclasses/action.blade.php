<a class="btn btn-info pt-0 pb-0" href="{{ route('classes.subclasses.photo', [$subclass->id]) }}">Alumni</a>
<a class="btn btn-info pt-0 pb-0" href="{{ route('classes.subclasses.chat', [$subclass->id]) }}">Testi Chat</a>
@can('subclass-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('classes.subclasses.edit',[$class->id, $subclass->id]) }}">Edit</a>
@endcan
@can('subclass-delete')
{!! Form::open(['method' => 'DELETE','route' => ['classes.subclasses.destroy', [$class->id, $subclass->id]],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}
@endcan