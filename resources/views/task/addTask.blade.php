@extends('layout.app')

@section('content')
    <div class="container mt-5">

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('DeadLine') }}</label>

                    <div class="col-md-6">
                        <input id="deadline" type="text"
                               class="form-control"
                               name="deadline" value="{{ old('deadline') }}" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn-submit btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $('#deadline').datetimepicker({
            // options here
            format: 'Y-m-d H:i',

        });
        $(document).ready(function () {
            $(".btn-submit").click(function (e) {
                e.preventDefault();

                let _token = $('meta[name="csrf-token"]').attr('content');
                let name = $("#name").val();
                let date = $("#deadline").val();
                let deadline = moment(date).utc().format('YYYY/M/D H:m');

                $.ajax({
                    url: "{{ route('storeTask') }}",
                    type: 'POST',
                    data: {_token: _token, name: name, deadline: deadline},
                    success: function (data) {
                        alert(data.message);
                    },
                    error: function (err) {
                        console.log(err.message);
                    }
                });
            });
        });
    </script>
@endpush
