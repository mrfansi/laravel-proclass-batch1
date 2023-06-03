@extends('layout.master')
@section('title', 'Create new Employee')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('employee.index') }}">Employee</a>
            </li>
            <li class="breadcrumb-item">
                Create new employee
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8">
                <form id="employeeForm" method="POST">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="position" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="position" placeholder="Position" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="office" class="col-sm-2 col-form-label">Office</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="office" placeholder="Office" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="age" placeholder="Age" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="start_date" placeholder="Start Date" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="salary" placeholder="Salary" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Name</div>
                            <div id="display-name"></div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Position</div>
                            <div id="display-position"></div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Office</div>
                            <div id="display-office"></div>

                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Age</div>
                            <div id="display-age"></div>

                        </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Start Date</div>
                            <div id="display-start-date"></div>

                        </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Salary</div>
                            <div id="display-salary"></div>

                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
    <script type="module">
        $(document).ready(function () {
            $("#name").on("keyup", function (){
                $('#display-name').html($(this).val())
            });

            $("#position").on("keyup", function (){
                $('#display-position').html($(this).val())
            });

            $("#office").on("keyup", function (){
                $('#display-office').html($(this).val())
            });

            $("#age").on("keyup", function (){
                $('#display-age').html($(this).val() + " Years")
            });
            $("#start_date").on("keyup", function (){
                $('#display-start-date').html($(this).val())
            });

            $("#salary").on("keyup", function (){
                $('#display-salary').html($(this).val())
            });

            $("#employeeForm").submit(function (e){
                e.preventDefault()

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    type: "POST",
                    url: "{{ route("employee.store") }}",
                    data: {
                        name: $("#name").val(),
                        position: $("#position").val(),
                        office: $("#office").val(),
                        age: $("#age").val(),
                        start_date: $("#start_date").val(),
                        salary: $("#salary").val(),
                    },
                    dataType: "json",
                    success: function (data) {
                        Swal.fire({
                            title: 'Success',
                            text: data.success,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = "{{ route("employee.index") }}"
                            }
                        });
                    },
                    error: function (err) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Do you want to continue',
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        })
                    }
                })


            })
        })
    </script>
@endsection
