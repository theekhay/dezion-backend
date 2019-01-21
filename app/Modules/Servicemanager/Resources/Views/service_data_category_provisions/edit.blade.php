@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Data Category Provision
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($serviceDataCategoryProvision, ['route' => ['serviceDataCategoryProvisions.update', $serviceDataCategoryProvision->id], 'method' => 'patch']) !!}

                        @include('service_data_category_provisions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection