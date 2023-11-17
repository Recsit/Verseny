<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Versenyek</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <input type="text" class="form-control" required name="nev" placeholder="Szegedi futás">
                    </div>

                    <div class="form-group">
                        <label>Év:</label>
                        <input type="number" class="form-control" required name="ev" placeholder="2023">
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
                        <input type="text" class="form-control" required name="helyszin" placeholder="Szeged">
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

<!--Versenyző hozzáadása Modal -->
<div class="modal fade" id="versenyzoaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Új verseny</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="versenyzoaddform">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Verseny:</label>
                        <select class="form-control fordulokey" name="fordulo">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Felhasználó:</label>
                        <select class="form-control felhasznalokey" name="felhasznalo">

                        </select>
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

<h1 class="text-center" style="margin-bottom: 20px;margin-top: 20px">Versenyek</h1>
<p class="text-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#versenyaddmodal">
    Új verseny
</button></p>

<table class="table table-striped versenytable w-75" style="margin: auto auto;  margin-top: 50px">
    <thead>
    <tr class="text-center">
        <th scope="col" id="th" class="col-xs-3">Név</th>
        <th scope="col" id="th" class="col-xs-2">Év</th>
        <th scope="col" id="th" class="col-xs-2">Tipus</th>
        <th scope="col" id="th" class="col-xs-3">Helyszín</th>
        <th scope="col" id="th" class="col-xs-1">Fordulok</th>
        <th scope="col" id="th" class="col-xs-1"></th>
    </tr>
    </thead>
    <tbody id="versenyekbody">

    </tbody>
</table>

<h2 class="text-center versenyzokh2" style="margin-top: 100px;margin-bottom: 20px">Versenyzők</h2>
    <p class="text-center"><button type="button" class="btn btn-primary" id="verseyzobtn" data-bs-toggle="modal" data-bs-target="#versenyzoaddmodal">
        Új versenyző
    </button></p>


<table class="table table-striped versenyzotable w-75" style="margin: auto auto; margin-top: 50px">
    <thead>
    <tr class="text-center">
        <th scope="col" id="th" class="col-xs-4">Verseny</th>
        <th scope="col" id="th" class="col-xs-1">Fordulo</th>
        <th scope="col" id="th" class="col-xs-5">Versenyző</th>
        <th scope="col" id="th" class="col-xs-2"></th>
    </tr>
    </thead>
    <tbody id="versenyzokbody">

    </tbody>
</table>


<script src="assets/jquery.js"></script>
<script src="bootstrap-5.3.2-dist/js/bootstrap.js"></script>

<script type="text/javascript">

    $(document).ready(function (){
        fetchversenyek();
        fetchfordulokkey();
        fetchfehasznalokkey();
        fetchversenyzok();
        function fetchfordulokkey(){

            $.ajax({
                type:"GET",
                url:"fetchfordulokkey",
                dataType: "json",
                success: function (response){
                    if (response.fordulok.length==0){
                        $('#verseyzobtn').hide()
                        $('.versenyzokh2').hide()
                    }
                    $.each(response.fordulok,function (key,item){
                        $('.fordulokey').append(
                            '<option value="'+[item.verseny_nev,item.verseny_ev,item.forduloszam]+'">'+item.verseny_nev+' - '+item.verseny_ev+': '+item.forduloszam+'</option>'
                        );
                    });
                }
            })
        }
        function fetchfehasznalokkey(){

            $.ajax({
                type:"GET",
                url:"fetchfelhasznalokkey",
                dataType: "json",
                success: function (response){
                    $.each(response.felhasznalok,function (key,item){
                        $('.felhasznalokey').append(
                            '<option value="'+[item.nev,item.email]+'">'+item.nev+' - '+item.email+'</option>'
                        );
                    });
                }
            })
        }

        function fetchversenyek(){

            $.ajax({
                type:"GET",
                url:"fetchversenyek",
                dataType: "json",
                success: function (response){
                    if (response.versenyek.length==0){
                        $('.versenytable').hide()
                    }

                    $.each(response.versenyek,function (key,item){
                        $('#versenyekbody').append(
                            '<tr class="text-center">\
                                <td class="col-xs-3">'+item.nev+'</td>\
                                <td class="col-xs-2">'+item.ev+'</td>\
                                <td class="col-xs-2">'+item.tipus+'</td>\
                                <td class="col-xs-3">'+item.helyszin+'</td>\
                                <td class="col-xs-1">'+ fetchfordulok([item.nev,item.ev])+'</td>\
                                <td class="col-xs-1"><button type="submit" class="btn btn-success forduloadd" data-toggle="tooltip" data-placement="top" title="Forduló hozzáadása" value="'+[item.nev,item.ev]+'">+</button></td>\
                            </tr>'
                        );
                    });
                }
            })
        }

        function fetchversenyzok(){

            $.ajax({
                type:"GET",
                url:"fetchversenyzok",
                dataType: "json",
                success: function (response){
                    if (response.versenyzok.length==0){
                        $('.versenyzotable').hide()
                    }
                    $.each(response.versenyzok,function (key,item){
                        $('#versenyzokbody').append(
                            '<tr class="text-center">\
                                <td class="col-xs-4">'+item.fordulo_nev+' - '+item.fordulo_ev+'</td>\
                                <td class="col-xs-1">'+item.fordulo_forduloszam+'</td>\
                                <td class="col-xs-5">'+item.felhasznalo_nev+' - '+item.felhasznalo_email+'</td>\
                                <td class="col-xs-2"><button type="submit" class="btn btn-danger versenyzodelete" value="'+[item.felhasznalo_nev,item.felhasznalo_email,item.fordulo_nev,item.fordulo_ev,item.fordulo_forduloszam]+'">Töröl</button></td>\
                            </tr>'
                        );
                    });
                }
            })
        }

        function fetchfordulok(kulcs){
            $ossz=0;
            $.ajax({
                type:"GET",
                url:"fetchfordulok",
                dataType: "json",
                async: false,
                success: function (response){
                    $.each(response.fordulok,function (key,item){
                    if (item.verseny_nev==kulcs[0] && item.verseny_ev==kulcs[1])
                        $ossz++;
                    });
                }
            })
            return $ossz;
        }

        $(document).on('click','.forduloadd',function (e){
            e.preventDefault();

            $verseny=$(this).val().split(',');
            $.ajax({
                type:"POST",
                url:"forduloadd",
                data: {verseny_nev: $verseny[0], verseny_ev: $verseny[1],fordulo: fetchfordulok($verseny)+1},
                success: function (response){
                    console.log(response)
                    $('#versenyekbody').html("");
                    $('.fordulokey').html("");
                    $('.versenyzokh2').show();
                    $('#verseyzobtn').show();
                    fetchfordulokkey();
                    fetchversenyek();
                    alert('Sikeres hozzáadás');

                }
            });
        });

        $(document).on('click','.versenyzodelete',function (e){
            e.preventDefault();
            $versenyzo=$(this).val().split(',');
            $.ajax({
                type:"DELETE",
                url:"versenyzodelete/"+$versenyzo[0]+"-"+$versenyzo[1]+"-"+$versenyzo[2]+"-"+$versenyzo[3]+"-"+$versenyzo[4],
                success: function (response){
                    console.log(response)
                    $('#versenyzokbody').html("");
                    fetchversenyzok();
                    alert('Sikeres törlés');
                }
            });
        });

        $('#versenyzoaddform').on('submit',function (e){
            e.preventDefault();
            $fordulo=$('.fordulokey').val().split(',');
            $felhasznalo=$('.felhasznalokey').val().split(',');
            $.ajax({
                type:"POST",
                url:"versenyzoadd",
                data: {felhasznalo_nev: $felhasznalo[0],felhasznalo_email: $felhasznalo[1], fordulo_nev:$fordulo[0], fordulo_ev:$fordulo[1], fordulo_forduloszam: $fordulo[2]},
                success: function (response){
                    console.log(response)
                    $('#versenyzoaddmodal').modal('hide');
                    $('.versenyzotable').show();
                    $('#versenyzokbody').html("");
                    fetchversenyzok();
                    alert('Sikeres hozzáadás');
                },
                error: function (error){
                    console.log(error)
                    alert('Már van ilyen versenyző');
                }
            });
        });

        $('#versenyaddform').on('submit',function (e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"versenyadd",
                data: $('#versenyaddform').serialize(),
                success: function (response){
                    console.log(response)
                    $('#versenyaddmodal').modal('hide');
                    $('.versenytable').show();
                    $('#versenyekbody').html("");
                    $('.versenykey').html("");
                    $('.fordulokey').html("");
                    fetchversenyek();
                    fetchfordulokkey();
                    alert('Sikeres hozzáadás');
                },
                error: function (error){
                    console.log(error)
                    alert('Már van ilyen verseny');
                }
            });
        });

    });
</script>

</body>
</html>
