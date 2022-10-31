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
                                                    <th>Company</th>
                                                    <th>Team</th>
                                                   
                                                </tr>
                                            </thead>
                                            
                                                <tr>
                                                    <td> 
                                                        <div class="row">
                                                            <div class="col-2"> <img src="<?php echo base_url()?>/assets/images/team 0.png" alt="" style="width: 50%;max-height: 10rem;"></div>
                                                            <div class="col-2"style="padding-top: 20px"><h5><b>IV SOFT</b></h5></div>
                                                        </div>
                                                    </td>
                                                    <td><b>Team 0</b></td>
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