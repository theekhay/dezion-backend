@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cell Member Mapping
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('cell_member_mappings.show_fields')
                    <a href="{!! route('cellMemberMappings.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
