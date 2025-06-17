@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">

    <style>
        .select2-container {
            z-index: 1212 !important;
        }
    </style>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Group Operations - Students</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a></div>
                <div class="breadcrumb-item"><a>Students</a></div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ trans('admin/main.total_students') }}</h4>
                    </div>
                    <div class="card-body">
                        {{ count($students) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-briefcase"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ trans('update.active_students') }}</h4>
                    </div>
                    <div class="card-body">
                        {{ count($students) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-info-circle"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ trans('update.expire_students') }}</h4>
                    </div>
                    <div class="card-body">
                        0
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-ban"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ trans('update.average_learning') }}</h4>
                    </div>
                    <div class="card-body">
                        {{ count($students) - 1 >=0 ?count($students) - 1: 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="card">
        <div class="card-body">
            <form method="get" class="mb-0">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.search') }}</label>
                            <input name="full_name" type="text" class="form-control" value="{{ request()->get('full_name') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.users_group') }}</label>
                            <select name="group_id" data-plugin-selectTwo class="form-control populate">
                                <option value="">{{ trans('admin/main.select_users_group') }}</option>
                                @foreach($groupOperations as $userGroup)
                                    <option value="{{ $userGroup->id }}" @if(request()->get('group_id') == $userGroup->id) selected @endif>{{ $userGroup->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.status') }}</label>
                            <select name="status" data-plugin-selectTwo class="form-control populate">
                                <option value="">{{ trans('admin/main.all_status') }}</option>
                                <option value="active" @if(request()->get('status') == 'active') selected @endif>{{ trans('admin/main.active') }}</option>
                                <option value="expire" @if(request()->get('status') == 'expire') selected @endif>{{ trans('panel.expired') }}</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group mt-1">
                            <label class="input-label mb-4"> </label>
                            <input type="submit" class="text-center btn btn-primary w-100" value="{{ trans('admin/main.show_results') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            @can('admin_group_operations_send_notification_to_students')
                <a href="{{ getAdminPanelUrl() }}/group-operations/{{ $group->id }}/sendNotification" class="btn btn-primary mr-2">{{ trans('notification.send_notification') }}</a>
            @endcan

            @can('admin_group_operations_add_student')
                <button type="button" id="addStudentToGroup" class="btn btn-primary mr-2">Add student to group</button>
            @endcan
            <div class="h-10"></div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-striped font-14">
                    <tr>
                        <th class="text-left">ID</th>
                        <th class="text-left">{{ trans('admin/main.name') }}</th>
                        <th class="text-left">Mobile</th>
                        <th>Email</th>
                        <th>{{ trans('admin/main.status') }}</th>
                        <th width="120">{{ trans('admin/main.actions') }}</th>
                    </tr>

                    @foreach($students as $student)

                        <tr>
                            <td class="text-left">{{ $student->id ?? '-' }}</td>
                            <td class="text-left">
                                <div class="d-flex align-items-center">
                                    <figure class="avatar mr-2">
                                        <img src="{{ $student->getAvatar() }}" alt="{{ $student->full_name }}">
                                    </figure>
                                    <div class="media-body ml-1">
                                        <div class="mt-0 mb-1 font-weight-bold">{{ $student->full_name }}</div>


                                        @if($student->email)
                                            <div class="text-primary text-small font-600-bold">{{ $student->email }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>


                            <td>
                                   <div class="text-primary text-small font-600-bold">{{ $student->mobile }}</div>
                                </td>

                                <td>
                                   <div class="text-primary text-small font-600-bold">{{ $student->email }}</div>
                                </td>
                            <td>
                                <div class="text-primary text-small font-600-bold">{{ $student->status }}</div>
                            </td>

                            <td class="text-center mb-2" width="120">
                                @if(!empty($student->id))
                                    @can('admin_users_edit')
                                        <a href="{{ getAdminPanelUrl() }}/users/{{ $student->id }}/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('admin_group_operations_delete_group_student')
                                        <a href="{{ getAdminPanelUrl() }}/group-operations/delete-group-student/{{ $group->id }}/{{ $student->id }}" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            {{ $students->appends(request()->input())->links() }}
        </div>

    </div>


    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5>{{trans('admin/main.hints')}}</h5></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold">{{trans('admin/main.students_hint_title_1')}}</div>
                        <div class=" text-small font-600-bold">{{trans('admin/main.students_hint_description_1')}}</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold">{{trans('admin/main.students_hint_title_2')}}</div>
                        <div class=" text-small font-600-bold">{{trans('admin/main.students_hint_description_2')}}</div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold">{{trans('admin/main.students_hint_title_3')}}</div>
                        <div class="text-small font-600-bold">{{trans('admin/main.students_hint_description_3')}}</div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <div id="addStudentToGroupModal" class="d-none">
        <h3 class="section-title after-line">Add user to Group</h3>
        <div class="mt-25">
            <form action="{{ getAdminPanelUrl() }}/group-operations/add-student" method="post">
                <input type="hidden" name="group" value="{{ $group->id }}">

                <div class="form-group">
                    <label class="input-label d-block">{{ trans('admin/main.user') }}</label>
                    <select name="student" class="form-control user-search" data-placeholder="{{ trans('public.search_user') }}">

                    </select>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="d-flex align-items-center justify-content-end mt-3">
                    <button type="button" class="js-save-manual-add btn btn-sm btn-primary">{{ trans('public.save') }}</button>
                    <button type="button" class="close-swl btn btn-sm btn-danger ml-2">{{ trans('public.close') }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>


    <script>
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
    </script>

    <script src="/assets/default/js/admin/group_students.min.js"></script>
@endpush
