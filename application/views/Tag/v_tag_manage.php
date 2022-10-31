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
                                    <li class="breadcrumb-item"><a href="javascript:">Tag Manage</a></li>
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
                                        <h5>Tag Manage</h5>
                                    </div>
                                    <div class="card-block">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-tag-modal" ><div class="i-block"  data-toggle="tooltip" ><i class="feather icon-plus-circle"></i> Create</div></button>
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

<div class="modal fade" id="edit-tag-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-tag-modal">Edit Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input class="form-control" type="hidden"  id="edit_id">
        <div class="form-group">
            <label for="tag_name">Tag Name</label>
            <input class="form-control" type="text" id="edit_name">
        </div>
        <div class="custom-switch custom-switch-label-onoff custom-switch-sm pl-0">
            <label class="form-label">Status</label><br><br>
            <input class="custom-switch-input" id="edit_status" type="checkbox" value='1' >
            <label class="custom-switch-btn" for="edit_status"></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="editTag()">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add-tag-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-tag-modal">Add Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="tag_name">Tag Name</label>
            <input class="form-control" type="text" id="add_tag_name">
        </div>
        <div class="custom-switch custom-switch-label-onoff custom-switch-sm pl-0">
            <label class="form-label">Status</label><br><br>
            <input class="custom-switch-input" id="create_status" type="checkbox" value='1'>
            <label class="custom-switch-btn" for="create_status"></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addTag()">Save</button>
      </div>
    </div>
  </div>
</div>

<script>

$( document ).ready(function() {
    get_tag();
});

$('#add-tag-modal').on('shown.bs.modal', function (e) {
    $('#add_tag_name').val('')
})

function get_tag(){
    $.ajax({
        type: 'post',
        url: "<?php echo site_url() . '/Tag/get_tag'; ?>",
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
    html_code +='<th style="width: 55%;">Tag Number</th>'
    html_code +='<th style="width: 20%;" class="text-center">Status</th>'
    html_code +='<th style="width: 15%;">Manage</th>'
    html_code +='</tr>'
    html_code +='</thead>'
    html_code +='<tbody>'
    data.forEach((row, index) => {
        html_code += '<tr>'
        html_code += '<td>'+ (index + 1)+'</td>'
        html_code += '<td>'+row.tag_name+'</td>'
        html_code += '<td class="text-center">';
        if(row.status == 1){
            html_code += '<div class="custom-switch custom-switch-label-onoff custom-switch-sm pl-0">';
            html_code += '<input class="custom-switch-input" id="' + row.tag_id + '" type="checkbox" onchange="changeStatus(' +  row.tag_id  + ',' +row.status + ')" checked>';
            html_code += '<label class="custom-switch-btn" for="' + row.tag_id + '"></label>';
            html_code += '</div>';
        }else{
            html_code += '<div class="custom-switch custom-switch-label-onoff custom-switch-sm pl-0">';
            html_code += '<input class="custom-switch-input" id="' + row.tag_id + '" type="checkbox" onchange="changeStatus(' +  row.tag_id  + ',' +row.status + ')" >';
            html_code += '<label class="custom-switch-btn" for="' + row.tag_id + '"></label>';
            html_code += '</div>';
        }
        html_code += '</td>';
        html_code += '<td>'
        html_code +='<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit-tag-modal" onclick="editModal('+ row.tag_id +',\''+ row.tag_name +'\',\''+ row.status+'\')" ><div class="i-block" data-clipboard-text="feather icon-edit" data-filter="icon-edit" data-toggle="tooltip"><i class="feather icon-edit"></i></div></button>'
        html_code +='<button type="button" class="btn btn-outline-danger" data-toggle="tooltip" onclick="deleteTag(' + row.tag_id + ')" ><div class="i-block" data-clipboard-text="feather icon-trash-2" data-filter="icon-trash-2" data-toggle="tooltip" title="" ><i class="feather icon-trash-2"></i></div></button>'
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

function editModal(id, name, status){
    $('#edit_id').val(id) 
    $('#edit_name').val(name);
    if(status == 1){
        $('#edit_status').prop('checked', true);
    }
}

function addTag(){
    let logo = $('#add_logo').val();
    let tag_name = $('#add_tag_name').val();
    let status =  $('#create_status:checked').val();
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Tag/add_tag'; ?>",
        data: {
                'logo': logo,
                'tag_name': tag_name,
                'status': status == 1 ? 1 : 0
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                $('#add-tag-modal .close').click();
                get_tag()
            }
            else {
                toastFail()
            }
        }
    });
}

function editTag(){
    let id = $('#edit_id').val();
    let logo = $('#edit_logo').val();
    let tag_name = $('#edit_name').val();
    let status =  $('#edit_status:checked').val();
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Tag/edit_tag'; ?>",
        data: {
                'id': id,
                'logo': logo,
                'tag_name': tag_name,
                'status': status == 1 ? 1 : 0
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                $('#edit-tag-modal .close').click();
                get_tag()
            }
            else {
                toastFail()
            }
            /* End Check if log in fail */
        }
    });
}

function deleteTag(id){
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Tag/delete_tag'; ?>",
        data: {
                'id': id,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                get_tag()
            }
            else {
                toastFail()
            }
            /* End Check if log in fail */
        }
    });
}

function changeStatus(id, status){
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Tag/change_status'; ?>",
        data: {
                'id': id,
                'status': status == 0 ? 1 : 0,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                $('#edit-tag-modal .close').click();
                get_tag()
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