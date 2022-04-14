@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
    <div class="content-wrapper">

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Add <strong>Employee Salary</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="month" name="date" class="form-control" id="date" value="{{ old('date') }}">
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-top: 25px;" class="col-md-6">
                                    <a id="search" class="btn btn-primary" name="search">Search</a>
                                </div>
                            </div>
                            <!-- Student Fee Table -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div id="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <form method="POST" action="{{ route('account.salary.store') }}">
                                                @csrf
                                                <table class="table table-bordered table-striped" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        @{{{thsource}}}
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @{{#each this}}
                                                    <tr>
                                                        @{{{tdsource}}}
                                                    </tr>
                                                    @{{/each}}
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                            </form>
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>

    <script type="text/javascript">
        $(document).on('click', '#search', function () {
            let date = $('#date').val();
            $.ajax({
                url: "{{ route('account.salary.getEmployees')}}",
                type: "get",
                data: {'date': date,},
                beforeSend: function () {
                },
                success: function (data) {
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });
    </script>
@endsection
