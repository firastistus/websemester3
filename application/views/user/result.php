<?php $this->load->view('user/shared/filter'); ?>

<div style="margin: 100px 0px 0px 0px">
            <div class="row">
                <div>
                    <table style="width:100%;">
                    <thead>
                        <tr role="row">
                            <th width="3px">No </th>
                            <th  width="5px">NIK</th>
                            <th width="20px">Nama Lengkap</th>
                            <th  width="5px">Tanggal Lahir</th>                                                
                            <th  width="35px">Alamat</th>
                            <th  width="5px">Jenis Kelamin</th>
                            <th  width="5px">Terdaftar</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                        <tbody>
                    <?php 
                    if($results->result() == null){
                        echo"<td colspan='8'> <center><span> Data Tidak Tersedia </span></center> </td>";
                    }
                    else{
                                $no = 1; foreach ($results->result() as $user) { ?>
                        <tr role="row" class="odd">
                                <td><?php echo $no++; ?></td>
                                <td class="sorting_1"><?php echo $user->nik ?></td>
                                <td><?php echo $user->fullname ?></td>
                                <td><?php echo $user->birthday ?></td>
                                <td><?php echo $user->address ?></td>
                                <td><?php echo $user->gender ?></td>
                                <td><?php echo $user->created_at ?></td>
                                <td>
                <?php
                    echo" <a href='".site_url()."user/show/".$user->id ."' class='btn btn-white'><i class='ti-eye'></i></a>";
                    echo" <a href='".site_url()."user/edit/".$user->id ."' class='btn btn-white'><i class='ti-pencil'></i></a>";
                    echo"
            <a href='delete/".$user->id ."' onclick=\"return confirm('Anda yakin akan menghapusnya ?');\" class='btn btn-white'><i class='ti-trash'></i></a>";
                ?>
            </td>
                            </tr>
                <?php } } ?>
                            </tbody>
                    </table>
        </div>
    </div>
</div>