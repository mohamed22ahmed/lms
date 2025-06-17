<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($groupOperation ? 'Edit Group' : 'Add Group'); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($groupOperation ? 'Edit Group' : 'Add Group'); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?php echo e(getAdminPanelUrl()); ?>/group-operations/<?php echo e($groupOperation ? 'update' : 'store'); ?>" method="Post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id" value="<?php echo e($groupOperation ? $groupOperation->id : ''); ?>">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Group Name</label>
                                                    <input type="text" class="form-control" name="name"  placeholder="Enter Group Name" value="<?php echo e($groupOperation ? $groupOperation?->name : ''); ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Select Instructor</label>
                                                    <select name="instructor" id="instructor-select" class="form-control populate" required>
                                                        <option disabled>Select an instructor</option>
                                                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($instructor->id); ?>" <?php echo e($instructor->id == $groupOperation?->instructor_id ? 'selected' : ''); ?>><?php echo e($instructor->full_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Select Course</label>
                                                    <select name="course" class="form-control populate" required>
                                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($course->id); ?>" <?php echo e($course->id == $groupOperation?->course_id ? 'selected' : ''); ?>><?php echo e($course->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Select Meeting Time</label>
                                                    <select name="meetingTime" id="meeting-time-select" class="form-control populate" required>
                                                        <option value="">Select a meeting time</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Group Type</label>
                                                    <select name="group_type" data-plugin-selectTwo class="form-control populate">
                                                        <option value="study" <?php echo e($groupOperation?->group_type == 'study' ? 'selected' : ''); ?>>Study Group</option>
                                                        <option value="semi_private" <?php echo e($groupOperation?->group_type == 'semi_private' ? 'selected' : ''); ?>>Semi Private</option>
                                                        <option value="private" <?php echo e($groupOperation?->group_type == 'private' ? 'selected' : ''); ?>>Private</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Age Level</label>
                                                    <select name="age_level" data-plugin-selectTwo class="form-control populate">
                                                        <option value="6-8" <?php echo e($groupOperation?->age_level == '6-8' ? 'selected' : ''); ?>>6-8</option>
                                                        <option value="9-12" <?php echo e($groupOperation?->age_level == '9-12'? 'selected' : ''); ?>>9-12</option>
                                                        <option value="13-17" <?php echo e($groupOperation?->age_level == '13-17'? 'selected' : ''); ?>>13-17</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Study Level</label>
                                                    <select name="study_level" data-plugin-selectTwo class="form-control populate">
                                                        <option value="standard" <?php echo e($groupOperation?->study_level == 'standard' ? 'selected' : ''); ?>>Standard</option>
                                                        <option value="advanced" <?php echo e($groupOperation?->study_level == 'advanced' ? 'selected' : ''); ?>>Advanced</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Language</label>
                                                    <select name="language" data-plugin-selectTwo class="form-control populate">
                                                        <option value="en" <?php echo e($groupOperation?->language == 'en' ? 'selected' : ''); ?>>En</option>
                                                        <option value="ar" <?php echo e($groupOperation?->language == 'ar' ? 'selected' : ''); ?>>Ar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <button type="submit" class="btn btn-<?php echo e($groupOperation ? 'success' : 'primary'); ?> btn-lg"><?php echo e($groupOperation ? trans('admin/main.edit') : trans('admin/main.add')); ?></button>
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

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        $(document).ready(function() {
            // Get the initial value of the instructor select on page load
            var initialInstructorId = $('#instructor-select').val();
            getTimes(initialInstructorId); // Pass the initial value

            // When the instructor select changes
            $('#instructor-select').on('change', function() {
                var instructorId = $(this).val(); // 'this' correctly refers to the changed select here
                getTimes(instructorId); // Pass the new value
            });

            // Refactored function to accept instructorId as an argument
            function getTimes(instructorId) { // Now accepts instructorId
                var meetingTimeSelect = $('#meeting-time-select');

                meetingTimeSelect.empty();
                meetingTimeSelect.append($('<option>', {
                    value: '',
                    text: 'Loading meeting times...'
                }));

                // Check if instructorId is valid (not empty string or null)
                if (instructorId) {
                    $.ajax({
                        url: '/admin/group-operations/get-meeting-times/' + instructorId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            meetingTimeSelect.empty();
                            meetingTimeSelect.append($('<option>', {
                                value: '',
                                text: 'Select a meeting time'
                            }));

                            if (data.length > 0) {
                                $.each(data, function(key, meetingTime) {
                                    meetingTimeSelect.append($('<option>', {
                                        value: meetingTime.id,
                                        text: meetingTime.day_label + ' ' + meetingTime.time
                                    }));
                                });
                            } else {
                                meetingTimeSelect.append($('<option>', {
                                    value: '',
                                    text: 'No meeting times available'
                                }));
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching meeting times:", xhr.responseText || error); // Log more detail
                            meetingTimeSelect.empty();
                            meetingTimeSelect.append($('<option>', {
                                value: '',
                                text: 'Error loading times'
                            }));
                            alert('Could not load meeting times. Please try again.');
                        }
                    });
                } else {
                    // If no instructor selected, reset to default state
                    meetingTimeSelect.empty();
                    meetingTimeSelect.append($('<option>', {
                        value: '',
                        text: 'Select a meeting time'
                    }));
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/projects/ims/resources/views/admin/group_operations/add_group.blade.php ENDPATH**/ ?>