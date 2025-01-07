@extends('layouts.master')

@section('content')
    <style>
        .remove-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .add-btn {
            background-color: teal;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        hr {
            height: 1px;
            background-color: black;
            border: none;

        }
    </style>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Add New User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form method="post" action="{{ route('admin.users.create') }}" enctype="multipart/form-data">
                    @csrf
                    <h3>Basic Info</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h3>Personal Info</h3>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                placeholder="First Name">
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                placeholder="Last Name">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                            @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">-- Select Gender --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
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
                    <hr>
                    <h3>Contact Info</h3>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="work_email">Work Email</label>
                            <input type="email" class="form-control" name="work_email" id="work_email"
                                placeholder="Work Email">
                            @error('work_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_email">Personal Email</label>
                            <input type="email" class="form-control" name="personal_email" id="personal_email"
                                placeholder="Personal Email">
                            @error('personal_email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="work_phone">Work Phone</label>
                            <input type="number" class="form-control" name="work_phone" id="work_phone"
                                placeholder="Work Phone">
                            @error('work_phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="personal_phone">Personal Phone</label>
                            <input type="number" class="form-control" name="personal_phone" id="personal_phone"
                                placeholder="Personal Phone">
                            @error('personal_phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="Address">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city"
                                placeholder="City">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" id="state"
                                placeholder="State">
                            @error('state')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" class="form-control" name="zip_code" id="zip_code"
                                placeholder="Zip Code">
                            @error('zip_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country"
                                placeholder="Country">
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h3>Professional Details</h3>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="skills">Skills</label>
                            <input type="text" class="form-control" name="skills_display" id="skills_display"
                                placeholder="Type or paste skills separated by commas">
                            <input type="hidden" name="skills" id="skills">
                            @error('skills')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qualifications">Qualifications</label>
                            <input type="text" class="form-control" name="qualifications" id="qualifications"
                                placeholder="Qualifications">
                            @error('qualifications')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="experience">Experience Years</label>
                            <input type="number" class="form-control" name="experience" id="experience"
                                placeholder="Experience">
                            @error('experience')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h3>Job Info</h3>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="uu_id">Employee #ID</label>
                            <input type="number" class="form-control" name="uu_id" id="uu_id" placeholder="ID">
                            @error('uu_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="role_id">Role</label>
                            <select id="role_id" name="role_id" class="form-control">
                                <option>-- Select Role --</option>
                                @php
                                    $Roles = App\Models\Role::all();
                                @endphp
                                @if ($Roles)
                                    @foreach ($Roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('role_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="department_id">Department</label>
                            <select id="department_id" name="department_id" class="form-control">
                                <option>-- Select Department --</option>
                                @php
                                    $departments = App\Models\Department::all();
                                @endphp
                                @if ($departments)
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('department_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position" id="position" placeholder="position">
                            @error('position')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
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
                        </div>
                        <div class="form-group col-md-4">
                            <label for="shift_id">Shift</label>
                            <select id="shift_id" name="shift_id" class="form-control">
                                <option>-- Select Shift --</option>
                                @foreach ($shifts as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('shift_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_hire">Date of Hire</label>
                            <input type="date" class="form-control" name="date_of_hire" value=""
                                id="date_of_hire">
                            @error('date_of_hire')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="employment_type">Employment Type</label>
                            <select name="employment_type" class="form-control" id="">
                                <option>-- Select Type --</option>
                                <option value="Full-time">Full Time</option>
                                <option value="Part-time">Part Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Intern">Intern</option>
                            </select>
                            @error('employment_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h3>Compensation Info</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="salary">Basic Salary</label>
                            <input type="number" class="form-control" name="basic_salary" id="salary"
                                placeholder="Salary">
                            @error('basic_salary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_account">Bank Account</label>
                            <input type="text" class="form-control" name="bank_account" id="bank_account"
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
                                <div class="form-row mb-2 d-flex align-items-center">
                                    <div class="col">
                                        <input type="text" class="form-control" name="allowance_name[]"
                                            placeholder="Enter Allowance Label">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control allowance-amount"
                                            name="allowance_value[]" placeholder="Enter Allowance Value">
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-trash remove-button" style="color:red"
                                            onclick="removeField(this)"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-start">
                                <span class="btn btn-success" onclick="addAllowanceField()"><i class="bi bi-plus"
                                        style="color:white; font-size:20px"></i></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <h6>Deductions</h6>
                            <div id="deductions">
                                <div class="form-row mb-2 d-flex align-items-center">
                                    <div class="col">
                                        <input type="text" class="form-control" name="deduction_name[]"
                                            placeholder="Enter Deduction Label">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control deduction-amount"
                                            name="deduction_value[]" placeholder="Enter Deduction Value">
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-trash remove-button" style="color:red"
                                            onclick="removeField(this)"></i>
                                    </div>
                                </div>

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
                            <input type="number" class="form-control" readonly name="total_salary" id="total_salary"
                                placeholder="Salary">
                            @error('total_salary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h3>Additional Info</h3>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
                            @error('notes')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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
                <input type="text" class="form-control" name="allowance_name[]" placeholder="Enter Allowance Label">
            </div>
                <div class="col">
                    <input type="number" class="form-control allowance-amount" name="allowance_value[]" placeholder="Enter Allowance Value">
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
            <input type="text" class="form-control" name="deduction_name[]" placeholder="Enter Deduction Label">
        </div>
        <div class="col">
            <input type="number" class="form-control deduction-amount" name="deduction_value[]" placeholder="Enter Deduction Value">
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
