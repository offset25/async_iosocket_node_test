var data = {};
var result = {};
var fs = require('fs');



async function run_files_from_folder(folder,result) {
	let promise = new Promise((resolve, reject) => {
		//console.log('reading from folder');
		fs.readdir(folder, function (err, files) {
			//console.log('readding dir');
			if (err) {
				console.error("Could not list the directory.", err);
				process.exit(1);
			}
			files.forEach(async function (file, index) {
				var require_path = './' + folder + '/' + file;
				console.log(require_path);
				var imported_code = require(require_path);
				result = await imported_code(data, result);

				console.log(file);
				console.log(result);
				resolve('done');
			});
			resolve('done');
			//resolve(result);
			console.log('end of function');
			console.log(result);
		});
	});
	await promise;
	console.log('end of function');
	//console.log(result);
	return result;
}

async function main_function(data, result) {
	let promise = new Promise((resolve, reject) => {
	});
	await promise;
	return result;
}

async function run_files_main(result) {
	var folder1 = "folder_name1";
	result = await run_files_from_folder(folder1,result);
	//console.log('got here');
	folder1 = "folder_name2";
	result = await run_files_from_folder(folder1,result);
	folder1 = "folder_name3";
	result = await run_files_from_folder(folder1,result);
	result = await main_function(data,result);
	//resolve(result);
	//console.log('blahblah');
	console.log(result);
	return result;
}

run_files_main(result);
