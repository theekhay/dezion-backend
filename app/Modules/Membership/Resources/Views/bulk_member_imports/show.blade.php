@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bulk Member Import
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('bulk_member_imports.show_fields')
                    <a href="{!! route('bulkMemberImports.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
