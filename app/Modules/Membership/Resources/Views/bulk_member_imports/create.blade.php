@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bulk Member Import
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'bulkMemberImports.store']) !!}

                        @include('bulk_member_imports.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
