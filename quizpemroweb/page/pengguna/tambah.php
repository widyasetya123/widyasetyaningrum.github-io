<script type="text/javascript" >
    function validasi(form){
        if (form.username.value=="") {
            alert("Username Tidak Boleh Kosong");
            form.username.focus();
            return(false);
        }if (form.pass.value=="") {
            alert("Password Tidak Boleh Kosong");
            form.pass.focus();
            return(false);
            
        }if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        }

        return(true);
    }
</script>

<div class="panel panel-default">
<div class="panel-heading">
		<center>Tambah Data Pengguna</center>
 </div> 
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" onsubmit="return validasi(this)" >
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" id="username" />
                    
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="pass" type="Password" id="pass" />
                    
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" name="nama" id="nama" />
                    
                </div>

                <div class="form-group">
                    <label> Level Akses</label>
                    <select class="form-control" name="level">
                        <option> == Pilih Akses Level == </option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        
                    </select>
                </div>


                
                <div>
                	
                	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
         </div>

         </form>
      </div>
 </div>  
 </div>  
 </div>


 <?php

 	$username = $_POST ['username'];
 	$pass = $_POST ['pass'];
 	$nama = $_POST ['nama'];
    $level = $_POST ['level'];
 	

 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("insert into tb_user (username, password, nama, level)values('$username', '$pass', '$nama', '$level')");

 		if ($sql){
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=pengguna";

 				</script>
             <?php
             }
 		
 	    

    }

 ?>
                             
                             

