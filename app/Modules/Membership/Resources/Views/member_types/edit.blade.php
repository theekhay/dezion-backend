@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Member Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($memberType, ['route' => ['memberTypes.update', $memberType->id], 'method' => 'patch']) !!}

                        @include('member_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection