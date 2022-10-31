<style>
div.dataTables_filter{
    padding-bottom: 0.7em;
}
.dataTables_length{
    padding-top: 0.2em;
}

</style>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <!-- <h5 class="m-b-10">จัดการข้อมูลกิจกรรรม</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url().'/User/show_user_manage' ;?>">User Manage</a></li>
                                    <li class="breadcrumb-item"><a href="">User Edit</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>User Edit</h5>
                                    </div>
                                    <div class="card-block">
                                        <input type="hidden" value="<?php echo $user->user_id ?>" id='id'>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">First Name</label>
                                                    <input class="form-control" type="text" id="firstName" value="<?php echo $user->user_first_name ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Last Name</label>
                                                    <input class="form-control" type="text" id="lastName" value="<?php echo $user->user_last_name ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Student ID</label>
                                                    <input class="form-control" type="text" id="studentId" value="<?php echo $user->user_student_id ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input class="form-control" type="text" id="email" value="<?php echo $user->user_email ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <!-- <div class="form-group">
                                                    <label for="email">Passord</label>
                                                    <input class="form-control" type="password" id="pass">
                                                </div> -->
                                            </div>
                                            <div class="col">
                                                <label class="form-label" style="margin-right : 35px;"> Role </label>
                                                <div class="form-group" >  
                                                    <div class="form-check" style="display: inline;">
                                                        <input class="form-check-input" type="radio" name="role" value="1" <?php echo $user->role == 1 ?  'checked' : ''  ?> >
                                                        <label class="form-check-label">User</label>
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-check" style="display: inline;">
                                                        <input class="form-check-input" type="radio" name="role" value="2" <?php echo $user->role == 2 ?  'checked' : ''  ?> >
                                                        <label class="form-check-label">Admin</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row float-right" >
                                            <a href="<?php echo site_url().'/User/show_user_manage' ;?>" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                            <button type="button" class="btn btn-primary" onclick="addUser()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function addUser(){
    let id = $('#id').val();
    let first_name = $('#firstName').val();
    let last_name = $('#lastName').val();
    let student_id = $('#studentId').val();
    let email = $('#email').val();
    let pass = $('#pass').val();
    let role = $('input[name=role]:checked').val();
    
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/User/edit_user'; ?>",
        data: {
                'id': id,
                'first_name': first_name,
                'last_name': last_name,
                'student_id': student_id,
                'email': email,
                'pass': pass,
                'role': role,
            },
        dataType: 'json',
        success: async function(data) {
            console.log(data)
            if (data.message) {
                await toastSuccess()
                window.location.href = '<?php echo site_url().'/User/show_user_manage';?>';
            }
            else {
                await toastFail()

            }
        }
    });

}

function toastSuccess(){
    $.toast({
    heading: 'Success',
    showHideTransition: 'slide',
    icon: 'success'
    })
}

function toastFail(){
    $.toast({
        heading: 'Fail',
        showHideTransition: 'slide',
        icon: 'error'
    })
}



</script>