@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Update User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form method="post" action="{{ route('admin.users.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $data->id }}">

                    <h4>Basic Info</h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}"
                                id="email" placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h4>Personal Info</h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" value="{{ $data->personalInfo->first_name ?? '' }}"
                                name="first_name" id="first_name" placeholder="First Name">
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" value="{{ $data->personalInfo->last_name ?? '' }}"
                                name="last_name" id="last_name" placeholder="Last Name">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control"
                                value="{{ $data->personalInfo->date_of_birth ?? '' }}" name="date_of_birth"
                                id="date_of_birth">
                            @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">-- Select Gender --</option>
                                <option value="male" @if ($data->personalInfo && $data->personalInfo->gender == 'male') selected @endif>Male</option>
                                <option value="female" @if ($data->personalInfo && $data->personalInfo->gender == 'female') selected @endif>Female</option>
                                <option value="other" @if ($data->personalInfo && $data->personalInfo->gender == 'other') selected @endif>Other</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image">Profile Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h4>Contact Info</h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="work_email">Work Email</label>
                            <input type="email" class="form-control" name="work_email"
                                value="{{ $data->contactInfo->work_email ?? '' }}" id="work_email"
                                placeholder="Work Email">
                            @error('work_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_email">Personal Email</label>
                            <input type="email" class="form-control" name="personal_email"
                                value="{{ $data->contactInfo->personal_email ?? '' }}" id="personal_email"
                                placeholder="Personal Email">
                            @error('personal_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="work_phone">Work Phone</label>
                            <input type="number" class="form-control" name="work_phone"
                                value="{{ $data->contactInfo->personal_phone ?? '' }}" id="work_phone"
                                placeholder="Work Phone">
                            @error('work_phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_phone">Personal Phone</label>
                            <input type="number" class="form-control" name="personal_phone"
                                value="{{ $data->contactInfo->personal_phone ?? '' }}" id="personal_phone"
                                placeholder="Personal Phone">
                            @error('personal_phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address"
                                value="{{ $data->contactInfo->address ?? '' }}" id="address" placeholder="Address">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city"
                                value="{{ $data->contactInfo->city ?? '' }}" id="city" placeholder="City">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state"
                                value="{{ $data->contactInfo->state ?? '' }}" id="state" placeholder="State">
                            @error('state')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" class="form-control" name="zip_code"
                                value="{{ $data->contactInfo->zip_code ?? '' }}" id="zip_code" placeholder="Zip Code">
                            @error('zip_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country"
                                value="{{ $data->contactInfo->country ?? '' }}" id="country" placeholder="Country">
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h4>Professional Details</h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="skills">Skills</label>
                            <input type="text" class="form-control" name="skills_display" id="skills_display"
                                value="{{ $data->professionalDetails->skills ?? '' }}"
                                placeholder="Type or paste skills separated by commas">
                            <input type="hidden" name="skills" id="skills">
                            @error('skills')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qualifications">Qualifications</label>
                            <input type="text" class="form-control" name="qualifications"
                                value="{{ $data->professionalDetails->qualifications ?? '' }}" id="qualifications"
                                placeholder="Qualifications">
                            @error('qualifications')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="experience">Experience Years</label>
                            <input type="number" class="form-control" name="experience"
                                value="{{ $data->professionalDetails->experience ?? '' }}" id="experience"
                                placeholder="Experience">
                            @error('experience')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h4>Job Info</h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="uu_id">Employee #ID</label>
                            <input type="text" class="form-control" name="uu_id" value="{{ $data->uu_id }}"
                                id="uu_id" placeholder="ID">
                            @error('uu_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="department_id">Department</label>
                            <select id="department_id" name="department_id" class="form-control">
                                <option>-- Select Department --</option>
                                @foreach ($departments as $item)
                                    <option @if ($data->jobInfo && $data->jobInfo->department_id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position" value="{{$data->jobInfo->position}}" id="position" placeholder="position">
                            @error('position')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="shift_id">Shift</label>
                            <select id="shift_id" name="shift_id" class="form-control">
                                <option>-- Select Shift --</option>
                                @foreach ($shifts as $item)
                                    <option @if ($data->shift_id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('shift_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="role_id">Role</label>
                            <select id="role_id" name="role_id" class="form-control">
                                <option>-- Select Role --</option>
                                @foreach ($roles as $item)
                                    <option @if ($data->role_id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="manager_id">Manager</label>
                            <select id="manager_id" name="manager_id" class="form-control">
                                <option value="">-- Select Manager --</option>
                                @foreach ($managers as $item)
                                    <option @if ($data->jobInfo->manager_id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->personalInfo->first_name }}</option>
                                @endforeach
                            </select>
                            @error('manager_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_hire">Date of Hire</label>
                            <input type="date" class="form-control" name="date_of_hire"
                                value="{{ $data->jobInfo->date_of_hire ?? '' }}" id="date_of_hire">
                            @error('date_of_hire')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="employment_type">Employment Type</label>
                            <select name="employment_type" class="form-control" id="">
                                <option>-- Select Type --</option>
                                <option @if ($data->jobInfo && $data->jobInfo->employment_type == 'Full-time') selected @endif value="Full-time">Full Time
                                </option>
                                <option @if ($data->jobInfo && $data->jobInfo->employment_type == 'Part-time') selected @endif value="Part-time">Part Time
                                </option>
                                <option @if ($data->jobInfo && $data->jobInfo->employment_type == 'Contract') selected @endif value="Contract">Contract
                                </option>
                                <option @if ($data->jobInfo && $data->jobInfo->employment_type == 'Intern') selected @endif value="Intern">Intern</option>
                            </select>
                            @error('employment_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h3>Compensation Info</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="salary">Basic Salary</label>
                            <input type="number" class="form-control" name="basic_salary"
                                value="{{ $data->compensationInfo->basic_salary ?? '' }}" id="salary"
                                placeholder="Salary">
                            @error('basic_salary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_account">Bank Account</label>
                            <input type="text" class="form-control" name="bank_account"
                                value="{{ $data->compensationInfo->bank_account ?? '' }}" id="bank_account"
                                placeholder="Bank Account">
                            @error('bank_account')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6>Allowances</h6>
                            <div id="allowances">
                                @if ($data->compensationInfo && $data->compensationInfo->allowances)
                                    @foreach ($data->compensationInfo->allowances as $name => $value)
                                        <div class="form-row mb-2 d-flex align-items-center">
                                            <div class="col">
                                                <input type="text" class="form-control" name="allowance_name[]"
                                                    value="{{ $name }}" placeholder="Enter Allowance Label">
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control allowance-amount"
                                                    name="allowance_value[]" value="{{ $value }}"
                                                    placeholder="Enter Allowance Value">
                                            </div>
                                            <div class="col-auto">
                                                <i class="bi bi-trash remove-button" style="color:red"
                                                    onclick="removeField(this)"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="d-flex justify-content-start">
                                <span class="btn btn-success" onclick="addAllowanceField()"><i class="bi bi-plus"
                                        style="color:white; font-size:20px"></i></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <h6>Deductions</h6>
                            <div id="deductions">
                                @if ($data->compensationInfo && $data->compensationInfo->deductions)
                                    @foreach ($data->compensationInfo->deductions as $name => $value)
                                        <div class="form-row mb-2 d-flex align-items-center">
                                            <div class="col">
                                                <input type="text" class="form-control" name="deduction_name[]"
                                                    value="{{ $name }}" placeholder="Enter Deductions Label">
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control deduction-amount"
                                                    value="{{ $value }}" name="deduction_value[]"
                                                    placeholder="Enter Deductions Value">
                                            </div>
                                            <div class="col-auto">
                                                <i class="bi bi-trash remove-button" style="color:red"
                                                    onclick="removeField(this)"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="d-flex justify-content-start">
                                <span class="btn btn-success" onclick="addDeductionField()"><i class="bi bi-plus"
                                        style="color:white; font-size:20px"></i></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="salary">Total Salary</label>
                            <input type="number" class="form-control" readonly name="total_salary"
                                value="{{ $data->compensationInfo->total_salary ?? '' }}" id="total_salary"
                                placeholder="Total Salary">
                            @error('total_salary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <h4>Additional Info</h4>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" name="notes" id="notes" rows="3">{{ $data->additionalInfo->notes ?? '' }}</textarea>
                            @error('notes')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var input = document.querySelector('input[name="skills_display"]');
        var hiddenInput = document.querySelector('input[name="skills"]');
        var tagify = new Tagify(input, {
            delimiters: ",", // Customize delimiters as needed
            placeholder: "Type or paste skills separated by commas",
            maxTags: undefined, // Allow unlimited tags
            dropdown: {
                enabled: 0
            }
        });

        // Listen for changes in the tagify input
        tagify.on('change', function() {
            var tags = tagify.value.map(function(tag) {
                return tag.value;
            });
            hiddenInput.value = JSON.stringify(tags); // This will create a JSON string
        });
    });

    function removeField(element) {
        element.closest('.form-row').remove();
    }

    function addAllowanceField() {
        var allowanceContainer = document.getElementById('allowances');
        var newField = document.createElement('div');
        newField.className = 'form-row mb-2 d-flex align-items-center';
        newField.innerHTML = `
            <div class="col">
                <input type="text" class="form-control" name="allowance_name[]" placeholder="Enter Allowances Label">
            </div>
                <div class="col">
                    <input type="number" class="form-control allowance-amount" name="allowance_value[]" placeholder="Enter Allowances Value">
                </div>
            <div class="col-auto">
                <i class="bi bi-trash remove-button" style="color:red" onclick="removeField(this)"></i>
            </div>
        `;
        allowanceContainer.appendChild(newField);
    }

    function addDeductionField() {
        var deductionContainer = document.getElementById('deductions');
        var newField = document.createElement('div');
        newField.className = 'form-row mb-2 d-flex align-items-center';
        newField.innerHTML = `
        <div class="col">
            <input type="text" class="form-control" name="deduction_name[]" placeholder="Enter Deductions Label">
        </div>
        <div class="col">
            <input type="number" class="form-control deduction-amount" name="deduction_value[]" placeholder="Enter Deductions Value">
        </div>
        <div class="col-auto">
            <i class="bi bi-trash remove-button" style="color:red" onclick="removeField(this)"></i>
        </div>
        `;
        deductionContainer.appendChild(newField);
    }


    //  var basic_salary = $("salary").val();

    $(document).ready(function() {
        function calculateTotalSalary() {
            var basicSalary = parseFloat($("#salary").val()) || 0;
            var totalAllowances = 0;
            $(".allowance-amount").each(function() {
                totalAllowances += parseFloat($(this).val()) || 0;
            });
            var totalDeductions = 0;
            $(".deduction-amount").each(function() {
                totalDeductions += parseFloat($(this).val()) || 0;
            });

            var totalSalary = basicSalary + totalAllowances - totalDeductions;
            $("#total_salary").val(totalSalary);
        }

        $("#salary").keyup(calculateTotalSalary);
        $(document).on("keyup", ".allowance-amount, .deduction-amount", calculateTotalSalary);

        $(document).on("click", ".remove-button", function() {
            $(this).parent().remove();
            calculateTotalSalary();
        });
    })
</script>
