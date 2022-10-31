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
                                    <li class="breadcrumb-item"><a href="javascript:">Team Manage</a></li>
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
                                        <h5>Team Manage</h5>
                                    </div>
                                    <div class="card-block">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-team-modal" ><div class="i-block"  data-toggle="tooltip" ><i class="feather icon-plus-circle"></i> Create</div></button>
                                        <div id='create_table'>

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

<div class="modal fade" id="edit-team-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-team-modal">Edit Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input class="form-control" type="hidden"  id="edit_id">
        <div class="form-group">
            <label for="email">Logo</label>
            <input class="form-control" type="file" id="edit_logo">
        </div>
        <div class="form-group">
            <label for="team_name">Team Name</label>
            <input class="form-control" type="text" id="edit_name">
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="editTeam()">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add-team-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-team-modal">Add Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="email">Logo</label>
            <input class="form-control" type="file" id="add_logo" >
        </div>
        <div class="form-group">
            <label for="team_name">Team Name</label>
            <input class="form-control" type="text" id="add_team_name">
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addTeam()">Save</button>
      </div>
    </div>
  </div>
</div>

<script>

$( document ).ready(function() {
    get_team();
});

$('#add-team-modal').on('shown.bs.modal', function (e) {
    $('#add_team_name').val('')
})

function get_team(){
    $.ajax({
        type: 'post',
        url: "<?php echo site_url() . '/Team/get_team'; ?>",
        dataType: 'json',
        success: function(data) {
            create_table(data);
        }
    })
}

function create_table(data){
    let html_code = '';
    html_code +='<table id="myTable" class="table-hover">'
    html_code +='<thead>'
    html_code +='<tr>'
    html_code +='<th style="width: 10%;">No.</th>'
    html_code +='<th style="width: 20%;">Logo</th>'
    html_code +='<th style="width: 55%;">Team Number</th>'
    html_code +='<th style="width: 15%;">Manage</th>'
    html_code +='</tr>'
    html_code +='</thead>'
    html_code +='<tbody>'
    data.forEach((row, index) => {
        html_code += '<tr>'
        html_code += '<td>'+ (index + 1)+'</td>'
        html_code += '<td>Logo</td>'
        html_code += '<td>'+row.team_name+'</td>'
        html_code += '<td>'
        html_code +='<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit-team-modal" onclick="editModal('+ row.team_id +',\''+ row.team_name+'\')" ><div class="i-block" data-clipboard-text="feather icon-edit" data-filter="icon-edit" data-toggle="tooltip"><i class="feather icon-edit"></i></div></button>'
        html_code +='<button type="button" class="btn btn-outline-danger" data-toggle="tooltip" onclick="deleteTeam(' + row.team_id + ')" ><div class="i-block" data-clipboard-text="feather icon-trash-2" data-filter="icon-trash-2" data-toggle="tooltip" title="" ><i class="feather icon-trash-2"></i></div></button>'
        html_code += '</td>'  
        html_code += '</tr>';
    })
    html_code +='</tbody>';
    html_code +='</table>';
    $('#create_table').html(html_code);
    $('#myTable').DataTable({
        dom: 'frtlip',
        aoColumnDefs: [{
            bSortable: false,
            aTargets: [-1]
        }]
    });
    $(".dataTables_length").css('clear', 'none');
    $(".dataTables_length").css('margin-right', '20px');
    $(".dataTables_info").css('clear', 'none');
    $(".dataTables_info").css('padding-top', '1');
}

function editModal(id, name){
    $('#edit_id').val(id) 
    $('#edit_name').val(name);
}

function addTeam(){
    let logo = $('#add_logo').val();
    let team_name = $('#add_team_name').val();
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Team/add_team'; ?>",
        data: {
                'logo': logo,
                'team_name': team_name,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                $('#add-team-modal .close').click();
                get_team()
            }
            else {
                toastFail()
            }
        }
    });
}

function editTeam(){
    let id = $('#edit_id').val();
    let logo = $('#edit_logo').val();
    let team_name = $('#edit_name').val();
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Team/edit_team'; ?>",
        data: {
                'id': id,
                'logo': logo,
                'team_name': team_name,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                $('#edit-team-modal .close').click();
                get_team()
            }
            else {
                toastFail()
            }
            /* End Check if log in fail */
        }
    });
}

function deleteTeam(id){
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Team/delete_team'; ?>",
        data: {
                'id': id,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                get_team()
            }
            else {
                toastFail()
            }
            /* End Check if log in fail */
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