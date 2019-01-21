@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Data Component Provision
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'serviceDataComponentProvisions.store']) !!}

                        @include('service_data_component_provisions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
