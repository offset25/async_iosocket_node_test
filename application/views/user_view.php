<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>How to upload Multiple Files and Images in CodeIgniter</title>
</head>
<body>

<div class="container">

	<div class="col-md-12">
		<b><?php if (isset($filenames)) echo "Successfully uploaded " . count($filenames) . " files"; ?></b>
	</div>

	<form method='post' action='<?php echo base_url(); ?>' enctype='multipart/form-data'>
		<div class="form-group">
			<label for="exampleInputEmail1">File Upload</label>
			<input type='file' name='files[]' multiple>
		</div>
		<button type="submit" name='upload' class="btn btn-primary" value="submit">Upload</button>
	</form>

	<h1>Images List</h1>

	<table class="table">
		<tr>
			<th>ID</th>
			<th>Image</th>
		</tr>
		<?php if(!empty($images)) {
			foreach($images as $key => $value) {
		?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<?php if(file_exists("uploads/".$value['name'])) { ?>
				<td><img style="width: 50px; height: 50px;" src="uploads/<?php echo $value['name']; ?>" ></td>
			<?php } else { ?>
				<td>No Image Found</td>
			<?php } ?>
		</tr>
		<?php } } ?>
	</table>


</div>
</body>
</html>

