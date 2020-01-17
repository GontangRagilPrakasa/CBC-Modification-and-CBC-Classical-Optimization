<html>
    <head>
        <title>cipher block chaining</title>
        
    </head>
    <body>
        
            
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                    <legend><b>Halaman Cipher Block Chaining</b></legend>
                    <form enctype="multipart/form-data" id="myform" name="myform" method=post action="index.php?rute=pesan"/>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Open FIle</label>
                        <div class="col-lg-7">
                        <input  class="form-control" type=file name="fupload" id="file" >
                        </div>
                        <div class="col-lg-3">
                        <input  class="btn btn-success" type="submit" name="upload" id="upload" value="upload">
                       
                        <script type="text/javascript">
                        
            $(function(){
$('#upload').click(function(){
 var file = $('#file').val(); //Ambil Value 
 var ekstensi = ['txt']; //Variabel array untuk penentuan Ekstensi
  if ( file ) { 
   var ambilekstensi = file.split('.');  //Ambil Ekstensi
       ambilekstensi = ambilekstensi.reverse(); 
   if ( $.inArray ( ambilekstensi[0].toLowerCase(), ekstensi ) > -1 ){
          return true;  //jika cocok return true
        } 
   else {
          //alert( 'harus txt atau docx' );  //Alert jika ekstensi tidak cocok
          swal(" File harus berupa .txt");
        }
      }
  else
      {
         swal("Anda Belum memilih file"); //Alert jika value null 
      }
  return false;
   });

});

         
            </script>

                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>

    </body>

</html>
