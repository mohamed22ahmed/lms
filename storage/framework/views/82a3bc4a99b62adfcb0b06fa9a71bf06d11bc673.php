<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Add Students</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
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
                                    <form action="<?php echo e(getAdminPanelUrl()); ?>/group-operations/add-student" method="Post">
                                        <?php echo e(csrf_field()); ?>


                                        <div class="form-group">
                                            <label class="input-label">Select Group</label>
                                            <select name="group" class="form-control populate" required>
                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label">Select Student</label>
                                            <select name="student" class="form-control populate" required>
                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($student->id); ?>"><?php echo e($student->full_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class=" mt-4">
                                            <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.add')); ?></button>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/projects/ims/resources/views/admin/group_operations/add_student.blade.php ENDPATH**/ ?>