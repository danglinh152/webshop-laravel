@extends('admin.layout.admin-layout')
@section('information')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="row mt-4">
            <div class="col-3">
                <div class="row mt-4">
                    <div class="col-1">
                        <img id="user-avatar" style="width: 30px; height:30px"
                            src="{{ isset($user) && $user->user_image ? asset('public/backend/users-images/' . $user->user_image) : asset('public/backend/users-images/profile.png') }}" alt="">
                    </div>
                    <div class="col">
                        <h5 class="text-dark ms-2 mt-1" style="font-weight:600">{{$user->user_last_name}} {{$user->user_first_name}}</h5>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="tab active" onclick="openTab(event, 'tab1')">Hồ sơ của tôi</div>
                    <div class="tab" onclick="openTab(event, 'tab2')">Mật khẩu</div>
                </div>
            </div>
            <div class="col-9">
                <div class="content px-4">
                    <div id="tab1" class="info-content active">
                        <form action="{{URL::to('/admin/update-info')}}" method="post" enctype="multipart/form-data" class="px-2">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Họ:</label>
                                        <input class="form-control mt-1" type="text" id="last_name" name="last_name" required value="{{$user->user_last_name}}"/>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Tên:</label>
                                        <input class="form-control mt-1" type="text" id="first_name" name="first_name" required value="{{$user->user_first_name}}"/>
                                    </div>
                                </div>
                                <div class="ms-5 mb-3 col-4 text-center d-flex flex-column align-items-center">
                                    <img id="avatar" src="{{$user->user_image ? asset('public/backend/users-images/'.$user->user_image) : asset('public/backend/users-images/profile.png') }}"
                                        alt="Avatar" class="avatar">
                                    <input type="file" name = "user_image" id="avatarUpload" accept="image/*" style="display: none;">
                                    <button class="btn border rounded-pill px-4 py-2 text-dark mt-1" type="button"
                                        onclick="document.getElementById('avatarUpload').click();">Tải hình
                                        ảnh
                                        lên</button>
                                </div>
                                <div class="form-group mt-3 col-6">
                                    <label>Email:</label>
                                    <input class="form-control mt-1" type="email" id="email" name="email" value="{{$user->user_email}}"required />
                                </div>
                                <div class="form-group mt-3 col-6">
                                    <label>Số điện thoại:</label>
                                    <input class="form-control mt-1" type="text" id="phone" name="phone" required value="{{$user->user_phone}}" />
                                </div>
                                <div class="form-group mt-3 ">
                                    <label>Địa chỉ:</label>
                                    <textarea class="form-control mt-1" id="address" name="address" >{{$user->user_address}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button style="width:30%" type="button" id="updateUserButton"
                                    class="mt-3 btn border rounded-pill px-4 py-2 text-primary mt-2">
                                    Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="tab2" class="info-content">
                        <h5 class="text-center pt-4">Thay đổi mật khẩu</h5>
                        <form id="updatePasswordForm" action="" class="px-2">
                            @csrf
                            <div class="d-flex flex-wrap g-2 justify-content-center">
                                <div class="form-group col-7 mt-3">
                                    <label>Mật khẩu hiện tại:</label>
                                    <input class="form-control mt-1" type="password" id="current_password" name="current_password" required />
                                </div>
                                <div class="form-group col-7 mt-3">
                                    <label>Mật khẩu mới:</label>
                                    <input class="form-control mt-1" type="password" id="new_password" name="new_password" required />
                                </div>
                                <div class="form-group mt-3 col-7">
                                    <label>Xác nhận mật khẩu:</label>
                                    <input class="form-control mt-1" type="password" id="confirm_password" name="confirm_password" required />
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button style="width:30%" type="button" id="updatePasswordButton"
                                    class="mt-3 btn border rounded-pill px-4 py-2 text-primary mt-2">
                                    Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</main>
<script>
    function openTab(event, tabId) {
        let tabs = document.querySelectorAll('.tab');
        let contents = document.querySelectorAll('.info-content');
        tabs.forEach(tab => tab.classList.remove('active'));
        contents.forEach(content => content.classList.remove('active'));

        event.currentTarget.classList.add('active');
        document.getElementById(tabId).classList.add('active');
    }

    document.getElementById('avatarUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    document.getElementById("updatePasswordButton").addEventListener("click", function (e) {
        e.preventDefault();
        const currentPassword = document.getElementById("current_password").value;
        const newPassword = document.getElementById("new_password").value;
        const confirmPassword = document.getElementById("confirm_password").value;

        if (newPassword !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Mật khẩu mới và xác nhận mật khẩu không khớp!',
                timer: 1500,
                showConfirmButton: false,
            });
            return;
        }

        fetch("{{URL::to('/admin/update-password')}}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                current_password: currentPassword,
                new_password: newPassword,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: data.message,
                        timer: 1500,
                        showConfirmButton: false,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thất bại',
                        text: data.message,
                        timer: 1500,
                        showConfirmButton: false,
                    });
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi hệ thống',
                    text: 'Đã xảy ra lỗi, vui lòng thử lại!',
                    timer: 1500,
                    showConfirmButton: false,
                });
            });
    });
    document.getElementById("updateUserButton").addEventListener("click", function (e) {
        e.preventDefault();
        console.log("Click");

        const formData = new FormData();
        formData.append('last_name', document.getElementById("last_name").value);
        formData.append('first_name', document.getElementById("first_name").value);
        formData.append('email', document.getElementById("email").value);
        formData.append('phone', document.getElementById("phone").value);
        formData.append('address', document.getElementById("address").value);

        const userImage = document.getElementById("avatarUpload").files[0];
        if (userImage) {
            formData.append('user_image', userImage);
        }

        fetch("{{URL::to('/admin/update-info')}}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": '{{ csrf_token() }}',
            },
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false,
                });

                document.getElementById("last_name").value = formData.get('last_name');
                document.getElementById("first_name").value = formData.get('first_name');
                document.getElementById("email").value = formData.get('email');
                document.getElementById("phone").value = formData.get('phone');
                document.getElementById("address").value = formData.get('address');

                if (userImage) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const newAvatarUrl = e.target.result;
                        document.getElementById("avatar").src = newAvatarUrl;
                        document.getElementById("user-avatar").src = newAvatarUrl;

                        const event = new CustomEvent('avatar-updated', { detail: newAvatarUrl });
                        window.dispatchEvent(event);
                    };
                    reader.readAsDataURL(userImage);
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false,
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            Swal.fire({
                icon: 'error',
                title: 'Lỗi hệ thống',
                text: 'Đã xảy ra lỗi, vui lòng thử lại sau!',
                timer: 1500,
                showConfirmButton: false,
            });
        });
    });
</script>

@stop
