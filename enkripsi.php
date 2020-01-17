 <div class="col-md-12">
 <div class="col-md-6 col-md-offset-2">
 <div class="panel panel-default">
 <div class="panel-heading">
   <h3 class="panel-title">Enkripsi Pesan</h3>
 </div>
  <?php
   //**membuat direktory jika belum ada**

//    if(!empty ($_POST['upload'])){
//        $file = '';
//        $filename = './file';

//        if (file_exists($filename)) {

//        } else {
//            mkdir($filename, 0777);
//        }
//    //**upload file ke diektory yang terbentuk**//

// $lokasi_file =$_FILES['fupload']['tmp_name'];
// $nama_file =$_FILES['fupload']['name'];
// $direktori ="$filename/$nama_file";
// move_uploaded_file($lokasi_file,$direktori);

// //**membaca file**//
//        $lin = '';
//        $fh = fopen($direktori, "r");
//        while (true) {
//            $line = fgets($fh);
//            if ($line == null

//                )break;


//            $lin.=$line;
//        }
//        $lin;
//        fclose($fh);

//    }
?>
 <div class="panel-body">
 <form class="form-horizontal" method="POST" action="index.php?rute=proses-e" name="myform" >
 <fieldset>

     <div class="form-group">
     <label for="textArea" class="col-lg-2 control-label">Isi Pesan</label>
     <div class="col-lg-10">
        <textarea name="kata" id="file-content" class="form-control" rows="3"></textarea>
     </div>
   </div>
  
<script type="text/javascript">
    function readSingleFile(e) {
    var file = e.target.files[0];
    if (!file) {
      return;
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      var contents = e.target.result;
      displayContents(contents);
    };
    reader.readAsText(file);
    }

    function displayContents(contents) {
    var element = document.getElementById('file-content');
    element.textContent = contents;
    }

    document.getElementById('file-input')
    .addEventListener('change', readSingleFile, false);
    </script>
   <div class="form-group">
     <label for="inputEmail" class="col-lg-2 control-label">Key</label>
     <div class="col-lg-10">
       <input type="text" name="kunci" class="form-control"  placeholder="masukan KEY" required>
     </div>
   </div>

   <div class="form-group">
     <div class="col-lg-10 col-lg-offset-2">
       <button type="reset" class="btn btn-danger">Cancel</button>
       <button name="kirim"  class="btn btn-primary" value="Kirim" id="kirim">Enkrip</button>
     </div>
   </div>
   
 </fieldset>
 </form>
 </div>
 </div>
