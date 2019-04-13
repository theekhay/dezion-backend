<table class="table table-responsive" id="modelAddressProximities-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($modelAddressProximities as $modelAddressProximity)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['modelAddressProximities.destroy', $modelAddressProximity->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modelAddressProximities.show', [$modelAddressProximity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('modelAddressProximities.edit', [$modelAddressProximity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>