@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Church
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($church, ['route' => ['churches.update', $church->id], 'method' => 'patch']) !!}

                        @include('churches.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection