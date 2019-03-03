<table class="table table-responsive" id="cardTransactions-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cardTransactions as $cardTransaction)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['cardTransactions.destroy', $cardTransaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cardTransactions.show', [$cardTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cardTransactions.edit', [$cardTransaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>