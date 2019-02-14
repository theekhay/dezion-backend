@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Zone
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($zone, ['route' => ['zones.update', $zone->id], 'method' => 'patch']) !!}

                        @include('zones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection