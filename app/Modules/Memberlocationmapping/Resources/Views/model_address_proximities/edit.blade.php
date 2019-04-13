@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Model Address Proximity
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($modelAddressProximity, ['route' => ['modelAddressProximities.update', $modelAddressProximity->id], 'method' => 'patch']) !!}

                        @include('model_address_proximities.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection