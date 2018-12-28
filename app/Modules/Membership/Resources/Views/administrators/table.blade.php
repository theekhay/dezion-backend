<table class="table table-responsive" id="administrators-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($administrators as $administrator)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['administrators.destroy', $administrator->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('administrators.show', [$administrator->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('administrators.edit', [$administrator->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>