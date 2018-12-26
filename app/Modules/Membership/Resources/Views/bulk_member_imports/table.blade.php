<table class="table table-responsive" id="bulkMemberImports-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bulkMemberImports as $bulkMemberImport)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['bulkMemberImports.destroy', $bulkMemberImport->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bulkMemberImports.show', [$bulkMemberImport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bulkMemberImports.edit', [$bulkMemberImport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>