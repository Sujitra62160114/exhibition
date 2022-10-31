<?php  
    $sidebar2 = ''; 
    $sidebar3 = ''; 
    $sidebar4 = ''; 
    $sidebar5 = ''; 
    $sidebar6 = ''; 
    $sidebar7 = ''; 
    if($_SESSION["sidebar"] == 'user'){
        $sidebar2 = 'active';
    }else if($_SESSION["sidebar"] == 'company'){
        $sidebar3 = 'active';
    }else if($_SESSION["sidebar"] == 'project'){
        $sidebar4 = 'active';
    }else if($_SESSION["sidebar"] == 'cluster'){
        $sidebar5 = 'active';
    }else if($_SESSION["sidebar"] == 'team'){
        $sidebar6 = 'active';
    }else if($_SESSION["sidebar"] == 'tag'){
        $sidebar7 = 'active';
    }else {
        $sidebar2 = ''; 
        $sidebar3 = ''; 
        $sidebar4 = ''; 
        $sidebar5 = ''; 
        $sidebar6 = ''; 
        $sidebar7 = ''; 
    }
?>


<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Exhibition</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: calc(100vh - 70px);"><div class="navbar-content scroll-div" style="overflow: hidden; width: 100%; height: calc(100vh - 70px);">
            <ul class="nav pcoded-inner-navbar">
                <?php if($_SESSION["role"] == 2){ ?>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar2 ?>">
                    <a href='<?php echo site_url().'/User/show_user_manage';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Users</span></a>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar3 ?>">
                    <a href='<?php echo site_url().'/Company/show_company_manage';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Company</span></a>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar4 ?>">
                    <a href='<?php echo site_url().'/Project/show_project_manage';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Project</span></a>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar5 ?>">
                    <a href='<?php echo site_url().'/Cluster/show_cluster_manage';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Cluster</span></a>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar6 ?>">
                    <a href='<?php echo site_url().'/Team/show_team_manage';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Team</span></a>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar7 ?>">
                    <a href='<?php echo site_url().'/Tag/show_tag_manage';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-tag"></i></span><span class="pcoded-mtext">Tag</span></a>
                </li>
                <?php  } ?>
            </ul>
        </div><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 1164px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div>
</nav>