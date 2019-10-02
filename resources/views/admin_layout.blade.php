<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard</title>
            <link rel="stylesheet" type="text/css" href="{{asset('dash/bootstrap/css/bootstrap.min.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{asset('dash/font-awesome/css/font-awesome.min.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{asset('dash/css/local.css')}}" />
            <script type="text/javascript" src="{{asset('dash/js/jquery-1.10.2.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('dash/bootstrap/js/bootstrap.min.js')}}"></script>
            <!-- you need to include the shieldui css and js assets in order for the charts to work -->
            <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
            <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />
            {{-- <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
            <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script> --}}

</head>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                 </button>
                <a class="navbar-brand" href="{{URL::to('/dashboard')}}">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="{{URL::to('/dashboard')}}"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li class=""><a href="{{URl::to('/all_category')}}"><i class="fa fa-globe"></i> All Categories</a></li>
                    <li><a href="{{URl::to('/add_category')}}"><i class="fa fa-plus"></i> Add Category</a></li>
                    <li><a href="{{URl::to('/allmanufacture')}}"><i class="fa fa-globe"></i>All Manufacture</a></li>
                    <li><a href="{{URl::to('/add_manufacture')}}"><i class="fa fa-plus"></i> Add Manufacture</a></li>
                    <li>
                        <a class="dropmenu" href="{{URl::to('/all_product')}}"><i class="fa fa-globe icon-folder-close-alt" ></i><span class="hidden-tablet"> All Products<span class="label label important" style="color:cornflowerblue"> View </span></a>
                        <a class="dropmenu" href="{{URl::to('/add_product')}}"><i class="fa fa-plus icon-folder-close-alt" ></i><span class="hidden-tablet"> Add Products<span class="label label important" style="color:cornflowerblue"> Add </span></a>

                    </li>
                    <li><a href="{{URl::to('/add_slider')}}"><i class="fa fa-plus"></i>Add Slider</a></li>
                    <li><a href="{{URl::to('/all_slider')}}"><i class="fa fa-globe"></i>All Slider</a></li>
                    <li><a href="{{URl::to('/manage_order')}}"><i class="fa fa-arrow-right"></i>Manage Order</a></li>
                    <li><a href="bootstrap-elements.html"><i class="fa fa-arrow-right"></i> Shop Names</a></li>
                    <li><a href="bootstrap-grid.html"><i class="fa fa-table"></i>Manage Logged Comments</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li class="dropdown-header">2 New Messages</li>
                             <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                              </li>
                              <li class="divider"></li>
                            <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown user-dropdown">
                    <a href="{{URL::to('/dashboard') }}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Session::get('admin_name') }}<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-edit"></i> Edit Account</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i><small>{{ Session::get('admin_email') }} </small></a></li>
                            <li><a href="#"><i class="fa fa-user"></i><small>{{ Session::get('admin_name') }} </small></a></li>
                            <li><a href="#"><i class="fa fa-phone"></i><small>{{ Session::get('admin_phone') }} </small></a></li>
                            <li class="divider"></li>
                            <li><a href="{{URL::to('/logout')}}" class="logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                     </li>
                    <li class="divider-vertical"></li>
                    <li>
                        <form class="navbar-search">
                            <input type="text" placeholder="Search" class="form-control">
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
@yield('admin_content')
            <!-- /#wrapper -->
            {{-- <script type="text/javascript">
                jQuery(function ($) {
                    var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                    visits = [123, 323, 443, 32],
                    traffic = [
                    {
                        Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
                    },
                    {
                        Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
                    },
                    {
                        Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
                    },
                    {
                        Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
                    },
                    {
                        Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
                    }];
            $("#shieldui-chart1").shieldChart({
                    theme: "dark",
                    primaryHeader: {
                        text: "Market Values"
                    },
                    exportOptions: {
                        image: false,
                        print: false
                    },
                dataSeries: [{
                        seriesType: "area",
                        collectionAlias: "Q Data",
                        data: performance
                    }]
            });
            $("#shieldui-chart2").shieldChart({
                    theme: "dark",
                    primaryHeader: {
                        text: "Traffic Per week"
                    },
                    exportOptions: {
                        image: false,
                        print: false
                    },
                    dataSeries: [{
                        seriesType: "pie",
                        collectionAlias: " Ecommerce Market value rate",
                        data: visits
                    }]
             });
                $("#shieldui-grid1").shieldGrid({
                    dataSource: {
                        data: traffic
                    },
                    sorting: {
                        multiple: true
                    },
                    rowHover: false,
                    paging: false,
                    columns: [
                    { field: "Source", width: "170px", title: "Source" },
                    { field: "Amount", title: "Amount" },                
                    { field: "Percent", title: "Percent", format: "{0} %" },
                    { field: "Target", title: "Target" },
                     ]
                    });            
                });        
            </script> --}}

            <script>
                //delete javascript to ask you if you wanna delete? not we defined the class in delete side
                $('.delete-btn').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var delete_item = confirm("Are You sure you want to to delete this category item?");
                    if(delete_item){
                        window.location.href = link;
                    };
                });

                    //logout javascript to ask you if you wanna logut?
                $('.logout').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var logout_item = confirm("Are You sure want to Logout?");
                    if(logout_item){
                        window.location.href = link;
                    };
                });

                //edit category javascript to ask you if you wanna edit this iterm?
                $('.edit').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var edit_item = confirm("Are You sure want to Edit this Category?");
                    if(edit_item){
                        window.location.href = link;
                    };
                });

                //edit order edit-order
                $('.edit-order').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var edit_item = confirm("Are You sure want to Edit this Order?");
                    if(edit_item){
                        window.location.href = link;
                    };
                });

                 //delete order edit-order
                 $('.delete-order').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var delete_item = confirm("Are You sure want to Delete this Order?");
                    if(delete_item){
                        window.location.href = link;
                    };
                });


                //deactivating javasript to ask if you wanna deactivate this item
                $('.deactivate').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var deactivate_item = confirm("Are You sure you to deactivate this category?");
                    if(deactivate_item){
                        window.location.href = link;
                    };
                });


                 //activating javasript to ask if you wanna deactivate this item
                 $('.activate').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var activate_item = confirm("Are You sure you to activate this category?");
                    if(activate_item){
                        window.location.href = link;
                    };
                });

                //activating javasript to ask if you wanna deactivate this item
                $('.manufacture_activate').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var manufacture_activate_item = confirm("Are You sure you to activate this Manufacture?");
                    if(manufacture_activate_item){
                        window.location.href = link;
                    };
                });

                 //deactivating javasript to ask if you wanna deactivate this item
                 $('.manufacture_deactivate').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var manufacture_deactivate_item = confirm("Are You sure you to deactivate this Manufacture?");
                    if(manufacture_deactivate_item){
                        window.location.href = link;
                    };
                });

                 //deleting javasript to ask if you wanna delete this item
                 $('.manufacture_delete').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var manufacture_delete_item = confirm("Are You sure you to delete this Manufacture?");
                    if(manufacture_delete_item){
                        window.location.href = link;
                    };
                });
                
                //deleting javasript to ask if you wanna delete this item
                 $('.manufacture_edit').on("click",function(e){
                     e.preventDefault();
                     var link = $(this).attr("href");
                     var manufacture_edit_item = confirm("Are You sure you to edit this Manufacture?");
                     if(manufacture_edit_item){
                         window.location.href = link;
                     };
                });

                $('.activate_pro').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var activate_item = confirm("Are You sure you to activate this product?");
                    if(activate_item){
                        window.location.href = link;
                    };
                });

                $('.deactivate_pro').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var deactivate_item = confirm("Are You sure you to deactivate this product?");
                    if(deactivate_item){
                        window.location.href = link;
                    };
                });

                 //edit product javascript to ask you if you wanna edit this iterm?
                 $('.edit_pro').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var edit_item = confirm("Are You sure want to Edit this Product?");
                    if(edit_item){
                        window.location.href = link;
                    };
                });

                 //delete javascript to ask you if you wanna delete? not we defined the class in delete side
                 $('.delete_pro').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var delete_item = confirm("Are You sure you want to to delete this Product item?");
                    if(delete_item){
                        window.location.href = link;
                    };
                });

                 //delete javascript to ask you if you wanna delete? not we defined the class in delete side
                 $('.delete_slide').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var delete_item = confirm("Are You sure you want to to delete this Slide item in the user side?");
                    if(delete_item){
                        window.location.href = link;
                    };
                });

                 //edit slide product javascript to ask you if you wanna edit this iterm?
                 $('.edit_slide').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var edit_item = confirm("Are You sure want to Edit this Slide in the user side?");
                    if(edit_item){
                        window.location.href = link;
                    };
                });

                $('.activate_slide').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var activate_item = confirm("Are You sure you to activate this slide in the user side?");
                    if(activate_item){
                        window.location.href = link;
                    };
                });

                $('.deactivate_slide').on("click",function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    var deactivate_item = confirm("Are You sure you to deactivate this slide in the user side?");
                    if(deactivate_item){
                        window.location.href = link;
                    };
                });


                //  //canceling and activities in javasript to ask if you wanna cancel this item
                //  $('.cancel').on("click",function(e){
                //     e.preventDefault();
                //     var link = $(this).attr("href");
                //     var cancel = confirm("Are You sure you to cancel this process?");
                //     if(cancel){
                //         window.location.href = link;
                //     };
                // });


            </script>
        </body>
        </html>

