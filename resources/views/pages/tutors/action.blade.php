<a class="btn btn-info pt-0 pb-0" href="{{ route('tutors.show',$tutor->id) }}">Detail</a>
@can('tutor-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('tutors.edit',$tutor->id) }}">Edit</a>
@endcan
@can('tutor-delete')
{!! Form::open(['method' => 'DELETE','route' => ['tutors.destroy', $tutor->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus?");']) !!}
{!! Form::close() !!}
@endcan