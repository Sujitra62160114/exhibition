<?php   $sidebar1 = ''; 
        $sidebar2 = ''; 
        $sidebar3 = ''; 
        if($_SESSION["sidebar"] == 'SecondYear'){
            $sidebar1 = 'active';
        }else if($_SESSION["sidebar"] == 'ThirdYear'){
            $sidebar2 = 'active';
        }else if($_SESSION["sidebar"] == 'FourthYear'){
            $sidebar3 = 'active';
        }else {
            $sidebar1 = ''; 
            $sidebar2 = ''; 
            $sidebar3 = ''; 
           
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
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar1 ?>">
                    <a href='<?php echo site_url().'/Frontend/show_list_second';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-check-square"></i></span><span class="pcoded-mtext">Grade 2</span></a>
                </li>
                <?php if($_SESSION["user"] == 2){ ?>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar2 ?>">
                    <a href='<?php echo site_url().'/Frontend/show_list_third';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Grade 3</span></a>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo $sidebar3 ?>">
                    <a href='<?php echo site_url().'/Frontend/show_list_fourth';?>' class="nav-link "><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Grade 4</span></a>
                </li>
                
                <?php  } ?>
            </ul>
        </div><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 1164px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div>
</nav>