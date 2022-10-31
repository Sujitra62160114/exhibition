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
                                    <li class="breadcrumb-item"><a href="javascript:">User Manage</a></li>
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
                                        <h5>User Manage</h5>
                                    </div>
                                    <div class="card-block">
                                        <a type="button" class="btn btn-outline-primary" href="<?php echo site_url().'/User/show_user_create' ;?>" ><div class="i-block"  data-toggle="tooltip" ><i class="feather icon-plus-circle"></i> Create</div></a>
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

<script>

$( document ).ready(function() {
    get_cluster();
});

function get_cluster(){
    $.ajax({
        type: 'post',
        url: "<?php echo site_url() . '/User/get_user'; ?>",
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
    html_code +='<th style="width: 20%;">Image</th>'
    html_code +='<th style="width: 30%;">Name</th>'
    html_code +='<th style="width: 25%;">Email</th>'
    html_code +='<th style="width: 15%;">Manage</th>'
    html_code +='</tr>'
    html_code +='</thead>'
    html_code +='<tbody>'
    data.forEach((row, index) => {
        html_code += '<tr>'
        html_code += '<td>'+ (index + 1)+'</td>'
        html_code += '<td>Logo</td>'
        html_code += '<td>'+row.user_first_name+' '+row.user_last_name+'</td>'
        html_code += '<td>'+row.user_email+'</td>'
        html_code += '<td>'
        html_code +='<a type="button" class="btn btn-outline-warning" href="<?php echo site_url().'/User/show_user_edit/'?>' + row.user_id + '<?php ; ?>" ><div class="i-block" data-clipboard-text="feather icon-edit" data-filter="icon-edit" data-toggle="tooltip"><i class="feather icon-edit"></i></div></a>'
        html_code +='<button type="button" class="btn btn-outline-danger" data-toggle="tooltip" onclick="deleteUser(' + row.user_id + ')" ><div class="i-block" data-clipboard-text="feather icon-trash-2" data-filter="icon-trash-2" data-toggle="tooltip" title="" ><i class="feather icon-trash-2"></i></div></button>'
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

function deleteUser(id){
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/User/delete_user'; ?>",
        data: {
                'id': id,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                get_cluster()
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