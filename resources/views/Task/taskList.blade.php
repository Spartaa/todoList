@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">DeadLine</th>
            </tr>
            </thead>
            <tbody id="bodyData">

            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            let tasks = {!! json_encode($tasks) !!};
            let bodyData = '';
            tasks.forEach(function (task) {
                let toDt = moment.utc(task.deadline, '').toDate();
                let date = moment(toDt).format('hA, Do MMMM');
                bodyData+="<tr>"
                bodyData+="<td>"+task.id+"</td><td>"+task.name+"</td><td>"+date+"</td>";
                bodyData+="</tr>";

            });
            $("#bodyData").append(bodyData);

        });
    </script>
@endpush
