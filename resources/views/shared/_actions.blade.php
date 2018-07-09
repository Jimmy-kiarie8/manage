@can('edit_users')
    <a href="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class="btn btn-xs btn-default">
        <i style="color: #000; font-size: 15px" class="fa fa-edit"></i></a>
@endcan

@can('delete_users')
    {!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
        <button type="submit" class="btn btn-xs btn-default">
            <i style="color: #f00; font-size: 15px;" class="fa fa-trash"></i>
        </button>
    {!! Form::close() !!}
@endcan