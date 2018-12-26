<table class="table table-responsive" id="churches-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($churches as $church)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['churches.destroy', $church->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('churches.show', [$church->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('churches.edit', [$church->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>