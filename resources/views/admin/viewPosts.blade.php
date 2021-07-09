@extends('layouts.front')
@section('title')
    Posts
@endsection

@section('css')
@endsection


@section('content')
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">User</th>
            <th scope="col">Status</th>
            <th scope="col">Created Time</th>
            <th scope="col">Last Update Time</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($postList as $item)
            <tr id="row{{$item->id}}">
                <td>{{ $item->title }}</td>
                <td>{{ $item->text_content }}</td>
                <td>{{ $item->getUsers->name }}</td>
                <td>
                    @if($item->status == 1)
                        <button class="btn btn-success changeStatus" data-id="{{ $item->id }}">Active</button>
                    @else
                        <button class="btn btn-danger changeStatus" data-id="{{ $item->id }}">Inactive</button>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:m:s') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y h:m:s') }}</td>
                <td>
                    <a href="javascript:void(0)" class="deletePost" data-id="{{ $item->id }}"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{ asset('assets/sweet-alert/sweetalert2.all.min.js') }}"></script>
    @include('sweetalert::alert')
    <script>
        $(document).ready(function () {
            $('.changeStatus').click(function () {
                let dataId = $(this).data('id');
                let self = $(this);
                $.ajax({
                    url: '{{ route('admin.postStatusChange') }}',
                    method: 'POST',
                    data: {
                        id: dataId,
                        '_token': "{{ csrf_token() }}"
                    },
                    async: false,
                    success: function (response) {
                        if (response.status == 1) {
                            self[0].classList.add('green');
                            self[0].classList.remove('red');
                            self[0].innerText = "Active";
                        } else {
                            self[0].classList.add('red');
                            self[0].classList.remove('green');
                            self[0].innerText = "Inactive";
                        }
                    },
                    error: function () {

                    }
                })
            });

            $('.deletePost').click(function () {
                let dataId = $(this).data('id');
                let self = $(this);
                Swal.fire({
                    title: 'Warning',
                    text: `Are you sure delete the post of ${dataId}. `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, I am not'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.postDelete') }}',
                            method: 'POST',
                            data: {
                                id: dataId,
                                '_token': "{{ csrf_token() }}"
                            },
                            async: false,
                            success: function (response) {
                                $('#row' + dataId).remove();
                            },
                            error: function () {

                            }
                        })
                    }
                })

            });
        });
    </script>
@endsection
