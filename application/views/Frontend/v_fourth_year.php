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
                                    <li class="breadcrumb-item"><a href="javascript:"></a></li>
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
                                        <h5>Activities</h5>
                                    </div>
                                    <div class="card-block">
                                        <table id="myTable" class="display">
                                            <thead>
                                                <tr>
                                                    <th>N0</th>
                                                    <th>Student ID</th>
                                                    <th>Student Name</th>
                                                    <th>Project Name</th>
                                                    <th>Advisor</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            
                                                <tr>
                                                    <td>1</td>
                                                    <td>62160099</td>
                                                    <td>Preedaporn Ponglueangtham</td>
                                                    <td>Online Exhibition</td>
                                                    <td>Athitha Onuean</td>
                                                    <td><button type="button" class="btn btn-outline-primary" title="" data-toggle="tooltip" data-original-title="view"><div class="i-block" data-clipboard-text="feather icon-eye" data-filter="icon-eye" data-toggle="tooltip" title="" data-original-title=""><i class="feather icon-eye"></i></div></button></td>
                                                </tr>
                                            
                                        </table>
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
    $('#myTable').DataTable();
});


</script>