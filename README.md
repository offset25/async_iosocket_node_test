Hi!

For this project it is important that you have a high skillset in PHP/Codeigniter with also good skillset in socket.io/node.

Please take the time to answer these questions.  Upload the codes to the github and make it public (so I can reach it).  

Send the answers and the code to me.   Next step is that we will go through your answers and your code example.  



1. Please use async/await for Javascript (Node.js)

I need JS code which can do the following: the Main.js is the root file and in the same level, there will be folder1, folder2, folder3.

1). Main.js contains two objects: data, result
2). Main.js opens a folder called folder_name1, finds any .js files in the folder, and executes them one by one.
3). Main.js then opens a folder called folder_name2, finds any .js files in the folder, and executes them one by one.
4). Main.js then opens a folder called folder_name3, finds any .js files in the folder, and executes them one by one.
5). Finally, main.js executes a function.

Important notes:

A) The ordering of execution must be 2 -> 3 -> 4 -> 5. 
This means when all of (2) is done, it will then execute (3); 
when all of (3) is done, it will then execute (4); finally when (4) it done it will execute (5).

B) Each of the .js files in each of the folders are simple functions like this:

function my_function (data, result) {

	// do something (it'll take sometime, you can use setTimeout() here, so that delay the time, for example.

	return result;
}

module.exports = my_function;


As you can see, the function is accepting the two objects from main.js, and returning the result object.
So your code will open each .js file and execute the single exported function in it.

Your code should be as simple as possible.


2. Explain how to use socket.io and why? Also, make an example for it.
3. How to remove index.php from URL in Codeigniter?
4. What's MVC model?
5. Make a simple Codeigniter project
Codeigniter v3, Database: MySQL
In Front-end, there's input field, you can insert multiple images, so upload those images to the CI server and save it database
and show the saved images to the front-end, also



------------

