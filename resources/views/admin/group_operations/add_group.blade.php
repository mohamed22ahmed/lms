@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $groupOperation ? 'Edit Group' : 'Add Group' }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ $groupOperation ? 'Edit Group' : 'Add Group' }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ getAdminPanelUrl() }}/group-operations/{{ $groupOperation ? 'update' : 'store' }}" method="Post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $groupOperation ? $groupOperation->id : '' }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Group Name</label>
                                                    <input type="text" class="form-control" name="name"  placeholder="Enter Group Name" value="{{ $groupOperation ? $groupOperation?->name : '' }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Select Instructor</label>
                                                    <select name="instructor" id="instructor-select" class="form-control populate" required>
                                                        <option disabled>Select an instructor</option>
                                                        @foreach($instructors as $instructor)
                                                            <option value="{{ $instructor->id }}" {{ $instructor->id == $groupOperation?->instructor_id ? 'selected' : '' }}>{{ $instructor->full_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Select Course</label>
                                                    <select name="course" class="form-control populate" required>
                                                        @foreach($courses as $course)
                                                            <option value="{{ $course->id }}" {{ $course->id == $groupOperation?->course_id ? 'selected' : '' }}>{{ $course->title }}</option>
                                                        @endforeach
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
                                                        <option value="study" {{ $groupOperation?->group_type == 'study' ? 'selected' : '' }}>Study Group</option>
                                                        <option value="semi_private" {{ $groupOperation?->group_type == 'semi_private' ? 'selected' : '' }}>Semi Private</option>
                                                        <option value="private" {{ $groupOperation?->group_type == 'private' ? 'selected' : '' }}>Private</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Age Level</label>
                                                    <select name="age_level" data-plugin-selectTwo class="form-control populate">
                                                        <option value="6-8" {{ $groupOperation?->age_level == '6-8' ? 'selected' : '' }}>6-8</option>
                                                        <option value="9-12" {{ $groupOperation?->age_level == '9-12'? 'selected' : '' }}>9-12</option>
                                                        <option value="13-17" {{ $groupOperation?->age_level == '13-17'? 'selected' : '' }}>13-17</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Study Level</label>
                                                    <select name="study_level" data-plugin-selectTwo class="form-control populate">
                                                        <option value="standard" {{ $groupOperation?->study_level == 'standard' ? 'selected' : '' }}>Standard</option>
                                                        <option value="advanced" {{ $groupOperation?->study_level == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="input-label">Language</label>
                                                    <select name="language" data-plugin-selectTwo class="form-control populate">
                                                        <option value="en" {{ $groupOperation?->language == 'en' ? 'selected' : '' }}>En</option>
                                                        <option value="ar" {{ $groupOperation?->language == 'ar' ? 'selected' : '' }}>Ar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <button type="submit" class="btn btn-{{ $groupOperation ? 'success' : 'primary'}} btn-lg">{{ $groupOperation ? trans('admin/main.edit') : trans('admin/main.add') }}</button>
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

@push('scripts_bottom')
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
@endpush
