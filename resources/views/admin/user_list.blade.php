@extends('layouts.admin_master_dashboard')
@section('title')
@endsection
@section('contentadmindash')
<!-- Tambah modal -->
<div id="tambah_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" id="close_add_modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah_modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah User</h3>
                <form class="space-y-6" id="tambah_user" action="#" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="jack" required>
                    </div>
                    <div>
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor</label>
                        <input type="number" name="number" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="08x xxx xxx xxx" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="jack@company.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                        <select id="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="false" selected>User</option>
                            <option value="true">Admin</option>
                        </select>
                    </div>
                    <button type="submit" id="add_user_btn" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit modal -->
<div id="edit_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" id="close_edit_modal" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit_modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit User</h3>
                <form class="space-y-6" method="POST" id="update_user" action="#">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div>
                        <label for="edit_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="edit_name" id="edit_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="jack" required>
                    </div>
                    <div>
                        <label for="edit_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor</label>
                        <input type="number" name="edit_number" id="edit_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="08x xxx xxx xxx" required>
                    </div>
                    <div>
                        <label for="edit_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="edit_email" id="edit_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="jack@company.com" required>
                    </div>
                    <div>
                        <label for="edit_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="password" name="edit_password" id="edit_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for="edit_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                        <select id="edit_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="false" selected>User</option>
                            <option value="true">Admin</option>
                        </select>
                    </div>
                    <button type="submit" id="edit_user_btn" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="p-4 sm:ml-64 mt-14">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Daftar User</h1>
    <div class="p-4 bg-white">
        <div class="flex justify-between my-4">
            <h1 class="text-xl text-gray-800">Daftar User</h1>
            <!-- Modal toggle -->
            <button data-modal-target="tambah_modal" data-modal-toggle="tambah_modal" class="block text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-3 text-center" type="button">
                Tambah User
            </button>
        </div>
        <!-- datatable here -->
        <div id="table_here" class="relative overflow-x-auto"></div>
    </div>
</div>
<script>

    $("#tambah_user").submit(function(e) {
        e.preventDefault();
        $("#add_user_btn").html(
            '<svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/></svg>Loading...'
        );
        $("#add_dosen_btn").prop("disabled", true);
        $.ajax({
            url: '/adduser',
            method: 'POST',
            data: {
                name: $("#name").val(),
                number: $("#number").val(),
                email: $("#email").val(),
                password: $("#password").val(),
                level: $("#level").val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire(
                        'Berhasil!',
                        'Akun berhasil ditambah!',
                        'success'
                    )
                    // $("#tambah_modal").hide();
                    $("#close_add_modal").click();
                    $("#tambah_user")[0].reset();
                    getuserdata();
                    $("#add_user_btn").html('Tambahkan Akun');
                    $("#add_user_btn").prop("disabled", false);
                    // $("#add_dosen_btn").text('Tambah User');
                    // $("#add_dosen_btn").removeClass("btn-light");
                    // $("#add_dosen_btn").addClass("btn-primary");
                    // $("#add_dosen_btn").prop("disabled", false);
                    // $("#add_dosen_form")[0].reset();
                    // $("#addDosen").modal('hide');
                    // $("#nidnInput").show();
                    // $('#error-nidn').html('');
                    // $('#error-email').html('');
                    // $('#error-name').html('');
                    // $('#error-password').html('');
                    // console.log('jquery');
                    // $('body').removeClass('modal-open');
                    // $('.modal-backdrop').remove();
                    // $(".btn-close").click();
                }
                //  else {
                //     $.each(response.errors, function(key, value) {
                //         $('#error-' + key).html(value[0]);
                //     });
                // }
            },
            error: function(response) {
                // var errors = response.responseJSON.errors;
                // $('#error-nidn').html('');
                // $('#error-email').html('');
                // $('#error-name').html('');
                // $('#error-password').html('');
                // $.each(response.responseJSON.errors, function(key, value) {
                //     $('#error-' + key).html(value[0]);
                // });
                // $('#your-form-id')[0].reset();

                // Display validation errors using a library like SweetAlert or custom code
                // For example, using SweetAlert:
                Swal.fire({
                    title: 'Terjadi kesalahan karena:',
                    html: Object.values(errors).join("<br>"),
                    footer: 'Periksa kembali input anda!',
                    icon: 'error',
                });
                // $("#add_dosen_btn").text('Tambah User');
                // $("#add_dosen_btn").removeClass("btn-light");
                // $("#add_dosen_btn").addClass("btn-primary");
                // $("#add_dosen_btn").prop("disabled", false);
            }
        });
    });

    $("#update_user").submit(function(e) {
        e.preventDefault();
        $("#edit_user_btn").html('<svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/></svg>Loading...');
        $("#edit_user_btn").prop("disabled", true);
        // let csrf = '{{ csrf_token() }}';
        $.ajax({
            url: '/update_user',
            method: 'POST',
            data: {
                user_id: $("#user_id").val(),
                name: $("#edit_name").val(),
                number: $("#edit_number").val(),
                email: $("#edit_email").val(),
                password: $("#edit_password").val(),
                level: $("#edit_level").val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire(
                        'Berhasil!',
                        'Data berhasil diperbarui!',
                        'success'
                    )
                    $("#close_edit_modal").click();
                    $("#update_user")[0].reset();
                    getuserdata();
                    $("#edit_user_btn").html('Simpan Perubahan');
                    $("#edit_user_btn").prop("disabled", false);

                }

                // $("#edit_user_btn").removeClass("btn-light");
                // $("#edit_user_btn").addClass("btn-primary");
                // $("#edit_user_btn").prop("disabled", false);
                // $("#edit_user_btn").text('Update User');
                // $("#edit_user_form")[0].reset();
                // $("#editUserModal").modal('hide');
                // $('#update-error-nidn').html('');
                // $('#update-error-email').html('');
                // $('#update-error-name').html('');
                // $('#update-error-password').html('');

                // console.log(response.masuk);
                // $('body').removeClass('modal-open');
                // $('.modal-backdrop').remove();
                // $(".btn-close").click();
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                $('#update-error-nidn').html('');
                $('#update-error-email').html('');
                $('#update-error-name').html('');
                $('#update-error-password').html('');
                $.each(response.responseJSON.errors, function(key, value) {
                    $('#update-error-' + key).html(value[0]);
                });
                // $('#your-form-id')[0].reset();

                // Display validation errors using a library like SweetAlert or custom code
                // For example, using SweetAlert:
                Swal.fire({
                    title: 'Terjadi kesalahan karena:',
                    html: Object.values(errors).join("<br>"),
                    footer: 'Periksa kembali input anda!',
                    icon: 'error',
                });
                $("#edit_user_btn").text('Update User');
                $("#edit_user_btn").removeClass("btn-light");
                $("#edit_user_btn").addClass("btn-primary");
                $("#edit_user_btn").prop("disabled", false);
            }
        });
    });

    $(document).on('click', '.delete_button', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
            title: 'Perhatian!!!',
            text: "Aksi ini akan menghapus akun secara permanen!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#74788d',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/delete_user',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        // console.log(response);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Akun sudah dihapus!',
                            showConfirmButton: 'OK'
                        })
                        // Swal.fire(
                        //     'Dihapus!',
                        //     'Berhasil menghapus pengguna.',
                        //     'success'
                        // )
                        getuserdata();
                    }
                });
            }
        })
    });

    $(document).on('click', '.edit_button', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            url: '/edit_user',
            method: 'get',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // console.log(response);
                $("#user_id").val(response.id);
                $("#edit_name").val(response.name);
                $("#edit_number").val(response.number);
                $("#edit_email").val(response.email);
                // $("#idUpdateNidn").val(response.nidn);
                // $("#name").val(response.name);
                // $("#email").val(response.email);
                // $("#role_id_input").val(response.role_id);
                // var role_id = response.role_id;
                // if (role_id == "1") {
                //     $('#nidnUpdate').show();
                //     $('#idUpdateNidn').prop('required', true);
                // } else {
                //     $('#nidnUpdate').hide();
                //     $('#idUpdateNidn').prop('required', false);
                // }
                // $("#role_id_select").val(response.role_id);
                // var avatar = response.avatar;
                // if (!avatar) {
                //     $("#avatar").html('<p>Tidak ada foto profile</p>');
                // } else {
                //     $("#avatar").html(
                //         `<img src="storage/images/${response.avatar}" width="100" class="img-fluid img-thumbnail">`);
                // }
                // $("#user_id").val(response.id);
                // $("#user_avatar").val(response.avatar);
            }
        });
    });

    getuserdata();

    function getuserdata() {
        $.ajax({
            url: '/getuserdata',
            method: 'get',
            success: function(response) {
                $("#table_here").html(response);
                $("#dt_getuserdata").DataTable({
                    order: [0, 'asc'],
                    // language: {
                    //     url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
                    // },
                });
            }
        })
    }

    // $(window).on('resize', function() {
    //     $('#dt_getuserdata').addClass('w-full');
    // });
</script>
@endsection
@section('script')
@endsection