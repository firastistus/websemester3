<div style="margin: 50px 0px 0px 0px">
<?php $this->load->view('user/shared/filter'); ?>
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

                <!-- $no = 1; foreach ($users->result() as $user) { ?> -->
                <?php 
                if(empty($users)){
                    echo"<td colspan='8'> <center><span> Data Tidak Tersedia </span></center> </td>";
                }
                else{
                    $no = $this->uri->segment('3')+1; 
                foreach ($users->result() as $user) { 

                $roles = $this->db->query("SELECT * from roles where id = '".$user->role_id."' ");
                        $role = $roles->row()->name;
                        $phone     = $user->phone;
                        ?>
                            <tr role="row" class="odd">
                                <td><?php echo $no++; ?></td>
                                <td class="sorting_1"><?php echo $user->nik ?></td>
                                <td><?php echo $user->fullname ?></td>
                                <td><?php echo $user->birthday ?></td>
                                <td><?php echo $user->address ?></td>
                                <td><?php echo $user->gender ?></td>
                                <td><?php echo $user->created_at ?></td>
                                <td><center>
            <?php
                echo" <a href='".base_url()."user/show/".$user->id ."' class='button f-smaller link'>Lihat</a>";
                echo" <a href='".base_url()."user/edit/".$user->id ."' class='button f-smaller save'>Edit</a>";
                echo" <a href='".base_url()."user/delete/".$user->id ."' onclick=\"return    confirm('Anda akan menghapus data, anda yakin ?');\" class='button f-smaller back'>Hapus</a>";
            ?></center>
                                </td>
                                                </tr>
                                    <?php } }?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="row">
             </div>