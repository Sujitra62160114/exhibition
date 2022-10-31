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
                                    <li class="breadcrumb-item"><a href="javascript:">Information Manage</a></li>
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
                                        <h5>Information Manage</h5>
                                    </div>
                                    <div class="card-block">
                                        <table id="myTable" class="display">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;">No.</th>
                                                    <th style="width: 75%;">Information Name</th>
                                                    <th style="width: 5%; "></th>
                                                    <th style="width: 5%;">Manage</th>
                                                    <th style="width: 5%;"></th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Online Exhibition</td>
                                                    <td><button type="button" class="btn btn-outline-primary" title="" data-toggle="tooltip" data-original-title="btn btn-outline-primary"><div class="i-block" data-clipboard-text="feather icon-eye" data-filter="icon-eye" data-toggle="tooltip" title="" data-original-title="icon-eye"><i class="feather icon-eye"></i></div></button></td>
                                                    <td><button type="button" class="btn btn-outline-warning" title="" data-toggle="tooltip" data-original-title="btn btn-outline-warning"><div class="i-block" data-clipboard-text="feather icon-edit" data-filter="icon-edit" data-toggle="tooltip" title="" data-original-title="icon-edit"><i class="feather icon-edit"></i></div></button></td>
                                                    <td><button type="button" class="btn btn-outline-danger" title="" data-toggle="tooltip" data-original-title="btn btn-outline-danger"><div class="i-block" data-clipboard-text="feather icon-trash-2" data-filter="icon-trash-2" data-toggle="tooltip" title="" data-original-title="icon-trash-2"><i class="feather icon-trash-2"></i></div></button></td>

                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Container</td>
                                                    <td><button type="button" class="btn btn-outline-primary" title="" data-toggle="tooltip" data-original-title="btn btn-outline-primary"><div class="i-block" data-clipboard-text="feather icon-eye" data-filter="icon-eye" data-toggle="tooltip" title="" data-original-title="icon-eye"><i class="feather icon-eye"></i></div></button></td>
                                                    <td><button type="button" class="btn btn-outline-warning" title="" data-toggle="tooltip" data-original-title="btn btn-outline-warning"><div class="i-block" data-clipboard-text="feather icon-edit" data-filter="icon-edit" data-toggle="tooltip" title="" data-original-title="icon-edit"><i class="feather icon-edit"></i></div></button></td>
                                                    <td><button type="button" class="btn btn-outline-danger" title="" data-toggle="tooltip" data-original-title="btn btn-outline-danger"><div class="i-block" data-clipboard-text="feather icon-trash-2" data-filter="icon-trash-2" data-toggle="tooltip" title="" data-original-title="icon-trash-2"><i class="feather icon-trash-2"></i></div></button></td>

                                                                                                     

                                                </tr>
                                            </tbody>
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