@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Group Operations</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">Group Operations</div>
            </div>
        </div>

        <div class="section-body">
            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.search') }}</label>
                                    <input type="text" class="form-control" name="item_title" value="{{ request()->get('item_title') }}"  placeholder="Search by Name">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.start_date') }}</label>
                                    <div class="input-group">
                                        <input type="date" id="start_date" class="text-center form-control" name="start_date" value="{{ request()->get('start_date') }}" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                                    <div class="input-group">
                                        <input type="time" id="start_time" class="text-center form-control" name="start_time" value="{{ request()->get('start_time') }}" placeholder="Time">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Group Type</label>
                                    <select name="group_type" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Types</option>
                                        <option value="study" @if(request()->get('group_type') == 'study') selected @endif>Study Group</option>
                                        <option value="semi_private" @if(request()->get('group_type') == 'semi_private') selected @endif>Semi Private</option>
                                        <option value="private" @if(request()->get('group_type') == 'private') selected @endif>Private</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Age Level</label>
                                    <select name="age_level" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Age Levels</option>
                                        <option value="6-8" @if(request()->get('age_level') == '6-8') selected @endif>6-8</option>
                                        <option value="9-12" @if(request()->get('age_level') == '9-12') selected @endif>9-12</option>
                                        <option value="13-17" @if(request()->get('age_level') == '13-17') selected @endif>13-17</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Study Level</label>
                                    <select name="study_level" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Study Levels</option>
                                        <option value="standard" @if(request()->get('study_level') == 'standard') selected @endif>Standard</option>
                                        <option value="advanced" @if(request()->get('study_level') == 'advanced') selected @endif>Advanced</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Language</label>
                                    <select name="language" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Languages</option>
                                        <option value="en" @if(request()->get('language') == 'en') selected @endif>En</option>
                                        <option value="ar" @if(request()->get('language') == 'ar') selected @endif>Ar</option>
                                        <option value="es" @if(request()->get('language') == 'es') selected @endif>Es</option>
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

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @can('admin_group_operations_export')
                                <a href="{{ getAdminPanelUrl() }}/group-operations/export" class="btn btn-primary">{{ trans('admin/main.export_xls') }}</a>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">Name</th>
                                        <th class="text-left">Instructor</th>
                                        <th class="text-left">Course</th>
                                        <th>Type</th>
                                        <th>Age Level</th>
                                        <th>Study Level</th>
                                        <th>Language</th>
                                        <th>Start date</th>
                                        <th>time</th>
                                        <th width="120">{{ trans('admin/main.actions') }}</th>
                                    </tr>

                                    @foreach($groupOperations as $group)
                                        <tr>
                                            <td>{{ $group->id }}</td>
                                            <td class="text-left">{{ $group->name}}</td>
                                            <td class="text-left">{{ $group->instructor->full_name }}</td>
                                            <td class="text-left">{{ $group->course->title }}</td>
                                            <td class="text-left">{{ $group->group_type }}</td>
                                            <td class="text-left">{{ $group->age_level }}</td>
                                            <td class="text-left">{{ $group->study_level }}</td>
                                            <td class="text-left">{{ $group->language }}</td>
                                            <td>{{ dateTimeFormat($group->created_at, 'j F Y') }}</td>
                                            <td>{{ dateTimeFormat($group->meetingTime->time, 'H:i') }}</td>
                                            <td>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-left text-left webinars-lists-dropdown">
                                                        @can('admin_group_operation_send_notification_to_students')
                                                            <a href="{{ getAdminPanelUrl() }}/group-operations/{{ $group->id }}/sendNotification" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 ">
                                                                <i class="fa fa-bell"></i>
                                                                <span class="ml-2">{{ trans('notification.send_notification') }}</span>
                                                            </a>
                                                        @endcan

                                                        @can('admin_group_operations_students_lists')
                                                            <a href="{{ getAdminPanelUrl() }}/group-operations/{{ $group->id }}/students" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="{{ trans('admin/main.students') }}">
                                                                <i class="fa fa-users"></i>
                                                                <span class="ml-2">{{ trans('admin/main.students') }}</span>
                                                            </a>
                                                        @endcan

                                                        @can('admin_support_send')
                                                            <a href="{{ getAdminPanelUrl() }}/supports/create?user_id={{ $group->student_id }}" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1" title="{{ trans('admin/main.send_message_to_teacher') }}">
                                                                <i class="fa fa-comment"></i>
                                                                <span class="ml-2">{{ trans('site.send_message') }}</span>
                                                            </a>
                                                        @endcan

                                                        @can('admin_group_operations_edit')
                                                            <a href="{{ getAdminPanelUrl() }}/group-operations/{{ $group->id }}/edit" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="{{ trans('admin/main.edit') }}">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="ml-2">{{ trans('admin/main.edit') }}</span>
                                                            </a>
                                                        @endcan

                                                        @can('admin_group_operations_delete')
                                                            @include('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl().'/group-operations/'.$group->id.'/delete',
                                                                    'btnClass' => 'd-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.delete") .'</span>'
                                                                    ])
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{ $groupOperations->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

