<table class="table table-responsive" id="unAssimilatedBuckets-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($unAssimilatedBuckets as $unAssimilatedBucket)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['unAssimilatedBuckets.destroy', $unAssimilatedBucket->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('unAssimilatedBuckets.show', [$unAssimilatedBucket->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('unAssimilatedBuckets.edit', [$unAssimilatedBucket->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>