<a class="btn btn-info pt-0 pb-0" href="{{ route('subclasses.chats.show', [$subclass->id, $chat->id]) }}">Detail</a>
<a class="btn btn-primary pt-0 pb-0" href="{{ route('subclasses.chats.edit',[$subclass->id, $chat->id]) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['subclasses.chats.destroy', [$subclass->id, $chat->id]],'style'=>'display:inline']) !!}
{!! Form::submit('Hapus', ['class' => 'btn btn-danger pt-0 pb-0', 'onclick' => 'return confirm("Yakin untuk menghapus ?");']) !!}
{!! Form::close() !!}