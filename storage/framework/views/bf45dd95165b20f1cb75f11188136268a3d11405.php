<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Group Operations</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
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
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="item_title" value="<?php echo e(request()->get('item_title')); ?>"  placeholder="Search by Name">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="start_date" class="text-center form-control" name="start_date" value="<?php echo e(request()->get('start_date')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="time" id="start_time" class="text-center form-control" name="start_time" value="<?php echo e(request()->get('start_time')); ?>" placeholder="Time">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Group Type</label>
                                    <select name="group_type" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Types</option>
                                        <option value="study" <?php if(request()->get('group_type') == 'study'): ?> selected <?php endif; ?>>Study Group</option>
                                        <option value="semi_private" <?php if(request()->get('group_type') == 'semi_private'): ?> selected <?php endif; ?>>Semi Private</option>
                                        <option value="private" <?php if(request()->get('group_type') == 'private'): ?> selected <?php endif; ?>>Private</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Age Level</label>
                                    <select name="age_level" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Age Levels</option>
                                        <option value="6-8" <?php if(request()->get('age_level') == '6-8'): ?> selected <?php endif; ?>>6-8</option>
                                        <option value="9-12" <?php if(request()->get('age_level') == '9-12'): ?> selected <?php endif; ?>>9-12</option>
                                        <option value="13-17" <?php if(request()->get('age_level') == '13-17'): ?> selected <?php endif; ?>>13-17</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Study Level</label>
                                    <select name="study_level" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Study Levels</option>
                                        <option value="standard" <?php if(request()->get('study_level') == 'standard'): ?> selected <?php endif; ?>>Standard</option>
                                        <option value="advanced" <?php if(request()->get('study_level') == 'advanced'): ?> selected <?php endif; ?>>Advanced</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Language</label>
                                    <select name="language" data-plugin-selectTwo class="form-control populate">
                                        <option value="">All Languages</option>
                                        <option value="en" <?php if(request()->get('language') == 'en'): ?> selected <?php endif; ?>>En</option>
                                        <option value="ar" <?php if(request()->get('language') == 'ar'): ?> selected <?php endif; ?>>Ar</option>
                                        <option value="es" <?php if(request()->get('language') == 'es'): ?> selected <?php endif; ?>>Es</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operations_export')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/group-operations/export" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                            <?php endif; ?>
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
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $groupOperations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($group->id); ?></td>
                                            <td class="text-left"><?php echo e($group->name); ?></td>
                                            <td class="text-left"><?php echo e($group->instructor->full_name); ?></td>
                                            <td class="text-left"><?php echo e($group->course->title); ?></td>
                                            <td class="text-left"><?php echo e($group->group_type); ?></td>
                                            <td class="text-left"><?php echo e($group->age_level); ?></td>
                                            <td class="text-left"><?php echo e($group->study_level); ?></td>
                                            <td class="text-left"><?php echo e($group->language); ?></td>
                                            <td><?php echo e(dateTimeFormat($group->created_at, 'j F Y')); ?></td>
                                            <td><?php echo e(dateTimeFormat($group->meetingTime->time, 'H:i')); ?></td>
                                            <td>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-left text-left webinars-lists-dropdown">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operation_send_notification_to_students')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/group-operations/<?php echo e($group->id); ?>/sendNotification" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 ">
                                                                <i class="fa fa-bell"></i>
                                                                <span class="ml-2"><?php echo e(trans('notification.send_notification')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operations_students_lists')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/group-operations/<?php echo e($group->id); ?>/students" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="<?php echo e(trans('admin/main.students')); ?>">
                                                                <i class="fa fa-users"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.students')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_send')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/supports/create?user_id=<?php echo e($group->student_id); ?>" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1" title="<?php echo e(trans('admin/main.send_message_to_teacher')); ?>">
                                                                <i class="fa fa-comment"></i>
                                                                <span class="ml-2"><?php echo e(trans('site.send_message')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operations_edit')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/group-operations/<?php echo e($group->id); ?>/edit" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1 " title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.edit')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operations_delete')): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl().'/group-operations/'.$group->id.'/delete',
                                                                    'btnClass' => 'd-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.delete") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($groupOperations->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/projects/ims/resources/views/admin/group_operations/list.blade.php ENDPATH**/ ?>