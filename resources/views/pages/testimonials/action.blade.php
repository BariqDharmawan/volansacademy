<a class="btn btn-info pt-0 pb-0" href="{{ route('testimonial.show',$testimonial->id) }}">Detail</a>
@can('testimonial-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('testimonial.edit',$testimonial->id) }}">Edit</a>
@endcan
@can('testimonial-delete')
{!! Form::open(['method' => 'DELETE','route' => ['testimonial.destroy', $testimonial->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus?");']) !!}
{!! Form::close() !!}
@endcan