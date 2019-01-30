@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cell
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cell, ['route' => ['cells.update', $cell->id], 'method' => 'patch']) !!}

                        @include('cells.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection