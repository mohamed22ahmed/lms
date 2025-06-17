<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">

    <style>
        .select2-container {
            z-index: 1212 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Group Operations - Students</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
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
                        <h4><?php echo e(trans('admin/main.total_students')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e(count($students)); ?>

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
                        <h4><?php echo e(trans('update.active_students')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e(count($students)); ?>

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
                        <h4><?php echo e(trans('update.expire_students')); ?></h4>
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
                        <h4><?php echo e(trans('update.average_learning')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e(count($students) - 1 >=0 ?count($students) - 1: 0); ?>

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
                            <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                            <input name="full_name" type="text" class="form-control" value="<?php echo e(request()->get('full_name')); ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.users_group')); ?></label>
                            <select name="group_id" data-plugin-selectTwo class="form-control populate">
                                <option value=""><?php echo e(trans('admin/main.select_users_group')); ?></option>
                                <?php $__currentLoopData = $groupOperations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($userGroup->id); ?>" <?php if(request()->get('group_id') == $userGroup->id): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                            <select name="status" data-plugin-selectTwo class="form-control populate">
                                <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.active')); ?></option>
                                <option value="expire" <?php if(request()->get('status') == 'expire'): ?> selected <?php endif; ?>><?php echo e(trans('panel.expired')); ?></option>
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

    <div class="card">
        <div class="card-header">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operations_send_notification_to_students')): ?>
                <a href="<?php echo e(getAdminPanelUrl()); ?>/group-operations/<?php echo e($group->id); ?>/sendNotification" class="btn btn-primary mr-2"><?php echo e(trans('notification.send_notification')); ?></a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operations_add_student')): ?>
                <button type="button" id="addStudentToGroup" class="btn btn-primary mr-2">Add student to group</button>
            <?php endif; ?>
            <div class="h-10"></div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-striped font-14">
                    <tr>
                        <th class="text-left">ID</th>
                        <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                        <th class="text-left">Mobile</th>
                        <th>Email</th>
                        <th><?php echo e(trans('admin/main.status')); ?></th>
                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td class="text-left"><?php echo e($student->id ?? '-'); ?></td>
                            <td class="text-left">
                                <div class="d-flex align-items-center">
                                    <figure class="avatar mr-2">
                                        <img src="<?php echo e($student->getAvatar()); ?>" alt="<?php echo e($student->full_name); ?>">
                                    </figure>
                                    <div class="media-body ml-1">
                                        <div class="mt-0 mb-1 font-weight-bold"><?php echo e($student->full_name); ?></div>


                                        <?php if($student->email): ?>
                                            <div class="text-primary text-small font-600-bold"><?php echo e($student->email); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>


                            <td>
                                   <div class="text-primary text-small font-600-bold"><?php echo e($student->mobile); ?></div>
                                </td>

                                <td>
                                   <div class="text-primary text-small font-600-bold"><?php echo e($student->email); ?></div>
                                </td>
                            <td>
                                <div class="text-primary text-small font-600-bold"><?php echo e($student->status); ?></div>
                            </td>

                            <td class="text-center mb-2" width="120">
                                <?php if(!empty($student->id)): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($student->id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_operations_delete_group_student')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/group-operations/delete-group-student/<?php echo e($group->id); ?>/<?php echo e($student->id); ?>" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.delete')); ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <?php echo e($students->appends(request()->input())->links()); ?>

        </div>

    </div>


    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.students_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.students_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.students_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.students_hint_description_2')); ?></div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.students_hint_title_3')); ?></div>
                        <div class="text-small font-600-bold"><?php echo e(trans('admin/main.students_hint_description_3')); ?></div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <div id="addStudentToGroupModal" class="d-none">
        <h3 class="section-title after-line">Add user to Group</h3>
        <div class="mt-25">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/group-operations/add-student" method="post">
                <input type="hidden" name="group" value="<?php echo e($group->id); ?>">

                <div class="form-group">
                    <label class="input-label d-block"><?php echo e(trans('admin/main.user')); ?></label>
                    <select name="student" class="form-control user-search" data-placeholder="<?php echo e(trans('public.search_user')); ?>">

                    </select>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="d-flex align-items-center justify-content-end mt-3">
                    <button type="button" class="js-save-manual-add btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>
                    <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>


    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
    </script>

    <script src="/assets/default/js/admin/group_students.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/projects/ims/resources/views/admin/group_operations/student.blade.php ENDPATH**/ ?>