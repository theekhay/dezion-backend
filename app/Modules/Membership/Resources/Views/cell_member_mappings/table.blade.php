<table class="table table-responsive" id="cellMemberMappings-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cellMemberMappings as $cellMemberMapping)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['cellMemberMappings.destroy', $cellMemberMapping->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cellMemberMappings.show', [$cellMemberMapping->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cellMemberMappings.edit', [$cellMemberMapping->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>