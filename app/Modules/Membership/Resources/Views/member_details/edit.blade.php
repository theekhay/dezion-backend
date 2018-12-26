@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Member Detail
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($memberDetail, ['route' => ['memberDetails.update', $memberDetail->id], 'method' => 'patch']) !!}

                        @include('member_details.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection