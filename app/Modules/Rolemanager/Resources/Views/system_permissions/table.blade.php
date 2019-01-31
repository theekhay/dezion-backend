<table class="table table-responsive" id="systemPermissions-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($systemPermissions as $systemPermission)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['systemPermissions.destroy', $systemPermission->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('systemPermissions.show', [$systemPermission->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('systemPermissions.edit', [$systemPermission->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>