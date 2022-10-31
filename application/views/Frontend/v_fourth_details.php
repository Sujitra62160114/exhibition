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
                        <div class="card">
                        <div class="card-header">
                                        <h5>Activities</h5>
                                    </div>
                        <div class="row">
                            <div class="col-4 text-center"> <img src="<?php echo base_url()?>/assets/images/user/avatar-1.jpg" alt="" style="width: 50%;max-height: 10rem;"></div>
                            <div class="card col-4"style="border-radius: 12px; padding: 5px; margin-top:15px;">
                            <label><b>Student ID: 62160099<br>
                                    Student Name: Preedaporn Ponglueangtham<br>
                                    Project Name: Online Exhibition<br>
                                    Advisor: Athitha Onuean
                            </br></label></div>
                        </div><br>
                        <h5><b>Details</b></h5>
                        <div class ="row">
                            <div class="card col-9 p-2"style=" left: 20px; max-height: 10rem; border-radius: 12px; padding: 5px; margin-top:15px;">
                                <textarea name="desc" cols="50" rows="20"  required></textarea>
                            </div>
                        </div>
                                <div class="card col-9"style="border-radius: 12px; padding: 5px; margin-top:15px;">
                                    <h6>comments</h6>
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