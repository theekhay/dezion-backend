<table class="table table-responsive" id="adminBranches-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($adminBranches as $adminBranch)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['adminBranches.destroy', $adminBranch->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('adminBranches.show', [$adminBranch->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('adminBranches.edit', [$adminBranch->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>