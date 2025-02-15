@extends('layouts.master')

@section('content')
<div class="card my-3">
    <div class="card-header white">
        <h4>View User</h4>
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
                <a href="{{route('admin.users.show')}}" class="btn btn-primary mb-3 btn-lg"><i class="icon-arrow_back"></i> Back</a>
                <a href="{{route('admin.users.update.form',$data->id)}}" class="btn btn-info mb-3 btn-lg"><i class="icon-pencil"></i> Edit</a>
                <a href="{{route('admin.users.show')}}" class="btn btn-warning mb-3 btn-lg"><i class="icon-print"></i> Print</a>
            <hr>
                    <h3>Personal Info</h3>

                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">First Name:</label>
                                <h2>{{ $data->personalInfo->first_name ?? '' }}</h2>
                            <!-- @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">Last Name</label>
                                <h2>{{ $data->personalInfo->last_name ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_birth">Date of Birth</label>
                            <h2>{{ $data->personalInfo->date_of_birth ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <h2>{{$data->personalInfo->gender}}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image">Profile Image</label>
                            <br>
                                <img src="{{asset($data->personalInfo->photo)}}" width="100" alt="">
                        </div>
                    </div>
                </div>
                <hr>
                <div id="step-22" class="card-body">
                    <h2 class="my-3">
                        Contact Info
                    </h2>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="work_email">Work Email</label>
                            <h2>{{ $data->contactInfo->work_email ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_email">Personal Email</label>
                            <h2>{{ $data->contactInfo->personal_email ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="work_phone">Work Phone</label>
                            <h2>{{ $data->contactInfo->work_phone ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_phone">Personal Phone</label>
                                        <h2>{{ $data->contactInfo->personal_phone ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                                <h2>{{ $data->contactInfo->address ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                                <h2>{{ $data->contactInfo->city ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                                <h2>{{ $data->contactInfo->state ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip_code">Zip Code</label>
                                <h2>{{ $data->contactInfo->zip_code ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country">Country</label>
                           <h2>{{ $data->contactInfo->country ?? '' }}</h2>
                        </div>
                    </div>
                </div>
                <hr>

                <div id="step-33" class="card-body">
                    <h2>Professional Details</h2>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="gender">Qualification</label>
                                <h2>{{$data->professionalDetails->qualifications}}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="experience">Experience Years</label>
                                <h2>{{ $data->professionalDetails->experience }}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="skills">Skills</label>
                            <br>
                            @if (!empty($data->professionalDetails->skills))
                                @foreach (explode(',', $data->professionalDetails->skills) as $skill)
                                    <span class="badge text-white bg-primary me-1">{{ $skill }}</span>
                                @endforeach
                            @else
                                <h2>No skills available</h2>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>

                <div id="step-44" class="card-body ">
                    <h2>Job Info</h2>
                    <br>
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
                        <h2>{{$data->role->name}}</h2>
                            <!-- @error('role_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>
                        <div class="form-group col-md-4">
                            <label required for="department_id">Department</label>
                                <h2>{{$data->jobInfo->department->name}}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="designation-select">Designation</label>
                            <h2>{{$data->jobInfo->designation}}</h2>
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
                                <h2>{{$data->shift->name}}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_hire">Date of Hire</label>
                            <h2>{{$data->jobInfo->date_of_hire}}</h2>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="employment_type">Employment Type</label>
                                <h2>{{$data->jobInfo->employment_type}}</h2>
                        </div>
                    </div>
                </div>

                <hr>


                <div id="step-55" class="card-body ">
                    <h2>Compensation Info</h2>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="salary">Basic Salary</label>
                            <h2>{{ $data->compensationInfo->basic_salary ?? '' }}</h2>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_account">Bank Account</label>
                                    <h2>{{ $data->compensationInfo->bank_account ?? '' }}</h2>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6 class="text-success">Allowances</h6>
                            <br>
                            <div id="allowances">
                            @if ($data->compensationInfo && $data->compensationInfo->allowances)
                            @foreach ($data->compensationInfo->allowances as $name => $value)
                                <div class="form-row mb-2 d-flex align-items-center">
                                    <div class="col">

                                    <h4>{{$name}}</h4>
                                    </div>
                                    <div class="col">
                                        <h4>+ {{$value}}</h4>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="text-danger">Deductions</h6>
                            <br>
                            <div id="deductions">
                            @if ($data->compensationInfo && $data->compensationInfo->deductions)
                            @foreach ($data->compensationInfo->deductions as $name => $value)
                                <div class="form-row mb-2 d-flex align-items-center">
                                    <div class="col">
                                        <h4>{{$name}}</h4>
                                    </div>
                                    <div class="col">
                                        <h4>- {{$value}}</h4>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>

                        </div>
                        <div class="form-group col-md-6">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="salary">Total Salary</label>
                                <h2>{{ $data->compensationInfo->total_salary ?? '' }}</h2>
                        </div>
                    </div>

                </div>

                <hr>



                <div id="step-66" class="card-body ">

                    <h2>Additional Info</h2>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="notes">Notes</label>

                            <h6>{{ $data->additionalInfo->notes ?? '' }}</h6>

                        </div>
                    </div>

                </div>



                <div id="step-77" class="card-body ">

                    <a href="{{route('admin.users.show')}}" class="btn btn-primary mb-3 btn-lg"><i class="icon-arrow_back"></i> Back</a>
                    </form>

                </div>

            <!-- </div> -->
<!-- 
        </div>
    </div> -->
</div>
    <!--Add New Message Fab Button-->
    <a href="{{route('admin.users.update.form',$data->id)}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary">
        <div style="width : 100%; height:100%; display : flex !important; align-items : center !important; justify-content:center !important; ">

        <i
            class="icon-pencil" style="margin-bottom : 3px !important;" ></i>
            </div>
            
        </a>



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
                <input type="text" class="form-control" name="allowance_name[]" placeholder="Enter Allowance Label">
            </div>
                <div class="col">
                    <input type="number" class="form-control allowance-amount" name="allowance_value[]" placeholder="Enter Allowance Value">
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
            <input type="text" class="form-control" name="deduction_name[]" placeholder="Enter Deduction Label">
        </div>
        <div class="col">
            <input type="number" class="form-control deduction-amount" name="deduction_value[]" placeholder="Enter Deduction Value">
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