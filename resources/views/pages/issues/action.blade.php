<a class="btn btn-info pt-0 pb-0" href="{{ route('issues.show',$issue->id) }}">Detail</a>

<a class="btn btn-primary pt-0 pb-0" href="{{ route('issues.edit',$issue->id) }}">Edit</a>

	{!! Form::open(['method' => 'DELETE','route' => ['issues.destroy', $issue->id],'style'=>'display:inline']) !!}
	{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
	{!! Form::close() !!}