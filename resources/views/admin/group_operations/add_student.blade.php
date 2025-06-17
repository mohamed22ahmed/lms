@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Students</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">Add Students</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <form action="{{ getAdminPanelUrl() }}/group-operations/add-student" method="Post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label class="input-label">Select Group</label>
                                            <select name="group" class="form-control populate" required>
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label">Select Student</label>
                                            <select name="student" class="form-control populate" required>
                                                @foreach($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class=" mt-4">
                                            <button type="submit" class="btn btn-primary">{{ trans('admin/main.add') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

