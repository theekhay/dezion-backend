<table class="table table-responsive" id="serviceDataCategories-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($serviceDataCategories as $serviceDataCategory)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['serviceDataCategories.destroy', $serviceDataCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('serviceDataCategories.show', [$serviceDataCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('serviceDataCategories.edit', [$serviceDataCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>