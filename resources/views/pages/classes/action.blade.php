
<a class="btn btn-primary pt-0 pb-0" href="{{ route('classes.edit',$class->id) }}">Edit</a>
<a class="btn btn-info pt-0 pb-0" href="{{ route('classes.show',$class->id) }}">Sub Program</a>
{!! Form::open(['method' => 'DELETE','route' => ['classes.destroy', $class->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}