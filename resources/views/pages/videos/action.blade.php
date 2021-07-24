<a class="btn btn-info pt-0 pb-0" href="{{ route('videos.show',$video->id) }}">Detail</a>
@can('video-edit')
<a class="btn btn-primary pt-0 pb-0" href="{{ route('videos.edit',$video->id) }}">Edit</a>
@endcan
@can('video-delete')
{!! Form::open(['method' => 'DELETE','route' => ['videos.destroy', $video->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}
@endcan