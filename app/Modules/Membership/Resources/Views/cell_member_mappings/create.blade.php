@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cell Member Mapping
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'cellMemberMappings.store']) !!}

                        @include('cell_member_mappings.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
