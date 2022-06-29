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
    <?php
        if(isset($_SESSION['id'])){    	
        ?>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Si-Metu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="mapel.php">Mapel</a>
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
            </div>
            <br>
            <div class="row mt-3">
                <h5>Table Mapel</h5>
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <?php 
                            include_once 'config.php';
                            $user=$_SESSION['id'];
                            $no=1;
                            $data=mysqli_query($host,"SELECT *  FROM MAPEL where USER='$user'");
                            while ($d=mysqli_fetch_array($data)){ //$d = membuat variable baru
                            
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $d['mapel']?></td>
                            <td><button type="button" id="edit" data-id="<?php echo $d['id_mapel'] ?>" data-mapel="<?php echo $d['mapel'] ?>" data-user="<?php echo $d['user'] ?>" class="btn btn-danger edit" data-bs-target="#editModal" data-bs-toggle="modal">Edit</button>
                            <button type="button" id="delete" data-id="<?php echo $d['id_mapel'] ?>" class="btn btn-danger delete" data-bs-target="#exampleModal" data-bs-toggle="modal">Hapus</button></td>
		                </tr>                    
                        </tbody>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
        <!-- AKHIR CONTAINER -->
        
        <!-- Modal DELETE -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form action="hapus.php" method="POST" name="input">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Mapel</h5>
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

        <!-- Modal EDIT -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form action="editMapel.php" method="POST" name="input">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mapel</h5>
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
        

    <?php }
    ?>
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