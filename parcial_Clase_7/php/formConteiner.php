<?php

 echo '
 <div class="form-group col-md-4 col-sm-4">
                <label for="numero">Numero</label>
                <input type="text" class="form-control" placeholder="" tabindex="1" id="numero">
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="descripcion">Descripcion</label>
                <textarea  id="descripcion" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="pais">Pais</label>
                <input class="form-control" type="text" placeholder="" id="pais" >
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="foto">Imagen</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
                <input type="file" class="form-control" accept="image/*" id="file" name="foto"><br>
            </div>
            <div class="btn-group col-md-2 col-sm-2">
            <button type="submit" class="form-control btn btn-success" name="alta" id="btnSend" onClick=btnSend() value="add">Add</button>
            </div>
 
 </div>
 
 
 
 
 
 
 
 ';

?>