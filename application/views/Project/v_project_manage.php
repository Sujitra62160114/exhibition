<style>
div.dataTables_filter{
    padding-bottom: 0.7em;
}
.dataTables_length{
    padding-top: 0.2em;
}
.dataTables_filter{ 
  display: none; 
}
select#classYearFilter{
    display: inline;
    width: 200px;
}
input[type="search"]{
  border-radius: 3px;
  border: 1px solid #aaa;
  width: 250px;
  
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
                                    <li class="breadcrumb-item"><a href="javascript:">Project Manage</a></li>
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
                                        <h5>Project Manage</h5>
                                    </div>
                                    <div class="card-block">
                                        <a type="button" class="btn btn-outline-primary" href="<?php echo site_url().'/Project/show_project_create' ;?>" ><div class="i-block"  data-toggle="tooltip" ><i class="feather icon-plus-circle"></i> Create</div></a>
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
    get_project();
});


function get_project(){
    $.ajax({
        type: 'post',
        url: "<?php echo site_url() . '/Project/get_project'; ?>",
        dataType: 'json',
        success: function(data) {
            create_table(data);
        }
    })
}

function create_table(data){
    let html_code = '';
    html_code += '<br> ';
    html_code += '<div id="filler">Search: <input id="myInput" type="search" onsearch="OnSearch()"> ';
    html_code += '&nbsp&nbspClass Year: ';
    html_code += '<select id="classYearFilter" onchange="status_filter()" class="form-control">';
    html_code += ' <option value="">All</option>';
    html_code += ' <option value="2">2</option>';
    html_code += ' <option value="3">3</option>';
    html_code += ' <option value="4">4</option>';
    html_code += '</select>';
    html_code += '</div>';
    html_code +='<table id="myTable" class="table-hover">'
    html_code +='<thead>'
    html_code +='<tr>'
    html_code +='<th style="width: 10%;">No.</th>'
    html_code +='<th>Student ID</th>'
    html_code +='<th>Project Name</th>'
    html_code +='<th>Class Year</th>'
    html_code +='<th style="width: 20%;" class="text-center">Status</th>'
    html_code +='<th style="width: 15%;">Manage</th>'
    html_code +='</tr>'
    html_code +='</thead>'
    html_code +='<tbody>'
    data.forEach((row, index) => {
        html_code += '<tr>'
        html_code += '<td>'+ (index + 1)+'</td>'
        html_code += '<td>'+row.user_student_id+'</td>'
        html_code += '<td>'+row.project_name+'</td>'
        html_code += '<td>'+row.class_year+'</td>'
        html_code += '<td class="text-center">';
        if(row.status == 1){
            html_code += '<div class="custom-switch custom-switch-label-onoff custom-switch-sm pl-0">';
            html_code += '<input class="custom-switch-input" id="' + row.project_id + '" type="checkbox" onchange="changeStatus(' +  row.project_id  + ',' +row.status + ')" checked>';
            html_code += '<label class="custom-switch-btn" for="' + row.project_id + '"></label>';
            html_code += '</div>';
        }else{
            html_code += '<div class="custom-switch custom-switch-label-onoff custom-switch-sm pl-0">';
            html_code += '<input class="custom-switch-input" id="' + row.project_id + '" type="checkbox" onchange="changeStatus(' +  row.project_id  + ',' +row.status + ')" >';
            html_code += '<label class="custom-switch-btn" for="' + row.project_id + '"></label>';
            html_code += '</div>';
        }
        html_code += '</td>';
        html_code += '<td>'
        html_code +='<button type="button" class="btn btn-outline-warning"  ><div class="i-block" data-clipboard-text="feather icon-edit" data-filter="icon-edit" data-toggle="tooltip"><i class="feather icon-edit"></i></div></button>'
        html_code +='<button type="button" class="btn btn-outline-danger" data-toggle="tooltip" onclick="deleteProject(' + row.project_id + ')" ><div class="i-block" data-clipboard-text="feather icon-trash-2" data-filter="icon-trash-2" data-toggle="tooltip" title="" ><i class="feather icon-trash-2"></i></div></button>'
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
    oTable = $('#myTable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
        $('#myInput').keyup(function(){
            oTable.search($(this).val()).draw() ;
    })
}

function OnSearch(){
    oTable = $('#myTable').DataTable();  
    oTable.search('').draw() ;
}

function status_filter(){
    var table = $('#myTable').DataTable();
      //Take the category filter drop down and append it to the datatables_filter div. 
      //You can use this same idea to move the filter anywhere withing the datatable that you want.
      // $("#myTable_filter.dataTables_filter").append($("#categoryFilter"));
      
      //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
      //This tells datatables what column to filter on when a user selects a value from the dropdown.
      //It's important that the text used here (Category) is the same for used in the header of the column to filter
      var categoryIndex = 0;
      $("#myTable th").each(function (i) {
        if ($($(this)).html() == "Class Year") {
          categoryIndex = i; return false;
        }
      });
      //Use the built in datatables API to filter the existing rows by the Category column
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#classYearFilter').val()
          var category = data[categoryIndex];

          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );
      //Set the change event for the Category Filter dropdown to redraw the datatable each time
      //a user selects a new filter.
      $("#classYearFilter").change(function (e) {
        table.draw();
      });
      table.draw();
    }


function deleteProject(id){
    $.ajax({
        type: 'POST',
        url: "<?php echo site_url() . '/Project/delete_project'; ?>",
        data: {
                'id': id,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                get_project()
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
        url: "<?php echo site_url() . '/Project/change_status'; ?>",
        data: {
                'id': id,
                'status': status == 0 ? 1 : 0,
            },
        dataType: 'json',
        success: function(data) {
            console.log(data)
            if (data.message) {
                toastSuccess()
                $('#edit-project-modal .close').click();
                get_project()
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