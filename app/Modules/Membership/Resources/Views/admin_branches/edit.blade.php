@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Admin Branch
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($adminBranch, ['route' => ['adminBranches.update', $adminBranch->id], 'method' => 'patch']) !!}

                        @include('admin_branches.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection