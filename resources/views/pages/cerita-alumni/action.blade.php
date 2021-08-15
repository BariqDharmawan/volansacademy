<a class="btn btn-info pt-0 pb-0" href="{{ route('cerita-alumni.show',$video->id) }}">Detail</a>
<a class="btn btn-primary pt-0 pb-0" href="{{ route('cerita-alumni.edit',$video->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['cerita-alumni.destroy', $video->id],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}