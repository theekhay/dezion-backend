<table class="table table-responsive" id="workflows-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($workflows as $workflow)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['workflows.destroy', $workflow->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('workflows.show', [$workflow->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('workflows.edit', [$workflow->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>