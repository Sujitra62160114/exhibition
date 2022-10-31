<style>
div.dataTables_filter{
    padding-bottom: 0.7em;
}
.dataTables_length{
    padding-top: 0.2em;
}
.member{
    margin-bottom: 5px;
}
.member-child {
    width:80% !important;
    margin-right: 10px;
    display: inline-block !important;
}
.image{
    margin-bottom: 10px;
}
.image-child {
    width: 90% !important;
    margin-right: 10px;
    display: inline-block !important;
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
                                    <li class="breadcrumb-item"><a href="<?php echo site_url().'/Project/show_project_manage' ;?>">Project Manage</a></li>
                                    <li class="breadcrumb-item"><a href="">Project Create</a></li>
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
                                        <h5>User Create</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Project Name</label>
                                                    <input class="form-control" type="text" id="projectName">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label class="form-label" style="margin-right : 35px;">Class Year </label>
                                                <div class="form-group" >  
                                                    <div class="form-check" style="display: inline;">
                                                        <input class="form-check-input" type="radio" name="classYear" value="2" checked onclick="checkClassYear()">
                                                        <label class="form-check-label">ชั้นปีที่ 2</label>
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-check" style="display: inline;">
                                                        <input class="form-check-input" type="radio" name="classYear" value="3" onclick="checkClassYear()" >
                                                        <label class="form-check-label">ชั้นปีที่ 3</label>
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-check" style="display: inline;">
                                                        <input class="form-check-input" type="radio" name="classYear" value="4"  onclick="checkClassYear()" >
                                                        <label class="form-check-label">ชั้นปีที่ 4</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Member</label>
                                                    <div id='memberList'>
                                                        <input class="form-control member" type="text" name='member'>
                                                    </div>
                                                </div>
                                                <button onclick="addMember()">Add</button><br><br>
                                            </div>
                                            <div class="col-3" id="Company">
                                                <div class="form-group">
                                                    <label>Company</label>
                                                    <select id="company" class="form-control">
                                                        <option value=""></option>
                                                        <?php foreach ($company as $x) { ?>
                                                            <option value="<?php echo $x->company_id ?>"><?php echo $x->company_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3" id="Cluster">
                                                <div class="form-group">
                                                    <label>Cluster</label>
                                                    <select id="cluster" class="form-control">
                                                        <option value=""></option>
                                                        <?php foreach ($cluster as $x) { ?>
                                                            <option value="<?php echo $x->cluster_id ?>"><?php echo $x->cluster_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3" id="Team">
                                                <div class="form-group">
                                                    <label>Team</label>
                                                    <select id="team" class="form-control">
                                                        <option value=""></option>
                                                        <?php foreach ($team as $x) { ?>
                                                            <option value="<?php echo $x->team_id ?>"><?php echo $x->team_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3" id="Teacher">
                                                <div class="form-group">
                                                    <label>Teacher</label>
                                                    <select id="teacher" class="form-control">
                                                        <option value=""></option>
                                                        <option value="อาจาร1">อาจาร1</option>
                                                        <option value="อาจาร2">อาจาร2</option>
                                                        <option value="อาจาร3">อาจาร3</option>
                                                        <option value="อาจาร4">อาจาร4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                            <label>Detail</label>
                                            <textarea class='form-control'  rows="8" id='detail'></textarea>
                                            <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Image</label>&nbsp;&nbsp;<button class="float-right" onclick="addImage()">Add Image</button><br><br>
                                                <input class="form-control image" type="file" id="add_logo" >
                                                <div id='imageList'></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Template</label>

                                            </div>
                                        </div>     
                                        <br><br>
                                        <div class="row float-right" >
                                            <a href="<?php echo site_url().'/Project/show_project_manage' ;?>" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
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

$( document ).ready(function() {
    document.getElementById("Teacher").style.display = "none"
    document.getElementById("Team").style.display = "none"
});

index = 1;
indexImage = 1;
function addMember(){
    if(index < 11){
        document.querySelector("#memberList").insertAdjacentHTML("beforeend",  
        `<div class="member-list-child"><input type="text" name="member" class="form-control member member-child"><button onclick="deleteItem(this)">Delete</button><div>`);
        index++;
    }
}

function deleteItem(dom){
    var e = $(dom).closest('.member-list-child')
    e.remove()
    index--
}

function addImage(){
    if(indexImage < 3){
        document.querySelector("#imageList").insertAdjacentHTML("beforeend",  
        `<div class="image-list-child"><input class="form-control image image-child" type="file" id="add_logo" ><button onclick="deleteImage(this)">Delete</button><div>`);
        indexImage++;
    }
}

function deleteImage(dom){
    var e = $(dom).closest('.image-list-child')
    e.remove()
    indexImage--
}

function addUser(){
    let project_name = $('#projectName').val();
    let classYear = $("input[name='classYear']:checked").val();
    let company = $('#company').val();
    let member = $('input[name="member"]').map(function () { return this.value; }).get();
    let detail = $('#detail').val();
    let radio = ''
    if(classYear == 2){
        radio = $('#cluster').val();
    }else if(classYear == 3){
        radio = $('#team').val();
    }else{
        radio = $('#teacher').val();
    }
    $.ajax({
        type: 'POST',
        url: "<?php/echo site_url() . '/Project/add_project'; ?>",
        data: {
                'project_name': project_name,
                'class_year': classYear,
                'company_id': company,
                'member': member,
                'detail': detail,
                'radio': radio,
            },
        dataType: 'json',
        success: async function(data) {
            console.log(data)
            if (data.message) {
                await toastSuccess()
                //window.location.href = '<?php //echo site_url().'/User/show_user_manage';?>';
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

function checkClassYear(){
    const classYear = $('input[name=classYear]:checked').val();
    let x = document.getElementById("Team");
    let y = document.getElementById("Cluster");
    let z = document.getElementById("Teacher");
    if(classYear == 2){
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
    }else if(classYear == 3){
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
    }else{
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "block";
    }
}



</script>