@extends('layouts.master')
<style>
    
</style>
@section('content')
<div class="card my-3">
    <div class="card-header white">
        <h4>Update User</h4>
    </div>
    <!-- <div class="card-body b-b bg-light">
        <div class="stepper sw-main" data-options='{
                                     "transitionEffect":"fade"

                                     }'>
            <ul class="nav step-anchor">
                <li><a href="#step-11">Step 1<br><small>Personal Info</small></a></li>
                <li><a href="#step-22">Step 2<br><small>Contact Info</small></a></li>
                <li><a href="#step-33">Step 3<br><small>Professional Details</small></a></li>
                <li><a href="#step-44">Step 4<br><small>Job Info</small></a></li>
                <li><a href="#step-55">Step 5<br><small>Compensation Info</small></a></li>
                <li><a href="#step-66">Step 6<br><small>Additional Info</small></a></li>
                <li><a href="#step-77">Step 7<br><small>Login Credentionals</small></a></li>

            </ul> -->
            <!-- <div class="card no-b  shadow"> -->
                <div id="step-11" class="card-body">
                    <h3>Personal Info</h3>
                    <form method="post" action="{{ route('admin.users.update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{$data->id}}" name="user_id">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" value="{{ $data->personalInfo->first_name ?? '' }}" required
                                name="first_name" id="first_name" placeholder="First Name">
                            <!-- @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" required value="{{ $data->personalInfo->last_name ?? '' }}" name="last_name"
                                id="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" required class="form-control" value="{{ $data->personalInfo->date_of_birth ?? '' }}"
                                name="date_of_birth" id="date_of_birth">
                            <!-- @error('date_of_birth')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <select required class="form-control" name="gender" id="gender">
                            <option value="">-- Select Gender --</option>
                                <option value="male" @if ($data->personalInfo && $data->personalInfo->gender == 'male') selected @endif>Male</option>
                                <option value="female" @if ($data->personalInfo && $data->personalInfo->gender == 'female') selected @endif>Female</option>
                                <option value="other" @if ($data->personalInfo && $data->personalInfo->gender == 'other') selected @endif>Other</option>
                            </select>
                            <!-- @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image">Profile Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            <br>
                            <img src="{{asset($data->personalInfo->photo ?? '')}}" width="100" alt="">

                        </div>
                    </div>
                </div>
                <hr>
                <div id="step-22" class="card-body">
                    <h2 class="my-3">
                        Contact Info
                    </h2>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="work_email">Work Email</label>
                            <input type="email" class="form-control" value="{{ $data->contactInfo->work_email ?? '' }}" name="work_email"
                                id="work_email" placeholder="Work Email">
                            <!-- @error('work_email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_email">Personal Email</label>
                            <input type="email" required class="form-control" value="{{ $data->contactInfo->personal_email ?? '' }}"
                                name="personal_email" id="personal_email" placeholder="Personal Email">
                            <!-- @error('personal_email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="work_phone">Work Phone</label>
                            <input type="number" class="form-control" value="{{ $data->contactInfo->work_phone ?? '' }}" name="work_phone"
                                id="work_phone" placeholder="Work Phone">
                            <!-- @error('work_phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_phone">Personal Phone</label>
                            <input type="number" required class="form-control" value="{{ $data->contactInfo->personal_phone ?? '' }}"
                                name="personal_phone" id="personal_phone" placeholder="Personal Phone">
                            <!-- @error('personal_phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <input type="text" required class="form-control" value="{{ $data->contactInfo->address ?? '' }}" name="address"
                                id="address" placeholder="Address">
                            <!-- @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" required class="form-control" value="{{ $data->contactInfo->city ?? '' }}" name="city" id="city"
                                placeholder="City">
                            <!-- @error('city')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <input type="text" required class="form-control" value="{{ $data->contactInfo->state ?? '' }}" name="state" id="state"
                                placeholder="State">
                            <!-- @error('state')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" required class="form-control" value="{{ $data->contactInfo->zip_code ?? '' }}" name="zip_code"
                                id="zip_code" placeholder="Zip Code">
                            <!-- @error('zip_code')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country">Country</label>
                            <input type="text" required class="form-control" value="{{ $data->contactInfo->country ?? '' }}" name="country"
                                id="country" placeholder="Country">
                            <!-- @error('country')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                    </div>
                </div>
                <hr>

                <div id="step-33" class="card-body">
                    <h2>Professional Details</h2>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="gender">Qualification</label>
                            <select required class="form-control" name="qualifications" id="gender">
                                <option value="">-- Select Qulification --</option>
                                <option @if ($data->professionalDetails && $data->professionalDetails->qualifications == 'Masters') selected @endif  value="Masters">Masters</option>
                                <option @if ($data->professionalDetails && $data->professionalDetails->qualifications == 'Gradutaion') selected @endif value="Gradutaion">Gradutaion</option>
                                <option @if ($data->professionalDetails && $data->professionalDetails->qualifications == 'Matriculation') selected @endif value="Matriculation">Matriculation</option>
                                <option @if ($data->professionalDetails && $data->professionalDetails->qualifications == 'MS. Computer Science') selected @endif value="MS. Computer Science">MS. Computer Science</option>
                                <option @if ($data->professionalDetails && $data->professionalDetails->qualifications == 'MSCS') selected @endif value="MSCS">MSCS</option>
                                <option @if ($data->professionalDetails && $data->professionalDetails->qualifications == 'BS. Computer Science') selected @endif value="BS. Computer Science">BS. Computer Science</option>
                                <option @if ($data->professionalDetails && $data->professionalDetails->qualifications == 'BBA Honors') selected @endif value="BBA Honors">BBA Honors</option>
                            </select>
                            <!-- @error('qulifications')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="experience">Experience Years</label>
                            <input type="number" required value="{{ $data->professionalDetails->experience ?? '' }}" class="form-control" name="experience"
                                id="experience" placeholder="Experience">
                            <!-- @error('experience')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="skills">Skills</label>
                            <br>
                            <input width="400px" type="text" class="tags-input" value="{{ $data->professionalDetails->skills ?? '' }}"
                                name="skills" id="skills_display">
                            <!-- <input type="hidden" name="skills" id="skills"> -->
                            <!-- @error('skills')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                    </div>
                </div>
                <hr>

                <div id="step-44" class="card-body ">
                    <h2>Job Info</h2>
                    <div class="form-row">
                        <!-- <div class="form-group col-md-4">
                            <label for="uu_id">Employee #ID</label>
                            <input type="number" class="form-control" value="{{ old('employee_id') }}"
                                name="employee_id" id="uu_id" placeholder="ID">
                            @error('employee_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="form-group col-md-4">
                            <label for="role_id">Role</label>
                            <select required id="role_id" name="role_id" class="form-control">
                                <option value="">-- Select Role --</option>
                                @php
                                $Roles = App\Models\Role::all();
                                @endphp
                                @if ($Roles)
                                @foreach ($Roles as $item)
                                <option @if ($data->role_id == $item->id) selected @endif value="{{ $item->id }}">
                                {{ $item->name }}</option>
                                @endforeach
                                @endif
                            </select>
                            <!-- @error('role_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label required for="department_id">Department</label>
                            <select id="department_id" name="department_id" class="form-control">
                                <option value="">-- Select Department --</option>
                                @php
                                $departments = App\Models\Department::all();
                                @endphp
                                @if ($departments->count() > 0)
                                @foreach ($departments as $item)
                                    <option @if ($data->jobInfo && $data->jobInfo->department_id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                                @else
                                <option value="" disabled>No departments available</option>
                                @endif
                            </select>

                            @if ($departments->count() === 0)
                            <a href="{{route('admin.department.create.form')}}">create</a>
                            @endif
                            <!-- @error('department_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="designation-select">Designation</label>
                            <select required id="designation-select" name="designation" class="form-control">
                                <option value="">-- Select Designation --</option>
                                @php
                                $designations = App\Models\Designation::all();
                                @endphp
                                @foreach ($designations as $item)
                                <option @if($data->jobInfo && $data->jobInfo->designation == $item->name) selected @endif value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                            <!-- @error('designation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <!-- <div class="form-group col-md-4">
                            <label for="manager_id">Manager</label>
                            <select id="manager_id" name="manager_id" class="form-control">
                                <option value="">-- Select Manager --</option>
                                @foreach ($managers as $item)
                                    <option value="{{ $item->id }}">{{ $item->personalInfo->first_name }}</option>
                                @endforeach
                            </select>
                            @error('manager_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="form-group col-md-4">
                            <label for="shift_id">Shift</label>
                            <select required id="shift_id" name="shift_id" class="form-control">
                                <option value="">-- Select Shift --</option>
                                @foreach ($shifts as $item)
                                <option @if($data->shift_id == $item->id) selected @endif  value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <!-- @error('shift_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_hire">Date of Hire</label>
                            <input required type="date" value="{{ $data->jobInfo->date_of_hire ?? '' }}" class="form-control"
                                name="date_of_hire" id="date_of_hire">
                            <!-- @error('date_of_hire')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="employment_type">Employment Type</label>
                            <select required name="employment_type" class="form-control" id="">
                                <option  value="">-- Select Type --</option>
                                <option @if($data->jobInfo && $data->jobInfo->employment_type == 'Full-time') selected @endif value="Full-time">Full Time</option>
                                <option @if($data->jobInfo && $data->jobInfo->employment_type == 'Part-time') selected @endif value="Part-time">Part Time</option>
                                <option @if($data->jobInfo && $data->jobInfo->employment_type == 'Contract') selected @endif value="Contract">Contract</option>
                                <option @if($data->jobInfo && $data->jobInfo->employment_type == 'Intern') selected @endif value="Intern">Intern</option>
                            </select>
                            <!-- @error('employment_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                    </div>
                </div>

                <hr>


                <div id="step-55" class="card-body ">
                    <h2>Compensation Info</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="salary">Basic Salary</label>
                            <input required type="number" class="form-control" value="{{ $data->compensationInfo->basic_salary ?? '' }}"
                                name="basic_salary" id="salary" placeholder="Salary">
                            <!-- @error('basic_salary')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_account">Bank Account</label>
                            <input type="text" class="form-control" value="{{ $data->compensationInfo->bank_account ?? '' }}"
                                name="bank_account" id="bank_account" placeholder="Bank Account">
                            <!-- @error('bank_account')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
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
                                                <i class="icon-trash remove-button" style="color:red"
                                                    onclick="removeField(this)"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="d-flex justify-content-start">
                                <span class="btn btn-success" onclick="addAllowanceField()"><i class="icon-plus"
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
                                                <i class="icon-trash remove-button" style="color:red"
                                                    onclick="removeField(this)"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="d-flex justify-content-start">
                                <span class="btn btn-success" onclick="addDeductionField()"><i class="icon-plus"
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

                </div>

                <hr>



                <div id="step-66" class="card-body ">

                    <h2>Additional Info</h2>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" name="notes" id="notes"
                                rows="3">{{ $data->additionalInfo->notes ?? '' }}</textarea>

                        </div>
                    </div>

                </div>

                <hr>


                <div id="step-77" class="card-body ">
                    <h2>Login Credentials</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input required type="email" class="form-control" value="{{ $data->email }}" name="email" id="email"
                                placeholder="Email">
                            <!-- @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Change Password</label>
                            <input type="text" class="form-control" value="{{ old('password') }}" name="password"
                                id="password">
                            <!-- @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mb-3 btn-lg">Update</button>
                    </form>

                </div>

            <!-- </div> -->
<!-- 
        </div>
    </div> -->
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
                <i class="icon-trash remove-button" style="color:red" onclick="removeField(this)"></i>
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
            <i class="icon-trash remove-button" style="color:red" onclick="removeField(this)"></i>
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
});




/// fields required validations


$(document).ready(function () {
        // Listen to the click event on the "Go To Next Step" buttons
        $(".btn-primary").on("click", function (event) {
            let isValid = true;

            // Get all required fields in the current step
            $(this).closest(".card-body").find("input, select").each(function () {
                if ($(this).prop("required") && $(this).val().trim() === "") {
                    isValid = false;
                    $(this).addClass("is-invalid"); // Add a red border for invalid fields
                    $(this).siblings(".text-danger").remove(); // Remove existing error
                    $(this).after('<div class="text-danger">This field is required</div>'); // Add error message
                } else {
                    $(this).removeClass("is-invalid"); // Remove red border if valid
                    $(this).siblings(".text-danger").remove(); // Remove error message
                }
            });

            // Prevent navigation if form is invalid
            if (!isValid) {
                event.preventDefault(); // Stop the default click event
            }
        });
    });



</script>