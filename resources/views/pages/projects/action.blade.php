<a class="btn btn-info pt-0 pb-0" href="{{ route('projects.show',$project->id) }}">Detail</a>
<a class="btn btn-primary pt-0 pb-0" href="{{ route('projects.edit',$project->id) }}">Edit</a>
	{!! Form::open(['method' => 'DELETE','route' => ['projects.destroy', $project->id],'style'=>'display:inline']) !!}
	{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
	{!! Form::close() !!}