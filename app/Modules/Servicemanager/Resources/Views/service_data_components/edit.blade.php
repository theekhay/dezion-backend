@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Data Component
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($serviceDataComponent, ['route' => ['serviceDataComponents.update', $serviceDataComponent->id], 'method' => 'patch']) !!}

                        @include('service_data_components.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection