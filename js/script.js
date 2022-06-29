$(function(){

    //INSERT DATA MAPEL
    $('.insert-mapel').on('click', function(){
        $('.modal-body').html(`
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mapel</label>
                            <input type="text" class="form-control" name="mapel" id="exampleFormControlInput1" placeholder="example : Matematika">
                        </div>
                    </div>
                <div>
            </div>
            `);
        $('.modal-footer').html(`<button class="btn btn-danger next">Tambah</button>`);
    });

    $('.modal-header').on('click', '.silang', function(){
        $('.modal-footer .next').remove();
    });

    //HAPUS DATA MAPEL
    $('.delete').on('click', function(){
        $('.modal-body').html(`
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                <h3> Yakin Menghapus Data? </h3>
                <input type="hidden" class="form-control" name="id" value="`+$(this).data('id')+`">
                </div>
            <div>
        </div>
        `);
        $('.modal-footer').html(`<button class="btn btn-danger hapus">Hapus</button>`);
    });
    //EDIT DATA MAPEL
    $('.edit').on('click', function(){
        $('.modal-body').html(`
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Mapel</label>
                <input type="text" class="form-control" name="mapel" value="`+$(this).data('mapel')+`">
                <input type="hidden" class="form-control" name="user" value="`+$(this).data('user')+`">
                <input type="hidden" class="form-control" name="id" value="`+$(this).data('id')+`">
                </div>
            <div>
        </div>
        `);
        $('.modal-footer').html(`<button class="btn btn-danger edit">Edit</button>`);
    });

    //INSERT DATA TUGAS
    $('.insert-tugas').on('click', function(){
        $('.modal-body .container-fluid .row .col .data').append(`
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" cols="50" class="form-control" required ></textarea>
                            <label for="exampleFormControlInput1" class="form-label">Deadline</label>
                            <input type="date" name="deadline" required="" class="form-control">
                            <label for="exampleFormControlInput1" class="form-label">Refrensi</label>
                            <input type="text" name="refrensi" required="" class="form-control">
            `);
        $('.modal-footer').html(`<button class="btn btn-danger next">Tambah</button>`);
    });

    $('.selesai').on('click', function(){
        $('.modal-body').html(`
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <table>
                            <tr>
                                <td>Mapel</td>
                                <td>:</td>
                                <td>`+$(this).data('mapel')+`</td>  
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>`+$(this).data('deskripsi')+`</td>  
                            </tr>
                            <tr>
                                <td>Deadline</td>
                                <td>:</td>
                                <td>`+$(this).data('deadline')+`</td>  
                            </tr>
                            <tr>
                                <td>Refrensi</td>
                                <td>:</td>
                                <td>`+$(this).data('refrensi')+`</td>
                                <input type="hidden" name="id" value="`+$(this).data('id')+`">
				                <input type="hidden" name="ref" value="`+$(this).data('refrensi')+`">
				                <input type="hidden" name="des" value="`+$(this).data('deskripsi')+`">
				                <input type="hidden" name="user" value="`+$(this).data('user')+`">
                                <input type="hidden" name="mapel" value="`+$(this).data('idmapel')+`">
                                <input type="hidden" name="dead" value="`+$(this).data('deadline')+`">  
                            </tr>
                        </table>
                        <hr>
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="0">Belum Selesai</option>
                            <option value="1">Selesai</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Upload Tugas</label>
                        <input type="file" required name="file" value="" placeholder=""/>
                    </div>
                    </div>
                <div>
            </div>
            `);
        $('.modal-footer').html(`<button class="btn btn-danger next">Selesaikan</button>`);
    });

});