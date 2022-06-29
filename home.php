<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Beranda, SI-Metu</title>
	<script src="js/jquery.js"></script>
  </head>
  <body>
  
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Si-Metu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mapel.php">Mapel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Log-Out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="row mt-3">
                <h3>Hallo, "<?php echo ucwords($_SESSION['Username']);?>"</h3>
                <hr>
                <div class="col">
                    <button type="button" class="btn btn-warning insert-tugas" data-bs-target="#tugas" data-bs-toggle="modal">Tambah Tugas</button>
                    <button type="button" class="btn btn-warning insert-mapel" data-bs-target="#exampleModal" data-bs-toggle="modal">Tambah Mapel</button>
                </div>
            </div>
            <br>
            <div class="row mt-3">
                <h5>Table Tugas</h5>
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Refrensi</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">H-</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <?php 
                            include_once 'config.php';
                            $user=$_SESSION['id'];
                            $no=1;
                            $data=mysqli_query($host,"SELECT *  , DATEDIFF(CURDATE(), deadline) as selisih FROM TUGAS where USER='$user' and STATUS=0 ORDER BY DEADLINE ");
                            while ($d=mysqli_fetch_array($data)){ //$d = membuat variable baru
                            
                            $id = $d['mapel'];

                            $data1=mysqli_query($host,"SELECT *  FROM MAPEL where ID_MAPEL='$id'  ");
                            while ($d1=mysqli_fetch_array($data1)){ //$d = membuat variable baru
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $d1['mapel']?></td>
                            <td><?php echo $d['deskripsi']?></td>
                            <td><?php echo $d['referensi']?></td>
                            <td><?php echo $d['deadline']?></td>
                            <td><?php echo $d['selisih']." Hari"?></td>
                            <td><?php $status = $d['status'];
                                if ($status==0) {
                                    echo "Belum Selesai";
                                }else{
                                    echo "Selesai";
                                }
                            ?></td>
                            <td><button type="button" id="selesai" data-id="<?php echo $d['id_tugas'] ?>" data-idmapel="<?php echo $d['mapel'] ?>" data-mapel="<?php echo $d1['mapel'] ?>" data-user="<?php echo $d['user'] ?>" data-deskripsi="<?php echo $d['deskripsi'] ?>" data-deadline="<?php echo $d['deadline'] ?>" data-refrensi="<?php echo $d['referensi'] ?>" data-status="<?php echo $d['status'] ?>" class="btn btn-danger selesai" data-bs-target="#kumpul" data-bs-toggle="modal">Selesaikan</button></td>
		                </tr>                    
                        </tbody>
                        <?php } }?>
                    </table>
                </div>
            </div>

            <br>
            <div class="row mt-3">
                <h5>Table Tugas Sudah Selesai</h5>
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Refrensi</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">H-</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <?php 
                            include_once 'config.php';
                            $user=$_SESSION['id'];
                            $no=1;
                            $data=mysqli_query($host,"SELECT *  , DATEDIFF(CURDATE(), deadline) as selisih FROM TUGAS where USER='$user' and STATUS=1 ORDER BY DEADLINE ");
                            while ($d=mysqli_fetch_array($data)){ //$d = membuat variable baru
                            
                            $id = $d['mapel'];

                            $data1=mysqli_query($host,"SELECT *  FROM MAPEL where ID_MAPEL='$id'  ");
                            while ($d1=mysqli_fetch_array($data1)){ //$d = membuat variable baru
                            ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $d1['mapel']?></td>
                            <td><?php echo $d['deskripsi']?></td>
                            <td><?php echo $d['referensi']?></td>
                            <td><?php echo $d['deadline']?></td>
                            <td><?php echo $d['selisih']." Hari"?></td>
                            <td><?php $status = $d['status'];
                                if ($status==0) {
                                    echo "Belum Selesai";
                                }else{
                                    echo "Selesai";
                                }
                            ?></td>
		                </tr>                    
                        </tbody>
                        <?php } }?>
                    </table>
                </div>
            </div>
        </div>
        <!-- AKHIR CONTAINER -->
        
        <!-- Modal INSERT DATA -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form action="tambahMapel.php" method="POST" name="input">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
                <button type="button" class="btn-close silang" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                </div>
            </form>
            </div>
            </div>
        </div>

               <!-- Modal INSERT DATA -->
       <div class="modal fade" id="kumpul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form action="edit.php" method="POST" name="input" enctype="multipart/form-data">
	        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selesaikan Tugas</h5>
                <button type="button" class="btn-close silang" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- Modal SELESAI TUGAS -->
        <div class="modal fade" id="tugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form action="tambahTugas.php" method="POST" name="input" >
	
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tugas</h5>
                <button type="button" class="btn-close silang" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="data mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mapel</label>
                                        <select name="mapel" class="form-select">
                                            <?php
                                            include_once 'config.php';
                                            $data=mysqli_query($host,"SELECT *  FROM MAPEL");
                                            while ($d=mysqli_fetch_array($data)){ //$d = membuat variable baru
                                            ?>
                                            <option value="<?php echo $d['id_mapel']?>"><?php echo $d['mapel']?></option>
                                        <?php }?>
                                <select>
                            </div>
                        </div>
                    <div>
                </div>
                </div>
                <div class="modal-footer">
                </div>
            </form>
            </div>
            </div>
        </div>


    <!-- Optional JavaScript; choose one of the two! -->
	<script src="js/script.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>