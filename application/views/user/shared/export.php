<?php
    
    header("Content-type: application/vnd-ms-excel");

    header("content-Disposition: attachment; filename=$title.xls");

    header("Pragma: no-cache");

    header("Expires: 0");
?>
<div class="col-sm-12">
                        <div class="card-box">
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <center><h3>Data Penduduk</h3></center>
                                                <div class="clearfix"></div>
                                            </div>
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th width="3px">No </th>
                                                <th width="20px">Nama </th>
                                                <th width="10px">Username</th>
                                                <th width="10px">NIK</th>
                                                <th width="10px">Tanggal Lahir</th>
                                                <th  width="10px">Email</th>
                                                <th  width="5px">Telepon</th>
                                                <th  width="35px">Alamat</th>
                                                <th  width="5px">Posisi</th>
                                            </tr>
                                        </thead>

                                            <tbody>
                                        <?php $no = 1; foreach ($users->result() as $user) { ?>
                                            <tr role="row" class="odd">
                                                    <td><?php echo $no++; ?></td>
                                                    <td class="sorting_1"><?php echo $user->fullname ?></td>
                                                    <td><?php echo $user->username ?></td>
                                                    <td><?php echo $user->nik ?></td>
                                                    <td><?php echo $user->birthday ?></td>
                                                    <td><?php echo $user->email ?></td>
                                                    <td><?php echo $user->phone ?></td>
                                                    <td><?php echo $user->address ?></td>
                                                    <td><?php echo $user->role_id ?></td>
                                                </tr>
                                    <?php } ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>