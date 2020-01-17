<input type="file" id="file-input" />
<h3>Contents of the file:</h3>

<textarea name="name" id="file-content" rows="8" cols="80"></textarea>

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


<hr>

<input type="file" id="file-input1" />
<h3>Contents of the file:</h3>
<!-- <pre id="file-content"></pre> -->

<textarea name="name1" id="file-content1" rows="8" cols="80"></textarea>

<script type="text/javascript">
function readSingleFile1(e) {
var file = e.target.files[0];
if (!file) {
  return;
}
var reader = new FileReader();
reader.onload = function(e) {
  var contents = e.target.result;
  displayContents1(contents);
};
reader.readAsText(file);
}

function displayContents1(contents) {
var element = document.getElementById('file-content1');
element.textContent = contents;
}

document.getElementById('file-input1')
.addEventListener('change', readSingleFile1, false);
</script>
