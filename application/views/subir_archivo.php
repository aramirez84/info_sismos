<div class="head-body-primary2">
    <div class="title-app-head">
        <h3>Módulo para cargar informaci&oacute;n</h3>
    </div>
</div>
<div class="head-body-libros">
    <div class="box-books-load">
        <div class="btn">
            <?php
            if(isset($mensaje) && !empty($mensaje))
            {
                echo '<div class="'.$class.' input-file form-control-file" role="alert">';
                echo "$mensaje!";
                echo '</div>';                
            }
            ?>
            <form action='procesar_archivo' method='post' enctype="multipart/form-data">
                <div class="form-group fa  fa-cloud-upload">
                    <label for="exampleFormControlFile1">Importar Archivo : </label>
                    <input id="sel_file" name="sel_file" class="input-file form-control-file" type="file" required="">
                </div>
                <input type='submit' name='submit' value='submit' class="input-file form-control-file">
            </form>
        </div>
    </div>
</div>
