@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Card Transaction
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cardTransaction, ['route' => ['cardTransactions.update', $cardTransaction->id], 'method' => 'patch']) !!}

                        @include('card_transactions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection