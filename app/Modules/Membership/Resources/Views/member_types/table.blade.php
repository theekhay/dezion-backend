<table class="table table-responsive" id="memberTypes-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($memberTypes as $memberType)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['memberTypes.destroy', $memberType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('memberTypes.show', [$memberType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('memberTypes.edit', [$memberType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>