<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Participant List</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                            <div class="col-md-68 col-xl-8">
                                <div class="card-box">
                                   <table class="table table-bordered" id="myTable">
                                       <thead>
                                          <tr>
                                             <th>Id</th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Mobile Number</th>
                                             <th>Marks</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        <?php foreach ($list as $uData){?>
                                          <tr>
                                             <td><?=$uData['id']?></td>
                                             <td><?=$uData['name']?></td>
                                             <td><?=$uData['email']?></td>
                                             <td><?=$uData['phone']?></td>
                                             <td><?=$uData['marks']?></td>
                                          </tr>
                                        <?php }?>
                                       </tbody>
                                    </table>
                                </div>
                            </div>

                            
                         </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->