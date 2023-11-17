<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Versenyek</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">

</head>
<body>
<!--Verseny hozzáadása Modal -->
<div class="modal fade" id="versenyaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Új verseny</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="versenyaddform">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Név:</label>
                        <input type="text" class="form-control" name="nev" placeholder="Szegedi futás">
                    </div>

                    <div class="form-group">
                        <label>Év:</label>
                        <input type="number" class="form-control" name="ev" placeholder="2023">
                    </div>
                    <div class="form-group">
                        <label>Tipus:</label>
                        <select class="form-control" name="tipus">
                            <option value="futas" selected>Futás</option>
                            <option value="uszas">Úszás</option>
                            <option value="auto">Autó</option>
                            <option value="egyeb">Egyéb</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Helyszín:</label>
                        <input type="text" class="form-control" name="helyszin" placeholder="Szeged">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégsem</button>
                    <button type="submit" class="btn btn-primary">Hozzáad</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src=""></script>

<h1>Versenyek</h1>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#versenyaddmodal">
    Új verseny
</button>

<script src="assets/jquery.js"></script>
<script src="bootstrap-5.3.2-dist/js/bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#versenyaddform').on('submit','#versenyaddform',function (e){
            e.preventDefault();

            $.ajax({
                type:"POST",
                url:"/versenyadd",
                data: $('#versenyaddform').serialize(),
                success: function (response){
                    console.log(response)
                    $('#versenyaddmodal').modal('hide')
                    alert('Sikeres hozzáadás');
                },
                error: function (error){
                    console.log(error)
                    alert('Sikertelen hozzáadás');
                }
            });
        });
    });
</script>

</body>
</html>
